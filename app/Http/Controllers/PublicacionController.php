<?php

namespace App\Http\Controllers;
use App\Models\Publicaciones;
use App\Models\Tema;
use App\Models\Reaccion;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

class PublicacionController extends Controller
{
    public function listar()
    {
        $items = Publicaciones::paginate(5);
        return view('cruds/publicacion/crudPublicacion', compact('items'));
    }

    /*Vista para registrar nuevo cliente*/
    public function registrar()
    {
        return view('cruds/publicacion/Acciones/registrar');
    }   

    /*Permite que se guarde el nuevo registro en la base de datos*/
    public function insertar(Request $request)
    {
        $item = new Publicaciones();
        $item->id_tema = $request->id_tema;
        $item->id_usuario = $request->id_usuario;
        $item->contenido = $request->contenido;
        $item->fecha_creacion = $request->fecha_creacion;
        $item->save();
        return to_route('listar.publi');
    }

    /*Mostrar informacion de un registro*/
    public function detalle(string $id)
    {
        $item = Publicaciones::find($id);
        return view('cruds/publicacion/Acciones/detalle', compact('item'));
    }

    /*Muestra el menu para editar algun registro*/
    public function editar(string $id)
    {
        $item = Publicaciones::find($id);
        return view('cruds/publicacion/Acciones/editar', compact('item'));
    }

    /*Guarda los cambios hechos con edit.*/
    public function actualizar(Request $request, string $id)
    {
        $item = Publicaciones::find($id);
        $item->id_tema = $request->id_tema;
        $item->contenido = $request->contenido;
        $item->fecha_creacion = $request->fecha_creacion;
        $item->save();
        return to_route('listar.publi');
    }

    /*Eliminar a un cliente de la base de datos.*/
    public function eliminar(string $id)
    {
        $item = Publicaciones::find($id);
        $item->delete();
        return to_route('listar.publi');
    }

    public function pagCuzi($id_tema, Request $request)
    {
        $tema = Tema::findOrFail($id_tema);

        // Cargar publicaciones con las relaciones necesarias
        $publicaciones = $tema->publicaciones()
                             ->with(['usuario.roles', 'comentarios.usuario.roles'])
                             ->paginate(5);
        
        $postsPopulares = Publicaciones::where('id_tema', $id_tema)
                        ->withCount('reacciones')
                        ->orderBy('reacciones_count', 'desc')
                        ->take(3)
                        ->get();

        // Cargar todos los usuarios con sus roles (si es necesario)
        $items = User::with('roles')->get();
        $moderadores = User::role('moderador')->get();
        
        $user_id = Auth::id();

        
        $reacciones = Reaccion::all();
        
        return view('modules.foro.categorias.temas.cuzilatada', compact('publicaciones', 'tema', 'user_id', 'items','reacciones', 'postsPopulares', 'moderadores'));
        
    }

    public function insertarPubli(Request $request) 
    {
        $request->validate([
            'id_tema' => 'required|exists:tema,id',
            'id_usuario' => 'required|exists:users,id',
            'contenido' => 'required|string|max:1000',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validar formato de imagen
        ], [
            'imagen.image' => 'El archivo debe ser una imagen.',
            'imagen.mimes' => 'La imagen debe ser de tipo jpeg, png, jpg o gif.',
            'imagen.max' => 'La imagen no debe ser mayor a 2MB.',
        ]);

        $rutaImagen = null;
        if ($request->hasFile('imagen')) {
            $rutaImagen = $request->file('imagen')->store('public/publicaciones');
        }

        Publicaciones::create([
            'id_tema' => $request->id_tema,
            'id_usuario' => $request->id_usuario,
            'contenido' => $request->contenido,
            'imagen' => $rutaImagen,
            'fecha_creacion' => now(),
        ]);

        return redirect()->route('pag.cuzi', ['id_tema' => $request->id_tema])
            ->with('success', 'Publicación creada exitosamente.');
    }

    public function eliminarPost(string $id)
    {
        
        $publicacion = Publicaciones::findOrFail($id);
        $userId = Auth::id();
        $userRoles = User::find($userId)->getRoleNames(); // Obtener los nombres de los roles del usuario autenticado

        // Verificar permisos sin usar Auth::user()
        if ($userRoles->contains('administrador') || $userId === $publicacion->id_usuario || ($userRoles->contains('moderador') && !$publicacion->usuario->hasRole('administrador'))) {
            // Verificar si la publicación pertenece a un administrador
            $publicacionUsuario = User::find($publicacion->id_usuario);
            $publicacionUsuarioRoles = $publicacionUsuario->getRoleNames();
            if ($publicacionUsuarioRoles->contains('administrador') && !$userRoles->contains('administrador')) {
                return redirect()->back()->with('error', 'No puedes eliminar publicaciones de un administrador.');
            }

            $publicacion->delete();
            return redirect()->back()->with('success', 'Publicación eliminada exitosamente.');
        }

        return redirect()->back()->with('error', 'No tienes permiso para eliminar esta publicación.');
    }
    
    public function publicar($id_tema){
        
        $user_id = Auth::id(); // Obtener el ID del usuario desde los parámetros de la solicitud
        return view('modules.foro.categorias.temas.funciones.publicar', compact('id_tema', 'user_id'));
        
    }

    public function publicarForm(Request $request)
    {
        $user_id = Auth::id(); // Obtener el ID del usuario autenticado
        return view('modules.foro.categorias.temas.funciones.publicar', compact('google_id', 'user_id'));
    }
}

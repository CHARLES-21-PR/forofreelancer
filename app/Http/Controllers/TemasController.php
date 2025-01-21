<?php

namespace App\Http\Controllers;
use App\Models\Categoria;
use App\Models\Publicaciones;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Tema;

class TemasController extends Controller
{
    public function listar()
    {
        $items = Tema::paginate(5);
        return view('cruds/temas/crudTemas', compact('items'));
    }

    /*Vista para registrar nuevo cliente*/
    public function registrar()
    {
        $categorias = Categoria::all();
        return view('cruds/temas/Acciones/registrar', compact('categorias'));
    }   

    /*Permite que se guarde el nuevo registro en la base de datos*/
    public function insertar(Request $request)
    {
        $request->validate([
            'titulo' => 'required|max:45',
            'id_categoria' => 'required|exists:categorias,id',
            'fecha_de_creacion' => 'required|date',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'id_usuario' => 'required|exists:users,id',
            
        ]);

        $item = new Tema();
        $item->titulo = $request->titulo;
        $item->id_categoria = $request->id_categoria;
        $item->fecha_de_creacion = $request->fecha_de_creacion;
        $item->id_usuario = Auth::id();

        if ($request->hasFile('imagen')) {
            $imageName = time().'.'.$request->imagen->extension();
            $request->imagen->move(public_path('images'), $imageName);
            $item->imagen = $imageName;
        }

        $item->save();
        return redirect()->route('listar.tema')->with('success', 'Tema creado exitosamente.');
    }

    /*Mostrar informacion de un registro*/
    public function detalle(string $id)
    {
        $item = Tema::find($id);
        return view('cruds/temas/Acciones/detalle', compact('item'));
    }

    /*Muestra el menu para editar algun registro*/
    public function editar(string $id)
    {
        $item = Tema::find($id);
        $categorias = Categoria::all();
        return view('cruds/temas/Acciones/editar', compact('item', 'categorias'));
    }

    /*Guarda los cambios hechos con edit.*/
    public function actualizar(Request $request, string $id)
    {
        $request->validate([
            'titulo' => 'required|max:45',
            'id_categoria' => 'required|exists:categorias,id',
            'fecha_de_creacion' => 'required|date',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'id_usuario' => 'required|exists:users,id',
        ]);

        $item = Tema::find($id);
        $item->titulo = $request->titulo;
        $item->id_categoria = $request->id_categoria;
        $item->fecha_de_creacion = $request->fecha_de_creacion;

        if ($request->hasFile('imagen')) {
            // Eliminar la imagen anterior si existe
            if ($item->imagen) {
                unlink(public_path('images') . '/' . $item->imagen);
            }
            $imageName = time().'.'.$request->imagen->extension();
            $request->imagen->move(public_path('images'), $imageName);
            $item->imagen = $imageName;
        }

        $item->id_usuario = $request->id_usuario;
        $item->save();
        return redirect()->route('listar.tema')->with('success', 'Tema actualizado exitosamente.');
    }

    /*Eliminar a un cliente de la base de datos.*/
    public function eliminar(string $id)
    {
        $item = Tema::find($id);
        $item->delete();
        return to_route('listar.tema');
    }

    public function confesiones(Request $request)
    {
        $user_id = $request->input('id'); // Obtener el correo del usuario autenticado
        $items = Tema::where('id_categoria', 1)->paginate(5); // Filtra por categoría de confesiones
        return view('modules.foro.categorias.confesiones', compact('items', 'user_id'));
    }
    public function cuzi()
    {
        $publicaciones = Publicaciones::paginate(5); // Filtra por categoría de confesiones
        return view('modules.foro.categorias.temas.cuzilatada', compact('publicaciones'));
        
    }
    
}

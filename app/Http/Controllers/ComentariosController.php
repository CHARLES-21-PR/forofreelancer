<?php

namespace App\Http\Controllers;

use App\Models\Comentarios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use App\Models\User;

class ComentariosController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'id_publicacion' => 'required|exists:publicaciones,id',
            'descripcion' => 'required|string|max:128',
            'id_categoria' => 'required|exists:categorias,id',
            'id_tema' => 'required|exists:tema,id',
        ]);

        Comentarios::create([
            'id_publicacion' => $request->id_publicacion,
            'id_usuario' => Auth::id(),
            'descripcion' => $request->descripcion,
            'id_categoria' => $request->id_categoria,
            'id_tema' => $request->id_tema,
            'fecha_publicacion' => now(),
        ]);

        return redirect()->back()->with('success', 'Comentario agregado exitosamente.');
    }

    public function destroy($id)
    {
        $comentario = Comentarios::findOrFail($id);
        $userId = Auth::id();
        $userRoles = User::find($userId)->getRoleNames(); // Obtener los nombres de los roles del usuario autenticado

        // Verificar permisos sin usar Auth::user()
        if ($userRoles->contains('moderador') || $userRoles->contains('administrador') || $userId === $comentario->id_usuario) {
            // Verificar si el comentario pertenece a un administrador
            $comentarioUsuario = User::find($comentario->id_usuario);
            $comentarioUsuarioRoles = $comentarioUsuario->getRoleNames();
            if ($comentarioUsuarioRoles->contains('administrador') && !$userRoles->contains('administrador')) {
                return redirect()->back()->with('error', 'No puedes eliminar comentarios de un administrador.');
            }

            $comentario->delete();
            return redirect()->back()->with('success', 'Comentario eliminado exitosamente.');
        }

        return redirect()->back()->with('error', 'No tienes permiso para eliminar este comentario.');
    }
}

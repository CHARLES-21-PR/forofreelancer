<?php

namespace App\Http\Controllers;

use App\Models\Publicaciones;
use App\Models\Reaccion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class ReaccionController extends Controller
{
    public function index()
    {
        $reacciones = Reaccion::paginate(5);
        return view('cruds/reacciones/crudReacciones', compact('reacciones'));
    }

    public function registrar()
    {
        $publicacion = Publicaciones::all();
        return view('cruds/reacciones/Acciones/registrar');
    }

    public function store(Request $request)
    {
        if ($request->has('nombre') && $request->has('imagen')) {
            $request->validate([
                'nombre' => 'required|string',
                'imagen' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $imagePath = $request->file('imagen')->store('reacciones', 'public');

            Reaccion::create([
                'nombre' => $request->nombre,
                'imagen' => $imagePath,
            ]);

            return redirect()->route('listar.reacciones')->with('success', 'Reacción agregada exitosamente.');
        } else {
            $request->validate([
                'publicacion_id' => 'required|exists:publicaciones,id',
                'reaccion_id' => 'required|exists:reacciones,id',
                'user_id' => 'required|exists:users,id',
            ]);

            $publicacion = Publicaciones::findOrFail($request->publicacion_id);

            // Eliminar la reacción anterior del usuario si existe
            $publicacion->reacciones()->detach($request->user_id);

            // Agregar la nueva reacción
            $publicacion->reacciones()->attach($request->reaccion_id, ['user_id' => $request->user_id]);

            return response()->json(['success' => 'Reacción agregada exitosamente.']);
        }
    }

    public function react(Request $request)
    {
        $request->validate([
            'publicacion_id' => 'required|exists:publicaciones,id',
            'reaccion_id' => 'required|exists:reacciones,id',
        ]);

        $publicacionId = $request->input('publicacion_id');
    $reaccionId = $request->input('reaccion_id');
    $userId = Auth::id();

    // Eliminar la reacción anterior del usuario para esta publicación
    DB::table('publicacion_reaccion')
        ->where('publicacion_id', $publicacionId)
        ->where('user_id', $userId)
        ->delete();

    // Agregar la nueva reacción
    DB::table('publicacion_reaccion')->insert([
        'publicacion_id' => $publicacionId,
        'reaccion_id' => $reaccionId,
        'user_id' => $userId,
        
    ]);

    return response()->json(['success' => true]);
    }

    public function editar(string $id)
    {
        $reaccion = Reaccion::find($id);
        return view('cruds/reacciones/Acciones/editar', compact('reaccion'));
    }

    public function actualizar(Request $request, string $id)
    {
        $reaccion = Reaccion::find($id);

        $request->validate([
            'nombre' => 'required|string',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('imagen')) {
            // Eliminar la imagen anterior si existe
            if ($reaccion->imagen) {
                Storage::disk('public')->delete($reaccion->imagen);
            }

            // Guardar la nueva imagen
            $imagePath = $request->file('imagen')->store('reacciones', 'public');
            $reaccion->imagen = $imagePath;
        }

        $reaccion->nombre = $request->nombre;
        $reaccion->save();

        return redirect()->route('listar.reacciones')->with('success', 'Reacción actualizada exitosamente.');
    }
}

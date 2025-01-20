<?php

namespace App\Http\Controllers;
use App\Models\Noticia;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class NoticiaController extends Controller
{
    public function view()
    {
        $noticias = Noticia::all();
        return view('modules/noticias', compact('noticias'));
    }
    public function index()
    {
        $noticias = Noticia::all();
        return view('cruds/noticias/crudNoticias', compact('noticias'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'contenido' => 'required|string',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $rutaImagen = null;
        if ($request->hasFile('imagen')) {
            $rutaImagen = $request->file('imagen')->store('public/noticias');
        }

        Noticia::create([
            'titulo' => $request->titulo,
            'contenido' => $request->contenido,
            'imagen' => $rutaImagen,
        ]);

        return redirect()->route('listar.noticia')->with('success', 'Noticia creada exitosamente.');
    }

    public function destroy(Noticia $noticia)
    {
        if ($noticia->imagen) {
            Storage::delete($noticia->imagen);
        }
        $noticia->delete();
        return redirect()->route('listar.noticia')->with('success', 'Noticia eliminada exitosamente.');
    }
}

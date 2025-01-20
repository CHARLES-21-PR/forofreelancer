<?php

namespace App\Http\Controllers;

use App\Models\Noticia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
class ForoController extends Controller
{
    public function tareas(){
        return view("modules.foro.categorias.tareas");
    }

    public function curso($curso){
        $nameRoute = "/modules/foro/{$curso}";
        
        if (View::exists($nameRoute)) {
            return view($nameRoute);
        } else {
            return view("/modules/foro");
        }
    }


    public function confesiones(){
        return view("modules.foro.categorias.confesiones");
    }

    public function inicio()
    {
        $noticias = Noticia::all();
        return view('dashboard', compact('noticias'));
    }
}

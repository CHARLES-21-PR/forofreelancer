<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ToolsController extends Controller
{
    public function index()
    {
        return view('modules.tools'); // Devuelve la vista index.blade.php
    }

    public function calculadora()
    {
        return view('modules.tools.calculadora'); // Devuelve la vista calculadora.blade.php
    }

    public function promedio()
    {
        return view('modules.tools.calc-promedio'); // Devuelve la vista promedio.blade.php
    }

    public function pages()
    {
        return view('modules.tools.help-pages'); // Devuelve la vista pages.blade.php
    }
}

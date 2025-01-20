<?php

namespace App\Http\Controllers;
use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function listar()
    {
        $items = Categoria::paginate(5);
        return view('cruds/categorias/crudCategorias', compact('items'));
    }

    /*Vista para registrar nuevo cliente*/
    public function registrar()
    {
        return view('cruds/categorias/Acciones/registrar');
    }   

    /*Permite que se guarde el nuevo registro en la base de datos*/
    public function insertar(Request $request)
    {
        $item = new Categoria();
        $item->nombre_categoria = $request->nombre_categoria;
        $item->descripcion = $request->descripcion;
        $item->fecha_creacion = $request->fecha_creacion;
        $item->save();
        return to_route('listar.categoria');
    }

    /*Mostrar informacion de un registro*/
    public function detalle(string $id)
    {
        $item = Categoria::find($id);
        return view('cruds/categorias/Acciones/detalle', compact('item'));
    }

    /*Muestra el menu para editar algun registro*/
    public function editar(string $id)
    {
        $item = Categoria::find($id);
        return view('cruds/categorias/Acciones/editar', compact('item'));
    }

    /*Guarda los cambios hechos con edit.*/
    public function actualizar(Request $request, string $id)
    {
        $item = Categoria::find($id);
        $item->nombre_categoria = $request->nombre_categoria;
        $item->descripcion = $request->descripcion;
        $item->fecha_creacion = $request->fecha_creacion;
        $item->save();
        return to_route('listar.categoria');
    }

    /*Eliminar a un cliente de la base de datos.*/
    public function eliminar(string $id)
    {
        $item = Categoria::find($id);
        $item->delete();
        return to_route('listar.categoria');
    }
}

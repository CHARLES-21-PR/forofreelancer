<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Usuarios;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;


class UserController extends Controller
{
    public function index() {
        return view('cruds.cruds');
    }
    public function usuarios() {
        $items = User::with('roles')->get();
        
        return view('cruds.usuarios.crudUsuarios', compact('items'));
    }

    public function show(string $id){
        $item = User::find($id);
        return view('cruds/usuarios/Acciones/show', compact('item'));
    }
    public function assignRole(Request $request, $userId)
    {
        $user = User::findOrFail($userId);
        $roleName = $request->role;

        $user->syncRoles([$roleName]);

        return redirect()->back()->with('success', 'Rol asignado exitosamente.');
    }

    public function showAssignRoleForm($userId)
    {
        $user = User::with('roles')->findOrFail($userId);
        $roles = Role::all();

        return view('cruds.usuarios.Acciones.assignRole', compact('user', 'roles'));
    }
    public function showRoles()
    {
        $users = User::with('roles')->get(); // Cargar los roles con los usuarios
        $roles = Role::all(); // Cargar todos los roles disponibles
        return view('cruds.usuarios.roles', compact('users', 'roles'));
    }
}

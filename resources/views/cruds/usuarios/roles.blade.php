<x-app-layout>
    @includeif('cruds.layouts.head')
    <div class="container">
        <h1>Roles de Usuarios</h1>
        <h2>Roles Disponibles</h2>
        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th>ID del Rol</th>
                    <th>Nombre del Rol</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($roles as $role)
                    <tr>
                        <td>{{ $role->id }}</td>
                        <td>{{ $role->name }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <h2>Usuarios y sus Roles</h2>
        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th>ID del Usuario</th>
                    <th>Nombre del Usuario</th>
                    <th>Roles</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>
                            @foreach ($user->roles as $role)
                                <span class="badge badge-primary text-dark">{{ $role->name }}</span>
                            @endforeach
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">No hay datos en la tabla...</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-app-layout>
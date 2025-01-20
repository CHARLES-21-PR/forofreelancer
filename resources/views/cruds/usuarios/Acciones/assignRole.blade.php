<x-app-layout>
    <div class="container">
        <h1>Asignar Rol</h1>
        <form action="{{ route('assign.role', $user->id) }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="role">Rol</label>
                <select name="role" id="role" class="form-control">
                    @foreach ($roles as $role)
                        <option value="{{ $role->name }}">{{ $role->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Asignar Rol</button>
        </form>

        <h2>Roles Asignados</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre del Rol</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($user->roles as $role)
                    <tr>
                        <td>{{ $role->id }}</td>
                        <td>{{ $role->name }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
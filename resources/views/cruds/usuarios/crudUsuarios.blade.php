<x-app-layout>
    @includeif('cruds.layouts.head')
<body>
    
    
    <div class="container mt-4">
        <h2 style="font-family:sans-serif">USUARIOS</h2>
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="car-body">
                        
                        
                        <table class="table table-sm table-bordered">
                            <thead>
                                <tr class="table-dark">
                                    <th>ID</th>
                                    <th>Nombre completo</th>
                                    <th>Correo</th>
                                    <th>Rol</th>
                                    <th>Acciones</th>
                                    
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($items as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>
                                        @foreach ($item->roles as $role)
                                            <span class="badge badge-primary text-dark">{{ $role->name }}</span>
                                        @endforeach
                                    </td>
                                    
                                    <td>
                                        <form action="" method="post">
                                            @csrf
                                            
                                            <a href="{{ route('show', $item->id) }}" class="btn btn-info"><i class="fa-solid fa-magnifying-glass"></i> Mostrar</a>
                                            <a href="{{ route('assign.role.form', $item->id) }}" class="btn btn-primary btn-sm mt-2">Asignar Rol</a>
                                        </form>
                                    </td>
                                    
                                </tr>
                                @empty
                                <tr>
                                    <td>No hay datos en la tabla...</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-end">
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</x-app-layout>
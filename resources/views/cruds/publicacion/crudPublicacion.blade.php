<x-app-layout>
@includeif('cruds.layouts.head')

<div class="container mt-4">
    <h2 style="font-family:sans-serif">LISTADO DE PUBLICACIONES</h2>
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('registrar.publi') }}" class="btn btn-primary"><i class="fa-solid fa-plus"></i> Nuevo registro</a>
                    <hr>
                    <table class="table table-sm table-bordered">
                        <thead>
                            <tr class="table-dark">
                                
                                {{-- <th>ID</th> --}}
                                <th>ID usuario</th>
                                <th>ID Tema</th>
                                <th>Contenido</th>
                                <th>Fecha de Creacion</th>
                                <th>Acciones</th>                              
                            </tr>
                        </thead>
                        <tbody>
                            <?php $orden = 1 ?>
                            @forelse ($items as $item)
                            <tr>
                                
                                {{-- <td>{{ $item->id }}</td> --}}
                                <td>{{ $item->id_usuario }}</td>
                                <td>{{ $item->id_tema }}</td>
                                <td>{{ $item->contenido }}</td>
                                <td>{{ $item->created_at }}</td>
                                <td>
                                    <form action="{{ route('eliminar.publi', $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{ route('detalle.publi', $item->id) }}" class="btn btn-info"><i class="fa-solid fa-magnifying-glass"></i> Mostrar</a>
                                        
                                        <button class="btn btn-danger"><i class="fa-solid fa-trash-can"></i> Borrar</a>
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
                        {{ $items->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</x-app-layout>
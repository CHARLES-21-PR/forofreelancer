<x-app-layout>
    @includeif('cruds.layouts.head')

<div class="container mt-4">
    <h2 style="font-family:sans-serif">LISTADO DE TEMAS</h2>
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('registrar.tema') }}" class="btn btn-primary"><i class="fa-solid fa-plus"></i> Nuevo registro</a>
                    <hr>
                    <table class="table table-sm table-bordered">
                        <thead>
                            <tr class="table-dark">
                                <th>Orden</th>
                                <th>ID</th>
                                <th>Titulo</th>
                                <th>ID Categoria</th>
                                <th>Fecha de Creacion</th>
                                <th>Acciones</th>                              
                            </tr>
                        </thead>
                        <tbody>
                            <?php $orden = 1 ?>
                            @forelse ($items as $item)
                            <tr>
                                <td><?php echo $orden++; ?></td>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->titulo }}</td>
                                <td>{{ $item->id_categoria }}</td>
                                <td>{{ $item->fecha_de_creacion }}</td>
                                <td>
                                    <form action="{{ route('eliminar.tema', $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{ route('detalle.tema', $item->id) }}" class="btn btn-info"><i class="fa-solid fa-magnifying-glass"></i> Mostrar</a>
                                        <a href="{{ route('editar.tema', $item->id) }}" class="btn btn-warning"><i class="fa-solid fa-pen"></i> Editar</a>
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
<x-app-layout>
    @includeif('cruds.layouts.head')

    <div class="container mt-4">
        <h2 style="font-family:sans-serif">LISTADO DE REACCIONES</h2>
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <a href="{{ route('registrar.reacciones') }}" class="btn btn-primary"><i class="fa-solid fa-plus"></i> Nuevo registro</a>
                        <hr>
                        <table class="table table-sm table-bordered">
                            <thead>
                                <tr class="table-dark">
                                    <th>Orden</th>
                                    <th>ID</th>
                                    <th>Nombre de la reaccion</th>
                                    <th>img</th>
                                    <th>Fecha de Creacion</th>  
                                    <th>Acciones</th>                              
                                </tr>
                            </thead>
                            <tbody>
                                <?php $orden = 1 ?>
                                @forelse ($reacciones as $reaccion)
                                <tr>
                                    <td><?php echo $orden++; ?></td>
                                    <td>{{ $reaccion->id }}</td>
                                    <td>{{ $reaccion->nombre }}</td>
                                    <td>{{ $reaccion->imagen }}</td>
                                    <td>{{ $reaccion->created_at }}</td>
                                    <td>
                                        <form action="{{ route('eliminar.reacciones', $reaccion->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            
                                            <a href="{{ route('editar.reacciones', $reaccion->id) }}" class="btn btn-warning"><i class="fa-solid fa-pen"></i> Editar</a>
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
                            {{ $reacciones->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
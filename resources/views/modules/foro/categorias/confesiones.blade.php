<x-app-layout>
   
            <h2 style="font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; margin-top:20px; text-align:center">Pagina de confesiones</h2>
            
            <div class="container">
                
                
                <div class="container mt-4">
                    <h2 style="font-family:sans-serif">LISTADO DE TEMAS</h2>
                    <div class="row">
                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                    
                                    
                                    <table class="table table-sm table-bordered">
                                        <thead>
                                            <tr>
                                                
                                                <th>ID</th>
                                                <th>Titulo</th>
                                                <th>Categoria</th>
                                                <th>Fecha de Creacion</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                            @forelse ($items as $item)
                                            <tr>
                                                
                                                <td>{{ $item->id }}</td>
                                                <td>{{ $item->titulo }}</td>
                                                <td>{{ $item->categoria->nombre_categoria }}</td>
                                                <td>{{ $item->fecha_de_creacion }}</td>
                                                <td>
                                   
                                                    <a href="{{ route('pag.cuzi', ['id_tema' => $item->id]) }}" class="btn btn-primary">
                                                        <i class="fa-solid fa-pen"></i> Ir a la página
                                                    </a>
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
                
            </div>

        </div>
    </div>
</x-app-layout>
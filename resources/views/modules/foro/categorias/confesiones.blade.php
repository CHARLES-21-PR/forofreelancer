<x-app-layout>

    <h2 style="font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; margin-top:20px; text-align:center">FORO UNDC</h2>
            
            
            <div class="container">
                
                
                <div class="container mt-4">
                    <div class="navbar align-self-center d-flex">
                        <h2 style="font-family:sans-serif">LISTADO DE CATEGORIAS</h2>
                        <form action="{{ route('confesiones') }}" method="get" class="d-flex ms-auto">
                            <input type="text" class="form-control me-2" id="inputSearch" name="q" placeholder="Buscar tema..." value="{{ request('q') }}">
                            <button type="submit" class="btn btn-success">
                                <i class="fa fa-fw fa-search text-white"></i>
                            </button>
                        </form>
                    </div>

                    
                    
                    @foreach ($categorias as $categoria)
                    <div class="row">
                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                    <h3>{{ $categoria->nombre_categoria }}</h3>
                                    <br>
                                    <table class="table table-sm table-bordered table-rounded">
                                        <thead  class="btn-dark">
                                            <tr>
                                                
                                                <th>ID</th>
                                                <th>Tema</th>
                                                <th>Fecha de Creacion</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                            @forelse ($categoria->temas as $tema)
                                            <tr>
                                                
                                                <td>{{ $tema->id }}</td>
                                                <td>{!! highlight2($tema->titulo, $query) !!}</td>
                                                <td>{{ $tema->fecha_de_creacion }}</td>
                                                <td>
                                   
                                                    <a href="{{ route('pag.cuzi', ['id_tema' => $tema->id]) }}" class="btn btn-sm btn-primary">
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
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    
                    @if (!$found && $query)
        <div class="modal fade" id="noResultsModal" tabindex="-1" aria-labelledby="noResultsModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="noResultsModalLabel">Resultados</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        No se encontraron resultados para "{{ $query }}".
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
    @endif
                </div>
                
            </div>

        </div>
    </div>

    

    @if (!$found && $query)
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var noResultsModal = new bootstrap.Modal(document.getElementById('noResultsModal'));
            noResultsModal.show();
        });
    </script>
@endif
</x-app-layout>
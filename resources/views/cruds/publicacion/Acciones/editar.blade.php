<x-app-layout>
    <div class="container mt-4">
        <h2>ACTUALIZAR CATEGORIA</h2>
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('actualizar', $item->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <label for="nombre_categoria">Nombre de Categoria</label>
                            <input type="text" name="nombre_categoria" id="nombre_categoria" class="form-control" value="{{ $item->nombre_categoria }}">
                            <label for="descripcion">Descripcion</label>
                            <input type="text" name="descripcion" id="descripcion" class="form-control" value="{{ $item->descripcion }}">
                            <label for="fecha_creacion">Fecha de Creacion</label>
                            <input type="date" name="fecha_creacion" id="fecha_creacion" class="form-control" value="{{ $item->fecha_creacion }}">
                            <button class="btn btn-warning mt-3">Actualizar</button>
                            <a href="{{ route('listar') }}" class="btn btn-secondary mt-3">Cancelar</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<x-app-layout>
    <div class="container mt-4">
        <h2>INFORMACION DE: {{ $item->nombre_categoria }}</h2>
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                            <label for="nombre_categoria">Nombre de Categoria</label>
                            <input type="text" name="nombre_categoria" id="nombre_categoria" class="form-control" value="{{ $item->nombre_categoria }}" readonly>
                            <label for="descripcion">Descripcion</label>
                            <input type="text" name="descripcion" id="descripcion" class="form-control" value="{{ $item->descripcion }}" readonly>
                            <label for="fecha_creacion">Fecha de Creacion</label>
                            <input type="date" name="fecha_creacion" id="fecha_creacion" class="form-control" value="{{ $item->fecha_creacion }}" readonly>
                            <a href="{{ route('listar.categoria') }}" class="btn btn-secondary mt-3">Cerrar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
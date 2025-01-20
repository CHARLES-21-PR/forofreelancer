<x-app-layout>
    <div class="container mt-4">
        <h2>INFORMACION DE: {{ $item->titulo }}</h2>
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                            <label for="titulo">Titulo del tema</label>
                            <input type="text" name="titulo" id="titulo" class="form-control" value="{{ $item->titulo }}" readonly>
                            <label for="id_categoria">ID categoria</label>
                            <input type="text" name="id_categoria" id="id_categoria" class="form-control" value="{{ $item->id_categoria }}" readonly>
                            <label for="fecha_de_creacion">Fecha de Creacion</label>
                            <input type="date" name="fecha_de_creacion" id="fecha_de_creacion" class="form-control" value="{{ $item->fecha_de_creacion }}" readonly>
                            <label for="id_usuario">ID usuario</label>
                            <input type="text" name="id_usuario" id="id_usuario" class="form-control" value="{{ $item->id_usuario }}" readonly>
                            <a href="{{ route('listar.tema') }}" class="btn btn-secondary mt-3">Cerrar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
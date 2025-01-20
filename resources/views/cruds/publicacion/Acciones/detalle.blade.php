<x-app-layout>
    <div class="container mt-4">
        <h2>INFORMACION DE: {{ $item->id }}</h2>
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                            <label for="Id">ID Publicacion</label>
                            <input type="text" name="id" id="id" class="form-control" value="{{ $item->id }}" readonly>
                            <label for="id_tema">id tema</label>
                            <input type="text" name="id_tema" id="id_tema" class="form-control" value="{{ $item->id_tema }}" readonly>
                            <label for="contenido">contenido</label>
                            <input type="text" name="contenido" id="contenido" class="form-control" value="{{ $item->contenido }}" readonly>
                            <label for="id_usuario">id usuario</label>
                            <input type="text" name="id_usuario" id="id_usuario" class="form-control" value="{{ $item->id_usuario }}" readonly>
                            <label for="fecha_creacion">Fecha de Creacion</label>
                            <input type="date" name="fecha_creacion" id="fecha_creacion" class="form-control" value="{{ $item->fecha_creacion }}" readonly>
                            <a href="{{ route('listar.publi') }}" class="btn btn-secondary mt-3">Cerrar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
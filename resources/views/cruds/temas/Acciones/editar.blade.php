<x-app-layout>
    <div class="container mt-4">
        <h2>ACTUALIZAR TEMA</h2>
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('actualizar.tema', $item->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <label for="titulo">Titulo del tema</label>
                            <input type="text" name="titulo" id="titulo" class="form-control" value="{{ $item->titulo }}">
                            <label for="id_categoria">ID categoria</label>
                            <select name="id_categoria" id="id_categoria" class="form-control">
                                @foreach($categorias as $categoria)
                                    <option value="{{ $categoria->id }}" {{ $item->id_categoria == $categoria->id ? 'selected' : '' }}>{{ $categoria->nombre_categoria }}</option>
                                @endforeach
                            </select>
                            <label for="fecha_de_creacion">Fecha de Creacion</label>
                            <input type="date" name="fecha_de_creacion" id="fecha_de_creacion" class="form-control" value="{{ $item->fecha_de_creacion }}">
                            <label for="id_usuario">ID usuario</label>
                            <input type="text" name="id_usuario" id="id_usuario" class="form-control" value="{{ $item->id_usuario }}">
                            <button class="btn btn-warning mt-3">Actualizar</button>
                            <a href="{{ route('listar.tema') }}" class="btn btn-secondary mt-3">Cancelar</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
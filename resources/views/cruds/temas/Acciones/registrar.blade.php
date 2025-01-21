<x-app-layout>
    <div class="container mt-4">
        <h2>REGISTRAR NUEVA CATEGORIA</h2>
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{ route('insertar.tema') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                            <label for="titulo">Titulo del tema</label>
                            <input type="text" name="titulo" id="tiutlo" class="form-control">
                            <label for="id_categoria">ID categoria</label>
                            <select name="id_categoria" id="id_categoria" class="form-control">
                                @foreach($categorias as $categoria)
                                    <option value="{{ $categoria->id }}">{{ $categoria->nombre_categoria }}</option>
                                @endforeach
                            </select>
                            <label for="fecha_de_creacion">Fecha de Creacion</label>
                            <input type="date" name="fecha_de_creacion" id="fecha_de_creacion" class="form-control">
                            <label for="imagen">Imagen</label>
                            <input type="file" name="imagen" id="imagen" class="form-control">
                            <label for="id_usuario">ID usuario</label>
                            <input type="text" name="id_usuario" id="id_usuario" class="form-control" value="{{ Auth::id() }}" readonly>
                            <button class="btn btn-primary mt-3">Agregar</button>
                            <a href="{{ route('listar.tema') }}" class="btn btn-secondary mt-3">Cancelar</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
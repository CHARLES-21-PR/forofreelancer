<x-app-layout>
    <div class="container mt-4">
        <h2>REGISTRAR NUEVA CATEGORIA</h2>
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('insertar.categoria') }}" method="POST">
                            @csrf
                            @method('POST')
                            <label for="nombre_categoria">Nombre de Categoria</label>
                            <input type="text" name="nombre_categoria" id="nombre_categoria" class="form-control">
                            <label for="descripcion">Descripcion</label>
                            <input type="text" name="descripcion" id="descripcion" class="form-control">
                            <label for="fecha_creacion">Fecha de Creacion</label>
                            <input type="date" name="fecha_creacion" id="fecha_creacion" class="form-control">
                            <button class="btn btn-primary mt-3">Agregar</button>
                            <a href="{{ route('listar.categoria') }}" class="btn btn-secondary mt-3">Cancelar</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
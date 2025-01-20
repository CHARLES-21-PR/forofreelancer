<x-app-layout>
    <div class="container mt-4">
        <h2>REGISTRAR NUEVA Publicacion</h2>
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('insertar.publi') }}" method="POST">
                            @csrf
                            @method('POST')
    
                            <label for="id_tema">ID tema</label>
                            <input type="text" name="id_tema" id="id_tema" class="form-control">
                            <label for="id_usuario">ID Usuario</label>
                            <input type="text" name="id_usuario" id="id_usuario" class="form-control">
                            <label for="contenido">Contenido</label>
                            <input type="text" name="contenido" id="contenido" class="form-control">
                            <label for="fecha_creacion">Fecha de Creacion</label>
                            <input type="date" name="fecha_creacion" id="fecha_pcreacion" class="form-control">
                            <button class="btn btn-primary mt-3">Agregar</button>
                            <a href="{{ route('listar.publi') }}" class="btn btn-secondary mt-3">Cancelar</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
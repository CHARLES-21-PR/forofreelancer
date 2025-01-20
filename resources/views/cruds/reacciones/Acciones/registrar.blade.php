<x-app-layout>
    <div class="container mt-4">
        <div class="reaction-button">
            <form action="{{ route('reacciones.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="nombre">Nombre de la Reacción</label>
                    <input type="text" name="nombre" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="imagen">Imagen de la Reacción</label>
                    <input type="file" name="imagen" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary mt-3">Agregar Reacción</button>
                <a href="{{ route('listar.reacciones') }}" class="btn btn-secondary mt-3">Cancelar</a>
            </form>
        </div>
    </div>
    
</x-app-layout>


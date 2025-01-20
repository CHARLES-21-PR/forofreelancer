<x-app-layout>
    <div class="container mt-4">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('actualizar.reacciones', $reaccion->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <label for="nombre_reaccion">Nombre de la Reacción</label>
                            <input type="text" name="nombre" id="nombre_reaccion" class="form-control" value="{{ $reaccion->nombre }}" required>
                            
                            <label for="imagen">Imagen de la Reacción</label>
                            <input type="file" name="imagen" class="form-control">
                            @if ($reaccion->imagen)
                            <img src="{{ asset('storage/' . $reaccion->imagen) }}" alt="{{ $reaccion->nombre }}" class="img-thumbnail mt-2" style="width: 100px;">
                            @endif
                            <button type="submit" class="btn btn-warning mt-3">Actualizar</button>
                            <a href="{{ route('listar.reacciones') }}" class="btn btn-secondary mt-3">Cancelar</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</x-app-layout>
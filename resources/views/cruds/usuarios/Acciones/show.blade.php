<x-app-layout>
    <div class="container mt-4">
        <h2>INFORMACION</h2>
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="car-body">
                        <label for="nombres">Nombre completo</label>
                        <input type="text" name="nombres" id="nombres" class="form-control" value="{{ $item->id }}" readonly>
                        <label for="paterno">Usuario</label>
                        <input type="text" name="paterno" id="paterno" class="form-control" value="{{ $item->name }}" readonly>
                        <label for="materno">Correo</label>
                        <input type="text" name="materno" id="materno" class="form-control" value="{{ $item->email }}" readonly>
                        
                        
                        <a href="{{ route('crud.usuarios') }}" class="btn btn-secondary mt-3">CERRAR</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
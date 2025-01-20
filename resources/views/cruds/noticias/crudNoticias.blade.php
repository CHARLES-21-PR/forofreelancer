<x-app-layout>
    @includeif('cruds.layouts.head')
    <div class="container mt-4">
        <h2>Gestionar Noticias</h2>
        <form action="{{ route('noticias.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="titulo">Título</label>
                <input type="text" name="titulo" id="titulo" class="form-control" required>
                @error('titulo')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="contenido">Contenido</label>
                <textarea name="contenido" id="contenido" class="form-control" required></textarea>
                @error('contenido')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="imagen">Imagen</label>
                <input type="file" name="imagen" id="imagen" class="form-control">
                @error('imagen')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Agregar Noticia</button>
        </form>

        <hr>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="row">
            @foreach ($noticias as $noticia)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        @if ($noticia->imagen)
                            <img src="{{ asset('storage/' . $noticia->imagen) }}" class="card-img-top img-thumbnail" alt="{{ $noticia->titulo }}" style="max-height: 150px; object-fit: cover;">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title text-success">{{ $noticia->titulo }}</h5>
                            <p class="card-text">{{ $noticia->contenido }}</p>
                            <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#modal{{ $noticia->id }}">Ver</button>
                            <form action="{{ route('noticias.destroy', $noticia->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm">Eliminar</button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="modal{{ $noticia->id }}" tabindex="-1" aria-labelledby="modalLabel{{ $noticia->id }}" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title text-success" id="modalLabel{{ $noticia->id }}">{{ $noticia->titulo }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                @if ($noticia->imagen)
                                    <img src="{{ asset('storage/' . $noticia->imagen) }}" class="img-fluid" alt="{{ $noticia->titulo }}">
                                @endif
                                <p class="mt-3">{{ $noticia->contenido }}</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
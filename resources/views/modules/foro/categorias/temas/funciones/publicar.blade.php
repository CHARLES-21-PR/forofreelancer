<x-app-layout>
    <div class="container mt-4">
        <h2>REGISTRAR NUEVA PUBLICACION</h2>
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('insertar.post', ['id_tema' => $id_tema]) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id_tema" value="{{ $id_tema }}">
                            <input type="hidden" name="id_usuario" value="{{ $user_id }}">
                            <div class="form-group">
                                <label for="contenido">Contenido</label>
                                <textarea name="contenido" id="contenido" class="form-control" required></textarea>
                                @error('contenido')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="imagen" style="cursor: pointer; margin-top: 20px;" onclick="document.getElementById('imagen').click();">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-file-image" viewBox="0 0 16 16">
                                        <path d="M8.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0"/>
                                        <path d="M12 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2M3 2a1 1 0 0 1 1-1h8a1 1 0 0 1 1 1v8l-2.083-2.083a.5.5 0 0 0-.76.063L8 11 5.835 9.7a.5.5 0 0 0-.611.076L3 12z"/>
                                      </svg>
                                </label>
                                <input type="file" name="imagen" id="imagen" class="form-control d-none" >
                                @error('imagen')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Publicar</button>
                            <a href="{{ route('pag.cuzi', ['id_tema' => $id_tema]) }}" class="btn btn-secondary">Cancelar</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</x-app-layout>
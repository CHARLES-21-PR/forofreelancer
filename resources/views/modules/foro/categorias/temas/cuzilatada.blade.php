<x-app-layout>

    @inject('userModel', 'App\Models\User');

    <div class="container">
        <h1 style="font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; margin-top:20px; text-align:center">CUZILATADA</h1>
        <img src="/img/principal/choco.jpg" class="rounded mx-auto d-block" alt="...">
    </div>
    
    <div class="container">
        
        <div class="row">

            <div class="col-md-10 mb-4">
                <h2>Pagina de confesiones</h2>
                <br>
                
            </div>

            <div class="col-md-8">
                @can('create posts')
                <a href="{{ route('publicar.post', ['id_tema' => $tema->id, 'user_id' => $user_id]) }}" class="btn btn-primary" style="border-radius: 20px; margin-bottom: 20px; width: 100%;"><i class="fa-solid fa-plus"></i> Agregar una publicacion</a>
                @endcan
            
                <div class="row justify-content-center">
    
                    
                    
                    
                    
                    @forelse ($publicaciones as $publicacion)
                        <div class="col-md-10 mb-4 publicacion-container" id="publicacion-{{ $publicacion->id }}">
                            <div class="card publi" style="width: 100%;">
                                <div class="card-body">
                                    <div class="d-flex align-items-start">
                                        @if ($publicacion->usuario && $publicacion->usuario->photo)
                                            <img src="{{ asset('storage/' . $publicacion->usuario->photo) }}" alt="Profile Photo" class="rounded-circle" style="width: 40px; height: 40px; object-fit: cover; margin-right: 8px;">
                                        @else
                                            <img src="{{ asset('images/default-user.png') }}" alt="Default Profile Photo" class="rounded-circle" style="width: 40px; height: 40px; object-fit: cover; margin-right: 8px;">
                                        @endif
                                        <div>
                                            <h5 class="card-title  mb-0">
                                                <span class="user-name {{ $publicacion->usuario->getRoleClass() }}">{{ $publicacion->usuario->name ?? 'Usuario desconocido' }}</span>
                                                @foreach ($items as $item)
                                                    @if ($item->id == $publicacion->usuario->id)
                                                        @foreach ($item->roles as $role)
                                                            @php
                                                                $roleClass = '';
                                                                if ($role->name == 'administrador') {
                                                                    $roleClass = 'admin-role';
                                                                } elseif ($role->name == 'moderador') {
                                                                    $roleClass = 'moderator-role';
                                                                } elseif ($role->name == 'usuario'){
                                                                    $roleClass = 'user-role';
                                                                } else {
                                                                    $roleClass = 'delegado-role';
                                                                }
                                                            @endphp
                                                            <span class="badge badge-primary  {{ $roleClass }}">{{ $role->name }}</span>
                                                        @endforeach
                                                    @endif
                                                @endforeach
                                        
                                            </h5>
                                            <p class="card-text"><small class="text-success">{{ $publicacion->fecha_creacion }}</small></p><br>
                                            <p class="card-text mb-0">{{ $publicacion->contenido }}</p>
    
                                             <!-- Aquí muestras las reacciones que ya tiene esta publicación -->
                
    
                
                                            @if ($publicacion->imagen)
                                                <img src="{{ asset('storage/' . $publicacion->imagen) }}" alt="Imagen de la publicación" class="img-fluid mt-2">
                                            @endif
                                            
                                            <div class="mt-4">
                                                
                                                <div class="reactions-summary">
                                                    @foreach ($publicacion->reaccionesCount as $reaccionPubli)
                                                    <span class="reaction-item">
                                                        <img src="{{ asset('storage/' . $reaccionPubli->imagen) }}" style="width:20px;height:20px;">
                                                        x ({{ $reaccionPubli->total }})
                                                        <div class="user-list">
                                                            @foreach ($publicacion->usuariosReaccion($publicacion->id, $reaccionPubli->id) as $usuario)
                                                                    <div>{{ $usuario->name }}</div>
                                                                @endforeach
                                                        </div>
                                                    </span>
                                                @endforeach
                                                   
                                                </div>
                                            </div>
                                            <br>
                                            <hr>
                                            @if (Auth::check() && (Auth::id() === $publicacion->id_usuario || $userModel::find(Auth::id())->hasRole('administrador') || ($userModel::find(Auth::id())->hasRole('moderador') && !$publicacion->usuario->hasRole('administrador'))))
                                            <form action="{{ route('eliminar.post', $publicacion->id) }}" method="POST" class="d-inline delete-button">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger btn-sm">
                                                    <i class="fa-solid fa-trash-can"></i> Eliminar
                                                </button>
                                            </form>
                                        @endif
                                            
                 <!-- Lista de reacciones disponibles para reaccionar -->
                 
                <div class="mt-2">
                    
                    @can('react post')
                    <div class="reaction-button">
                        <span class="btn  btn-sm" onmouseover="showReactions({{ $publicacion->id }})" onmouseout="hideReactions({{ $publicacion->id }})">Reaccionar</span>
                        
                        <div class="reaction-options" id="reaction-options-{{ $publicacion->id }}" onmouseover="showReactions({{ $publicacion->id }})" onmouseout="hideReactions({{ $publicacion->id }})">
                            @foreach ($reacciones as $reaccion)
                                <div class="reaction-item" style="position: relative; display: inline-block;">
                                    <img src="{{ asset('storage/' . $reaccion->imagen) }}" alt="{{ $reaccion->nombre }}" class="rounded-circle" style="width: 32px; height: 32px; cursor: pointer;" onclick="addReaction({{ $publicacion->id }}, {{ $reaccion->id }})">
                                    <span class="reaction-name">{{ $reaccion->nombre }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    @endcan
                    <!-- Botón para mostrar/ocultar comentarios -->
                    <button class="btn btn-secondary btn-sm ml-2" onclick="toggleComments({{ $publicacion->id }})">Mostrar/Ocultar Comentarios</button>
                </div>                           
                                            
                                            
                                        
                                        </div>
                                    </div>
                                    
                                    <!-- Mostrar comentarios -->
                                    <div class="mt-4 comment" id="comments-{{ $publicacion->id }}" style="display: none;">
                                        <h6>Comentarios:</h6>
                                        @forelse ($publicacion->comentarios as $comentario)
                                            <div class="mb-2 p-3 border rounded bg-light">
                                                <div class="d-flex align-items-start mb-2">
                                                    @if ($comentario->usuario && $comentario->usuario->photo)
                                                        <img src="{{ asset('storage/' . $comentario->usuario->photo) }}" alt="Profile Photo" class="rounded-circle" style="width: 30px; height: 30px; object-fit: cover; margin-right: 8px;">
                                                    @else
                                                        <img src="{{ asset('images/default-user.png') }}" alt="Default Profile Photo" class="rounded-circle" style="width: 30px; height: 30px; object-fit: cover; margin-right: 8px;">
                                                    @endif
                                                    <div>
                                                        <h6 class="text-primary mb-0">
                                                            <span class="
                                                                @foreach ($items as $item)
                                                                    @if ($item->id == $comentario->usuario->id)
                                                                        @foreach ($item->roles as $role)
                                                                            @if ($role->name == 'administrador')
                                                                                admin-name
                                                                            @elseif ($role->name == 'moderador')
                                                                                moderator-name
                                                                            @else
                                                                                user-name
                                                                            @endif
                                                                        @endforeach
                                                                    @endif
                                                                @endforeach
                                                            ">{{ $comentario->usuario->name ?? 'Usuario desconocido' }}</span>
                                                            @foreach ($items as $item)
                                                                @if ($item->id == $comentario->usuario->id)
                                                                    @foreach ($item->roles as $role)
                                                                        <span class="badge badge-primary 
                                                                            @if ($role->name == 'administrador')
                                                                                admin-role
                                                                            @elseif ($role->name == 'moderador')
                                                                                moderator-role
                                                                            @else
                                                                                user-role
                                                                            @endif
                                                                        ">{{ $role->name }}</span>
                                                                    @endforeach
                                                                @endif
                                                            @endforeach
                                                            :
                                                        </h6>
                                                        <p class="mb-0">{{ $comentario->descripcion }}</p>
                                                        <p class="card-text"><small class="text-muted">{{ $comentario->fecha_publicacion }}</small></p>
                                                        
                                                            
                                                        
                                                        @if (Auth::check() && (Auth::id() === $comentario->id_usuario || $userModel::find(Auth::id())->hasRole('administrador') || ($userModel::find(Auth::id())->hasRole('moderador') && !$comentario->usuario->hasRole('administrador'))))
                                                            <form action="{{ route('comentarios.destroy', $comentario->id) }}" method="POST" class="d-inline">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button class="btn btn-danger btn-sm">
                                                                    <i class="fa-solid fa-trash-can"></i> Eliminar
                                                                </button><br>
                                                            </form>
                                                            
                                                        @endif
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        @empty
                                            <p>No hay comentarios.</p>
                                        @endforelse
                                        <!-- Formulario para agregar comentario -->
                                    @can('create comments')
                                    <form action="{{ route('comentarios.store') }}" method="POST" class="mt-4 comments">
                                        @csrf
                                        <input type="hidden" name="id_publicacion" value="{{ $publicacion->id }}">
                                        <input type="hidden" name="id_categoria" value="{{ $tema->id_categoria }}">
                                        <input type="hidden" name="id_tema" value="{{ $tema->id }}">
                                        <div class="form-group">
                                            <label for="descripcion">Agregar comentario</label>
                                            <textarea name="descripcion" id="descripcion" class="form-control" required></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-sm mt-2">Comentar</button>
                                    </form>
                                    @endcan
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    @empty
                        <p>No hay publicaciones disponibles.</p>
                    @endforelse
                </div>
                <div>
                    {{ $publicaciones->links() }}
                </div>
            </div>
    
            <div class="col-md-4">
                <h4>Posts Populares</h4>
                @foreach ($postsPopulares as $post)
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="text-primary">{{ $post->usuario->name ?? 'Usuario desconocido' }}</h5>
                            <h5 class="card-title">{{ $post->titulo }}</h5>
                            <p class="card-text">{{ Str::limit($post->contenido, 100) }}</p>
                            <p class="card-text"><small class="text-success">Reacciones: {{ $post->reacciones_count }}</small></p>
                            <a href="javascript:void(0);" class="btn btn-primary btn-sm" onclick="scrollToPost({{ $post->id }})">Ver más</a>
                        </div>
                    </div>
                @endforeach

                <h4>Moderadores</h4>
                @foreach ($moderadores as $moderador)
                    <div class="card mb-3">
                        <div class="card-body d-flex align-items-center">
                            
                            @if ($moderador->photo)
                                <img src="{{ asset('storage/' . $moderador->photo) }}" alt="Profile Photo" class="rounded-circle" style="width: 40px; height: 40px; object-fit: cover;">
                            @else
                                <img src="{{ asset('images/default-user.png') }}" alt="Default Profile Photo" class="rounded-circle" style="width: 40px; height: 40px; object-fit: cover; margin-right: 10px;">
                            @endif
                            <h5 class="text-primary">{{ $moderador->name }}</h5>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <script>
        function toggleComments(publicacionId) {
            var commentsDiv = document.getElementById('comments-' + publicacionId);
            if (commentsDiv.style.display === 'none') {
                commentsDiv.style.display = 'block';
            } else {
                commentsDiv.style.display = 'none';
            }
        }

        let reactionTimeout;

        function showReactions(publicacionId) {
            clearTimeout(reactionTimeout);
            document.getElementById('reaction-options-' + publicacionId).style.display = 'block';
        }

        function hideReactions(publicacionId) {
            reactionTimeout = setTimeout(() => {
                document.getElementById('reaction-options-' + publicacionId).style.display = 'none';
            }, 200); // Ajusta el tiempo según sea necesario
        }

        function addReaction(publicacionId, reaccionId) {
            fetch('{{ route('reacciones.react') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    publicacion_id: publicacionId,
                    reaccion_id: reaccionId,
                })
            }).then(response => {
                if (response.ok) {
                    location.reload();
                } else {
                    response.json().then(data => {
                        console.error('Error:', data);
                        alert('Error al agregar la reacción.');
                    }).catch(error => {
                        console.error('Error:', error);
                        alert('Error al agregar la reacción.');
                    });
                }
            }).catch(error => {
                console.error('Error:', error);
                alert('Error al agregar la reacción.');
            });
        }

        function scrollToPost(postId) {
            const postElement = document.getElementById('publicacion-' + postId);
            if (postElement) {
                postElement.scrollIntoView({ behavior: 'smooth' });
                postElement.classList.add('highlight');
                setTimeout(() => {
                    postElement.classList.remove('highlight');
                }, 2000);
            }
        }

        document.querySelectorAll('.reaction-item').forEach(item => {
            item.addEventListener('mouseover', () => {
                item.querySelector('.reaction-name').style.opacity = '1';
            });
            item.addEventListener('mouseout', () => {
                item.querySelector('.reaction-name').style.opacity = '0';
            });
        });
    </script>
</x-app-layout>
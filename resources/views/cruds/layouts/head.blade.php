<div class="container">
    <h1 style="font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; margin-top:20px; text-align:center">Panel de control</h1>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        
        <div class="container-fluid">
          
          
          <div class="collapse navbar-collapse  panel-control" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <li class="navbar-nav">
                    <a class="nav-link" href="{{ route('crud.usuarios') }}">Usuarios</a>
                    <a class="nav-link" href="{{ route('listar.categoria') }}">Categorias</a>
                    <a class="nav-link" href="{{ route('listar.tema') }}">Temas</a>
                    <a class="nav-link" href="{{ route('listar.publi') }}">Publicacion</a> 
                    <a class="nav-link" href="{{ route('listar.noticia') }}">Noticias</a> 
                    <a class="nav-link" href="{{ route('listar.reacciones') }}">Reacciones</a>
                    <a class="nav-link" href="{{ route('show.roles') }}">Roles</a> 
                     
                  </li>
            </div>
          </div>
          
        </div>
      </nav>
  </div>
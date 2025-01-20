
<x-app-layout>
    
   
    <div id="template-mo-zay-hero-carousel" class="carousel slide" data-bs-ride="carousel">
        <ol class="carousel-indicators">
            <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="0" class="active"></li>
            <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="1"></li>
            <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="container">
                    <div class="row p-5">
                        <div class="mx-auto col-md-8 col-lg-4 order-lg-last">
                            <img class="img-fluid" src="/img/fondoLogin.jpg" alt="">
                        </div>
                        <div class="col-lg-6 mb-0 d-flex align-items-center">
                            <div class="text-align-left align-self-center">
                                <h1 class="h1 text-success">Bienvenido!</h1>
                                <h3 class="h2">Al foro universitario de la UNDC</h3>
                                <p>
                                    Este foro a sido desarrolado por estudiantes de facultad de ingenieria de la UNDC del IV CICLO.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="container">
                    <div class="row p-5">
                        <div class="mx-auto col-md-8 col-lg-4 order-lg-last">
                            <img class="img-fluid" src="/img/principal/imgAula.jpg" alt="">
                        </div>
                        <div class="col-lg-6 mb-0 d-flex align-items-center">
                            <div class="text-align-left">
                                <h1 class="h1">Nuestra aula</h1>
                                <h3 class="h2">IV CICLO </h3>
                                <p>
                                    Somos una nueva generación de futuros ingenieros de sistemas, 
                                    apasionados por la tecnología y motivados por el deseo de transformar 
                                    ideas en soluciones reales. En este cuarto ciclo de nuestra carrera,
                                    nos encontramos en un punto clave donde fusionamos conocimiento teórico 
                                    con práctica aplicada.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="container">
                    <div class="row p-5">
                        <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                            <img class="img-fluid" src="/img/principal/foro.png" alt="">
                        </div>
                        <div class="col-lg-6 mb-0 d-flex align-items-center">
                            <div class="text-align-left">
                                <h1 class="h1">DESARROLLO WEB FULLSTACK</h1>
                                <h3 class="h2">Proyecto Final </h3>
                                <p>
                                    Este sitio web ha sido desarrollado con laravel y bootstrap, con el fin de ser un foro de discusión para los estudiantes de la UNDC.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev text-decoration-none w-auto ps-3" href="#template-mo-zay-hero-carousel" role="button" data-bs-slide="prev">
            <i class="fas fa-chevron-left"></i>
        </a>
        <a class="carousel-control-next text-decoration-none w-auto pe-3" href="#template-mo-zay-hero-carousel" role="button" data-bs-slide="next">
            <i class="fas fa-chevron-right"></i>
        </a>
    </div>
    <!-- End Banner Hero -->


     <!-- Start Noticias -->
     <section class="container py-5">
        <div class="row text-center pt-3">
            <div class="col-lg-6 m-auto">
                <h1 class="h1">Noticias</h1>
                <p>
                    Aquí puedes encontrar las últimas noticias y eventos.
                </p>
            </div>
        </div>
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
    </section>
    <!-- End Categories of The Month -->

</x-app-layout>

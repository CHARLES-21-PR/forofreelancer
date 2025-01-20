<x-app-layout>
  <!-- Start Banner Hero -->
  <div id="template-mo-zay-hero-carousel" class="carousel slide" data-bs-ride="carousel">
    <ol class="carousel-indicators">
        @foreach ($noticias as $index => $noticia)
            <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="{{ $index }}" class="{{ $index == 0 ? 'active' : '' }}"></li>
        @endforeach
    </ol>
    <div class="carousel-inner">
        @foreach ($noticias as $index => $noticia)
            <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                <div class="container">
                    <div class="row p-5">
                        <div class="mx-auto col-md-8 col-lg-4 order-lg-last">
                            @if ($noticia->imagen)
                                <img src="{{ asset('storage/' . $noticia->imagen) }}" class="img-fluid" alt="{{ $noticia->titulo }}" style="width: 100%; height: 500px; object-fit: contain;">
                            @endif
                        </div>
                        <div class="col-lg-6 mb-0 d-flex align-items-center">
                            <div class="text-align-left align-self-center">
                                <h1 class="h1 text-success">{{ $noticia->titulo }}</h1>
                                <h3 class="h2">{{ $noticia->contenido }}</h3>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <a class="carousel-control-prev text-decoration-none w-auto ps-3" href="#template-mo-zay-hero-carousel" role="button" data-bs-slide="prev">
        <i class="fas fa-chevron-left"></i>
    </a>
    <a class="carousel-control-next text-decoration-none w-auto pe-3" href="#template-mo-zay-hero-carousel" role="button" data-bs-slide="next">
        <i class="fas fa-chevron-right"></i>
    </a>
</div>

<!-- Additional Content -->
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
        <div class="col-12 col-md-4 p-5 mt-3">
            
            <h5 class="text-center mt-3 mb-3"><span class="material-symbols-outlined">book_5</span> COMPARTIR COMEDOR</h5>
                <p class="text-center">
                    <a href="https://forms.gle/AdxiKVaQNfb3Y4KF9" class="btn btn-success">Inscripción</a>
            </div>
        <div class="col-12 col-md-4 p-5 mt-3">
            <h2 class="h5 text-center mt-3 mb-3"><span class="material-symbols-outlined">book_5</span> FERIA DE INVESTIGACIÓN FORMATIVA</h2>
            <p class="text-center">
                <a href="https://l.facebook.com/l.php?u=https%3A%2F%2Fdrive.google.com%2Ffile%2Fd%2F1QA9k5cxOmohPg4yp3aH3AUgPJAY9myMw%2Fview%3Fusp%3Dsharing%26fbclid%3DIwZXh0bgNhZW0CMTAAAR211w2Ir9pjTaYxll6mjA6-X8OmTtYNXqsKbSEgrKLS16UmDuq8iUvm3X8_aem_lzeaouWjfdDChyjkYIx5Ew&h=AT20vuWeuhTFhDXKR3goVKGsyLjNs7NEZeiPwk_rtuvwmEt2BZCiJV1UfSDlf6Mn9_kOH6kpwT4QttaeaogtAb6QdoGTab3-QFlgMZqyqMY2k7oQEL5OMtoksvp9Prm2t49p-JRNQG4VPSWdc9ky&__tn__=-UK-R&c[0]=AT10g0y7UyooxFTDCPYGD9tUIhaRoQcVlWVeHy5Tim15XDmgyrraU8bPJGjqvkQDMZTK_5RBlRhACnwV1QQ0RqMf6uW35oo_st354emqK0oX4c3bsuazUFJYurft3bgA7sn3OPs9Eijyg12trYuxLeRi-8fwSCTCDzKWeB07DXdaz5SVeVvUqlMYHSBiUX58eoU18KQ1gk9Tt-kEyt9ODqP9Jw" class="btn btn-success">Bases</a>
            </p>
        </div>
        <div class="col-12 col-md-4 p-5 mt-3">
            <h2 class="h5 text-center mt-3 mb-3"><span class="material-symbols-outlined">book_5</span> MENÚ COMEDOR SEMANAL</h2>
            <p class="text-center">
                <a href="https://www.facebook.com/photo/?fbid=563923329780212&set=a.106104122228804&__cft__[0]=AZURMuczxsCVX4T0bYkTCyLPIozfLGr5YLdo73O9oEj-PIX14t2EUmZgp2x_wyOpZj35QlGX8LiLEgH1Ihtm864fFuynakmfimKAa_E7us8M4mATRxCpcSsrMzIycncDX9iS0TeCVzVoVSM0by4gTOjeoEP770A8CbtWrHnYIsdjEM1Hm9tvzCemnO_0BN7Wn24&__tn__=EH-R" class="btn btn-success">Ver</a>
            </p>
        </div>
        <div class="col-12 col-md-4 p-5 mt-3">
            <!-- Additional content can go here -->
        </div>
    </div>
</section>
</x-app-layout>
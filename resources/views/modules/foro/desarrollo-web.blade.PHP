<x-app-layout>
    @include('modules.foro.layouts.menuCategorias');
    @includeIf('modules.foro.layouts.barra')
    <div class="col-lg-9 text-center">
        <h1 class="mb-4" style="font-family:Verdana, Geneva, Tahoma, sans-serif; font-size: 25px;">Desarrollo Web full Stack</h1>
        <h3 class="mb-3" style="border-bottom: 2px solid #FF2D20;display: inline-block; padding-bottom: 4px;">Profesor</h3>
    <img 
    id="cultura" 
    src="{{ asset('img/cursos/desarrolloweb.png') }}" 
    alt="Imagen del tema" 
    class="img-fluid mb-4 mx-auto d-block"
    style="max-width: 80%; box-shadow:--webkit-box-shadow: 3px 5px 33px 6px rgba(0,0,0,0.56);
                        -moz-box-shadow: 3px 5px 33px 6px rgba(0,0,0,0.56);
                        box-shadow: 3px 5px 33px 6px rgba(0,0,0,0.56);"
>
<p class="text-justify">
    Doctor en Ciencias de la Educación, Maestro en Gestión empresarial e ingeniero de Sistemas. Con experiencia en docencia universitaria y gestión empresarial. 
    Con estudios de doctorado en Ingeniería de Sistemas por la UNFV, doctorado en Ciencias de la Educación por la UNE, maestría en Ingeniería de Sistemas por la UNAC, 
    maestría en Gestión Empresarial, e Ingeniería de Sistemas por la UNDAC. También cuenta con estudios en licenciatura en Educación, especialidad en Computación e Informática.
</p>
</div>
    
</div>

</div>
</div>
<!-- End Content -->
</x-app-layout>
<x-app-layout>
    @include('modules.foro.layouts.menuCategorias');
    @includeIf('modules.foro.layouts.barra')

<div class="col-lg-9 text-center">
    <h1 class="mb-4" style="font-family:Verdana, Geneva, Tahoma, sans-serif; font-size: 25px;">Derecho Empresarial</h1>
    <h3 class="mb-3" style="border-bottom: 2px solid #FF2D20;display: inline-block; padding-bottom: 4px;">Profesor</h3>
<img 
id="cultura" 
src="{{ asset('img/cursos/derecho.png') }}" 
alt="Imagen del tema" 
class="img-fluid mb-4 mx-auto d-block"
style="max-width: 80%; box-shadow:--webkit-box-shadow: 3px 5px 33px 6px rgba(0,0,0,0.56);
                        -moz-box-shadow: 3px 5px 33px 6px rgba(0,0,0,0.56);
                        box-shadow: 3px 5px 33px 6px rgba(0,0,0,0.56);"
>
<p class="text-justify">
    Maestría en leyes
</p>
</div>
</div>

</div>
</div>
<!-- End Content -->
</x-app-layout>
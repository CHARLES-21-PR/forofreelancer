<x-app-layout>
    @include('modules.foro.layouts.menuCategorias');
    @includeIf('modules.foro.layouts.barra')

<div class="col-lg-9 text-center">
    <h1 class="mb-4">Tarea</h1>
    <a href="https://aula.undc.edu.pe/my/" target="_blank">
<img 
src="{{ asset('img/cursos/tareas.png') }}" 
alt="Imagen del tema" 
class="img-fluid mb-4 mx-auto d-block"
style="max-width:120%;"
>
<p class="text-justify">
    revisar sus horarios de tareas en el link
</p>
</div>
    
</div>

</div>
</div> 

<!-- End Content -->
</x-app-layout>
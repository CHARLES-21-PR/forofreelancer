<x-app-layout>
    @include('modules.foro.layouts.menuCategorias');
    @includeIf('modules.foro.layouts.barra')

<div class="col-lg-9 text-center">
    <h1 class="mb-4" style="font-family:Verdana, Geneva, Tahoma, sans-serif; font-size: 25px;">Base de Datos</h1>
    <h3 class="mb-3" style="border-bottom: 2px solid #FF2D20;display: inline-block; padding-bottom: 4px;">Profesor</h3>
    <img id="cultura" src="{{ asset('img/cursos/basedatos.png') }}" alt="Imagen del tema" class="img-fluid mb-4 mx-auto d-block"style="max-width: 80%; box-shadow:--webkit-box-shadow: 3px 5px 33px 6px rgba(0,0,0,0.56);
                        -moz-box-shadow: 3px 5px 33px 6px rgba(0,0,0,0.56);
                        box-shadow: 3px 5px 33px 6px rgba(0,0,0,0.56);">
<p class="text-justify">
    Ingeniero de sistemas graduado de la Universidad Nacional Federico Villarreal, donde también obtuvo una maestría en Docencia Universitaria y es doctorando en Ingeniería de Sistemas. Cuenta con más de tres décadas de experiencia docente, habiendo impartido clases en pregrado y posgrado en la misma universidad y otras instituciones como la Universidad César Vallejo. Su trayectoria incluye roles administrativos, como jefe de la Oficina Central de Gestión del Egresado de la UNFV, y ha coordinado laboratorios de cómputo y prácticas preprofesionales. Además, ha trabajado en consultoría de tecnologías de la información y soporte técnico en proyectos de instalación y gestión de sistemas informáticos. A lo largo de su carrera, ha organizado y participado en numerosos eventos académicos y de capacitación en TIC para la educación, tanto a nivel nacional como internacional, y ha sido reconocido por su labor académica.
</div>
    
</div>

</div>
</div>
<!-- End Content -->

</x-app-layout>
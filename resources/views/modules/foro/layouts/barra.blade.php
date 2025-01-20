<div class="container py-5 foro">
    <div class="row">

        <div class="col-lg-3 barra">
            <h1 class="h2 pb-4 text-success">Asignaturas</h1>
            <ul class="list-unstyled templatemo-accordion">
                <li class="pb-3">
                    <a class="collapsed d-flex justify-content-between h3 text-decoration-none" href="#">
                        Cultura Ambiental y Responsabilidad Social
                        <i class="fa fa-fw fa-chevron-circle-down mt-1"></i>
                    </a>
                    <ul class="collapse show list-unstyled pl-3">
                        <li><a class="text-decoration-none" href="{{ route('foro.curso', ['curso' => 'Cultura-y-Responsabilidad-Social']) }}">Profesor</a></li>
                        <li><a class="text-decoration-none" href="{{ route('foro.curso', ['curso' => 'tarea']) }}">Tareas</a></li>
                    </ul>
                </li>
                <li class="pb-3">
                    <a class="collapsed d-flex justify-content-between h3 text-decoration-none" href="#">
                        Derecho Empresarial
                        <i class="pull-right fa fa-fw fa-chevron-circle-down mt-1"></i>
                    </a>
                    <ul id="collapseTwo" class="collapse list-unstyled pl-3">
                        <li><a class="text-decoration-none" href="{{ route('foro.curso', ['curso' => 'Drecho-Empresarial']) }}">Profesor</a></li>
                        <li><a class="text-decoration-none" href="{{ route('foro.curso', ['curso' => 'tarea']) }}">Tareas</a></li>
                    </ul>
                </li>
                <li class="pb-3">
                    <a class="collapsed d-flex justify-content-between h3 text-decoration-none" href="#">
                        Estadistica y Probabilidades
                        <i class="pull-right fa fa-fw fa-chevron-circle-down mt-1"></i>
                    </a>
                    <ul id="collapseThree" class="collapse list-unstyled pl-3">
                        <li><a class="text-decoration-none" href="{{ route('foro.curso', ['curso' => 'estadistica-probabilidades']) }}">Profesor</a></li>
                        <li><a class="text-decoration-none" href="{{ route('foro.curso', ['curso' => 'tarea']) }}">Tareas</a></li>
                    </ul>
                </li>
                <li class="pb-3">
                    <a class="collapsed d-flex justify-content-between h3 text-decoration-none" href="#">
                        Investigación Operativa II
                        <i class="pull-right fa fa-fw fa-chevron-circle-down mt-1"></i>
                    </a>
                    <ul id="collapseThree" class="collapse list-unstyled pl-3">
                        <li><a class="text-decoration-none" href="{{ route('foro.curso', ['curso' => 'investigacion-operativa']) }}">Profesor</a></li>
                        <li><a class="text-decoration-none" href="{{ route('foro.curso', ['curso' => 'tarea']) }}">Tareas</a></li>
                    </ul>
                </li>
                <li class="pb-3">
                    <a class="collapsed d-flex justify-content-between h3 text-decoration-none" href="#">
                        Sistemas Digitales
                        <i class="pull-right fa fa-fw fa-chevron-circle-down mt-1"></i>
                    </a>
                    <ul id="collapseThree" class="collapse list-unstyled pl-3">
                        <li><a class="text-decoration-none" href="{{ route('foro.curso', ['curso' => 'sistemas-digitales']) }}">Profesor</a></li>
                        <li><a class="text-decoration-none" href="{{ route('foro.curso', ['curso' => 'tarea']) }}">Tareas</a></li>
                    </ul>
                </li>
                <li class="pb-3">
                    <a class="collapsed d-flex justify-content-between h3 text-decoration-none" href="#">
                        Fundamentos de Base de Datos
                        <i class="pull-right fa fa-fw fa-chevron-circle-down mt-1"></i>
                    </a>
                    <ul id="collapseThree" class="collapse list-unstyled pl-3">
                        <li><a class="text-decoration-none" href="{{ route('foro.curso', ['curso' => 'basededatos']) }}">Profesor</a></li>
                        <li><a class="text-decoration-none" href="{{ route('foro.curso', ['curso' => 'tarea']) }}">Tareas</a></li>
                    </ul>
                </li>
                <li class="pb-3">
                    <a class="collapsed d-flex justify-content-between h3 text-decoration-none" href="#">
                        Desarrollo Web FullStack
                        <i class="pull-right fa fa-fw fa-chevron-circle-down mt-1"></i>
                    </a>
                    <ul id="collapseThree" class="collapse list-unstyled pl-3">
                        <li><a class="text-decoration-none" href="{{ route('foro.curso', ['curso' => 'desarrollo-web']) }}">Profesor</a></li>
                        <li><a class="text-decoration-none" href="{{ route('foro.curso', ['curso' => 'tarea']) }}">tareas</a></li>
                    </ul>
                </li>
            </ul>
        </div>

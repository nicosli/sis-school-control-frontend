<nav class="navbar navbar-expand-md fixed-top navbar-dark bg-dark d-print-none">
    <a class="navbar-brand" href="{!!asset('/')!!}">
        <!--<img src="{!!asset('/img/mcr_white.png')!!}" class="logoPrincipal" />-->
        Sis Control Escolar
    </a>
    <button class="navbar-toggler p-0 border-0" type="button" data-toggle="offcanvas">
        <span class="navbar-toggler-icon"></span>
    </button>

<div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav mr-auto">
        <li class="nav-item {!!($item=='resumen')?'active':''!!}">
            <a class="nav-link" href="{!!asset('/resumen')!!}">Dashboard <span class="sr-only">(current)</span></a>
        </li>
        @foreach($menuPerson as $item => $menu)
        <li class="nav-item">
            <a class="nav-link" href="{!!asset($menu->url)!!}">{!!$menu->description!!}</a>
        </li>
        @endforeach
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Mi Perfil</a>
            <div class="dropdown-menu">
            <a class="dropdown-item" href="#">Resumen de mi cuenta</a>
            <a class="dropdown-item" href="#">Configuración</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="{!!asset('/logout')!!}">Salir</a>
            </div>
        </li>
    </ul>
</div>
</nav>
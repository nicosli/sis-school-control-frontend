<div class="nav-scroller bg-white box-shadow">
    <nav class="nav nav-underline">
    <a class="nav-link {!! ($item=='administrative')? 'active' : '' !!}" href="{!!asset('/Usuarios/Administrativo')!!}">
        Personal Administrativo
    </a>
    <a class="nav-link {!! ($item=='teaching')? 'active' : '' !!}" href="{!!asset('/Usuarios/Docente')!!}">
        Personal Docente
    </a>
    <a class="nav-link {!! ($item=='guardian')? 'active' : '' !!}" href="{!!asset('/Usuarios/Tutores')!!}">
        Tutores
    </a>
    <a class="nav-link {!! ($item=='parent')? 'active' : '' !!}" href="{!!asset('/Usuarios/Padres')!!}">
        Padres de familia
    </a>
    <a class="nav-link {!! ($item=='student')? 'active' : '' !!}" href="{!!asset('/Usuarios/Estudiante')!!}">
        Estudiantes
    </a>
    </nav>
</div>
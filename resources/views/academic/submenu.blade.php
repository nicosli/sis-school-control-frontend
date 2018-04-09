<div class="nav-scroller bg-white box-shadow">
    <nav class="nav nav-underline">
    <a class="nav-link {!! ($item=='schoolyear')? 'active' : '' !!}" href="{!!asset('/Academic/Schoolyear')!!}">
        Curso Escolar
    </a>
    <a class="nav-link {!! ($item=='grades')? 'active' : '' !!}" href="{!!asset('/Academic/Grades')!!}">
        Grados
    </a>
    <a class="nav-link {!! ($item=='groups')? 'active' : '' !!}" href="{!!asset('/Academic/Groups')!!}">
        Grupos
    </a>
    <a class="nav-link {!! ($item=='classrooms')? 'active' : '' !!}" href="{!!asset('/Academic/Classrooms')!!}">
        Salones
    </a>
    <a class="nav-link {!! ($item=='assignments')? 'active' : '' !!}" href="{!!asset('/Academic/Assignments')!!}">
        Materias
    </a>
    <a class="nav-link {!! ($item=='school')? 'active' : '' !!}" href="{!!asset('/Academic/School')!!}">
        Escuela
    </a>
    <a class="nav-link {!! ($item=='authorizations')? 'active' : '' !!}" href="{!!asset('/Academic/Authorizations')!!}">
        Autorizaciones
    </a>
    </nav>
</div>
<nav class="navbar navbar-expand-md fixed-top navbar-dark bg-dark d-print-none">
    <a class="navbar-brand" href="{!!asset('/')!!}">
        <i class="fas fa-book"></i>
        Sis Control Escolar
    </a>
    <button class="navbar-toggler p-0 border-0" type="button" data-toggle="offcanvas">
        <span class="navbar-toggler-icon"></span>
    </button>

<div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav">
        {!!$menuHtml!!}
    </ul>
    <ul class="navbar-nav flex-row ml-md-auto d-md-flex">
        <li class="nav-item">
            <a class="nav-link" href="{!!asset('/logout')!!}"><i class="fas fa-sign-out-alt"></i> Logout</a>
        </li>
    </ul>
</div>
</nav>
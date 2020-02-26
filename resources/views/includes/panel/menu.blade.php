<ul class="navbar-nav">
    <h6 class="navbar-heading text-muted">Gestion</h6>
    <li class="nav-item">
        <a class="nav-link" href="./index.html">
            <i class="ni ni-tv-2 text-primary"></i> Dashboard
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="./examples/icons.html">
            <i class="fa fa-university text-blue"></i> Admin. Especialidades
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="./examples/maps.html">
            <i class="fa fa-users text-orange"></i> Admin. Medicos
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="./examples/profile.html">
            <i class="ni ni-ambulance text-yellow"></i> Admin. Pacientes
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('logout')}}"
            onclick="event.preventDefault(); document.getElementById('fomrLogout').submit();">
            <i class="ni ni-key-25 text-info"></i> Cerrar Sesion
        </a>
        <form action="{{ route('logout') }}" method="POST" style="display: none;" id="fomrLogout">
            @csrf
        </form>
    </li>

</ul>
<!-- Divider -->
<hr class="my-3">
<!-- Heading -->
<h6 class="navbar-heading text-muted">Reporteria</h6>
<!-- Navigation -->
<ul class="navbar-nav mb-md-3">
    <li class="nav-item">
        <a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/getting-started/overview.html">
            <i class="ni ni-folder-17 text-blue"></i> Citas
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/foundation/colors.html">
            <i class="ni ni-paper-diploma text-red"></i> Medicos Activos
        </a>
    </li>

</ul>
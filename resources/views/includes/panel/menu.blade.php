@if (auth()->user()->role=='admin')
<h6 class="navbar-heading text-muted">Gestion</h6>
@else
<h6 class="navbar-heading text-muted">Menu</h6>
@endif

<ul class="navbar-nav">  
    @if (auth()->user()->role=='admin')
    <li class="nav-item">
        <a class="nav-link" href="/home">
            <i class="ni ni-tv-2 text-primary"></i> Dashboard
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/specialties">
            <i class="fa fa-university text-blue"></i> Admin. Especialidades
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/doctors">
            <i class="fa fa-users text-orange"></i> Admin. Medicos
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/patients">
            <i class="ni ni-ambulance text-yellow"></i> Admin. Pacientes
        </a>
    </li>
    @elseif (auth()->user()->role == 'doctor')
    <li class="nav-item">
        <a class="nav-link" href="/calendario">
            <i class="ni ni-time-alarm text-primary"></i> Horarios
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/specialties">
            <i class="fa fa-list text-orange"></i> Citas
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/specialties">
            <i class="fa fa-users  text-blue"></i> Pacientes
        </a>
    </li>
    @else 
    <li class="nav-item">
        <a class="nav-link" href="/appointments/create">
            <i class="ni ni-watch-time text-primary"></i> Reservar Citas
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/appointments">
            <i class="fa fa-list text-orange"></i> Mis Citas
        </a>
    </li>
    <li class="nav-item">

    @endif
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
@if (auth()->user()->role=='admin')
<hr class="my-3">
<!-- Heading -->
<h6 class="navbar-heading text-muted">Reporteria</h6>
<!-- Navigation -->
<ul class="navbar-nav mb-md-3">
    <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="ni ni-folder-17 text-blue"></i> Citas
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="">
            <i class="ni ni-paper-diploma text-red"></i> Medicos Activos
        </a>
    </li>

</ul>
@endif
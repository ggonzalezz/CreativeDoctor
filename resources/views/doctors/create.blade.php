@extends('layouts.panel')
@section('content')
<div class="card shadow">
    <div class="card-header border-0">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="mb-0">Agregar un Nuevo Doctor</h3>
            </div>
            <div class="col text-right">
                <a href="{{url('doctors')}}" class="btn btn-sm btn-default">Cancelar</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        
            @if ($errors->any())
            <div class="alert alert-warning" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
            </div>
            @endif
    

        
        <form action="{{ url('doctors')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Nombre Medico</label>
                <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
            </div>
            <div class="form-group">
                <label for="email">Correo Electronico</label>
                <input type="text" name="email" class="form-control" value="{{ old('email') }}">
            </div>
            <div class="form-group">
                <label for="dni">DPI</label>
                <input type="text" name="dni" class="form-control" value="{{ old('dni') }}">
            </div>
            <div class="form-group">
                <label for="address">Direccion</label>
                <input type="text" name="address" class="form-control" value="{{ old('address') }}">
            </div>
            <div class="form-group">
                <label for="address">Direccion</label>
                <input type="text" name="address" class="form-control" value="{{ old('address') }}">
            </div>
            <div class="form-group">
                <label for="phone">Telefono o Cel</label>
                <input type="text" name="phone" class="form-control" value="{{ old('phone') }}">
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>
</div>
@endsection

<!--ctrl alt f-->
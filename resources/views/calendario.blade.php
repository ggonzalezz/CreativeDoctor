@extends('layouts.panel')

@section('content')  
<div class="card shadow">
    <div class="card-header border-0">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="mb-0">Administrador de Horarios</h3>
            </div>
            <div class="col text-right">
                <a href="{{url('doctors/create')}}" class="btn btn-sm btn-default">Guardar</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        @if(session('notificacion'))
        <div class="alert alert-warning" role="alert">
            {{session('notificacion')}}
        </div>
        @endif
    </div>
    <div class="table-responsive">
        <!-- Projects table <table class="table align-items-center table-flush"> -->
        <table class="table table-striped">
            <thead class="thead-light">
                <tr>
                    <th scope="col">Día</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Turno de la Mañana</th>
                    <th scope="col">Turno de la Tarde</th>

                </tr>
            </thead>
            <tbody>
              @foreach ($days as $day)
              <tr>
              <th> {{ $day }}</th>
              <td>
                <label class="custom-toggle">
                    <input type="checkbox" checked>
                    <span class="custom-toggle-slider rounded-circle"></span>
                  </label>
              </td>
              <td>
                <div class="row">
                    <div class="col">
                        <select name="" id="" class="form-control">
                            @for ($i=1; $i<11; $i++)
                            <option value="">{{$i}}:00 pm</option>
                            <option value="">{{$i}}:30 pm</option>
                            @endfor
                        </select>
                    </div>
                    <div class="col">
                        <select name="" id="" class="form-control">
                            @for ($i=1; $i<11; $i++)
                            <option value="">{{$i}}:00 pm</option>
                            <option value="">{{$i}}:30 pm</option>
                            @endfor
                        </select>
                    </div>
                  </div>
              </td>
              
              <td>
                  <div class="row">
                    <div class="col">
                        <select name="" id="" class="form-control">
                            @for ($i=1; $i<11; $i++)
                            <option value="">{{$i}}:00 pm</option>
                            <option value="">{{$i}}:30 pm</option>
                            @endfor
                        </select>
                    </div>
                    <div class="col">
                        <select name="" id="" class="form-control">
                            @for ($i=1; $i<11; $i++)
                            <option value="">{{$i}}:00 pm</option>
                            <option value="">{{$i}}:30 pm</option>
                            @endfor
                        </select>
                    </div>
                  </div>
                 
                  
              </td>
              </tr>
              
              @endforeach 
            </tbody>
        </table>
    </div>
</div>
@endsection

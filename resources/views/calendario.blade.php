@extends('layouts.panel')

@section('content')  
<form action="{{ url('/calendario')}}" method="POST">
    @csrf
    <div class="card shadow">
        <div class="card-header border-0">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="mb-0">Administrador de Horarios</h3>
                </div>
                <div class="col text-right">
                    <button type="submit" class="btn btn-sm btn-default">Guardar Horarios</button>
                </div>
            </div>
        </div>
        <div class="card-body">
            @if(session('notificacion'))
            <div class="alert alert-warning" role="alert">
                {{session('notificacion')}}
            </div>
            @endif
            @if(session('errors'))
            <div class="alert alert-danger" role="alert">
                Se han guardado pero se ha considerado un error de usuario el cual es:
                <ul>
                    @foreach (session('errors') as $error)
                       <li>{{ $error }}</li>
                    @endforeach
                </ul>
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
                  @foreach ($workDays as $key => $workDay)
                  <tr>
                  <th> {{ $days[$key] }}</th>
                  <td>
                    <label class="custom-toggle">
                    <input type="checkbox" name="active[]"  value="{{ $key }}"
                    @if($workDay->active) checked @endif>
                        <span class="custom-toggle-slider rounded-circle"></span>
                      </label>
                  </td>
                  <td>
                    <div class="row">
                        <div class="col">
                            <select name="morning_start[]" id="" class="form-control">
                                @for ($i=1; $i<12; $i++)
                                <option value="{{($i<10 ? '0' : ''). $i}}:00" @if($i. ':00 AM'== $workDay->morning_start) selected @endif>
                                    {{$i}}:00 AM
                                </option>
                                <option value="{{($i<10 ? '0' : ''). $i}}:30" @if($i. ':30 AM'== $workDay->morning_start) selected @endif>
                                    {{$i}}:30 AM
                                </option>
                                @endfor
                            </select>
                        </div>
                        <div class="col">
                            <select name="morning_end[]" id="" class="form-control">
                                @for ($i=1; $i<12; $i++)
                                <option value="{{($i<10 ? '0' : ''). $i}}:00" @if($i. ':00 AM'== $workDay->morning_end) selected @endif>
                                    {{$i}}:00 AM
                                </option>
                                <option value="{{($i<10 ? '0' : ''). $i}}:30" @if($i. ':30 AM'== $workDay->morning_end) selected @endif>
                                    {{$i}}:30 AM
                                </option>
                                @endfor
                            </select>
                        </div>
                      </div>
                  </td>
                  
                  <td>
                      <div class="row">
                        <div class="col">
                            <select name="afternoon_start[]" id="" class="form-control">
                                @for ($i=1; $i<12; $i++)
                                <option value="{{$i+12}}:00" @if($i. ':00 PM'== $workDay->afternoon_start) selected @endif>
                                    {{$i}}:00 PM
                                </option>
                                <option value="{{$i+12}}:30" @if($i. ':30 PM'== $workDay->afternoon_start) selected @endif>
                                    {{$i}}:30 PM
                                </option>
                                @endfor
                            </select>
                        </div>
                        <div class="col">
                            <select name="afternoon_end[]" id="" class="form-control">
                                @for ($i=1; $i<12; $i++)
                                <option value="{{$i+12}}:00" @if($i. ':00 PM'== $workDay->afternoon_end) selected @endif>
                                    {{$i}}:00 PM
                                </option>
                                <option value="{{$i+12}}:30" @if($i. ':30 PM'== $workDay->afternoon_end) selected @endif>
                                    {{$i}}:30 PM
                                </option>
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
</form>

@endsection

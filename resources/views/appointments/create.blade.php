@extends('layouts.panel')
@section('content')
<div class="card shadow">
    <div class="card-header border-0">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="mb-0">Agregar una Cita</h3>
            </div>
            <div class="col text-right">
                <a href="{{url('patients')}}" class="btn btn-sm btn-default">Cancelar</a>
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
    

        
        <form action="{{ url('patients')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="specialty">Especialidad</label>
                <select name="specialty_id" id="specialty" class="form-control">
                    @foreach ($specialties as $specialty)
                         <option value="{{$specialty->id}}">{{$specialty->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="email">Medico</label>
                <select name="doctor_id" id="doctor" class="form-control">

                </select>
            </div>
            <div class="form-group">
                <label for="dni">Fecha</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                    </div>
                    <input class="form-control datepicker" placeholder="Selecciones una fecha" type="text" value="06/20/2020">
                </div>
            </div>
            <div class="form-group">
                <label for="address">Direccion</label>
                <input type="text" name="address" class="form-control" value="{{ old('address') }}">
            </div>
            
            <div class="form-group">
                <label for="phone">Telefono o Cel</label>
                <input type="text" name="phone" class="form-control" value="{{ old('phone') }}">
            </div>
            <div class="form-group">
                <label for="phone">Contrasenia</label>
                <input type="text" name="password" class="form-control" value="{{ str_random(8) }}">
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>
</div>
@endsection
@section('scripts')
    <script src="{{asset('/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
    <script>
        let $doctor;
        $(function (){
            const $specialty = $('#specialty');
            $doctor = $('#doctor');

            $specialty.change(()=>{
            const specialtyId = $specialty.val();
            const url = `/specialties/${specialtyId}/doctors`;
            $.getJSON(url, onDoctorsLoad);
             });
        });
        
        function onDoctorsLoad(doctors){
            let htmlOptions = '';
           doctors.forEach(doctor => {
               //console.log(`${doctor.id} - ${doctor.name} `);
               htmlOptions += `<option value="${doctor.id}">${doctor.name}</option>`;
           });
           $doctor.html(htmlOptions);
        }
        
    </script>
@endsection

<!--ctrl alt f-->
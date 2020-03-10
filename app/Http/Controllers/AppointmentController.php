<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Specialty;
use App\Appointment;
use Carbon\Carbon;
class AppointmentController extends Controller
{
    //
    public function create()
    {
        $specialties = Specialty::all();

        $spcialtyId = old('specialty_id');
        if($spcialtyId)
        {
            $specialty = Specialty::find($spcialtyId);
            $doctors = $specialty->users;
        }
        else{
            $doctors = collect();
        }
        /*
        $scheduleDate = old('scheduled_date');
        $doctorId = old('doctor_id');
        if($scheduleDate && $doctorId)
        {
           // $times =;
        }
        */

        return view('appointments.create', compact('specialties', 'doctors'));
    }
    
    public function store(Request $request)
    {
        $rules = [
            'description' => 'required',
            'specialty_id' => 'exists:specialties,id',
            'doctor_id' => 'exists:users,id',
            'scheduled_time' => 'required'
        ];
        $messages = [
            'scheduled_time.required' => ' Por favor seleccione una hora para la cita medica.'
        ];
        $this->validate($request, $rules, $messages);
        $data = $request->only([
            'description',
            'specialty_id',
            'doctor_id',
            //'patient_id',
            'scheduled_date',
            'scheduled_time',
            'type'
        ]);
        $data['patient_id']= auth()->id();
        
        $carbonTime = Carbon::createFromFormat('g:i A', $data['scheduled_time']);
        $data['scheduled_time'] = $carbonTime->format('H:i:s');

        Appointment::create($data);
        $notificacion = 'La cita se registro con exito';
        return back()->with(compact('notificacion'));
    }
}

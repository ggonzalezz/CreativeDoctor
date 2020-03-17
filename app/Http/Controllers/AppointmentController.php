<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Specialty;
use App\Appointment;
use Carbon\Carbon;
use App\Interfaces\ScheduleServiceInterface;
use Validator;
class AppointmentController extends Controller
{
    //
    public function create(ScheduleServiceInterface $scheduleService)
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
        
        $date = old('scheduled_date');
        $doctorId = old('doctor_id');
        if($date && $doctorId)
        {
            $intervals = $scheduleService->getAvalibleIntervals($date, $doctorId);
        }else
        {
            $intervals = null;
        }
        
        return view('appointments.create', compact('specialties', 'doctors', 'intervals'));
    }
    
    public function store(Request $request, ScheduleServiceInterface $scheduleService)
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

        $validator = Validator::make($request->all(), $rules, $messages);
        //$this->validate($request, $rules, $messages);
        // validaciones de errores
        $validator->after(function($validator) use ($request, $scheduleService) {
            $date = $request->input('scheduled_date');
            $doctorId = $request->input('doctor_id');
            $scheduled_time = $request->input('scheduled_time');
            if($date && $doctorId && $scheduled_time)
            {
                $start = new Carbon($scheduled_time);
            }else 
            {
                return;
            }

            if(!$scheduleService->isAvalibleInterval($date, $doctorId, $start))
            {   
                $validator->errors()
                    ->add('hora_no_disponible', 'La hora seleccionada ya
                    se encuentra en uso por otro paciente');
            }
        });

        if($validator->fails())
        {
            return back()
            ->withErrors($validator)
            ->withInput();
        }
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

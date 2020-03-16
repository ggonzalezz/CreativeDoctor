<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Interfaces\ScheduleServiceInterface;
use App\WorkDay;
use Carbon\Carbon;
class CalendarioController extends Controller
{
    //
    public function horas(Request $request, ScheduleServiceInterface $scheduleService)
    {
        //dd($request->all());
        $rules = [
            'date' => 'required|date_format:"Y-m-d"',
            'doctor_id' => 'required|exists:users,id'
        ];
        $this->validate($request, $rules);
        $date = $request->input('date');
        $doctorId = $request->input('doctor_id');

        return $scheduleService->getAvalibleIntervals($date,$doctorId);
        
    }
   /*
     private function getIntervals($start, $end)
    {
        $start = new Carbon($start);
        $end = new Carbon($end);
        
        $intervals = [];
        while($start < $end)
        {
            $interval = [];
            $interval['start'] = $start->format('g:i A');
            $start->addMinutes(30);

            $interval['end'] = $start->format('g:i A');
            
            $intervals [] = $interval;
        } 
        return $intervals;

    }

   */
}

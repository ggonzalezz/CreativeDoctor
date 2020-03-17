<?php namespace  App\Interfaces;
use Carbon\Carbon;

interface ScheduleServiceInterface
{
    //los metodos que creemos en el servicio los cuales sean publicos y puedan
    // utilizarse desde el controlador deberan ser agregados a la interfaz 
    public function isAvalibleInterval($date, $doctorId, Carbon $start);
    public function getAvalibleIntervals($date, $doctorId);

}

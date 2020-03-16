<?php namespace  App\Interfaces;

interface ScheduleServiceInterface
{
    public function getAvalibleIntervals($date, $doctorId);
    

}

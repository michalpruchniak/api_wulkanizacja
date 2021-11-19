<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Appointments extends Model
{
    use HasFactory;
    protected $fillable = ['date', 'licence_plate'];
    public function freeAppointments() {
        $freeApointment = static::where('licence_plate', null)
                                ->where('appointment','>',Carbon::now())
                                ->get();
        return $freeApointment;
    }
    
    public function firstFreeAppointment() {
        $freeApointment = static::where('licence_plate', null)
                                ->orderBy('appointment', 'asc')
                                ->first();
        return $freeApointment;
    }

    public function registerAppointment($licence){
        $appointment = Appointments::where('appointment', '>', Carbon::now())
                    ->where('licence_plate', $licence)
                    ->first();
        return $appointment;
    }

    public function busyAppointment(){
        $appointment = Appointments::where('licence_plate', '!=',  null)
                                  ->get();
        return $appointment;
    }


    public function reservationAlreadyExist($licence){
        $appointment = Appointments::where('licence_plate', $licence)
                                   ->where('appointment', '>', Carbon::now())
                                   ->count();
        return $appointment;
    }
}

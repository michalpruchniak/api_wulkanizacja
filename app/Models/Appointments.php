<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Appointments extends Model
{
    use HasFactory;
protected $fillable = ['appointment', 'reservation_id'];
    public function freeAppointments() {
        $freeApointment = static::where('licence_plate', null)
                                ->where('appointment','>',Carbon::now())
                                ->get();
        return json_encode($freeApointment);
    }


}

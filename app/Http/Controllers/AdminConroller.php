<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointments;


class AdminConroller extends Controller
{
    public function showAllBusyAppointment(){
        return json_encode(Appointments::busyAppointment());
    }
    public function showAllAppointment(){
        return json_encode(Appointments::all());
    }
}

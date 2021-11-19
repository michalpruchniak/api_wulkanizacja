<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointments;
use App\libraries\menageAppointment;


class AdminConroller extends Controller
{
    public function showAllBusyAppointment(){
        return json_encode(Appointments::busyAppointment());
    }

    public function showAllAppointment(){
        return json_encode(Appointments::all());
    }

    public function addNewAppointment(Request $request){
        return MenageAppointment::add($request->date);
    }

    public function delAppointment(Request $request) {
        return MenageAppointment::del($request->id);
    }
}

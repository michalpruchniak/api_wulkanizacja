<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Model\Reservation;
use App\Models\Appointments;
use App\libraries\registerOfAppointment;
use App\Http\libraries\appointmentsLibrary;
use Carbon\Carbon;

class RegisterOfAppointmentController extends Controller
{
    public function showAllFreeAppointment(){
        return json_encode(Appointments::freeAppointments());
    }
    
    public function RegisterOnAppointment(Request $request) {
        $register = new registerOfAppointment($request->licence, $request->id);
        return json_encode($register->register());
    }

    public function RegisterOnFirstAppointment(Request $request) {
        $register = new registerOfAppointment($request->licence);
        return json_encode($register->registerOnFirstFreeAppointment());
    }

    public function releaseAppointment(Request $request){
        $appointment = Appointments::registeremAppointment($request->licence);          
        $appointment->licence_plate = null;
        $appointment->save();
        return 'Zrezygnowales z zaplanowanego terminu';
    }

}

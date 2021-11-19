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

    public function addNewAppointment(Request $request){
        try{
            $appointment = new Appointments;
            $appointment->appointment = $request->date;
            $appointment->save();

            return 'Termin został dodany';
        } catch (Exceptio $exception){
            return $exception;
        }
    }

    public function delAppointment(Request $request) {
        try{
            $appointment = Appointments::findOrFail($request->id);
            $appointment->delete();

            return 'Termin został usuniety';
        } catch(Error $error){
            return $error;
        }
    }
}

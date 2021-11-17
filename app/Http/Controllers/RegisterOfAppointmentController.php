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
        return Appointments::freeAppointments();
    }
    public function RegisterOnAppointment(Request $request) {
        $test = new registerOfAppointment($request->licence);
        return $test->register();
    }
    // //Podajemy numer tablicy = licence i id terminu - appointment
    // public function RegisterOnAppointment(Request $request) {
    //     try{
    //         $flag = 1;

    //         $appointment = Appointments::find($request->appointment_id);
    //         if(!$appointment){
    //             $flag = 0;
    //             if($appointment->appointment < Carbon::now()){
    //                 $flag = 0;
    //             }
    //             if($appointment->licence_plate !== null){
    //                 $flag = 0;
    //             }
    //         }
    //         if($flag == 1){
    //             $appointment->licence_plate = $request->licence;
    //             $appointment->save();
    //             return 'Zapisano';

    //         } else {
    //             throw new Exception('Nie można tego zapisać w bazie danych');
    //         }
    //     } catch(Exception $e){
    //         return $e;
    //     }

    // }

    // public function registerOnFirstAppointment(Request $request){
    //     $appointment = Appointments::where('appointment', '>', Carbon::now())
    //                                ->where('licence_plate', null)
    //                                ->orderBy('appointment', 'asc')
    //                                ->first();
    //     $appointment->licence_plate = $request->licence;
    //     $appointment->save();

    //     return json_encode($appointment);
    // }

    // public function releaseAppointment(Request $request){
    //     $appointment = Appointments::where('appointment', '>', Carbon::now())
    //                                 ->where('licence_plate', $request->licence)
    //                                 ->first();
    //     $appointment->licence_plate = null;
    //     $appointment->save();
    // }
}

<?php
    namespace App\Http\libraries;
    use App\Models\Appointments;

    class AppointmentsLibrary {
        public static function  freeAppointments(){
            $freeAppointments = Appointments::where('licence_plate', null)
                                            ->where('appointment','>',Carbon::now())
                                            ->get();
            
            return json_encode($freeAppointments);
        }
    }
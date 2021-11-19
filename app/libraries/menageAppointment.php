<?php
namespace App\libraries;
use App\Models\Appointments;
use Exception;

    class MenageAppointment {
        public static function add($date){
            try{
                $appointment = new Appointments;
                $appointment->appointment = $date;
                $appointment->save();
                return 'Termin został dodany';
            } catch (Exceptio $exception){
                return $exception;
            }
        }

        public static function del($id){
            try{
                $appointment = Appointments::findOrFail($id);
                $appointment->delete();
                return 'Termin został usuniety';
            } catch(Error $error){
                return $error;
            }
        }
    }
<?php
namespace App\libraries;
use App\Models\Appointments;
use Exception;

    class MenageAppointment {
        public static function add($date){
            try{
                $appointment = new Appointments;
                $appointment->date = $date;
                $appointment->save();
                return 'Termin został dodany';
            } catch (Exception $exception){
                return 'Nie udalo sie dodac terminu. Sprawdz, czy wszystkie pola maja odpowiedni format';
            }
        }

        public static function del($id){
            try{
                $appointment = Appointments::findOrFail($id);
                $appointment->delete();
                return 'Termin został usuniety';
            } catch(Exception $exception){
                return 'Nie udalo sie usunac tego terminu';
            }
        }

        public static function resign($licence){
            try{
                $appointment = Appointments::registerAppointment($licence);          
                $appointment->licence_plate = null;
                $appointment->save();
                return 'Zrezygnowales z wybranego terminu';
            } catch(Exception $exception){
                return 'Nie mozesz tego zrobic';
            }
        }
    }
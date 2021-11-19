<?php
namespace App\libraries;

use App\libraries\validationAppointment;
use App\Models\Appointments;
use Exception;

class registerOfAppointment {
    private $id;
    private $licence;
    public function __construct($licence=null, $id=null ){
        $this->id = $id;
        $this->licence = $licence;
    }

    public function register(){
        try{
            $validation = new validationAppointment($this->licence, $this->id);
            $validation->validate();
            $this->storeLicence();

            return 'Termin zostal zarezerwowany';
        } catch(Exception $exception) {
            return $exception->getMessage();
        }
    }
    public function registerOnFirstFreeAppointment(){
        try{
            $appointment = Appointments::firstFreeAppointment();
            if(isset($appointment)){
                $validation = new validationAppointment($this->licence, $appointment->id);
                $validation->validate();
                $this->id = $appointment->id;
                $this->storeLicence();
                return 'Termin zostal zarezerwowany';
            } else {
                return 'Brak wolnych terminow';
            }
            
        } catch(Exception $exception) {
            return $exception->getMessage();
        }
    }
    

    private function storeLicence(){
        try {
            $appointment = Appointments::find($this->id);
            $appointment->licence_plate = $this->licence;
            $appointment->save();
        } catch(Exception $exception) {
            return $exception->getMessage();
        }
        
    }
}
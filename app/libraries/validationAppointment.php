<?php
namespace App\libraries;
use App\Models\Appointments;
use Carbon\Carbon;
use Exception;

class validationAppointment {
    public $id;
    public $appointment;
    public $licence;
    
    public function __construct($licence=null, $id=null){
        $this->appointment = Appointments::find($id);
        $this->licence = $licence;
    }
    public function validate(){
        $this->issetLicence();
        $this->appointmentExist();
        $this->appointmentIsInFuture();
        $this->appointmentIsFree();
        $this->onlyOneAppointment();
    }

    private function issetLicence(){
        if(isset($this->licence)){
            return true;
        } else {           
            throw new Exception('Prosze podać numer tablicy rejestracyjnej');
        }
    }

    private function appointmentExist(){
        if(isset($this->appointment)){
            return true;
        } else {           
            throw new Exception('Ten termin nie zostal zdefiniowany');
        }
    }

    private function appointmentIsInFuture(){
        if($this->appointment->date >= Carbon::now()){
            return true;
        } else {
            throw new Exception('Wybrano zly termin.');
        }
    }

    private function appointmentIsFree(){
        if($this->appointment->licence_plate === null){
            return true;
        } else {
            throw new Exception('Ten termin jest juz zajety.');
        }
    }

    private function onlyOneAppointment(){
        if(Appointments::reservationAlreadyExist($this->licence) < 1){
            return true;
        } else {
            throw new Exception('Jestes juz zarejestrowany.');
        }
    }
}
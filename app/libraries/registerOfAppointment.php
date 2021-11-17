<?php
namespace App\libraries;
use Exception;

use App\Models\Appointments;

class validationAppoinment {
    private $appointment;
    public function __construct($id){
        $this->appointment = Appointments::find($id);
    }

    public function appointmentExist(){
        if(isset($this->appointment)){
            return true;
        } else {
            
            throw new Exception('Coś nie działa');

        }
    }
}


class registerOfAppointment {
    private String $licence;
    public function __construct(String $licence){
        $this->licence = $licence;
    }

    public function register(){
        try{
            $validation = new validationAppoinment(1);
            $validation->appointmentExist();
            return 'Hello';
        } catch(Exception $e) {
            echo $e;
        }
    }
}
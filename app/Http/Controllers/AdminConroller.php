<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminConroller extends Controller
{
    public function showAllBusyAppointment(){
        return env('AUTHORIZATION_TOKEN');
    }
}

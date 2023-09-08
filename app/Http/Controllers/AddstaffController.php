<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AddstaffController extends Controller
{
    public function addstaff(){
        return view('staffs.addstaff');
    }
}

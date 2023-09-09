<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrescriptionsController extends Controller
{
    public function prescriptions(){
        return view('sales.prescriptions');
    }
}

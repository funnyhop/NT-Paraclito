<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckinventoryController extends Controller
{
    public function checkinventory(){
        return view('warehouse.checkinventory');
    }
}

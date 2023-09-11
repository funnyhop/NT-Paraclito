<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class billController extends Controller
{
    public function bill(){
        return view('bills.bill');
    }
}

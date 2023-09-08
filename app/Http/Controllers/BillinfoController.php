<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class billinfoController extends Controller
{
    public function billinfo(){
        return view('bills.billinfo');
    }
}

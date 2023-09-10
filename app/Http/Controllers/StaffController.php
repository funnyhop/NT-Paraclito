<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function staffs(){
        return view('staffs.staffs');
    }
    public function themnv(){
        return view('staffs.themnv');
    }
}

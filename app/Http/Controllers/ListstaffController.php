<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ListstaffController extends Controller
{
    public function liststaff(){
        return view('staffs.liststaff');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RevenueController extends Controller
{
    public function revenue(){
        return view('bills.revenue');
    }
}

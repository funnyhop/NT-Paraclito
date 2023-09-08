<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DruggrController extends Controller
{
    public function druggr(){
        return view('medicines.druggr');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MedicineController extends Controller
{
    public function medicines(){
        return view('medicines.medicines');
    }
    public function themthuoc(){
        return view('medicines.themthuoc');
    }
}

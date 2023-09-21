<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MedicineController extends Controller
{
    public function index(){
        return view('medicines.medicines');
    }
    public function create(){
        return view('medicines.createmedicine');
    }
}

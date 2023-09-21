<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProducerController extends Controller
{
    public function index(){
        return view('medicines.producers');
    }
    public function create(){
        return view('medicines.createproducer');
    }
}

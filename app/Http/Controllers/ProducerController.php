<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProducerController extends Controller
{
    public function producers(){
        return view('warehouse.producers');
    }
}

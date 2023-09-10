<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function suppliers(){
        return view('medicines.suppliers');
    }
    public function themncc(){
        return view('medicines.themncc');
    }
}

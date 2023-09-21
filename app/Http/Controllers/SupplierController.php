<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index(){
        return view('medicines.suppliers');
    }
    public function create(){
        return view('medicines.createsupplier');
    }
}

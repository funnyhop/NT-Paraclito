<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InventoryentryController extends Controller
{
    public function importmedicine(){
        return view('warehouse.importmedicine');
    }
}

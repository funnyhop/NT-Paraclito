<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InventoryentryController extends Controller
{
    public function inventoryentry(){
        return view('warehouse.inventoryentry');
    }
}

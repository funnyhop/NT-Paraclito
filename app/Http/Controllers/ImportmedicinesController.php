<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImportmedicinesController extends Controller
{
    public function index(){
        return view('warehouse.importmedicines');
    }
}

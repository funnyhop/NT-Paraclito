<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Phieunhap;
use App\Models\GhiPN;
use App\Models\Staff;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class ImportmedicinesController extends Controller
{
    private $list;
    private $values;
    public function __construct(){
        $this->values = new GhiPN();
        $this->list = new Phieunhap();
    }
    public function index()
    {
        $listgpn = $this->values->listghipn();
        $listpn=$this->list->listphieunhap();

        return view('warehouse.listimportmedicine', compact('listgpn', 'listpn'));
    }


}

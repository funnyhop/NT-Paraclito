<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bill;
use App\Models\GhiHD;
use App\Models\Medicine;
use Illuminate\Support\Facades\DB;

class BillsController extends Controller
{
    private $list;
    private $values;
    public function __construct(){
        $this->values = new GhiHD();
        $this->list = new Bill();
    }

    public function index(){
        $listghd = $this->values->listghihd();
        $listhd=$this->list->listhoadon();
        $prices = DB::table('prices')->select('medicine_id', 'Gia', 'ngay_id')->get();
        // dd($prices);
        return view('checks.bills', compact('listghd', 'listhd', 'prices'));
    }

}

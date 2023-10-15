<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Phieunhap;
use App\Models\Medicine;

class CheckinventoryController extends Controller
{
    private $medicine;
    // private $phieunhap;
    public function __construct(){
        $this->medicine = new Medicine();
        // $this->phieunhap = new Phieunhap();

    }
    public function index(){
        $medicines = $this->medicine->checkinventory();
        // $phieunhaps = $this->phieunhap->listphieunhap();
        $tonkho = DB::table('tonkhos')->select('medicine_id', 'warehouse_id', 'Soluong')->first();
        return view('warehouse.checkinventory', compact('medicines', 'tonkho'));
    }
}

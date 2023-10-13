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
        return view('checks.bills', compact('listghd', 'listhd', 'prices'));
    }

    public function indexpay($id){
        $ghd = DB::table('ghihds')
        ->join('medicines', 'ghihds.medicine_id', '=', 'medicines.ThuocID')
        ->join('bills', 'ghihds.bill_id', '=', 'bills.HDID')
        ->select('ghihds.bill_id', 'ghihds.medicine_id','medicines.Tenthuoc', 'Soluong')
        ->where('bill_id', $id)
        ->get();

        $bill = DB::table('bills')
        ->join('prescriptions', 'bills.prescription_id', '=', 'prescriptions.ToaID')
        ->join('staffs', 'bills.staff_id', '=', 'staffs.NVID')
        ->join('customers', 'bills.customer_id', '=', 'customers.KHID')
        ->select('HDID', 'Tongtien', 'DoituongSD', 'bills.created_at', 'staffs.TenNV', 'prescription_id', 'customers.TenKH', 'customers.SDT')
        ->where('HDID', $id)
        ->get();
        // dd($bill, $ghd);
        $prices = DB::table('prices')->select('medicine_id', 'Gia', 'ngay_id')->get();

        return view('checks.printbill', compact('bill', 'ghd', 'prices'));
    }

}

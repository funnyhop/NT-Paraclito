<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Customer;
use App\Models\Prescription;

class SalesController extends Controller
{
    public function salesindex(){
        return view('sales.index');
    }
    private $customer;
    private $prescription;
    public function __construct() {
        $this->customer = new Customer();
        $this->prescription = new Prescription();
    }
    //<khachhang>
    public function index(){
        $customers = $this->customer->displaycus();
        return view('sales.customers', compact('customers'));
    }
    public function create(){
        return view('sales.createcustomer');
    }
    public function store(Request $request){
        $createdCustomer = $this->customer->insertcus($request);
        $createdCustomer->save();
        return redirect('/customers');
    }
    public function edit($id){
        $customer = DB::table('customers')->select('KHID', 'TenKH', 'SDT', 'Diachi')->where('KHID', $id)->first();
        return view('sales.editcustomer')->with('customer', $customer);
    }
    public function update(Request $request, $id){
        $customer = DB::table('customers')->where('KHID',$id)
        ->update([
            'KHID' => $request->input('id'),
            'TenKH' => $request->input('name'),
            'SDT' => $request->input('sdt'),
            'Diachi' => $request->input('address')
        ]);
        return redirect('/customers');
    }
    public function destroy($id){
        $customer = DB::table('customers')->where('KHID',$id);
        $customer->delete();
        return redirect('/customers');
    }
    // </khachhang>
    // <themtoathuoc>
    public function pre_index(){
        $prs = $this->prescription->displayprescription();
        return view('sales.prescription', compact('prs'));
    }
    public function pre_create(){
        return view('sales.createprescription');
    }
    public function pre_store(Request $request){
        $pre = $this->prescription->createprescription($request);
        $pre->save();
        return redirect('/prescription');
    }
    public function pre_edit($id){
        $pre = $this->prescription->editprescription($id);
        return view('sales.editprescription')->with('pre', $pre);
    }
    public function pre_update(Request $request, $id){
        $pre = $this->prescription->updateprescription($request, $id);
        return redirect('/prescription');
    }
    public function pre_destroy($id){
        $pre = $this->prescription->destroyprescription($id);
        $pre->delete();
        return redirect('/prescription');
    }
    // </themtoathuoc>
}

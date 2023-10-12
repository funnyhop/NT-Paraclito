<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Customer;

class SalesController extends Controller
{
    //<khachhang>
    private $customer;
    public function __construct() {
        $this->customer = new Customer();
    }
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
    public function salesindex(){
        return view('sales.index');
    }
}

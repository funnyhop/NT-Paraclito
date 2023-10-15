<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Customer;
use App\Models\Prescription;

class SalesController extends Controller
{
    private $customer;
    private $prescription;
    public function __construct() {
        $this->customer = new Customer();
        $this->prescription = new Prescription();
    }
//<sale>
    public function salesindex(){
        $pres = DB::table('prescriptions')->select('ToaID')->get();
        $bills = DB::table('bills')->select('HDID')->get();
        $customers = DB::table('customers')->select('KHID', 'TenKH')->get();
        $drs = DB::table('medicines')->select('ThuocID', 'Tenthuoc')->get();
        $staffs = DB::table('staffs')->select('NVID', 'TenNV')->get();
        return view('sales.index', compact('staffs', 'drs', 'customers', 'bills', 'pres'));
    }
    public function storecustomer(Request $request){
        $createdCustomer = $this->customer->insertcus($request);
        $createdCustomer->save();
        return redirect(route('sales'));
    }
    public function storehd(Request $request)
    {
        $hd = DB::table('bills')->insert([
            'HDID' => $request->input('idhd'),
            'prescription_id' => $request->input('prescription_id'),
            'staff_id' => $request->input('staff_id'),
            'customer_id' => $request->input('customer_id'),
            'DoituongSD' => $request->input('DoituongSD'),
            'created_at' => now(),
            'updated_at' => now()
        ]);
        return redirect('/sales');
    }
    public function storeghd(Request $request)
    {
        // dd($request);
        $ghd = DB::table('ghihds')->insert([
            'bill_id' => $request->input('bill_id'),
            'medicine_id' => $request->input('medicine_id'),
            'Soluong' => $request->input('sl'),
            'created_at' => now(),
            'updated_at' => now()
        ]);
        return redirect(route('sales'));
    }
    public function createAndStore(Request $request)
    {
        // Bắt đầu một giao dịch
        DB::beginTransaction();

        try {
            // Thực hiện insert cho form đầu tiên
            $this->salesindex($request);

            // Nếu không có lỗi, thực hiện insert cho form thứ hai
            if (!empty($request->input('id'))) {
                // Có ID, lưu thông tin liên quan đến ID
                $this->storecustomer($request);
            }

            if (!empty($request->input('idhd'))) {
                // Có ID, lưu thông tin liên quan đến ID
                $this->storehd($request);
            }

            if (!empty($request->input('bill_id')) && !empty($request->input('medicine_id'))) {
                // Có thông tin về phiếu nhập và thuốc, lưu thông tin liên quan
                $this->storeghd($request);
            }

            // Nếu mọi thứ đều ổn, commit giao dịch
            DB::commit();

            // Chuyển hướng về trang tạo mới
            return redirect()->route('sales');
        } catch (\Exception $e) {
            // Nếu có lỗi, rollback giao dịch
            DB::rollBack();

            // Xử lý lỗi nếu cần
            return redirect()->back()->with('error', 'Có lỗi xảy ra.');
        }
    }
//</sale>
//<khachhang>
    public function index(){
        // $customers = $this->customer->displaycus();
        $key = request()->key; // Retrieve the key from the request;
        $customers = Customer::search($key)->get();

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
    public function pre_index(Request $request){
        $key = request()->key;
        $prs = Prescription::search($key)->get();
        // $prs = $this->prescription->displayprescription();

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

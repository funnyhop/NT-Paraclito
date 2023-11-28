<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\GhiHD;
use App\Models\Customer;
use App\Models\Prescription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SalesController extends Controller
{
    private $customer;
    private $prescription;
    private $list;
    private $values;
    public function __construct() {
        $this->customer = new Customer();
        $this->prescription = new Prescription();

        $this->values = new GhiHD();
        $this->list = new Bill();
    }
//<sale>
    public function salesindex(){
        $maxHDID = DB::table('bills')->max(DB::raw('CAST(SUBSTRING(HDID, 3, 3) AS SIGNED)'));//CAST biến chuỗi thành số để phù hợp với hàm max
        $newHDID = 'HD' . str_pad($maxHDID + 1, 3, '0', STR_PAD_LEFT);//3, '0' STR_PAD_LEFT hiển thị bắt buộc 3 ký tự, nếu max = 1 thì sẽ chèn thêm 3 số không vào bên trái số 1

        $newID = 'HD' . str_pad($maxHDID , 3, '0', STR_PAD_LEFT);

        $maxKHID = DB::table('customers')->max(DB::raw('CAST(SUBSTRING(KHID, 3, 3) AS SIGNED)'));
        $newKHID = 'KH' . str_pad($maxKHID + 1, 3, '0', STR_PAD_LEFT);

        $listghd = $this->values->listghihd();
        // $listhd=$this->list->listhoadon();
        $key = request()->key;
        $listhd = Bill::search($key)->get();
        // dd($listhd);
        $prices = DB::table('prices')->select('medicine_id', 'Gia', 'ngay_id')->get();

        $pres = DB::table('prescriptions')->select('ToaID')->get();
        $bills = DB::table('bills')->select('HDID')->get();
        $customers = DB::table('customers')->select('KHID', 'TenKH')->get();
        $drs = DB::table('medicines')->select('ThuocID', 'Tenthuoc')->get();
        $staffs = DB::table('staffs')->select('NVID', 'TenNV')->get();
        $ghihd = DB::table('ghihds')
            ->select('medicine_id', 'bill_id', 'Soluong')
            ->where('bill_id', $newID)
            // ->where('medicine_id', 'like', '%' . $key . '%')
            // ->orWhere('bill_id', 'like', '%' . $key . '%')
            ->get();
            // dd($ghihd);
        return view('sales.index', compact('ghihd','newID','listghd', 'listhd', 'prices','staffs', 'drs', 'customers', 'bills', 'pres','newHDID','newKHID'));
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
        // Thêm ghi chú hoặc log để theo dõi dữ liệu
        // dd($request);

        $ghd = DB::table('ghihds')->insert([
            'bill_id' => $request->input('bill_id'),
            'medicine_id' => $request->input('medicine_id'),
            'Soluong' => $request->input('sl'),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        $get_idwarehouse = DB::table('ghihds')
            ->join('medicines', 'ghihds.medicine_id', '=', 'medicines.ThuocID')
            ->join('tonkhos', 'medicines.ThuocID', '=', 'tonkhos.medicine_id')
            ->where('tonkhos.medicine_id', $request->input('medicine_id'))
            ->select('tonkhos.warehouse_id')
            ->first();
        // dd($get_idwarehouse);
        // Kiểm tra sự tồn tại của bản ghi trong tonkhos
        $tonkhoRecord = DB::table('tonkhos')
            ->where('medicine_id', $request->input('medicine_id'))
            ->where('warehouse_id', $get_idwarehouse->warehouse_id)
            ->first();

        if ($tonkhoRecord) {
            // Bản ghi tồn tại, thực hiện cập nhật
            $currentSoluong = $tonkhoRecord->Soluong;

            // Debug
            // dd("Before Update", $request->input('sl'), $currentSoluong);

            // Tính toán giá trị mới của Soluong
            $newSoluong = $currentSoluong - (int)$request->input('sl');

            // Cập nhật Soluong trong cơ sở dữ liệu
            $ud_soluong = DB::table('tonkhos')
                ->where('medicine_id', $request->input('medicine_id'))
                ->where('warehouse_id', $get_idwarehouse->warehouse_id)
                ->update([
                    'Soluong' => $newSoluong
                ]);

            // Debug
            // dd("After Update", $ud_soluong);
        } else {
            // Bản ghi không tồn tại, có thể xử lý theo ý của bạn
            dd("Thuốc hết");
        }

    return redirect(route('sales'));
}

    public function createAndStore(Request $request)
    {
        // Bắt đầu một giao dịch
        DB::beginTransaction();

        try {
            // Thực hiện insert cho form đầu tiên
            // $this->salesindex($request);

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
        $maxKHID = DB::table('customers')->max(DB::raw('CAST(SUBSTRING(KHID, 3, 3) AS SIGNED)'));
        $newKHID = 'KH' . str_pad($maxKHID + 1, 3, '0', STR_PAD_LEFT);
        return view('sales.createcustomer', compact('newKHID'));
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
        $maxToaID = DB::table('prescriptions')->max(DB::raw('CAST(SUBSTRING(ToaID, 3, 3) AS SIGNED)'));
        $newToaID = 'T0' . str_pad($maxToaID + 1, 3, '0', STR_PAD_LEFT);
        return view('sales.createprescription', compact('newToaID'));
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
        ->first();
        // dd($bill, $ghd);
        $prices = DB::table('prices')->select('medicine_id', 'Gia', 'ngay_id')->get();

        return view('checks.printbill', compact('bill', 'ghd', 'prices'));
    }
    public function updatehd(Request $request, $id)
    {
        $drs = DB::table('bills')
        ->where('HDID', '=', $id)
        ->update([
            'Tongtien' => $request->input('sum')
        ]);

    return redirect('/bills');
    }
    public function chitiet(Request $request, $id)
    {
        // dd($request);
        $ghihds = DB::table('ghihds')
            ->select('medicine_id', 'bill_id', 'Soluong')
            ->where('bill_id', $id)
            // ->where('medicine_id', 'like', '%' . $key . '%')
            // ->orWhere('bill_id', 'like', '%' . $key . '%')
            ->get();
        $i = 1;
        return view('sales.chitiet', compact('ghihds', 'i'));
    }
    public function edit_ct($bill_id, $medicine_id){
        $ghihd = DB::table('ghihds')
            ->select('medicine_id', 'bill_id', 'Soluong')
            ->where('bill_id', $bill_id)
            ->where('medicine_id', $medicine_id)
            ->first();
        $getwarehouse_id = DB::table('tonkhos')
            ->join('warehouses', 'tonkhos.warehouse_id', '=', 'warehouses.KhoID')
            ->where('medicine_id', $medicine_id)
            ->select('KhoID', 'TenKho')
            ->get();

        return view('sales.editchitiet', [
            'ghihd' => $ghihd,
            'getwarehouse_id' => $getwarehouse_id
        ]);
    }
    public function update_ct(Request $request, $bill_id, $medicine_id) {
        $currentSoluongGhihds = DB::table('ghihds')
            ->where('bill_id', $bill_id)
            ->where('medicine_id', $medicine_id)
            ->value('Soluong');

        // Perform the update in ghihds
        $ghihd = DB::table('ghihds')
            ->where('bill_id', $bill_id)
            ->where('medicine_id', $medicine_id)
            ->update([
                'medicine_id' => $request->input('medicine_id'),
                'bill_id' => $request->input('bill_id'),
                'Soluong' => $request->input('Soluong')
            ]);

        $updateSoluong =  $currentSoluongGhihds - $request->input('Soluong');

        $tonkho = DB::table('tonkhos')
            ->where('warehouse_id', $request->input('warehouse_id'))
            ->where('medicine_id', $medicine_id)
            ->update([
                'Soluong' => DB::raw('Soluong + ' . $updateSoluong)
            ]);

        return redirect()->route('sales');
    }

    public function destroy_ct($bill_id, $medicine_id)
    {
        $currentSoluongGhihds = DB::table('ghihds')
            ->where('bill_id', $bill_id)
            ->where('medicine_id', $medicine_id)
            ->value('Soluong');

        $getwarehouse_id = DB::table('tonkhos')
            ->where('medicine_id', $medicine_id)
            ->where('warehouse_id', 'K0001')
            ->first();

        $tonkho = DB::table('tonkhos')
                ->where('warehouse_id', 'K0001')
                ->where('medicine_id', $medicine_id)
                ->update([
                    'Soluong' => DB::raw('Soluong + ' . $currentSoluongGhihds)
                ]);
        DB::table('ghihds')
            ->where('bill_id', $bill_id)
            ->where('medicine_id', $medicine_id)
            ->delete();

        return redirect()->route('sales');
    }
}

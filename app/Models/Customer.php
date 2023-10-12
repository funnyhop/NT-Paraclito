<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Customer extends Model
{
    use HasFactory;
    protected $table = 'customers';
    protected $primaryKey = 'KHID';
    protected $fillable = ['KHID', 'TenKH', 'Diachi', 'SDT'];

    public function displaycus(){
        $customers = DB::table('customers')->select('KHID', 'TenKH', 'SDT', 'Diachi')->get();
        return $customers;
    }
    public function insertcus($request){
        $customer = Customer::create([
            'KHID' => $request->input('id'),
            'TenKH' => $request->input('name'),
            'SDT' => $request->input('sdt'),
            'Diachi' => $request->input('address')
        ]);
        return $customer;
    }
    //one customer has many bill
    public function bills() {
        return $this->hasMany(Bill::class,'customer_id', 'KHID');
    }
}

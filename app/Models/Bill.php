<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;
    protected $table = 'bills';
    protected $primaryKey = 'HDID';
    protected $fillable = ['HDID', 'DoituongSD', 'Tongtien', 'created_at', 'staff_id', 'prescription_id', 'customer_id'];
    //one bill has many GhiHD
    public function ghihds() {
        return $this->hasMany(GhiHD::class, 'bill_id', 'HDID');
    }
    //one bill belongs to staff
    public function staff() {
        return $this->belongsTo(Staff::class, 'staff_id', 'NVID');
    }
    //one bill belongs to customer
    public function customer() {
        return $this->belongsTo(Customer::class, 'customer_id', 'KHID');
    }
    //one bill belongs to prescription
    public function prescription() {
        return $this->belongsTo(Prescription::class, 'prescription_id', 'ToaID');
    }
}

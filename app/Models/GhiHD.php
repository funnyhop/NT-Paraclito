<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GhiHD extends Model
{
    use HasFactory;
    protected $table = 'ghihds';
    protected $primaryKey = ['medicine_id','bill_id'];
    protected $fillable = ['medicine_id','bill_id', 'Soluong'];
    //one GhiHD belongs to medicine
    public function medicine() {
        return $this->belongsTo(Medicine::class, 'medicine_id', 'ThuocID');
    }
    //one GhiHD belongs to bill
    public function bill() {
        return $this->belongsTo(Bill::class, 'bill_id', 'HDID');
    }
}

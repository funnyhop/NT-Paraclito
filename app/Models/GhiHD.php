<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GhiHD extends Model
{
    use HasFactory;
    protected $tabel = 'ghihds';
    protected $primaryKey = ['id'];
    protected $fillable = ['id', 'medicine_id','bill_id', 'Soluong','DVT', 'Gia'];
    //one GhiHD belongs to medicine
    public function medicine() {
        return $this->belongsTo(Medicine::class, 'medicine_id', 'ThuocID');
    }
    //one GhiHD belongs to bill
    public function bill() {
        return $this->belongsTo(Bill::class, 'bill_id', 'HDID');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GhiPN extends Model
{
    use HasFactory;
    protected $table = 'ghipns';
    protected $primaryKey = ['id'];
    protected $fillable = ['id', 'medicine_id','phieunhap_id', 'Soluong','DVT', 'Gia'];
    //one GhiPN belongs to Medicine
    public function medicine() {
        return $this->belongsTo(Medicine::class, 'medicine_id', 'ThuocID');
    }
    //one GhiPN belongs to phieunhap
    public function phieunhap() {
        return $this->belongsTo(Phieunhap::class, 'phieunhap_id', 'PNID');
    }

}

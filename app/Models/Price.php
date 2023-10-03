<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    use HasFactory;
    protected $table = 'prices';
    protected $primaryKey = ['medicine_id','ngay_id'];
    protected $fillable = ['medicine_id','ngay_id', 'Gia'];

    //one price belongs to medicine
    public function medicine() {
        return $this->belongsTo(Medicine::class, 'medicine_id', 'ThuocID');
    }
    //one price belongs to day
    public function day() {
        return $this->belongsTo(Day::class, 'ngay_id', 'Ngay');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    use HasFactory;
    protected $table = 'prices';
    protected $primaryKey = ['id'];
    protected $fillable = ['id', 'medicine_id','ngay_id', 'DVT', 'Gia'];

    //one price belongs to medicin
    public function medicine() {
        return $this->belongsTo(Medicine::class, 'medicine_id', 'ThuocID');
    }
    //one price belongs to day
    public function day() {
        return $this->belongsTo(Day::class, 'ngay_id', 'Ngay');
    }
}

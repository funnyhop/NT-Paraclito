<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Day extends Model
{
    use HasFactory;
    protected $table = 'days';
    protected $primaryKey = 'Ngay';
    protected $fillable = ['Ngay'];
    //many day has many Medicine
    public function medicineprices()
    {
        return $this->belongsToMany(Medicine::class, 'prices', 'ngay_id', 'medicine_id')
                    ->withPivot('gia');
    }

}

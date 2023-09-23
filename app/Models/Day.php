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
    //one day has many price
    public function prices() {
        return $this->hasMany(Price::class, 'ngay_id', 'Ngay');
    }
}

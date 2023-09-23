<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producer extends Model
{
    use HasFactory;
    protected $table = ('producers');
    protected $primaryKey = 'NSXID';
    protected $fillable = ['NSXID', 'TenNSX', 'Quocgia'];
    //one supplier has many medicine
    public function medicines(){
        return $this->hasMany(Medicine::class, 'produccer_id', 'NSXID');
    }
}

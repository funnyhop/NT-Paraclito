<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;
    protected $table = ('suppliers');
    protected $primaryKey = 'NCCID';
    protected $fillable = ['NCCID', 'TenNCC', 'Diachi'];
    //one supplier has many medicine
    public function medicines(){
        return $this->hasMany(Medicine::class, 'supplier_id', 'NCCID');
    }
}

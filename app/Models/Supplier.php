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
    protected $keyType = 'string';
    //one supplier has many medicine
    public function medicines(){
        return $this->hasMany(Medicine::class, 'supplier_id', 'NCCID');
    }

    public function scopeSearch($query, $key) {
        // $key = request()->key; // Retrieve the key from the request;
        if ($key = request()->key) {
            return $query->where('NCCID', 'like', '%' . $key . '%')
                ->orWhere('TenNCC', 'like', '%' . $key . '%')
                ->orWhere('Diachi', 'like', '%' . $key . '%');
        }
        return $query;
    }
}

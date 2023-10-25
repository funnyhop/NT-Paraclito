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
    protected $keyType = 'string';
    //one supplier has many medicine
    public function medicines(){
        return $this->hasMany(Medicine::class, 'produccer_id', 'NSXID');
    }

    public function scopeSearch($query, $key) {
        // $key = request()->key; // Retrieve the key from the request;
        if ($key = request()->key) {
            return $query->where('NSXID', 'like', '%' . $key . '%')
                ->orWhere('TenNSX', 'like', '%' . $key . '%')
                ->orWhere('Quocgia', 'like', '%' . $key . '%');
        }
        return $query;
    }
}

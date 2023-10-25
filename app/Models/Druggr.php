<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Druggr extends Model
{
    use HasFactory;
    protected $table = 'druggrs';
    protected $primaryKey = 'NhomthuocID';
    protected $fillable = ['NhomthuocID','Tennhom'];
    protected $keyType = 'string';
    //one druggr has many medicine
    public function medicines(){
        return $this->hasMany(Medicine::class, 'druggr_id', 'NhomthuocID');
    }
    public function scopeSearch($query, $key) {
        // $key = request()->key; // Retrieve the key from the request;
        if ($key = request()->key) {
            return $query->where('NhomthuocID', 'like', '%' . $key . '%')
                ->orWhere('Tennhom', 'like', '%' . $key . '%');
        }
        return $query;
    }
}

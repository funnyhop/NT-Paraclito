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
    //one druggr has many medicine
    public function medicines(){
        return $this->hasMany(Medicine::class, 'druggr_id', 'NhomthuocID');
    }
}

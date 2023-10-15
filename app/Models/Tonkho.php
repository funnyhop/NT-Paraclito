<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tonkho extends Model
{
    use HasFactory;
    protected $table = 'ton_kho';
    protected $primary =['medicine_id', 'warehouse_id'];
    protected $fillable = ['medicine_id', 'warehouse_id', 'Soluong'];
    protected $keyType = 'array';
}

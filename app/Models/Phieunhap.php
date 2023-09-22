<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phieunhap extends Model
{
    use HasFactory;
    protected $tabel = 'phieunhaps';
    protected $primaryKey = ['PNID'];
    protected $fillable = ['PNID', 'staff_id','warehouse_id', 'created_at'];
}

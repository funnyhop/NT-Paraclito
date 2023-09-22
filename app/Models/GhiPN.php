<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GhiPN extends Model
{
    use HasFactory;
    protected $tabel = 'ghipns';
    protected $primaryKey = ['id'];
    protected $fillable = ['id', 'medicine_id','phieunhap_id', 'Soluong','DVT', 'Gia'];
}

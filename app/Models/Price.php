<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    use HasFactory;
    protected $tabel = 'prices';
    protected $primaryKey = ['id'];
    protected $fillable = ['id', 'medicine_id','ngay_id', 'DVT', 'Gia'];
}

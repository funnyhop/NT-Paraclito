<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Druggr extends Model
{
    use HasFactory;
    protected $tabel = 'druggrs';
    protected $primaryKey = 'Manhom';
    protected $fillable = ['Manhom','Tennhom'];
}

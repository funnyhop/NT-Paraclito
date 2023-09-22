<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    use HasFactory;
    protected $table = 'medicines';
    protected $primaryKey = 'ThuocID';
    protected $fillable = ['ThuocID', 'Tenthuoc', 'NSX',
     'HSD', 'TPhoatchat', 'Dieutri', 'HDSD',
     'Chongchidinh', 'druggr_id', 'supplier_id', 'producer_id'];
}

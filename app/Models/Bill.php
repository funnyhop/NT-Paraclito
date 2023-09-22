<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;
    protected $table = 'bills';
    protected $primaryKey = 'HDID';
    protected $fillable = ['HDID', 'DoituongSD', 'Tongtien', 'created_at', 'staff_id', 'prescription_id', 'customer_id'];
}

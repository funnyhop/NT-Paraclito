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
    //tip: khoa ngoai luon dung truoc khoa chinh trong belongto tenham khong them s va has many them s de phan biet nhieu voi 1
    //one medicine belongs to druggr
    public function druggr() {
        return $this->belongsTo(Druggr::class, 'druggr_id', 'NhomthuocID');
    }
    //one medicine belongs to supplier
    public function supplier() {
        return $this->belongsTo(Supplier::class, 'supplier_id','NCCID');
    }
    //one medicine belongs to producer // mot dong du lieu hien tai o Medicine thuoc ve mot dong du lieu trong Producer dang tham chieu den
    public function producer() {
        return $this->belongsTo(Producer::class, 'producer_id','NSXID');
    }

    //one medicine has many price
    public function prices() {
        return $this->hasMany(Price::class, 'medicine_id', 'ThuocID');
    }
    //one medicine has many ghipns
    public function ghipns() {
        return $this->hasMany(GhiPN::class, 'medicine_id', 'ThuocID');
    }
    //one medicine has many ghihds // trong GhiHD co chua nhieu dong khoa ngoai(medicine_id) trung nhau dang tham chieu den 1 dong du lieu o Medicine
    public function ghihds () {
        return $this->hasMany(GhiHD::class, 'medicine_id', 'ThuocID');
    }
}
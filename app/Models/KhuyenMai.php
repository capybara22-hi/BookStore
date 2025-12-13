<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KhuyenMai extends Model
{
    use HasFactory;
    protected $table = 'khuyen_mai';
    protected $primaryKey = 'ma_khuyen_mai';
    public $timestamps = false;

    protected $fillable = [
        'nd_khuyen_mai',
        'phan_tram_giam',
        'gia_don_hang',
        'ngay_bat_dau',
        'ngay_ket_thuc',
        'so_luong'
    ];

}

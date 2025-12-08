<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KhuyenMai extends Model
{
    use HasFactory;

    protected $table = 'khuyen_mai';
    protected $primaryKey = 'ma_khuyen_mai';
    protected $fillable = [
        'nd_khuyen_mai',
        'pham_tram_giam',
        'gia_don_hang',
    ];

    protected $casts = [
        'ngay_bat_dau' => 'datetime',
        'ngay_ket_thuc' => 'datetime',
    ];
}

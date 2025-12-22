<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChiTietPhieuNhap extends Model
{
    use HasFactory;

    protected $table = 'chi_tiet_phieu_nhap';

    protected $fillable = [
        'phieu_nhap_id',
        'ma_san_pham',
        'ten_san_pham',
        'so_luong',
        'don_gia',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GioHang extends Model
{
    use HasFactory;

    protected $table = 'gio_hang';
    protected $primaryKey = 'ma_gio_hang';
    public $timestamps = false;

    protected $fillable = [
        'ma_san_pham',
        'ten_sp',
        'gia_sp',
        'so_luong_sp',
        'tong_tien',
    ];

    // Quan hệ 1 sản phẩm thuộc 1 giỏ hàng
    public function sanpham()
    {
        return $this->belongsTo(SanPham::class, 'ma_san_pham', 'ma_san_pham');
    }
}

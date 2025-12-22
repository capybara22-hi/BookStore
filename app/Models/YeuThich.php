<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class YeuThich extends Model
{
    protected $table = 'yeu_thich';
    protected $fillable = ['ma_nguoi_dung', 'ma_san_pham'];
    // Khai báo primary key
    protected $primaryKey = 'ma_yeu_thich';
    public $timestamps = false; 

    // Quan hệ tới User
    public function user()
    {
        return $this->belongsTo(User::class, 'ma_nguoi_dung', 'ma_nguoi_dung');
    }

    // Quan hệ tới Sản phẩm
    public function sanpham()
    {
        return $this->belongsTo(SanPham::class, 'ma_san_pham', 'ma_san_pham');
    }
}

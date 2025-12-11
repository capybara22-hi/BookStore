<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SanPham extends Model
{
    use HasFactory;

    protected $table = 'san_pham';
    protected $primaryKey = 'ma_san_pham';
    public $timestamps = false;

    protected $fillable = [
        'code',
        'ten_san_pham',
        'tac_gia',
        'gia_tien_sp',
        'so_luong_sp',
        'mo_ta_san_pham',
        'ma_the_loai',
    ];

    public function file()
    {
        return $this->hasMany(File::class, 'ma_san_pham', 'ma_san_pham');
    }

    public function giohang()
    {
        return $this->hasMany(GioHang::class, 'ma_san_pham', 'ma_san_pham');
    }

    public function theloaisp()
    {
        return $this->belongsTo(TheLoai::class, 'ma_the_loai', 'ma_the_loai');
    }


}

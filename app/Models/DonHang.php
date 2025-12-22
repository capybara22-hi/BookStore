<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonHang extends Model
{
    use HasFactory;
    protected $table = 'don_hang';
    protected $primaryKey = 'ma_don_hang';
    public $timestamps = false;
    protected $fillable = [
        'ma_nguoi_dung',
        'tien_hang',
        'loai_van_chuyen',
        'phi_van_chuyen',
        'thanh_tien',
        'trang_thai_dh',
        'dia_chi',
        'ngay_dat_hang',
        'sdt',
        'ten_nguoi_nhan',
        'ma_khuyen_mai',
        'giam_gia'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'ma_nguoi_dung', 'ma_nguoi_dung');
    }

    // Quan hệ với địa chỉ
    // public function diaChi()
    // {
    //     return $this->belongsTo(DiaChi::class, 'ma_dia_chi', 'ma_dia_chi');
    // }
}

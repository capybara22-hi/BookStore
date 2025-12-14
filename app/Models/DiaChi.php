<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiaChi extends Model
{
    use HasFactory;
    protected $table = 'dia_chi';
    protected $primaryKey = 'ma_dia_chi';
    public $timestamps = false;

    protected $fillable = [
    'ma_nguoi_dung',
    'ten_nguoi_nhan',
    'dia_chi',
    'sdt',
    'mac_dinh',
    ];


    public function user() {
        return $this->belongsTo(User::class, 'ma_nguoi_dung');
    }

     // Một địa chỉ có thể có nhiều đơn hàng
    public function donHang()
    {
        return $this->hasMany(DonHang::class, 'ma_dia_chi', 'ma_dia_chi');
    }
}

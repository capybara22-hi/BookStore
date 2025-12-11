<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhieuNhap extends Model
{
    use HasFactory;

    protected $table = 'phieu_nhap_hang';

    protected $fillable = [
        'nguoi_nhap',
        // 'ngay_nhap',
    ];

    // Relationship: PhieuNhap belongsTo User
    public function nguoiNhap()
    {
        return $this->belongsTo(User::class, 'nguoi_nhap', 'ma_nguoi_dung');
    }
}

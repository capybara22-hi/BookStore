<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $table = 'reviews';
    protected $primaryKey = 'ma_danh_gia';
    protected $fillable = [
        'ma_nguoi_dung',
        'ma_san_pham',
        'ma_don_hang',
        'rating',
        'comment',
        'edit_count'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'ma_nguoi_dung');
    }

    public function sanpham()
        {
            return $this->belongsTo(
                SanPham::class,
                'ma_san_pham',   // khóa ngoại ở bảng danh_gia
                'ma_san_pham'    // khóa chính ở bảng san_pham
            );
        }
    }



<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'ma_nguoi_dung',
        'ma_san_pham',
        'rating',
        'comment'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'ma_nguoi_dung');
    }

    public function product()
    {
        return $this->belongsTo(SanPham::class, 'ma_san_pham', 'ma_san_pham');
    }
}



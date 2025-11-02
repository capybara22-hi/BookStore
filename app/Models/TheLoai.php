<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TheLoai extends Model
{
    use HasFactory;

    protected $table = 'the_loai';
    protected $primaryKey = 'ma_the_loai';
    public $timestamps = false;

    protected $fillable = ['ma_danh_muc', 'ten_the_loai'];

    // Quan hệ ngược: nhiều thể loại thuộc 1 danh mục
    public function danhmuc()
    {
        return $this->belongsTo(DanhMuc::class, 'ma_danh_muc', 'ma_danh_muc');
    }
}

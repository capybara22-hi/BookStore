<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DanhMuc extends Model
{
    use HasFactory;

    protected $table = 'danh_muc';
    protected $primaryKey = 'ma_danh_muc';
    public $timestamps = false;

    protected $fillable = ['ten_danh_muc'];

    // Quan hệ 1-nhiều: 1 danh mục có nhiều thể loại
    public function theloai()
    {
        return $this->hasMany(TheLoai::class, 'ma_danh_muc', 'ma_danh_muc');
    }
}

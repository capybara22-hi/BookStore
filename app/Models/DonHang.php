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
    protected $fillable = ['ma_nguoi_dung', 'tien_hang', 'loai_van_chuyen', 'phi_van_chuyen', 'thanh_tien'];

    public function user()
    {
        return $this->belongsTo(User::class, 'ma_nguoi_dung', 'ma_nguoi_dung');
    }
}

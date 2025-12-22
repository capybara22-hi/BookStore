<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VanChuyen extends Model
{
    use HasFactory;

    protected $table = 'van_chuyen';
    protected $primaryKey = 'ma_van_chuyen';
    public $timestamps = false;
    protected $fillable = ['dv_van_chuyen', 'so_tien', 'mo_ta', 'dieu_kien'];
}

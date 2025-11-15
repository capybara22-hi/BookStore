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
}

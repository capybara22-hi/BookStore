<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThanhToan extends Model
{
    use HasFactory;
    protected $table = 'thanh_toan';
    protected $primaryKey = 'ma_thanh_toan';
    public $timestamps = false;

}

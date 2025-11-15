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
}

<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DangNhapController extends Controller
{
    public function index(){
        $maNguoiDung = Auth::user()->ma_nguoi_dung;
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\DonHang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DonHangMailController extends Controller
{
    public function store()
    {
        $ma_nguoi_dung = Auth::id();
        $donHang = DonHang::where('ma_nguoi_dung', $ma_nguoi_dung)->get();
    }
}

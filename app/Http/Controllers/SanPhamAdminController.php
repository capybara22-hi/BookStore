<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SanPham;

class SanPhamAdminController extends Controller
{
    public function index(){
        $san_pham = SanPham::all();
        return view('admin.sanpham', compact('san_pham'));
    }
}

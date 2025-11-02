<?php

namespace App\Http\Controllers;

use App\Models\SanPham;
use App\Models\GioHang;
use App\Models\File;
use Illuminate\Http\Request;

class GioHangController extends Controller
{
    public function index(){
        //lấy tất cả ds giỏ hàng 
        $ma_nguoi_dung = 1;
        $sanphamgiohang = GioHang::with('sanpham')
        ->where('ma_nguoi_dung', $ma_nguoi_dung)
        ->get();

        $sanpham = SanPham::with('file')->get();

        // truyền dữ liệu sang view
        return view('user.giohang',compact('sanphamgiohang','sanpham'));
    }
    
}

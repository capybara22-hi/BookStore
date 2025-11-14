<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GioHang;
use App\Models\User;
use App\Models\File;
use App\Models\DonHang;
use App\Models\SanPham;
use App\Models\DiaChi;

class TaiKhoanController extends Controller
{
    public function index(){
        $ma_nguoi_dung = 1;
        $don_hang = DonHang::where('ma_nguoi_dung', $ma_nguoi_dung)->get();
        $sanphamgiohang = GioHang::with('sanpham')
        ->where('ma_nguoi_dung', $ma_nguoi_dung)
        ->get();

        $dia_chi = DiaChi::where('ma_nguoi_dung',$ma_nguoi_dung)->get();
        $nguoi_dung = User::where('ma_nguoi_dung',$ma_nguoi_dung)->first();

        $sanpham = SanPham::with('file')->get();
        return view('user.taikhoan',compact('sanphamgiohang','sanpham','don_hang','dia_chi','nguoi_dung'));
        
    }

}

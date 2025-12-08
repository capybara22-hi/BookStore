<?php

namespace App\Http\Controllers;

use App\Models\ChiTietPhieuNhap;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\DonHang;
use App\Models\PhieuNhap;

class BaoCaoNhapHangController extends Controller
{
    public function index()
    {
        $nguoi_dung = User::all();
        $don_hang = DonHang::all();
        $phieu_nhap_hang = PhieuNhap::all();
        $chi_tiet_phieu_nhap = ChiTietPhieuNhap::all();

        return view('admin.baocaonhaphang', compact('nguoi_dung', 'don_hang', 'phieu_nhap_hang', 'chi_tiet_phieu_nhap'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\DiaChi;
use App\Models\SanPham;
use App\Models\GioHang;
use App\Models\File;
use App\Models\VanChuyen;
use App\Models\KhuyenMai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GioHangController extends Controller
{
    public function index()
    {
        //lấy tất cả ds giỏ hàng 
        $ma_nguoi_dung = Auth::id(); // lấy user đang đăng nhập
        $sanphamgiohang = GioHang::with('sanpham')
            ->where('ma_nguoi_dung', $ma_nguoi_dung)
            ->get();

        $sanpham = SanPham::with('file')->get();

        $ds_khuyen_mai = KhuyenMai::whereNotNull('so_luong')
            ->where('so_luong', '>', 0)
            ->get();

        $ds_van_chuyen = VanChuyen::all();

        // truyền dữ liệu sang view
        return view('user.giohang', compact('sanphamgiohang', 'sanpham', 'ds_van_chuyen', 'ds_khuyen_mai'));
    }

    public function updateQuantity(Request $request)
    {
        $gioHang = GioHang::find($request->ma_gio_hang);

        if (!$gioHang) {
            return response()->json(['error' => 'Giỏ hàng không tồn tại'], 404);
        }

        // Cập nhật số lượng và tổng tiền
        $gioHang->so_luong_sp = $request->so_luong_sp;
        $gioHang->tong_tien = $gioHang->gia_sp * $gioHang->so_luong_sp;
        $gioHang->save();

        return response()->json([
            'success' => true,
            'ma_gio_hang' => $gioHang->ma_gio_hang,
            'so_luong_sp' => $gioHang->so_luong_sp,
            'tong_tien' => number_format($gioHang->tong_tien)
        ]);
    }

    public function luuSession(Request $request)
    {
        session([
            'ma_vc'         => $request->ma_vc,
            'phi_vc'        => $request->phi_vc,
            'tien_hang'     => $request->tien_hang,
            'tien_giam'     => $request->tien_giam,
            'thanh_tien'    => $request->thanh_tien,
            'ma_khuyen_mai' => $request->ma_khuyen_mai,
        ]);

        return response()->json([
            'status' => 'success',
            'session' => session()->all()
        ]);
    }


    public function xoaSanPham(Request $req)
    {
        $id = $req->ma_gio_hang;

        if (!$id) {
            return response()->json([
                'status' => 'error',
                'message' => 'Thiếu mã giỏ hàng'
            ], 400);
        }

        $gh = GioHang::where('ma_gio_hang', $id)->first();

        if (!$gh) {
            return response()->json([
                'status' => 'error',
                'message' => 'Sản phẩm không tồn tại'
            ], 404);
        }

        $gh->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Đã xóa sản phẩm'
        ]);
    }

    public function dathang()
    {

        $ma_nguoi_dung = Auth::id(); // lấy user đang đăng nhập
        $sanphamgiohang = GioHang::with('sanpham')
            ->where('ma_nguoi_dung', $ma_nguoi_dung)
            ->get();

        $sanpham = SanPham::with('file')->get();

        // Lấy tất cả địa chỉ của user hiện tại
        $dia_chi = DiaChi::where('ma_nguoi_dung', $ma_nguoi_dung)->get();

        // Lấy địa chỉ mặc định của user (nếu có)
        $dia_chi_mac_dinh = DiaChi::where('ma_nguoi_dung', $ma_nguoi_dung)
            ->where('mac_dinh', 1)
            ->first();

        $ds_khuyen_mai = KhuyenMai::whereNotNull('so_luong')
            ->where('so_luong', '>', 0)
            ->get();

        $ds_van_chuyen = VanChuyen::all();

        // Lấy thông tin giảm giá từ session
        $tien_giam = session('tien_giam', 0);
        $ma_khuyen_mai = session('ma_khuyen_mai', null);

        return view('user.dathang', compact('sanphamgiohang', 'sanpham', 'dia_chi', 'dia_chi_mac_dinh', 'ds_van_chuyen', 'tien_giam', 'ma_khuyen_mai'));
    }
}

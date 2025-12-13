<?php

namespace App\Http\Controllers;

use App\Models\SanPham;
use App\Models\GioHang;
use App\Models\File;
use App\Models\VanChuyen;
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

        $ds_van_chuyen = VanChuyen::all();

        // truyền dữ liệu sang view
        return view('user.giohang',compact('sanphamgiohang','sanpham','ds_van_chuyen'));
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

    public function luuSession(Request $request) {
        session([
            'ma_vc' => $request->ma_vc,
            'phi_vc' => $request->phi_vc,
            'thanh_tien' => $request->thanh_tien,
            'tien_hang' => $request->tien_hang
        ]);

        return response()->json(['status' => 'ok']);
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

    
}

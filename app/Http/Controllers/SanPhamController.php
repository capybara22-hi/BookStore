<?php

namespace App\Http\Controllers;

use App\Models\SanPham;
use App\Models\GioHang;
use Illuminate\Http\Request;

class SanPhamController extends Controller
{
    //
    public function index($id){
        $sanpham = SanPham::with('file')->findOrFail($id);
        return view('user.chitietsanpham', compact('sanpham'));
    }

    public function themVaoGioHang(Request $request , $id){

        $ma_nguoi_dung = 1;
        // lấy thông tin sản phẩm theo id
        $sanpham = SanPham::findOrFail($id);

        // lấy số lượng sản phẩm đã được chọn
        $soLuong = $request->input('so_luong_sp', 1);

        //tính tổng tiền
        $tongTien = $soLuong * $sanpham->gia_tien_sp;
        
        // lấy thông tin giỏ hàng theo mã sản phẩm
        $giohang = GioHang::where('ma_nguoi_dung', $ma_nguoi_dung)
                      ->where('ma_san_pham', $sanpham->ma_san_pham)
                      ->first();

        if (!$giohang) {
            
            GioHang::create([
                'ma_nguoi_dung' => $ma_nguoi_dung,
                'ma_san_pham'   => $sanpham->ma_san_pham,
                'ten_sp'        => $sanpham->ten_san_pham,
                'gia_sp'        => $sanpham->gia_tien_sp,
                'so_luong_sp'   => $soLuong,
                'tong_tien'     => $tongTien,
            ]);
        } else {
          
            $giohang->so_luong_sp += $soLuong;
            $giohang->tong_tien = $giohang->so_luong_sp * $giohang->gia_sp;
            $giohang->save();
        }
            

            return redirect()->back()->with('success', 'Sản phẩm đã được thêm vào giỏ hàng!');
        
        
        
    }
    // public function anhBia()
    // {
    //     return $this->hasOne(File::class, 'ma_san_pham', 'ma_san_pham')
    //                 ->where('bia_san_pham', 1);
    // }
}

<?php

namespace App\Http\Controllers;

use App\Models\SanPham;
use App\Models\GioHang;
use App\Models\YeuThich;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SanPhamController extends Controller
{
    // CHI TIẾT SẢN PHẨM
    public function index($id)
    {
        $userId = Auth::id(); // lấy user đang đăng nhập

        $sanpham = SanPham::with([
            'file',
            'reviews.user'
        ])->findOrFail($id);

        $avgRating = round($sanpham->reviews->avg('rating'), 1);
        $totalReviews = $sanpham->reviews->count();

        // 🔥 kiểm tra sản phẩm có trong giỏ hàng chưa (chưa mua)
        $daCoTrongGio = false;

        if ($userId) {
            $daCoTrongGio = GioHang::where('ma_nguoi_dung', $userId)
                ->where('ma_san_pham', $id)
                ->where('trang_thai_mua', 0)
                ->exists();
        }

        $daYeuThich = false;

        if ($userId) {
            $daYeuThich = YeuThich::where('ma_nguoi_dung', $userId)
                ->where('ma_san_pham', $id)
                ->exists();
        }


        return view('user.chitietsanpham', compact(
            'sanpham',
            'avgRating',
            'totalReviews',
            'daCoTrongGio',
            'daYeuThich'
        ));
    }

    // THÊM GIỎ HÀNG
    public function themVaoGioHang(Request $request, $id)
    {
        $userId = Auth::id();
        if (!$userId) {
            return redirect()->route('login');
        }

        $sanpham = SanPham::findOrFail($id);
        $soLuong = $request->so_luong_sp ?? 1;

        $giohang = GioHang::where('ma_nguoi_dung', $userId)
            ->where('ma_san_pham', $id)
            ->where('trang_thai_mua', 0)
            ->first();

        if ($giohang) {
            return back()->with('success', 'Sản phẩm đã có trong giỏ hàng');
        }

        GioHang::create([
            'ma_nguoi_dung' => $userId,
            'ma_san_pham' => $id,
            'ten_sp' => $sanpham->ten_san_pham,
            'gia_sp' => $sanpham->gia_tien_sp,
            'so_luong_sp' => $soLuong,
            'tong_tien' => $soLuong * $sanpham->gia_tien_sp,
        ]);

        return back()->with('success', 'Đã thêm vào giỏ hàng');
    }

    // // YÊU THÍCH
    // public function yeuThich($id)
    // {
    //     $userId = Auth::id();
    //     if (!$userId) {
    //         return redirect()->route('login');
    //     }

    //     YeuThich::firstOrCreate([
    //         'ma_nguoi_dung' => $userId,
    //         'ma_san_pham' => $id
    //     ]);

    //     return back();
    // }
}

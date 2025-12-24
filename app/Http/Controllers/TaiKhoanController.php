<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GioHang;
use App\Models\User;
use App\Models\File;
use App\Models\DonHang;
use App\Models\SanPham;
use App\Models\DiaChi;
use App\Models\YeuThich;
use App\Models\Review;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TaiKhoanController extends Controller
{
    public function index()
    {
        $ma_nguoi_dung = Auth::id(); // lấy user đang đăng nhập
        $don_hang = DonHang::where('ma_nguoi_dung', $ma_nguoi_dung)->get();
        $sanphamgiohang = GioHang::with('sanpham')
            ->where('ma_nguoi_dung', $ma_nguoi_dung)
            ->get();

        $dia_chi = DiaChi::where('ma_nguoi_dung', $ma_nguoi_dung)->get();
        $nguoi_dung = User::where('ma_nguoi_dung', $ma_nguoi_dung)->first();
        $yeu_thich = YeuThich::with('sanpham')->where('ma_nguoi_dung', $ma_nguoi_dung)->get();
        $reviews = Review::with('sanpham') // load sản phẩm kèm review
            ->where('ma_nguoi_dung', auth()->id())
            ->get();

        $sanpham = SanPham::with('file')->get();
        return view('user.taikhoan', compact('sanphamgiohang', 'sanpham', 'don_hang', 'dia_chi', 'nguoi_dung', 'yeu_thich', 'reviews'));
    }


    public function huy($id)
    {
        try {
            DB::beginTransaction();

            $dh = DonHang::lockForUpdate()->find($id);
            if (!$dh) {
                return response()->json(['status' => 'error', 'message' => 'Đơn hàng không tồn tại'], 404);
            }

            // Kiểm tra quyền hủy đơn
            if ($dh->ma_nguoi_dung != Auth::id()) {
                return response()->json(['status' => 'error', 'message' => 'Không có quyền hủy đơn này'], 403);
            }

            // Chỉ cho phép hủy nếu đơn hàng chưa giao
            if ($dh->trang_thai_dh >= 4) {
                return response()->json(['status' => 'error', 'message' => 'Không thể hủy đơn hàng đã giao'], 400);
            }

            $dh->trang_thai_dh = 5; // Hủy
            $dh->save();

            // Hoàn lại số lượng sản phẩm (dùng increment an toàn)
            $items = GioHang::where('ma_don_hang', $dh->ma_don_hang)->get();
            foreach ($items as $item) {
                SanPham::where('ma_san_pham', $item->ma_san_pham)
                    ->increment('so_luong_sp', $item->so_luong_sp);
            }

            DB::commit();
            return response()->json(['status' => 'success']);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['status' => 'error', 'message' => 'Hủy đơn thất bại'], 500);
        }
    }

    public function nhanHang($maDH)
    {
        $dh = DonHang::where('ma_don_hang', $maDH)->first();
        if ($dh) {
            $dh->trang_thai_dh = 4; // Đã giao
            $dh->save();
            return response()->json(['status' => 'success']);
        }
        return response()->json(['status' => 'error'], 404);
    }
}

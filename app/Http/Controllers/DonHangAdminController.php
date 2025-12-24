<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\DonHang;
use Illuminate\Support\Facades\DB;

class DonHangAdminController extends Controller
{
    public function index()
    {
        $nguoi_dung = User::all();
        $don_hang = DonHang::all();

        return view('admin.donhangadmin', compact('nguoi_dung', 'don_hang'));
    }

    // Xác nhận trạng thái đơn hàng theo luồng:
    // 1 (chờ xác nhận) -> 2
    // 2 (chuẩn bị) -> 3
    // 3 (đang giao) -> 4
    public function confirm($id)
    {
        $donhang = DonHang::findOrFail($id);

        if ($donhang->trang_thai_dh == 1) {
            $donhang->trang_thai_dh = 2;
        } elseif ($donhang->trang_thai_dh == 2) {
            $donhang->trang_thai_dh = 3;
        } elseif ($donhang->trang_thai_dh == 3) {
            $donhang->trang_thai_dh = 4;
        } else {
            return back()->with('error', 'Không thể xác nhận trạng thái hiện tại');
        }

        $donhang->save();

        return back()->with('success', 'Cập nhật trạng thái đơn hàng thành công');
    }

    // Hủy đơn hàng: đặt trang_thai_dh = 5
    public function cancel($id)
    {
        try {
            DB::beginTransaction();

            $donhang = DonHang::lockForUpdate()->findOrFail($id);

            // Chỉ cho phép hủy nếu đơn hàng chưa giao hoặc đã hủy
            if ($donhang->trang_thai_dh >= 4) {
                return back()->with('error', 'Không thể hủy đơn hàng đã giao');
            }

            $donhang->trang_thai_dh = 5;
            $donhang->save();

            // Hoàn lại số lượng sản phẩm vào kho (dùng increment an toàn)
            $items = \App\Models\GioHang::where('ma_don_hang', $donhang->ma_don_hang)->get();
            foreach ($items as $item) {
                \App\Models\SanPham::where('ma_san_pham', $item->ma_san_pham)
                    ->increment('so_luong_sp', $item->so_luong_sp);
            }

            DB::commit();
            return back()->with('success', 'Đơn hàng đã được hủy');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Hủy đơn hàng thất bại: ' . $e->getMessage());
        }
    }

    // Hiển thị chi tiết đơn hàng (sử dụng bảng gio_hang cho các mục đơn)
    public function show($id)
    {
        $donhang = DonHang::with('user')->findOrFail($id);

        // Lấy các mục thuộc đơn (nhiều project dùng bảng gio_hang để lưu chi tiết khi đặt)
        $items = \App\Models\GioHang::where('ma_don_hang', $donhang->ma_don_hang)->get();

        return view('admin.donhang_detail', compact('donhang', 'items'));
    }
}

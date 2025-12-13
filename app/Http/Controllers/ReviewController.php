<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\GioHang;
use App\Models\DonHang;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'ma_don_hang' => 'required|integer',
            'rating'      => 'required|integer|min:1|max:5',
            'comment'     => 'nullable|string'
        ]);

        $userId = Auth::id();

        // 🔹 Lấy danh sách sản phẩm trong đơn hàng
        $sanPhams = GioHang::where('ma_don_hang', $request->ma_don_hang)
            ->select('ma_san_pham')
            ->get();

        foreach ($sanPhams as $sp) {

            // ❗ Tránh đánh giá trùng
            $daDanhGia = Review::where('ma_nguoi_dung', $userId)
                ->where('ma_san_pham', $sp->ma_san_pham)
                ->exists();

            if ($daDanhGia) {
                continue;
            }

            Review::create([
                'ma_nguoi_dung' => $userId,
                'ma_san_pham'   => $sp->ma_san_pham,
                'rating'        => $request->rating,
                'comment'       => $request->comment,
                'edit_count'    => 0
            ]);

            DonHang::where('ma_don_hang', $request->ma_don_hang)
            ->update([
                'trang_thai_dh' => 6
            ]);
        }
        

        return back()->with('successDG', 'Đánh giá đơn hàng thành công');
    }

    public function edit($id)
    {
        $review = Review::where('ma_danh_gia', $id)
            ->where('ma_nguoi_dung', auth()->id())
            ->firstOrFail();

        return response()->json([
            'rating' => $review->rating,
            'comment' => $review->comment
        ]);
    }
    public function update(Request $request, $id)
    {
        $review = Review::where('ma_danh_gia', $id)
            ->where('ma_nguoi_dung', auth()->id())
            ->firstOrFail();

        if ($review->edit_count >= 2) {
            return back()->with('error', 'Bạn đã sửa tối đa 2 lần');
        }

        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string'
        ]);

        $review->update([
            'rating' => $request->rating,
            'comment' => $request->comment,
            'edit_count' => $review->edit_count + 1
        ]);

        return back()->with('success', 'Cập nhật đánh giá thành công');
    }


    public function destroy($id)
    {
        $review = Review::where('ma_danh_gia', $id)
            ->where('ma_nguoi_dung', auth()->id())
            ->firstOrFail();

        $review->delete();

        return back()->with('successXDG', 'Đã xóa đánh giá');
    }


}

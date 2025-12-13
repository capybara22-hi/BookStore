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

class TaiKhoanController extends Controller
{
    public function index(){
        $ma_nguoi_dung = Auth::id(); // lấy user đang đăng nhập
        $don_hang = DonHang::where('ma_nguoi_dung', $ma_nguoi_dung)->get();
        $sanphamgiohang = GioHang::with('sanpham')
        ->where('ma_nguoi_dung', $ma_nguoi_dung)
        ->get();

        $dia_chi = DiaChi::where('ma_nguoi_dung',$ma_nguoi_dung)->get();
        $nguoi_dung = User::where('ma_nguoi_dung',$ma_nguoi_dung)->first();
        $yeu_thich = YeuThich::with('sanpham')->where('ma_nguoi_dung', $ma_nguoi_dung)->get();
        $reviews = Review::with('sanpham') // load sản phẩm kèm review
                     ->where('ma_nguoi_dung', auth()->id())
                     ->get();

        $sanpham = SanPham::with('file')->get();
        return view('user.taikhoan',compact('sanphamgiohang','sanpham','don_hang','dia_chi','nguoi_dung','yeu_thich','reviews'));
        
    }

    // public function edit($id)
    // {
    //     $review = Review::findOrFail($id);

    //     // Kiểm tra user đăng nhập
    //     if (Auth::id() !== $review->ma_nguoi_dung) {
    //         return redirect()->back()->with('error', 'Bạn không có quyền chỉnh sửa đánh giá này.');
    //     }

    //     // Giới hạn chỉnh sửa tối đa 2 lần
    //     if ($review->edit_count >= 2) {
    //         return redirect()->back()->with('error', 'Bạn đã chỉnh sửa đánh giá tối đa 2 lần.');
    //     }

    //     // Trả về JSON để fill modal
    //     return response()->json($review);
    // }

    public function update(Request $request, $id)
    {
        $review = Review::findOrFail($id);

        if (Auth::id() !== $review->ma_nguoi_dung) {
            return redirect()->back()->with('error', 'Bạn không có quyền chỉnh sửa đánh giá này.');
        }

        if ($review->edit_count >= 2) {
            return redirect()->back()->with('error', 'Bạn đã chỉnh sửa đánh giá tối đa 2 lần.');
        }

        // Validate dữ liệu
        $validated = $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string|max:1000',
        ]);

        $review->update([
            'rating' => $validated['rating'],
            'comment' => $validated['comment'],
            'edit_count' => $review->edit_count + 1,
        ]);

        return redirect()->back()->with('success', 'Cập nhật review thành công');
    }

    public function destroy($id)
    {
        $review = Review::findOrFail($id);

        if (Auth::id() !== $review->ma_nguoi_dung) {
            return redirect()->back()->with('error', 'Bạn không có quyền xóa đánh giá này.');
        }

        $review->delete();
        return redirect()->back()->with('success', 'Đã xóa review');
    }

    public function huy($id){
        $dh = DonHang::find($id);
        if($dh){
            $dh->trang_thai_dh = 5; // Hủy
            $dh->save();
            return response()->json(['status'=>'success']);
        }
        return response()->json(['status'=>'error'], 404);
    }

    public function xacNhanNhanHang($id){
        $dh = DonHang::find($id);
        if($dh){
            $dh->trang_thai_dh = 4; // Đã giao
            $dh->save();
            return response()->json(['status'=>'success']);
        }
        return response()->json(['status'=>'error'], 404);
    }


}

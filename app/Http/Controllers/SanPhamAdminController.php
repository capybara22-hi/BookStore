<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SanPham;

class SanPhamAdminController extends Controller
{
    public function index()
    {
        $san_pham = SanPham::all();
        return view('admin.sanpham', compact('san_pham'));
    }

    public function toggleStatus($id)
    {
        $sp = SanPham::findOrFail($id);
        $sp->status = !$sp->status;
        $sp->save();

        return response()->json([
            'status' => $sp->status
        ]);
    }

    public function update(Request $request)
    {
        try {
            $sp = SanPham::findOrFail($request->ma_san_pham_edit);
            $sp->code = $request->ma_san_pham;
            $sp->ten_san_pham = $request->ten_san_pham;
            $sp->tac_gia = $request->tac_gia;
            $sp->gia_tien_sp = $request->gia_tien_sp;
            $sp->so_luong_sp = $request->so_luong_sp;
            $sp->mo_ta_san_pham = $request->mo_ta_san_pham;

            $sp->save();

            return redirect()->route('sanphamadmin')->with('success', 'Cập nhật sản phẩm thành công!');
        } catch (\Exception $e) {
            return redirect()->route('sanphamadmin')->with('error', 'Có lỗi xảy ra khi cập nhật sản phẩm!');
        }
    }
}

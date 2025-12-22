<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DiaChi;
use Illuminate\Support\Facades\Auth;

class DiaChiController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'dia_chi' => 'required|string|max:255',
            'sdt' => 'required|string|max:20',
        ]);

        DiaChi::create([
            'ma_nguoi_dung' => Auth::id(),
            'ten_nguoi_nhan' => $request->ten_nguoi_nhan,
            'dia_chi' => $request->dia_chi,
            'sdt' => $request->sdt,
            'mac_dinh' => 0, // mặc định
        ]);

        return redirect()->back()->with('successTDC', 'Địa chỉ đã được thêm!');
    }

    public function setMacDinh($id)
    {
        try {
            $userId = auth()->id();

            // reset địa chỉ mặc định
            DiaChi::where('ma_nguoi_dung', $userId)->update(['mac_dinh' => 0]);

            $diaChi = DiaChi::findOrFail($id);
            $diaChi->mac_dinh = 1;
            $diaChi->save();

            return response()->json(['status' => 'success']);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()], 500);
        }
    }

    public function destroy($id)
    {
        $diaChi = DiaChi::find($id);

        if (!$diaChi) {
            return response()->json(['status' => 'error', 'message' => 'Địa chỉ không tồn tại']);
        }

        $diaChi->delete();

        return response()->json(['status' => 'success', 'message' => 'Địa chỉ đã bị xóa']);
    }
}

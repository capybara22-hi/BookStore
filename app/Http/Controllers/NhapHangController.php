<?php

namespace App\Http\Controllers;

use App\Imports\NhapHangImport;
use App\Models\PhieuNhap;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class NhapHangController extends Controller
{
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls'
        ]);

        try {
            // Tạo phiếu nhập hàng trước
            $phieuNhap = PhieuNhap::create([
                'nguoi_nhap' => Auth::id(),
                'ngay_nhap' => now(),
            ]);

            // Truyền phieu_nhap_id vào Import class
            Excel::import(new NhapHangImport($phieuNhap->id), $request->file('file'));

            return redirect()->back()->with('success', 'Nhập hàng thành công!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Lỗi khi nhập hàng: ' . $e->getMessage());
        }
    }
}

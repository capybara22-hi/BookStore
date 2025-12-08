<?php

namespace App\Http\Controllers;

use App\Imports\NhapHangImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class NhapHangController extends Controller
{
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls'
        ]);

        try {
            Excel::import(new NhapHangImport, $request->file('file'));
            return redirect()->back()->with('success', 'Nhập hàng thành công!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Lỗi khi nhập hàng: ' . $e->getMessage());
        }
    }
}

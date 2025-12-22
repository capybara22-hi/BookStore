<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\VanChuyen;

class VanChuyenController extends Controller
{
    public function index()
    {
        // Hiển thị theo thứ tự tăng dần của mã vận chuyển
        $vanchuyens = VanChuyen::orderBy('ma_van_chuyen','asc')->paginate(20);
        return view('admin.vanchuyen.index', compact('vanchuyens'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'dv_van_chuyen' => 'required|string|max:255',
            'so_tien' => 'required|numeric',
            'mo_ta' => 'nullable|string',
            'dieu_kien' => 'nullable|string'
        ]);

        VanChuyen::create($request->only(['dv_van_chuyen','so_tien','mo_ta','dieu_kien']));

        return redirect()->route('vanchuyen.index')->with('success','Đã thêm phương thức vận chuyển');
    }

    public function edit($id)
    {
        $item = VanChuyen::findOrFail($id);
        return view('admin.vanchuyen.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'dv_van_chuyen' => 'required|string|max:255',
            'so_tien' => 'required|numeric',
            'mo_ta' => 'nullable|string',
            'dieu_kien' => 'nullable|string'
        ]);

        $vc = VanChuyen::findOrFail($id);
        $vc->update($request->only(['dv_van_chuyen','so_tien','mo_ta','dieu_kien']));

        return redirect()->route('vanchuyen.index')->with('success','Đã cập nhật phương thức vận chuyển');
    }

    public function destroy($id)
    {
        VanChuyen::destroy($id);
        return redirect()->route('vanchuyen.index')->with('success','Đã xóa phương thức vận chuyển');
    }
}

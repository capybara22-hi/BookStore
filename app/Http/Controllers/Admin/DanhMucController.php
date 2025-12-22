<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DanhMuc;
use App\Models\TheLoai;
use App\Models\SanPham;
use Illuminate\Http\Request;

class DanhMucController extends Controller
{
    public function index()
    {
        // Hiển thị theo thứ tự tăng dần
        $danhmucs = DanhMuc::orderBy('ma_danh_muc', 'asc')->paginate(20);
        $theloais = TheLoai::orderBy('ma_the_loai', 'asc')->get();
        return view('admin.danhmuc.index', compact('danhmucs', 'theloais'));
    }

    public function create()
    {
        return redirect()->route('danhmuc.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'ten_danh_muc' => 'required|string|max:255',
        ]);

        $dm = DanhMuc::create($request->only('ten_danh_muc'));

        // Nếu có tên thể loại kèm theo, tạo thể loại liên kết với danh mục vừa tạo
        if ($request->filled('ten_the_loai')) {
            TheLoai::create([
                'ma_danh_muc' => $dm->ma_danh_muc,
                'ten_the_loai' => $request->ten_the_loai,
            ]);
        }

        return redirect()->route('danhmuc.index')->with('success', 'Đã thêm danh mục');
    }

    // Tạo thể loại (từ trang quản lý danh mục)
    public function storeTheLoai(Request $request)
    {
        $request->validate([
            'ma_danh_muc' => 'required|exists:danh_muc,ma_danh_muc',
            'ten_the_loai' => 'required|string|max:255',
        ]);

        TheLoai::create($request->only('ma_danh_muc', 'ten_the_loai'));

        return redirect()->route('danhmuc.index')->with('success', 'Đã thêm thể loại');
    }

    public function edit($id)
    {
        $item = DanhMuc::findOrFail($id);
        return view('admin.danhmuc.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'ten_danh_muc' => 'required|string|max:255',
        ]);

        $m = DanhMuc::findOrFail($id);
        $m->ten_danh_muc = $request->ten_danh_muc;
        $m->save();

        return redirect()->route('danhmuc.index')->with('success', 'Đã cập nhật danh mục');
    }

    public function destroy(Request $request, $id)
    {
        $danhmuc = DanhMuc::findOrFail($id);
        $count = TheLoai::where('ma_danh_muc', $id)->count();

        // Nếu có thể loại liên kết và chưa có xác nhận thì hiển thị trang xác nhận
        if ($count > 0 && !$request->filled('confirm')) {
            $theloais = TheLoai::where('ma_danh_muc', $id)->get();
            return view('admin.danhmuc.confirm_delete_danhmuc', compact('danhmuc', 'theloais'));
        }

        // Nếu xác nhận (hoặc không có thể loại): cập nhật ma_danh_muc cho thể loại thành 21 rồi xóa
        if ($count > 0) {
            TheLoai::where('ma_danh_muc', $id)->update(['ma_danh_muc' => 21]);
        }

        $danhmuc->delete();
        return redirect()->route('danhmuc.index')->with('success', 'Đã xóa danh mục');
    }

    public function show($id)
    {
        return redirect()->route('danhmuc.index');
    }

    public function editTheLoai($id)
    {
        $item = TheLoai::findOrFail($id);
        $danhmucs = DanhMuc::orderBy('ma_danh_muc','asc')->get();
        return view('admin.danhmuc.edit_theloai', compact('item','danhmucs'));
    }

    public function updateTheLoai(Request $request, $id)
    {
        $request->validate([
            'ten_the_loai' => 'required|string|max:255',
            'ma_danh_muc' => 'required|exists:danh_muc,ma_danh_muc',
        ]);

        $tl = TheLoai::findOrFail($id);
        $tl->ten_the_loai = $request->ten_the_loai;
        $tl->ma_danh_muc = $request->ma_danh_muc;
        $tl->save();

        return redirect()->route('danhmuc.index')->with('success', 'Đã cập nhật thể loại');
    }

    public function destroyTheLoai(Request $request, $id)
    {
        $theloai = TheLoai::findOrFail($id);
        $count = SanPham::where('ma_the_loai', $id)->count();

        // Nếu có sản phẩm gán và chưa xác nhận, hiển thị trang xác nhận
        if ($count > 0 && !$request->filled('confirm')) {
            $products = SanPham::where('ma_the_loai', $id)->get();
            return view('admin.danhmuc.confirm_delete_theloai', compact('theloai', 'products'));
        }

        // Nếu xác nhận hoặc không có sản phẩm: set ma_the_loai = 0 cho các sản phẩm và xóa thể loại
        if ($count > 0) {
            SanPham::where('ma_the_loai', $id)->update(['ma_the_loai' => 1]);
        }

        $theloai->delete();
        return redirect()->route('danhmuc.index')->with('success', 'Đã xóa thể loại');
    }

    // Hiển thị tất cả sản phẩm để chọn/gán cho thể loại
    public function showSanPham($id)
    {
        $theloai = TheLoai::findOrFail($id);
        $products = SanPham::orderBy('ma_san_pham','asc')->paginate(50);
        return view('admin.danhmuc.theloai_products', compact('theloai','products'));
    }

    // Gán các sản phẩm được chọn cho thể loại
    public function assignSanPham(Request $request, $id)
    {
        $theloai = TheLoai::findOrFail($id);
        $ids = $request->input('product_ids', []);

        // Bỏ gán trước đó của thể loại này
        SanPham::where('ma_the_loai', $id)->update(['ma_the_loai' => null]);

        if (!empty($ids)) {
            SanPham::whereIn('ma_san_pham', $ids)->update(['ma_the_loai' => $id]);
        }

        return redirect()->route('danhmuc.theloai.sanpham', $id)->with('success', 'Đã gán sản phẩm cho thể loại');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\DanhMuc;
use App\Models\TheLoai;
use App\Models\SanPham;
use Illuminate\Http\Request;

class DanhMucController extends Controller
{
    public function index()
    {
        // Lấy tất cả danh mục và load kèm các thể loại tương ứng
        $danhmucs = DanhMuc::with('theloai')->get();

        // Lấy tất cả sản phẩm và load kèm các file tương ứng
        $sanphams = SanPham::with('file')->get();

        // Truyền dữ liệu sang view
        return view('user.sanpham', compact('danhmucs', 'sanphams'));
    }
}

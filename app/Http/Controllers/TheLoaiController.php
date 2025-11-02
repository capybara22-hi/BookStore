<?php

namespace App\Http\Controllers;

use App\Models\DanhMuc;
use App\Models\TheLoai;
use Illuminate\Http\Request;

class TheLoaiController extends Controller
{
    //
    public function index()
    {
        // Lấy tất cả thể loại cùng với danh mục liên kết (nếu có)
        $dstheloai = TheLoai::all();

        // Trả dữ liệu cho view
        return view('user.sanpham', compact('dstheloai'));
    }
}

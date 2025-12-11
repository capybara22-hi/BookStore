<?php

namespace App\Http\Controllers;

use App\Models\DanhMuc;
use App\Models\TheLoai;
use App\Models\SanPham;
use Illuminate\Http\Request;

class DanhMucController extends Controller
{
    public function index(Request $request)
    {
        $danhmucs = DanhMuc::with('theloai')->get();
        $keyword = $request->input('keySearch');
        $priceRange = $request->input('priceRange'); 
        $sapXep = $request->input('sapXep');
        $xoaAllBoLoc = $request->input('xoaAllBoLoc');
        $xoaBoLoc = $request->input('xoaBoLoc');
        $xoaSapXep = $request->input('xoaSapXep');
        $ma_the_loai = $request->input('ma_the_loai');
        $tentl = TheLoai::where('ma_the_loai', $ma_the_loai)->first();
        $query = SanPham::with('file','theloaisp');


        if($xoaAllBoLoc == "xoaAll"){
            $keyword = null;
            $priceRange = null;
            $sapXep = null;
        }

        if($xoaBoLoc == "xoaBoLoc"){
            $priceRange = null;
        }

        if($xoaSapXep == "xoaSapXep"){
            $sapXep = null;
        }

        if(!empty($ma_the_loai)){
            $query->where('ma_the_loai', $ma_the_loai);
        }

        if (!empty($keyword)) {
            // Có từ khóa → tìm kiếm
            $query->where('ten_san_pham', 'like', '%' . $keyword . '%');
        } 

        // Lọc theo khoảng giá
        switch ($priceRange) {
            case '5':
                $query->where('gia_tien_sp', '<', 5000);
                break;
            case '5to10':
                $query->whereBetween('gia_tien_sp', [5000, 10000]);
                break;
            case '10to20':
                $query->whereBetween('gia_tien_sp', [10000, 20000]);
                break;
            case '20to50':
                $query->whereBetween('gia_tien_sp', [20000, 50000]);
                break;
            case '50':
                $query->where('gia_tien_sp', '>', 50000);
                break;
        }

        switch ($sapXep){
            case 'tang': // Giá: Thấp đến Cao
                $query->orderBy('gia_tien_sp', 'asc');
                break;

            case 'giam': // Giá: Cao đến Thấp
                $query->orderBy('gia_tien_sp', 'desc');
                break;

            default: // Nổi bật hoặc mặc định
                // có thể orderBy theo created_at hoặc bỏ qua
                break;

        }
        
         $sanphams = $query->get();

        return view('user.sanpham', compact('danhmucs', 'sanphams', 'keyword', 'priceRange', 'sapXep', 'ma_the_loai', 'tentl'));
    }
}

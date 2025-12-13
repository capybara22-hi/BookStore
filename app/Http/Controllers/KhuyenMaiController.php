<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KhuyenMai;

class KhuyenMaiController extends Controller
{
    public function index(){
        $dskm = KhuyenMai::all();
        return view('admin.khuyenmai' , compact("dskm"));
    }

    public function themKM(Request $request){
        // Insert vao bang khuyen_mai
        $data = $request->json()->all(); // lay du lieu json
        $khuyen_mai = KhuyenMai::create([
            'nd_khuyen_mai' => $data['nd_km'],
            'phan_tram_giam' => $data['phan_tram'],
            'gia_don_hang' =>  $data['gia_don'],
            'ngay_bat_dau' =>  $data['tg_bd'],
            'ngay_ket_thuc' =>  $data['tg_kt']
        ]);

        return response()->json([
            'thanh cong' => true,
            'data' => $khuyen_mai
        ]);
    }

    public function xoaKM(Request $request){
        //xoa khuyen mai
        $data = $request->json()->all();
        $maKmXoa = KhuyenMai::findOrFail($data['id_xoa']);
        
        $maKmXoa->delete();
        return response()->json([
            'success' => true,
            'message' => 'Khuyến mãi đã được xóa!'
        ]);
    }

    public function suaKM(Request $request)
    {
        // Lấy dữ liệu JSON gửi từ Fetch
        $data = $request->json()->all();
        
        // Tìm khuyến mãi theo ID
        $km = KhuyenMai::findOrFail($data['id_sua']);

        // Cập nhật dữ liệu
        $km->update([
            'nd_khuyen_mai' => $data['nd_km'],
            'phan_tram_giam' => $data['phan_tram'],
            'gia_don_hang' => $data['gia_don'],
            'ngay_bat_dau' => $data['tg_bd'],
            'ngay_ket_thuc' => $data['tg_kt']
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Cập nhật khuyến mãi thành công!',
            'data' => $km
        ]);
    }

    
}

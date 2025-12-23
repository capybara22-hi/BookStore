<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KhuyenMai;
use Carbon\Carbon;

class KhuyenMaiController extends Controller
{
    public function index(){
        $dskm = KhuyenMai::all();
        return view('admin.khuyenmai' , compact("dskm"));
    }

    public function themKM(Request $request){
        // Insert vao bang khuyen_mai
        $data = $request->json()->all(); // lay du lieu json
        // Validate thời gian: kết thúc không sớm hơn bắt đầu
        if (isset($data['tg_bd']) && isset($data['tg_kt'])) {
            $bd = strtotime($data['tg_bd']);
            $kt = strtotime($data['tg_kt']);
            if ($kt < $bd) {
                return response()->json([
                    'success' => false,
                    'message' => 'Thời gian kết thúc không được sớm hơn thời gian bắt đầu.'
                ], 422);
            }
        }
        // Validate phần trăm giảm: phải là số trong khoảng 0-100
        if (isset($data['phan_tram'])) {
            if (!is_numeric($data['phan_tram']) || $data['phan_tram'] < 0 || $data['phan_tram'] > 100) {
                return response()->json([
                    'success' => false,
                    'message' => 'Phần trăm giảm phải là số từ 0 đến 100.'
                ], 422);
            }
        }
        $khuyen_mai = KhuyenMai::create([
            'nd_khuyen_mai' => $data['nd_km'],
            'phan_tram_giam' => $data['phan_tram'],
            'gia_don_hang' =>  $data['gia_don'],
            'ngay_bat_dau' =>  $data['tg_bd'],
            'ngay_ket_thuc' =>  $data['tg_kt'],
            'so_luong' =>  $data['so_luong']
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
        // Validate thời gian: kết thúc không sớm hơn bắt đầu
        if (isset($data['tg_bd']) && isset($data['tg_kt'])) {
            $bd = strtotime($data['tg_bd']);
            $kt = strtotime($data['tg_kt']);
            if ($kt < $bd) {
                return response()->json([
                    'success' => false,
                    'message' => 'Thời gian kết thúc không được sớm hơn thời gian bắt đầu.'
                ], 422);
            }
        }
        // Validate phần trăm giảm: phải là số trong khoảng 0-100
        if (isset($data['phan_tram'])) {
            if (!is_numeric($data['phan_tram']) || $data['phan_tram'] < 0 || $data['phan_tram'] > 100) {
                return response()->json([
                    'success' => false,
                    'message' => 'Phần trăm giảm phải là số từ 0 đến 100.'
                ], 422);
            }
        }
        $km->update([
            'nd_khuyen_mai' => $data['nd_km'],
            'phan_tram_giam' => $data['phan_tram'],
            'gia_don_hang' => $data['gia_don'],
            'ngay_bat_dau' => $data['tg_bd'],
            'ngay_ket_thuc' => $data['tg_kt'],
            'so_luong' => $data['so_luong']
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Cập nhật khuyến mãi thành công!',
            'data' => $km
        ]);
    }

    
}

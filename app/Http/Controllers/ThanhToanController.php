<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GioHang;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class ThanhToanController extends Controller
{
    public function show()
    {
        // Lấy thông tin giỏ hàng
        $giohang = GioHang::with('sanpham')->get();
        // Tính tổng tiền (giả sử có cột 'so_luong' và 'don_gia')
        $tong_tien = $giohang->sum('tong_tien');

        // Dữ liệu cần hiển thị khi quét QR (có thể là nội dung chuyển khoản)
        $noi_dung_qr = "Thanh toan don hang : " . " - So tien: " . number_format($tong_tien, 0, ',', '.') . " VND";

        // Tạo mã QR
        $qrcode = QrCode::size(250)->generate($noi_dung_qr);

        return view('user.thanhtoan', compact('giohang', 'tong_tien', 'qrcode'));
    }
}

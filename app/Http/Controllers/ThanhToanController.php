<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GioHang;
use App\Models\ThanhToan;
use App\Models\User;
use App\Models\VanChuyen;
use App\Models\DonHang;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Auth;

class ThanhToanController extends Controller
{
    public function show()
    {
        // dd(session()->all());
        $ma_nguoi_dung = Auth::id(); // lấy user đang đăng nhập
        $ma_vc = session('ma_vc');
        $phi_vc = session('phi_vc');
        $thanh_tien = session('thanh_tien');
        $tien_hang = session('tien_hang');
        $tien_giam = session('tien_giam');
        $ma_khuyen_mai = session('ma_khuyen_mai');

        // Lấy thông tin giỏ hàng
        $giohang = GioHang::with('sanpham')->where('ma_nguoi_dung', $ma_nguoi_dung)->where('trang_thai_mua',0)->get();
        $nguoidung = User::where('ma_nguoi_dung', $ma_nguoi_dung)->first();
        $thanhtoan = ThanhToan::first();
        $ma_nh = $thanhtoan->ngan_hang;
        $tai_khoan = $thanhtoan->so_tk;
        $noi_dung = urlencode($nguoidung->name .'- Thanh toán tiền sách -'.  $nguoidung->ma_nguoi_dung );
        // // Tính tổng tiền (giả sử có cột 'so_luong' và 'don_gia')
        // $tong_tien = $giohang->sum('tong_tien');

        // Dữ liệu cần hiển thị khi quét QR (có thể là nội dung chuyển khoản)
        // $noi_dung_qr = "Thanh toan don hang : <br>" . " - So tien: " . number_format($tong_tien, 0, ',', '.') . " VND";

        // Tạo mã QR
        $qrcode = "https://img.vietqr.io/image/{$ma_nh}-{$tai_khoan}-compact2.png?amount={$thanh_tien}&addInfo={$noi_dung}";

        return view('user.thanhtoan', compact('giohang', 'qrcode','thanhtoan','nguoidung', 'tien_giam'));
    }

    // public function luuSession1(Request $request) {
    //     session([
    //         'trang_thai' => $request->trang_thai,
    //     ]);

    //     return response()->json(['status' => 'ok']);
    // }

    public function updateTrangThai(Request $request)
    {
        
        $ma_nguoi_dung = Auth::id(); // lấy user đang đăng nhập
        $gioHang = GioHang::where('ma_nguoi_dung', $ma_nguoi_dung)->get();

        if (!$gioHang) {
            return response()->json(['error' => 'Giỏ hàng không tồn tại'], 404);
        }

        // Cập nhật số lượng và tổng tiền
        foreach ($gioHang as $gh) {
            if ($gh->trang_thai_mua == 0){
                $gh->trang_thai_mua = $request->trang_thai;
                $gh->save();
            }
            
        }

        // Lấy dữ liệu từ session để tạo đơn hàng
        $ma_vc = session('ma_vc');
        $phi_vc = session('phi_vc');
        $thanh_tien = session('thanh_tien');
        $tien_hang = session('tien_hang');
        $tien_giam = session('tien_giam');
        $ma_khuyen_mai = session('ma_khuyen_mai');

        if (!$ma_vc || !$phi_vc || !$thanh_tien || !$tien_hang) {
            return response()->json(['error' => 'Thiếu dữ liệu session'], 400);
        }

        $van_chuyen = VanChuyen::where("ma_van_chuyen", $ma_vc)->first();
        if (!$van_chuyen) {
            return response()->json(['error' => 'Không tìm thấy vận chuyển', 'ma_vc' => session('ma_vc')], 404);
        }

        // Insert đơn hàng
        $don_hang = DonHang::create([
            'ma_nguoi_dung' => $ma_nguoi_dung,
            'tien_hang' => $tien_hang,
            'loai_van_chuyen' => $van_chuyen->dv_van_chuyen,
            'phi_van_chuyen' => $phi_vc,
            'thanh_tien' => $thanh_tien,
            'giam_gia' => $tien_giam,
            'ma_khuyen_mai' => $ma_khuyen_mai
        ]);

        // lấy mã đơn hàng vừa tạo 
        $ma_don_hang = $don_hang->ma_don_hang;

        // cap nhat mã đơn hàng trong giỏ hàng
        foreach ($gioHang as $gh){
            if($gh->ma_don_hang == 0){
                $gh->ma_don_hang = $ma_don_hang;
                $gh->save();
            }
        }
        return response()->json([
            'successTDH' => true,
            'trang_thai_mua' => $request->trang_thai,
            'don_hang' => 'Đã tạo đơn hàng thành công'
        ]);
    }

}

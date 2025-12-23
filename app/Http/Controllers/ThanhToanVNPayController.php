<?php

namespace App\Http\Controllers;

use App\Mail\DonHangMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\GioHang;
use App\Models\DonHang;
use App\Models\VanChuyen;
use App\Models\DiaChi;
use App\Models\KhuyenMai;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class ThanhToanVNPayController extends Controller
{
    public function vnpay_payment(Request $request)
    {
        // Tạo đơn hàng trước khi chuyển sang VNPay
        $ma_nguoi_dung = Auth::id();
        $gioHang = GioHang::with('sanpham')
            ->where('ma_nguoi_dung', $ma_nguoi_dung)
            ->where('trang_thai_mua', 0)
            ->get();

        if ($gioHang->isEmpty()) {
            return response()->json(['error' => 'Giỏ hàng trống'], 400);
        }

        // Lấy dữ liệu từ session
        $ma_vc = session('ma_vc');
        $phi_vc = session('phi_vc');
        $thanh_tien = session('thanh_tien');
        $tien_hang = session('tien_hang');
        $tien_giam = session('tien_giam', 0);
        $ma_khuyen_mai = session('ma_khuyen_mai');

        if (!$ma_vc || $phi_vc === null || $thanh_tien === null || !$tien_hang) {
            return response()->json(['error' => 'Thiếu thông tin đơn hàng'], 400);
        }

        $van_chuyen = VanChuyen::where("ma_van_chuyen", $ma_vc)->first();
        $dia_chi = DiaChi::where('ma_nguoi_dung', $ma_nguoi_dung)
            ->where('mac_dinh', 1)
            ->first();

        if (!$dia_chi) {
            return response()->json(['error' => 'Chưa có địa chỉ mặc định'], 400);
        }

        // Tạo đơn hàng với trạng thái CHỜ THANH TOÁN
        // Chưa cập nhật giỏ hàng và khuyến mãi cho đến khi thanh toán thành công
        $don_hang = DonHang::create([
            'ma_nguoi_dung' => $ma_nguoi_dung,
            'tien_hang' => $tien_hang,
            'loai_van_chuyen' => $van_chuyen->dv_van_chuyen,
            'ma_khuyen_mai' => $ma_khuyen_mai,
            'giam_gia' => $tien_giam,
            'phi_van_chuyen' => $phi_vc,
            'thanh_tien' => $thanh_tien,
            'dia_chi' => $dia_chi->dia_chi,
            'ngay_dat_hang' => now(),
            'sdt' => $dia_chi->sdt,
            'ten_nguoi_nhan' => $dia_chi->ten_nguoi_nhan,
            'trang_thai_dh' => 0 // 0 = Chờ thanh toán, 1 = Đã thanh toán
        ]);

        // Lấy mã đơn hàng vừa tạo
        $ma_don_hang = $don_hang->ma_don_hang;

        // LƯU Ý: KHÔNG cập nhật giỏ hàng và khuyến mãi ở đây
        // Sẽ cập nhật trong vnpay_return() khi thanh toán thành công

        // Tạo link thanh toán VNPay
        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = url('/vnpay-return'); // URL callback sau khi thanh toán
        $vnp_TmnCode = "GROZ4UPP"; //Mã website tại VNPAY 
        $vnp_HashSecret = "7Y6W6STLJ6W7RNLQ84DJWH65CXI8DRFS"; //Chuỗi bí mật

        $vnp_TxnRef = $ma_don_hang; // Sử dụng mã đơn hàng thực tế
        $vnp_OrderInfo = 'Thanh toan don hang #' . $ma_don_hang;
        $vnp_OrderType = 'billpayment';
        $vnp_Amount = $thanh_tien * 100; // VNPay yêu cầu số tiền * 100
        $vnp_Locale = 'vn';
        // $vnp_BankCode = 'NCB';
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
        // $startTime = date("YmdHis");
        // $expire = date('YmdHis', strtotime('+15 minutes', strtotime($startTime)));


        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
            // "vnp_ExpireDate" => $expire
        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        // if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
        //     $inputData['vnp_Bill_State'] = $vnp_Bill_State;
        // }

        //var_dump($inputData);
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret); //  
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }
        // Redirect sang VNPay
        $returnData = array(
            'code' => '00',
            'message' => 'success',
            'data' => $vnp_Url
        );
        if (isset($_POST['redirect'])) {
            // header('Location: ' . $vnp_Url);
            return redirect()->to($vnp_Url);
            die();
        } else {
            echo json_encode($returnData);
        }
    }

    public function vnpay_return(Request $request)
    {
        $ma_nguoi_dung = Auth::id();
        $email = User::find($ma_nguoi_dung);
        // Xử lý kết quả trả về từ VNPay
        $vnp_ResponseCode = $request->input('vnp_ResponseCode');
        $ma_don_hang = $request->input('vnp_TxnRef');
        $vnp_Amount = $request->input('vnp_Amount');
        $vnp_SecureHash = $request->input('vnp_SecureHash');

        // Xác thực chữ ký từ VNPay
        $vnp_HashSecret = "7Y6W6STLJ6W7RNLQ84DJWH65CXI8DRFS";
        $inputData = [];
        foreach ($request->all() as $key => $value) {
            if (substr($key, 0, 4) == "vnp_" && $key != "vnp_SecureHash") {
                $inputData[$key] = $value;
            }
        }
        ksort($inputData);
        $hashData = "";
        $i = 0;
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashData .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashData .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
        }
        $secureHash = hash_hmac('sha512', $hashData, $vnp_HashSecret);

        // Kiểm tra chữ ký hợp lệ
        if ($secureHash != $vnp_SecureHash) {
            session()->flash('errorDC', 'Chữ ký không hợp lệ!');
            return redirect()->route('taikhoan');
        }

        // Tìm đơn hàng
        $don_hang = DonHang::find($ma_don_hang);
        if (!$don_hang) {
            session()->flash('errorDC', 'Không tìm thấy đơn hàng!');
            return redirect()->route('taikhoan');
        }

        if ($vnp_ResponseCode == '00') {
            // Thanh toán thành công - Cập nhật trạng thái
            $don_hang->trang_thai_dh = 1; // Đã thanh toán
            $don_hang->save();

            // Cập nhật giỏ hàng: đánh dấu đã mua
            $gioHang = GioHang::where('ma_nguoi_dung', $don_hang->ma_nguoi_dung)
                ->where('trang_thai_mua', 0)
                ->get();

            foreach ($gioHang as $gh) {
                $gh->trang_thai_mua = 1;
                $gh->ma_don_hang = $ma_don_hang;
                $gh->save();
            }

            // Giảm số lượng khuyến mãi
            if ($don_hang->ma_khuyen_mai) {
                KhuyenMai::where('ma_khuyen_mai', $don_hang->ma_khuyen_mai)
                    ->decrement('so_luong', 1);
            }

            Mail::to($email)->send(new DonHangMail($don_hang, $gioHang));


            session()->flash('don_hang', 'Thanh toán thành công! Đơn hàng #' . $ma_don_hang);
        } else {
            // Thanh toán thất bại - Cập nhật trạng thái hủy hoặc xóa đơn
            $don_hang->trang_thai_dh = 2; // 2 = Đã hủy
            $don_hang->save();

            session()->flash('errorDC', 'Thanh toán thất bại! Đơn hàng đã bị hủy.');
        }

        return redirect()->route('taikhoan');
    }
}

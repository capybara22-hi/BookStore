<?php

namespace App\Http\Controllers;

use App\Models\DonHang;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DoanhthuController extends Controller
{
    public function index(Request $request)
    {
        // Lấy tham số lọc từ request
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');
        $status = $request->input('status');

        // Khởi tạo query
        $query = DonHang::query();

        // Lọc theo ngày bắt đầu
        if ($startDate) {
            $query->whereDate('ngay_dat_hang', '>=', $startDate);
        }

        // Lọc theo ngày kết thúc
        if ($endDate) {
            $query->whereDate('ngay_dat_hang', '<=', $endDate);
        }

        // Lọc theo trạng thái
        if ($status) {
            switch ($status) {
                case 'completed':
                    $query->where('trang_thai_dh', 4); // Đã giao
                    break;
                case 'pending':
                    $query->whereIn('trang_thai_dh', [1, 2, 3]); // Đang xử lý, chuẩn bị, đang giao
                    break;
                case 'cancelled':
                    $query->where('trang_thai_dh', 5); // Đã hủy
                    break;
            }
        }

        // Lấy dữ liệu
        $list_don_hang = $query->with('user')->orderBy('ngay_dat_hang', 'desc')->get();
        $soDonHang = $query->count();
        $tong_tien = $query->sum('thanh_tien');

        // Tính giá trị trung bình
        $giaTriTB = $soDonHang > 0 ? $tong_tien / $soDonHang : 0;

        // Lấy dữ liệu cho biểu đồ (doanh thu theo ngày)
        $chartQuery = DonHang::query();
        if ($startDate) {
            $chartQuery->whereDate('ngay_dat_hang', '>=', $startDate);
        }
        if ($endDate) {
            $chartQuery->whereDate('ngay_dat_hang', '<=', $endDate);
        }

        $doanhThuTheoNgay = $chartQuery
            ->selectRaw('DATE(ngay_dat_hang) as ngay, SUM(thanh_tien) as tong')
            ->groupBy('ngay')
            ->orderBy('ngay', 'asc')
            ->get();

        // Đếm số đơn hoàn thành
        $donHoanThanh = DonHang::where('trang_thai_dh', 4);
        if ($startDate) {
            $donHoanThanh->whereDate('ngay_dat_hang', '>=', $startDate);
        }
        if ($endDate) {
            $donHoanThanh->whereDate('ngay_dat_hang', '<=', $endDate);
        }
        $soDonHoanThanh = $donHoanThanh->count();

        return view('admin.doanhthu', compact(
            'soDonHang',
            'tong_tien',
            'list_don_hang',
            'giaTriTB',
            'doanhThuTheoNgay',
            'soDonHoanThanh',
            'startDate',
            'endDate',
            'status'
        ));
    }
}

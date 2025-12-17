<?php

namespace App\Imports;

use App\Models\ChiTietPhieuNhap;
use App\Models\Product;
use App\Models\SanPham;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class NhapHangImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */

    protected $phieu_nhap_id;

    public function __construct($phieu_nhap_id)
    {
        $this->phieu_nhap_id = $phieu_nhap_id;
    }

    public function model(array $row)
    {
        // Kiểm tra cột bắt buộc có tồn tại không
        if (!array_key_exists('code', $row) || !array_key_exists('so_luong_sp', $row)) {
            throw new \Exception("File Excel không đúng cấu trúc!");
        }
        // Bỏ qua dòng trống (code rỗng hoặc số lượng rỗng)
        if (empty(trim($row['code'])) || empty(trim($row['so_luong_sp']))) {
            return null;
        }

        // Tìm sản phẩm 
        $sanpham = SanPham::where('code', $row['code'])->first();

        if ($sanpham) {
            $sanpham->so_luong_sp += (int)$row['so_luong_sp'];
            $sanpham->save();

            ChiTietPhieuNhap::create([
                'phieu_nhap_id' => $this->phieu_nhap_id,
                'ma_san_pham' => $sanpham->code,
                'ten_san_pham' => $sanpham->ten_san_pham,
                'so_luong' => (int)$row['so_luong_sp'],
                'don_gia' => $sanpham->gia_tien_sp,
            ]);
        } else {
            SanPham::create([
                'code' => $row['code'],
                'ten_san_pham' => $row['ten_san_pham'],
                'tac_gia' => $row['tac_gia'] ?? null,
                'gia_tien_sp' => $row['gia_tien_sp'] ?? 0,
                'so_luong_sp' => (int)$row['so_luong_sp'],
                'mo_ta_san_pham' => $row['mo_ta'] ?? null,
                'ma_the_loai' => $row['ma_the_loai'] ?? null,
            ]);

            ChiTietPhieuNhap::create([
                'phieu_nhap_id' => $this->phieu_nhap_id,
                'ma_san_pham' => $row['code'],
                'ten_san_pham' => $row['ten_san_pham'],
                'so_luong' => $row['so_luong_sp'],
                'don_gia' => $row['gia_tien_sp'],
            ]);
        }

        return null;
    }
}

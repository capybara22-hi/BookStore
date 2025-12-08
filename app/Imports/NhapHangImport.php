<?php

namespace App\Imports;

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
    public function model(array $row)
    {
        if (!isset($row['code']) || !isset($row['so_luong_sp'])) {
            throw new \Exception("File Excel không đúng cấu trúc!");
        }

        // Tìm sản phẩm 
        $sanpham = SanPham::where('code', $row['code'])->first();

        if ($sanpham) {
            $sanpham->so_luong_sp += (int)$row['so_luong_sp'];
            $sanpham->save();
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
        }

        return null;
    }
}

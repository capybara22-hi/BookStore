<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\YeuThich;
use Illuminate\Support\Facades\Auth;

class YeuThichController extends Controller
{
    public function toggle($productId)
    {
        $userId = Auth::id();

        $exists = YeuThich::where('ma_nguoi_dung', $userId)
            ->where('ma_san_pham', $productId)
            ->first();

        if ($exists) {
            $exists->delete();
            return back()->with('successBYT', 'Đã bỏ khỏi yêu thích');
        }

        YeuThich::create([
            'ma_nguoi_dung' => $userId,
            'ma_san_pham' => $productId
        ]);

        return back()->with('successYT', 'Đã thêm vào yêu thích');
    }
}

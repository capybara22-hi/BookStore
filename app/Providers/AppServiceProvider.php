<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\Models\GioHang;
use App\Models\YeuThich;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Share cart and wishlist counts with all views
        View::composer('*', function ($view) {
            $cartCount = 0;
            $wishCount = 0;

            if (Auth::check()) {
                $userId = Auth::id();
                // count distinct products in cart where not purchased
                $cartCount = GioHang::where('ma_nguoi_dung', $userId)
                    ->where('trang_thai_mua', 0)
                    ->distinct('ma_san_pham')
                    ->count('ma_san_pham');

                $wishCount = YeuThich::where('ma_nguoi_dung', $userId)->count();
            } else {
                // session-based cart fallback: assume session('cart') is array of items with product ids
                $sessionCart = session('cart', []);
                if (is_array($sessionCart)) {
                    $ids = array_map(function ($it) {
                        if (is_array($it)) return $it['ma_san_pham'] ?? ($it['id'] ?? null);
                        if (is_object($it)) return $it->ma_san_pham ?? $it->id ?? null;
                        return $it;
                    }, $sessionCart);
                    $ids = array_filter($ids);
                    $cartCount = count(array_unique($ids));
                }
                $wishCount = 0;
            }

            $view->with('cartCount', $cartCount)->with('wishCount', $wishCount);
        });
    }
}

<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BaoCaoNhapHangController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DanhMucController;
use App\Http\Controllers\TheLoaiController;
use App\Http\Controllers\SanPhamController;
use App\Http\Controllers\GioHangController;
use App\Http\Controllers\ThanhToanController;
use App\Http\Controllers\TaiKhoanController;
use App\Http\Controllers\IndexAdminController;
use App\Http\Controllers\DonHangAdminController;
use App\Http\Controllers\KhuyenMaiController;
use App\Http\Controllers\NhapHangController;
use App\Http\Controllers\SanPhamAdminController;
use App\Models\DonHang;
use App\Models\KhuyenMai;
use App\Models\User;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|-----------------------------------    ---------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::view('/', 'user.trangchu')->name('home');
Route::view('/gioithieu', 'user.gioithieu')->name('gioithieu');
Route::view('/lienhe', 'user.lienhe')->name('lienhe');



Route::get('/dangnhap', [AuthController::class, 'login'])->name('dangnhap');
Route::get('/dangky', [AuthController::class, 'register'])->name('dangky');
Route::post('register', [AuthController::class, 'postRegister'])->name('postRegister');
Route::post('dangnhap', [AuthController::class, 'postLogin'])->name('postLogin');
Route::get('dangxuat', [AuthController::class, 'Logout'])->name('dangxuat');


// Hiển thị form quên mật khẩu
Route::get('/quenmatkhau', function () {
    return view('user.quenmatkhau');
})->name('forgotPass');

// Xử lý gửi email reset password
Route::post('/quenmatkhau', [AuthController::class, 'postForgot'])->name('password.email');

// Hiển thị form reset password (từ link email)
Route::get('/reset-password/{token}', function ($token) {
    return view('user.resetpassword', ['token' => $token]);
})->name('password.reset');

// Xử lý đặt lại mật khẩu
Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('password.update');





// Route::view('/taikhoan', 'user.taikhoan')->name('taikhoan');

// Route::view('/home', 'user.home')->name('home');


// Route::view('/sanpham', 'user.sanpham') ->name('sanpham'); // trang sản phẩm người dùng

// trang sản phẩm người dùng với danh mục và thể loại
// Route::get('/sanpham', [DanhMucController::class, 'index']) ->name('sanpham'); 


Route::post('/giohang/update', [GioHangController::class, 'updateQuantity'])->name('giohang.update');

Route::post('/luu-session', [GioHangController::class, 'luuSession']);

Route::post('/luu-session1', [ThanhToanController::class, 'updateTrangThai'])->name('giohang.update1');

// Route::post('/insert-don-hang', [ThanhToanController::class, 'insertDonHang'])->name('donhang.insert');
// Route::view('/gioithieu', 'user.gioithieu') ->name('gioithieu'); 
// Route::view('/lienhe', 'user.lienhe') ->name('lienhe'); 
// Route::view('/taikhoan', 'user.taikhoan') ->name('taikhoan'); 

Route::get('/taikhoan', [TaiKhoanController::class, 'index'])->name('taikhoan');


// Phần quyền admin 
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/indexadmin', [IndexAdminController::class, 'index'])->name('indexadmin');

    Route::get('/donhangadmin', [DonHangAdminController::class, 'index'])->name('donhangadmin');

    Route::get('/sanphamadmin', [SanPhamAdminController::class, 'index'])->name('sanphamadmin');

    Route::get('/nhaphang', [BaoCaoNhapHangController::class, 'index'])->name('nhaphang');

    Route::get('/khuyenmai', [KhuyenMaiController::class, 'index'])->name('khuyenmai');

    Route::post('/khuyenmai/themkm', [KhuyenMaiController::class, 'themKM'])->name('khuyenmai.themkm');

    Route::post('nhaphang/import', [NhapHangController::class, 'import'])->name('nhaphang.import');

    Route::get('/chitietnhaphang/{id}', [BaoCaoNhapHangController::class, 'chitietnhaphang'])->name('chitietnhaphang');
});


// Phân quyền customer
Route::middleware(['auth', 'customer'])->group(function () {
    Route::prefix('/user')->group(function () {
        Route::get('/sanpham', [DanhMucController::class, 'index'])->name('sanpham');


        Route::get('/giohang', [GioHangController::class, 'index'])->name('giohang');


        Route::post('/themvaogiohang/{id}', [SanPhamController::class, 'themVaoGioHang'])->name('themgiohang');
        Route::get('/chitietsanpham/{id}', [SanPhamController::class, 'index'])->name('chitietsanpham');


        Route::get('/thanhtoan', [ThanhToanController::class, 'show'])->name('thanhtoan');
    });
});

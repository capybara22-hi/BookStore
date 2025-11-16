<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DanhMucController;
use App\Http\Controllers\TheLoaiController;
use App\Http\Controllers\SanPhamController;
use App\Http\Controllers\GioHangController;
use App\Http\Controllers\ThanhToanController;
use App\Http\Controllers\TaiKhoanController;
use App\Http\Controllers\IndexAdminController;
use App\Http\Controllers\DonHangAdminController;
use App\Http\Controllers\SanPhamAdminController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::view('/trangchu', 'user.trangchu')->name('home');
Route::view('/sanpham', 'user.sanpham')->name('sanpham');
Route::view('/gioithieu', 'user.gioithieu')->name('gioithieu');
Route::view('/lienhe', 'user.lienhe')->name('lienhe');
// Route::view('/taikhoan', 'user.taikhoan')->name('taikhoan');

// Route::view('/home', 'user.home') ->name('home'); 
// Route::view('/sanpham', 'user.sanpham') ->name('sanpham'); // trang sản phẩm người dùng

// trang sản phẩm người dùng với danh mục và thể loại
// Route::get('/sanpham', [DanhMucController::class, 'index']) ->name('sanpham'); 

// trang chi tiết sản phẩm người dùng
Route::get('/chitietsanpham/{id}', [SanPhamController::class, 'index'])->name('chitietsanpham');

// gio hang nguoi dung
Route::get('/giohang', [GioHangController::class, 'index'])->name('giohang');

//them san phẩm vào giỏ hàng
Route::post('/themvaogiohang/{id}', [SanPhamController::class, 'themVaoGioHang'])->name('themgiohang');

Route::get('/thanhtoan', [ThanhToanController::class, 'show'])->name('thanhtoan');

Route::view('/dangnhap', 'user.dangnhap')->name('dangnhap');

Route::post('/giohang/update', [GioHangController::class, 'updateQuantity'])->name('giohang.update');

Route::post('/luu-session', [GioHangController::class, 'luuSession']);

Route::post('/luu-session1', [ThanhToanController::class, 'updateTrangThai'])->name('giohang.update1');

// Route::post('/insert-don-hang', [ThanhToanController::class, 'insertDonHang'])->name('donhang.insert');
// Route::view('/gioithieu', 'user.gioithieu') ->name('gioithieu'); 
// Route::view('/lienhe', 'user.lienhe') ->name('lienhe'); 
// Route::view('/taikhoan', 'user.taikhoan') ->name('taikhoan'); 

Route::get('/taikhoan', [TaiKhoanController::class, 'index'])->name('taikhoan');

Route::get('/indexadmin', [IndexAdminController::class, 'index'])->name('indexadmin');

Route::get('/donhangadmin', [DonHangAdminController::class, 'index'])->name('donhangadmin');

Route::get('/sanphamadmin', [SanPhamAdminController::class, 'index'])->name('sanphamadmin');

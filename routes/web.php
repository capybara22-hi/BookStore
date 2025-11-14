<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DanhMucController;
use App\Http\Controllers\TheLoaiController;
use App\Http\Controllers\SanPhamController;
use App\Http\Controllers\GioHangController;
use App\Http\Controllers\ThanhToanController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// test router
// Route::get('/about', function () {
//     return view('user.dangnhap');
// });

// trang chủ người dùng
Route::view('/trangchu', 'user.trangchu')->name('home');
Route::view('/sanpham', 'user.sanpham')->name('sanpham');
Route::view('/gioithieu', 'user.gioithieu')->name('gioithieu');
Route::view('/lienhe', 'user.lienhe')->name('lienhe');
Route::view('/taikhoan', 'user.taikhoan')->name('taikhoan');



// trang sản phẩm người dùng với danh mục và thể loại
Route::get('/sanpham', [DanhMucController::class, 'index'])->name('sanpham');





// trang chi tiết sản phẩm người dùng
Route::get('/chitietsanpham/{id}', [SanPhamController::class, 'index'])->name('chitietsanpham');

// gio hang nguoi dung
Route::get('/giohang', [GioHangController::class, 'index'])->name('giohang');

//them san phẩm vào giỏ hàng
Route::post('/themvaogiohang/{id}', [SanPhamController::class, 'themVaoGioHang'])->name('themgiohang');

Route::get('/thanhtoan', [ThanhToanController::class, 'show'])->name('thanhtoan');

Route::view('/dangnhap', 'user.dangnhap')->name('dangnhap');

Route::get('dangky', [AuthController::class, 'register'])->name('dangky');
Route::post('dangky', [AuthController::class, 'postRegister'])->name('postRegister');

Route::get('dangnhap', [AuthController::class, 'login'])->name('dangnhap');
Route::post('dangnhap', [AuthController::class, 'postLogin'])->name('postLogin');

// Route::get('hienthiuser', [AuthController::class, 'hienthiuser'])->name('hienthiuser');

// nó phải kết nối được cơ sở dữ liệu thì nó mới có thể đẩy dữ liệu đó lên được
// và nó mới có thể lấy dữ liệu từ trên cơ sở dư liệu để hiển thị lên trang web
// chứng tỏ rằng nó đang kết nối cơ sở dữu liêu tốt

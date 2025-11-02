# ban-sach-app

Ứng dụng web bán sách (Laravel) — README ngắn giải thích cấu trúc thư mục, cách chạy trên môi trường local (Laragon) và một vài lưu ý.

---

## Mô tả nhanh
Dự án là ứng dụng web xây bằng Laravel (PHP). Thư mục chứa mã nguồn chuẩn của Laravel với các view Blade ở `resources/views` và route định nghĩa trong `routes/web.php`.

---

## Cấu trúc thư mục chính (tóm tắt)
- app/  
  Chứa code ứng dụng (Controllers, Models, Policies, ...).

- bootstrap/  
  File khởi tạo framework (bootstrap/app.php).

- config/  
  Cấu hình (app, database, mail,...).

- database/  
  Migration, seeders và factories.

- public/  
  Document root (index.php, assets public).

- resources/  
  - views/ : Blade templates (ví dụ: `resources/views/user/home.blade.php`)  
  - js, css, sass: tài nguyên front-end nếu dùng Laravel Mix.

- routes/  
  - web.php : định nghĩa route web (ví dụ `Route::view('/dangnhap', 'user.dangnhap')->name('dangnhap');`)  
  - api.php : routes API.

- storage/  
  Logs, cache, uploaded files (không commit).

- vendor/  
  Thư viện composer (không commit).

- .env  
  Cấu hình môi trường (DB, mail...). KHÔNG commit file này.

- artisan  
  CLI helper của Laravel.

---

## Cách chạy trên môi trường local (Laragon)
1. Đặt project vào thư mục web server (ví dụ `d:\Download_file\laragon\www\ban-sach-app`).  
2. Tạo file .env từ `.env.example` và chỉnh cấu hình database:
   - DB_DATABASE, DB_USERNAME, DB_PASSWORD
3. Cài phụ thuộc PHP:
   - composer install
4. Tạo app key:
   - php artisan key:generate
5. Chạy migration (nếu cần):
   - php artisan migrate
   - php artisan db:seed
6. Chạy server:
   - Với Laragon: truy cập http://localhost/ban-sach-app  
   - Hoặc: php artisan serve (http://127.0.0.1:8000)

Nếu dùng front-end build:
- npm install
- npm run dev

---

## Một số vị trí hay chỉnh sửa
- View giao diện người dùng chính: `resources/views/user/home.blade.php`  
  - Ví dụ: `{{ route('sanpham') }}` dùng để lấy URL của route đặt tên `sanpham`.
- Định nghĩa route nhanh (ví dụ):
```php
// routes/web.php
Route::view('/dangnhap', 'user.dangnhap')->name('dangnhap');
Route::get('/san-pham', [App\Http\Controllers\ProductController::class, 'index'])->name('sanpham');
```
- Controller: `app/Http/Controllers/`

---

## Giữ nguyên dữ liệu khi chuyển trang / submit
- Khi truyền nhiều trường qua query string, bạn có thể:
  - Dùng hidden inputs để giữ dữ liệu khi submit form.
  - Hoặc serialize dữ liệu bằng `json_encode()` + `urlencode()` rồi gửi 1 tham số `data`.
  - Khi quay lại trang, decode bằng `json_decode(urldecode($_GET['data']), true)`.
- Nên sử dụng Post/Redirect/Get (PRG) để tránh submit trùng khi reload.

---

## Bảo mật & vận hành
- Không lưu passwords bằng MD5; dùng `password_hash()` / Laravel Auth. Nếu DB legacy dùng MD5, cân nhắc nâng cấp dần (rehash khi user login).  
- Luôn dùng prepared statements / Eloquent để tránh SQL injection.  
- Không commit `.env` và `vendor/`.  
- Kiểm tra logs tại `storage/logs/laravel.log`.

---

## Debug nhanh
- Liệt kê route: `php artisan route:list`  
- Xem log: `storage/logs/laravel.log`  
- Tạo cache config lại nếu thay `.env`: `php artisan config:cache`

---

Nếu bạn muốn, mình có thể:
- Ghi thêm đoạn ví dụ cụ thể cho route `sanpham` và view mẫu.  
- Hoặc cập nhật README này theo yêu cầu (ngôn ngữ/chi tiết). 
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Cart - NiceShop Bootstrap Template</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="{{ asset('assets/img/favicon.png')}}" rel="icon">
  <link href="{{ asset('assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/aos/aos.css')}}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/drift-zoom/drift-basic.css')}}" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="{{ asset('assets/css/main.css')}}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceShop
  * Template URL: https://bootstrapmade.com/niceshop-bootstrap-ecommerce-template/
  * Updated: Aug 26 2025 with Bootstrap v5.3.7
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="cart-page">

  <header id="header" class="header sticky-top">

    <!-- Main Header -->
    <div class="main-header">
      <div class="container-fluid container-xl">
        <div class="d-flex py-3 align-items-center justify-content-between">

          <!-- Logo -->
          <a href="index.html" class="logo d-flex align-items-center">
            <!-- Uncomment the line below if you also wish to use an image logo -->
            <!-- <img src="assets/img/logo.webp" alt=""> -->
            <h1 class="sitename">MiuBook</h1>
          </a>

          <!-- Actions -->
          <div class="header-actions d-flex align-items-center justify-content-end">

            <!-- Mobile Search Toggle -->
            <button class="header-action-btn mobile-search-toggle d-xl-none" type="button" data-bs-toggle="collapse" data-bs-target="#mobileSearch" aria-expanded="false" aria-controls="mobileSearch">
              <i class="bi bi-search"></i>
            </button>

            <!-- Account -->
            <div class="dropdown account-dropdown">
              <button class="header-action-btn" data-bs-toggle="dropdown">
                <i class="bi bi-person"></i>
              </button>
              <div class="dropdown-menu">
                <div class="dropdown-header">
                  <h6>Chào mừng tới <span class="sitename">MiuBook</span></h6>
                  <p class="mb-0">Truy cập tài khoản &amp; quản lý đơn hàng</p>
                </div>
                <div class="dropdown-body">
                  <a class="dropdown-item d-flex align-items-center" href="taikhoan.blade.php">
                    <i class="bi bi-person-circle me-2"></i>
                    <span>Hồ Sơ Của Tôi</span>
                  </a>
                  <a class="dropdown-item d-flex align-items-center" href="taikhoan.blade.php">
                    <i class="bi bi-bag-check me-2"></i>
                    <span>Đơn Hàng Của Tôi</span>
                  </a>
                  <a class="dropdown-item d-flex align-items-center" href="taikhoan.blade.php">
                    <i class="bi bi-heart me-2"></i>
                    <span>Danh Sách Yêu Thích</span>
                  </a>
                  <a class="dropdown-item d-flex align-items-center" href="taikhoan.blade.php">
                    <i class="bi bi-gear me-2"></i>
                    <span>Cài Đặt</span>
                  </a>
                </div>
                <div class="dropdown-footer">
                  <a href="register.html" class="btn btn-primary w-100 mb-2">Đăng Nhập</a>
                  <a href="login.html" class="btn btn-outline-primary w-100">Đăng Ký</a>
                </div>
              </div>
            </div>

            <!-- Yêu thích -->
            <a href="taikhoan.blade.php" class="header-action-btn d-none d-md-block">
              <i class="bi bi-heart"></i>
              <span class="badge">0</span>
            </a>

            <!-- Giỏ hàng -->
            <a href="{{ route('giohang') }}" class="header-action-btn">
              <i class="bi bi-cart3"></i>
              <span class="badge">0</span>
            </a>

            <!-- Mobile Navigation Toggle -->
            <i class="mobile-nav-toggle d-xl-none bi bi-list me-0"></i>

          </div>
        </div>
      </div>
    </div>

    <!-- Navigation -->
    <div class="header-nav">
      <div class="container-fluid container-xl position-relative">
        <nav id="navmenu" class="navmenu">
          <ul>
            <li><a href="{{ route('home') }}" class="active">Trang Chủ</a></li>
            <li><a href="gioithieu.blade.php" class="active">Giới Thiệu</a></li>

            <!-- Products Mega Menu 1 -->
            <li><a href="{{ route('sanpham') }}" class="active">Sản phẩm</a></li>
              <!-- Products Mega Menu 1 Desktop View -->
              <div class="desktop-megamenu">

                <div class="megamenu-tabs">
                  <ul class="nav nav-tabs" id="productMegaMenuTabs" role="tablist">
                    <li class="nav-item" role="presentation">
                      
                    </li>
                  </ul>
                </div>
              </div><!-- End Products Mega Menu 1 Desktop View -->

            </li><!-- End Products Mega Menu 1 -->

            <li><a href="lienhe.blade.php" class="active">Liên hệ</a></li>

          </ul>
        </nav>
      </div>
    </div>

    <!-- Mobile Search Form -->
    <div class="collapse" id="mobileSearch">
      <div class="container">
        <form class="search-form">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Search for products">
            <button class="btn" type="submit">
              <i class="bi bi-search"></i>
            </button>
          </div>
        </form>
      </div>
    </div>

  </header>

  <main class="main">

    <!-- Page Title -->
    <div class="page-title light-background">
      <div class="container d-lg-flex justify-content-between align-items-center">
        <h1 class="mb-2 mb-lg-0">Giỏ hàng</h1>
        <nav class="breadcrumbs">
        </nav>
      </div>
    </div><!-- End Page Title -->

    <!-- Cart Section -->
    <section id="cart" class="cart section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row">
          <div class="col-lg-8" data-aos="fade-up" data-aos-delay="200">
            <div class="cart-items">
              <div class="cart-header d-none d-lg-block">
                <div class="row align-items-center">
                  <div class="col-lg-6">
                    <h5>Sản phẩm</h5>
                  </div>
                  <div class="col-lg-2 text-center">
                    <h5>Giá</h5>
                  </div>
                  <div class="col-lg-2 text-center">
                    <h5>Số lượng</h5>
                  </div>
                  <div class="col-lg-2 text-center">
                    <h5>Tổng tiền</h5>
                  </div>
                </div>
              </div>
              <!-- hiển thị danh sách sản phẩm trong giỏ hàng -->
              @foreach ($sanphamgiohang as $gh)
                @php
                    // Lấy file ảnh bìa của sản phẩm (bia_san_pham = 1)
                    $anhBia = $gh->sanpham->file->where('bia_san_pham', 1)->first();
                @endphp
                  @if($gh->trang_thai_mua == 0)
                    <div class="cart-item" data-id="{{ $gh->ma_gio_hang }}">
                        <div class="row align-items-center">
                            <div class="col-lg-6 col-12 mt-3 mt-lg-0 mb-lg-0 mb-3">
                                <div class="product-info d-flex align-items-center">
                                    <div class="product-image">
                                        <img 
                                            src="{{ asset($anhBia->duong_dan_luu ?? 'assets/img/no-image.jpg') }}" 
                                            alt="{{ $gh->ten_sp }}" 
                                            class="img-fluid" 
                                            loading="lazy">
                                    </div>
                                    <div class="product-details">
                                        <h6 class="product-title">{{ $gh->ten_sp }}</h6>
                                        <div class="product-meta">
                                            <span class="product-color">Tác giả: Black</span>
                                        </div>
                                        <button class="remove-item" type="button">
                                            <i class="bi bi-trash"></i> Xóa
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-2 col-12 mt-3 mt-lg-0 text-center">
                                <div class="price-tag">
                                    <span class="current-price">{{ number_format($gh->gia_sp) }} VND</span>
                                </div>
                            </div>

                            <div class="col-lg-2 col-12 mt-3 mt-lg-0 text-center">
                                <div class="quantity-selector">
                                    <button class="quantity-btn decrease"><i class="bi bi-dash"></i></button>
                                    <input type="number" class="quantity-input" value="{{ $gh->so_luong_sp }}" min="1" max="{{ $gh->sanpham->so_luong_sp }}">
                                    <button class="quantity-btn increase"><i class="bi bi-plus"></i></button>
                                </div>
                            </div>

                            <div class="col-lg-2 col-12 mt-3 mt-lg-0 text-center">
                                <div class="item-total">
                                    <span>{{ number_format($gh->tong_tien) }} VND</span>
                                </div>
                            </div>
                        </div>
                    </div>
                  @endif
              @endforeach


              <div class="cart-actions">
                <div class="row">
                  <div class="col-lg-6 mb-3 mb-lg-0">
                    <div class="coupon-form">
                      <div class="input-group">
                        
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6 text-md-end">
                    <button class="btn btn-outline-remove">
                      <i class="bi bi-trash"></i> Clear Cart
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="300">
            <div class="cart-summary">
              <h4 class="summary-title">Chi tiết đơn hàng</h4>

              <div class="summary-item">
                <span class="summary-label">Tổng tiền hàng</span>
                <span class="summary-value">0 VND</span>
              </div>

              <div class="summary-item shipping-item">
                <span class="summary-label">Vận chuyển</span>
                <div class="shipping-options">
                  <div class="form-check text-end">
                    <input class="form-check-input" type="radio" name="shipping" id="standard" checked="">
                    <label class="form-check-label" for="standard">
                      Standard Delivery - 15,000 VND
                    </label>
                  </div>
                  <div class="form-check text-end">
                    <input class="form-check-input" type="radio" name="shipping" id="express">
                    <label class="form-check-label" for="express">
                      Express Delivery - 20,000 VND
                    </label>
                  </div>
                  <div class="form-check text-end">
                    <input class="form-check-input" type="radio" name="shipping" id="free">
                    <label class="form-check-label" for="free">
                      Free Shipping (Áp dụng với đơn hàng trên 300,000 VND)
                    </label>
                  </div>
                </div>
              </div>

              <div class="summary-item">
                <span class="summary-label">Thuế</span>
                <span class="summary-value">2,700 VND</span>
              </div>

              <div class="summary-total">
                <span class="summary-label">Thành tiền</span>
                <span class="summary-value">0 VND</span>
              </div>

              <div class="checkout-button">
                <a href="{{ route('thanhtoan') }}" class="btn btn-accent w-100">
                  Tiến hành thanh toán <i class="bi bi-arrow-right"></i>
                </a>
              </div>

              <div class="continue-shopping">
                <a href="{{ route('sanpham') }}" class="btn btn-link w-100">
                  <i class="bi bi-arrow-left"></i> Tiếp tục mua sắm
                </a>
              </div>
            </div>
          </div>
        </div>

      </div>

    </section><!-- /Cart Section -->
    
  </main>

  <footer id="footer" class="footer dark-background">
    <div class="footer-main">
      <div class="container">
        <div class="row gy-4">
          <div class="col-lg-4 col-md-6">
            <div class="footer-widget footer-about">
              <a href="index.html" class="logo">
                <span class="sitename">NiceShop</span>
              </a>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam in nibh vehicula, facilisis magna ut, consectetur lorem. Proin eget tortor risus.</p>

              <div class="social-links mt-4">
                <h5>Connect With Us</h5>
                <div class="social-icons">
                  <a href="#" aria-label="Facebook"><i class="bi bi-facebook"></i></a>
                  <a href="#" aria-label="Instagram"><i class="bi bi-instagram"></i></a>
                  <a href="#" aria-label="Twitter"><i class="bi bi-twitter-x"></i></a>
                  <a href="#" aria-label="TikTok"><i class="bi bi-tiktok"></i></a>
                  <a href="#" aria-label="Pinterest"><i class="bi bi-pinterest"></i></a>
                  <a href="#" aria-label="YouTube"><i class="bi bi-youtube"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-2 col-md-6 col-sm-6">
            <div class="footer-widget">
              <h4>Shop</h4>
              <ul class="footer-links">
                <li><a href="category.html">New Arrivals</a></li>
                <li><a href="category.html">Bestsellers</a></li>
                <li><a href="category.html">Women's Clothing</a></li>
                <li><a href="category.html">Men's Clothing</a></li>
                <li><a href="category.html">Accessories</a></li>
                <li><a href="category.html">Sale</a></li>
              </ul>
            </div>
          </div>

          <div class="col-lg-2 col-md-6 col-sm-6">
            <div class="footer-widget">
              <h4>Support</h4>
              <ul class="footer-links">
                <li><a href="support.html">Help Center</a></li>
                <li><a href="account.html">Order Status</a></li>
                <li><a href="shiping-info.html">Shipping Info</a></li>
                <li><a href="return-policy.html">Returns &amp; Exchanges</a></li>
                <li><a href="#">Size Guide</a></li>
                <li><a href="contact.html">Contact Us</a></li>
              </ul>
            </div>
          </div>

          <div class="col-lg-4 col-md-6">
            <div class="footer-widget">
              <h4>Contact Information</h4>
              <div class="footer-contact">
                <div class="contact-item">
                  <i class="bi bi-geo-alt"></i>
                  <span>123 Fashion Street, New York, NY 10001</span>
                </div>
                <div class="contact-item">
                  <i class="bi bi-telephone"></i>
                  <span>+1 (555) 123-4567</span>
                </div>
                <div class="contact-item">
                  <i class="bi bi-envelope"></i>
                  <span>hello@example.com</span>
                </div>
                <div class="contact-item">
                  <i class="bi bi-clock"></i>
                  <span>Monday-Friday: 9am-6pm<br>Saturday: 10am-4pm<br>Sunday: Closed</span>
                </div>
              </div>

              <div class="app-buttons mt-4">
                <a href="#" class="app-btn">
                  <i class="bi bi-apple"></i>
                  <span>App Store</span>
                </a>
                <a href="#" class="app-btn">
                  <i class="bi bi-google-play"></i>
                  <span>Google Play</span>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="footer-bottom">
      <div class="container">
        <div class="row gy-3 align-items-center">
          <div class="col-lg-6 col-md-12">
            <div class="copyright">
              <p>© <span>Copyright</span> <strong class="sitename">NiceShop</strong>. All Rights Reserved.</p>
            </div>
            <div class="credits mt-1">
              <!-- All the links in the footer should remain intact. -->
              <!-- You can delete the links only if you've purchased the pro version. -->
              <!-- Licensing information: https://bootstrapmade.com/license/ -->
              <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
              Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
            </div>
          </div>

          <div class="col-lg-6 col-md-12">
            <div class="d-flex flex-wrap justify-content-lg-end justify-content-center align-items-center gap-4">
              <div class="payment-methods">
                <div class="payment-icons">
                  <i class="bi bi-credit-card" aria-label="Credit Card"></i>
                  <i class="bi bi-paypal" aria-label="PayPal"></i>
                  <i class="bi bi-apple" aria-label="Apple Pay"></i>
                  <i class="bi bi-google" aria-label="Google Pay"></i>
                  <i class="bi bi-shop" aria-label="Shop Pay"></i>
                  <i class="bi bi-cash" aria-label="Cash on Delivery"></i>
                </div>
              </div>

              <div class="legal-links">
                <a href="tos.html">Terms</a>
                <a href="privacy.html">Privacy</a>
                <a href="tos.html">Cookies</a>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{ asset('assets/vendor/php-email-form/validate.js')}}"></script>
  <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
  <script src="{{ asset('assets/vendor/aos/aos.js')}}"></script>
  <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
  <script src="{{ asset('assets/vendor/drift-zoom/Drift.min.js')}}"></script>
  <script src="{{ asset('assets/vendor/purecounter/purecounter_vanilla.js')}}"></script>

  <!-- Main JS File -->
  <script src="{{ asset('assets/js/main.js')}}"></script>

  <!-- tự động tăng giảm giá tiền sản phẩm -->
  <script>
    // Chạy khi toàn bộ nội dung trang (HTML) đã được tải xong
    document.addEventListener("DOMContentLoaded", function () {

      // === LẤY CÁC PHẦN TỬ TRÊN GIAO DIỆN ===
      const cartItems = document.querySelectorAll(".cart-item"); // Danh sách tất cả sản phẩm trong giỏ hàng
      const totalItemsPriceEl = document.querySelector(".summary-item .summary-value"); // Tổng tiền hàng
      const shippingRadios = document.querySelectorAll("input[name='shipping']"); // Các lựa chọn giao hàng
      const taxEl = document.querySelector(".summary-item:nth-of-type(3) .summary-value"); // Tiền thuế
      const grandTotalEl = document.querySelector(".summary-total .summary-value"); // Tổng cộng (sau thuế + ship)

      // === HÀM LẤY PHÍ VẬN CHUYỂN DỰA THEO LỰA CHỌN ===
      const getShippingCost = () => {
        const selected = document.querySelector("input[name='shipping']:checked");
        if (!selected) return 0;
        if (selected.id === "standard") return 15000; // Giao hàng tiêu chuẩn
        if (selected.id === "express") return 20000; // Giao hàng nhanh
        if (selected.id === "free") return 0; // Miễn phí
        return 0;
      };

      // === HÀM CẬP NHẬT TỔNG TIỀN GIỎ HÀNG ===
      const updateCartSummary = () => {
        let totalItemsPrice = 0; // Tổng tiền hàng (chưa thuế, chưa ship)

        // Lặp qua từng sản phẩm trong giỏ
        cartItems.forEach(item => {
          const quantityInput = item.querySelector(".quantity-input"); // Ô nhập số lượng
          const priceTag = item.querySelector(".current-price"); // Giá sản phẩm
          const itemTotal = item.querySelector(".item-total span"); // Ô hiển thị tổng tiền từng sản phẩm

          // Lấy số lượng
          const quantity = parseInt(quantityInput.value);

          // Lấy giá và chuyển từ chuỗi "35,000 VND" => 35000 (số)
          const price = parseFloat(
            priceTag.textContent
              .replace("VND", "") // bỏ chữ VND
              .replace(/,/g, "")  // bỏ dấu phẩy ngăn cách nghìn
              .trim()             // bỏ khoảng trắng dư
          );

          // Tính tổng tiền từng sản phẩm
          const total = quantity * price;

          // Hiển thị lại tổng tiền từng sản phẩm (có định dạng dấu phẩy)
          itemTotal.textContent = `${total.toLocaleString()} VND`;

          // Cộng dồn vào tổng toàn bộ giỏ hàng
          totalItemsPrice += total;
        });

        // Hiển thị tổng tiền hàng
        totalItemsPriceEl.textContent = `${totalItemsPrice.toLocaleString()} VND`;

        // Tính thuế (nếu muốn có thể thay đổi thành công thức động)
        const tax = 2700;

        // Lấy phí vận chuyển
        const shipping = getShippingCost();

        // Tính tổng cộng (hàng + thuế + phí ship)
        const grandTotal = totalItemsPrice + tax + shipping;

        // Hiển thị tổng cuối cùng ra giao diện
        grandTotalEl.textContent = `${grandTotal.toLocaleString()} VND`;
      };

      // === GẮN SỰ KIỆN CHO TỪNG SẢN PHẨM ===
      cartItems.forEach(item => {
        const quantityInput = item.querySelector(".quantity-input");
        const increaseBtn = item.querySelector(".increase");
        const decreaseBtn = item.querySelector(".decrease");

        // Khi người dùng nhập số lượng trực tiếp
        quantityInput.addEventListener("input", () => {
          // Đảm bảo số lượng không nhỏ hơn 1
          if (quantityInput.value < 1) quantityInput.value = 1;
          updateCartSummary();
        });

        // Khi bấm nút tăng số lượng
        increaseBtn.addEventListener("click", () => {
          const current = parseInt(quantityInput.value);
          const max = parseInt(quantityInput.max) || 999;
          if (current < max) quantityInput.value = current + 1;
          updateCartSummary();
        });

        // Khi bấm nút giảm số lượng
        decreaseBtn.addEventListener("click", () => {
          const current = parseInt(quantityInput.value);
          if (current > 1) quantityInput.value = current - 1;
          updateCartSummary();
        });
      });

      // === GẮN SỰ KIỆN CHO LỰA CHỌN PHÍ GIAO HÀNG ===
      shippingRadios.forEach(radio => {
        radio.addEventListener("change", updateCartSummary);
      });

      // === GỌI HÀM MỘT LẦN KHI MỚI LOAD TRANG ===
      updateCartSummary();
    });
  </script>

</body>

</html>
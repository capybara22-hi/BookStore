<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Index - NiceShop Bootstrap Template</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">
  <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/drift-zoom/drift-basic.css') }}" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceShop
  * Template URL: https://bootstrapmade.com/niceshop-bootstrap-ecommerce-template/
  * Updated: Aug 26 2025 with Bootstrap v5.3.7
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="index-page">

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

          <!-- Search -->
          <form class="search-form desktop-search-form">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Tìm kiếm sản phẩm">
              <button class="btn" type="submit">
                <i class="bi bi-search"></i>
              </button>
            </div>
          </form>

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
            <a href="giohang.blade.php" class="header-action-btn">
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

    <!-- Hero Section -->
    <section id="hero" class="hero section">

      <div class="hero-container">
        <div class="hero-content">
          <div class="content-wrapper" data-aos="fade-up" data-aos-delay="100">
            <h1 class="hero-title">Khám phá các tác phẩm tuyệt vời</h1>
            <p class="hero-description">Chào mừng bạn đến với không gian của những câu chuyện và ý tưởng bất tận! Từ tiểu thuyết hấp dẫn đến sách kỹ năng thực tiễn — tất cả đều đang chờ bạn khám phá với ưu đãi độc quyền và giao hàng nhanh chóng.</p>
            <div class="hero-actions" data-aos="fade-up" data-aos-delay="200">
              <a href="#products" class="btn-primary">Mua Ngay</a>
              <a href="#categories" class="btn-secondary">Duyệt Danh Mục</a>
            </div>
            <div class="features-list" data-aos="fade-up" data-aos-delay="300">
              <div class="feature-item">
                <i class="bi bi-truck"></i>
                <span>Miễn Phí Vận Chuyển</span>
              </div>
              <div class="feature-item">
                <i class="bi bi-award"></i>
                <span>Đảm Bảo Chất Lượng</span>
              </div>
              <div class="feature-item">
                <i class="bi bi-headset"></i>
                <span>Hỗ Trợ 24/7</span>
              </div>
            </div>
          </div>
        </div>

        <div class="hero-visuals">
          <div class="product-showcase" data-aos="fade-left" data-aos-delay="200">
            <div class="product-card featured">
              <img src="{{ asset('assets/img/product/product-2.webp') }}" alt="Featured Product" class="img-fluid">
              <div class="product-badge">Bán chạy nhất</div>
              <div class="product-info">
                <h4>Tiểu thuyết trinh thám</h4>
                <div class="price">
                  <span class="sale-price">299.000 VND</span>
                  <span class="original-price">399.000 VND</span>
                </div>
              </div>
            </div>

            <div class="product-grid">
              <div class="product-mini" data-aos="zoom-in" data-aos-delay="400">
                <img src="{{ asset('assets/img/product/product-3.webp') }}" alt="Product" class="img-fluid">
                <span class="mini-price">89.000 VND</span>
              </div>
              <div class="product-mini" data-aos="zoom-in" data-aos-delay="500">
                <img src="{{ asset('assets/img/product/product-5.webp') }}" alt="Product" class="img-fluid">
                <span class="mini-price">149.000 VND</span>
              </div>
            </div>
          </div>

          <div class="floating-elements">
            <div class="floating-icon cart" data-aos="fade-up" data-aos-delay="600">
              <i class="bi bi-cart3"></i>
              <span class="notification-dot">3</span>
            </div>
            <div class="floating-icon wishlist" data-aos="fade-up" data-aos-delay="700">
              <i class="bi bi-heart"></i>
            </div>
            <div class="floating-icon search" data-aos="fade-up" data-aos-delay="800">
              <i class="bi bi-search"></i>
            </div>
          </div>
        </div>
      </div>

    </section><!-- /Hero Section -->

    <!-- Promo Cards Section -->
    <section id="promo-cards" class="promo-cards section">
      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row gy-4">

          <div class="col-lg-6">
            <div class="category-featured" data-aos="fade-right" data-aos-delay="200">
              <div class="category-image">
                <img src="{{ asset('assets/img/product/product-f-2.webp') }}" alt="Women's Collection" class="img-fluid">
              </div>
              <div class="category-content">
                <span class="category-tag">Đang thịnh hành</span>
                <h2>Bộ sưu tập sách mới</h2>
                <p>Khám phá những cuốn sách mới nhất được tuyển chọn dành riêng cho bạn — từ tiểu thuyết cảm động, truyện trinh thám gay cấn cho đến những cuốn sách kỹ năng sống hữu ích.
                  Cùng đắm chìm trong thế giới tri thức và cảm xúc bất tận qua từng trang sách.</p>
                <a href="#" class="btn-shop">khám phá ngay<i class="bi bi-arrow-right"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-6">

            <div class="row gy-4">

              <div class="col-xl-6">
                <div class="category-card cat-men" data-aos="fade-up" data-aos-delay="300">
                  <div class="category-image">
                    <img src="{{ asset('assets/img/product/product-m-5.webp') }}" alt="Men's Fashion" class="img-fluid">
                  </div>
                  <div class="category-content">
                    <h4>Văn học Việt Nam</h4>
                    <p>242 tựa sách</p>
                    <a href="#" class="card-link">Xem ngay<i class="bi bi-arrow-right"></i></a>
                  </div>
                </div>
              </div>

              <div class="col-xl-6">
                <div class="category-card cat-kids" data-aos="fade-up" data-aos-delay="400">
                  <div class="category-image">
                    <img src="{{ asset('assets/img/product/product-8.webp') }}" alt="Kid's Fashion" class="img-fluid">
                  </div>
                  <div class="category-content">
                    <h4>Văn học nước ngoài</h4>
                    <p>185 tựa sách</p>
                    <a href="#" class="card-link">Xem ngay<i class="bi bi-arrow-right"></i></a>
                  </div>
                </div>
              </div>

              <div class="col-xl-6">
                <div class="category-card cat-cosmetics" data-aos="fade-up" data-aos-delay="500">
                  <div class="category-image">
                    <img src="{{ asset('assets/img/product/product-3.webp') }}" alt="Cosmetics" class="img-fluid">
                  </div>
                  <div class="category-content">
                    <h4>Kinh tế và kỹ năng sống</h4>
                    <p>127 tựa sách</p>
                    <a href="#" class="card-link">Xem ngay<i class="bi bi-arrow-right"></i></a>
                  </div>
                </div>
              </div>

              <div class="col-xl-6">
                <div class="category-card cat-accessories" data-aos="fade-up" data-aos-delay="600">
                  <div class="category-image">
                    <img src="{{ asset('assets/img/product/product-12.webp') }}" alt="Accessories" class="img-fluid">
                  </div>
                  <div class="category-content">
                    <h4>Khoa học và công nghệ</h4>
                    <p>308 tựa sách</p>
                    <a href="#" class="card-link">Xem ngay<i class="bi bi-arrow-right"></i></a>
                  </div>
                </div>
              </div>

            </div>
          </div>

        </div>

      </div>
    </section><!-- /Promo Cards Section -->

    <!-- Best Sellers Section -->
    <section id="best-sellers" class="best-sellers section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Chán chạy</h2>
        <p>NKhám phá những cuốn sách được yêu thích nhất — nơi hàng ngàn độc giả cùng tìm thấy nguồn cảm hứng mỗi ngày.</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row g-5">

          <!-- Product 1 -->
          <div class="col-lg-3 col-md-6">
            <div class="product-item">
              <div class="product-image">
                <div class="product-badge">Giới hạn</div>
                <img src="{{ asset('assets/img/product/product-1.webp') }}" alt="Product Image" class="img-fluid" loading="lazy">
                <div class="product-actions">
                  <button class="action-btn wishlist-btn">
                    <i class="bi bi-heart"></i>
                  </button>
                </div>
                <button class="cart-btn">Thêm vào giỏ hàng</button>
              </div>
              <div class="product-info">
                <div class="product-category">Được yêu thích</div>
                <h4 class="product-name"><a href="product-details.html">Doraemon</a></h4>
                <div class="product-rating">
                  <div class="stars">
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star"></i>
                  </div>
                  <span class="rating-count">(24)</span>
                </div>
                <div class="product-price">189.000 VND</div>
              </div>
            </div>
          </div>
          <!-- End Product 1 -->

          <!-- Product 2 -->
          <div class="col-lg-3 col-md-6">
            <div class="product-item">
              <div class="product-image">
                <div class="product-badge sale-badge">Giảm 25%</div>
                <img src="{{ asset('assets/img/product/product-4.webp') }}" alt="Product Image" class="img-fluid" loading="lazy">
                <div class="product-actions">
                  <button class="action-btn wishlist-btn">
                    <i class="bi bi-heart"></i>
                  </button>
                </div>
                <button class="cart-btn">Thêm vào giỏ hàng</button>
              </div>
              <div class="product-info">
                <div class="product-category">Bán chạy</div>
                <h4 class="product-name"><a href="product-details.html">Conan</a></h4>
                <div class="product-rating">
                  <div class="stars">
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-half"></i>
                  </div>
                  <span class="rating-count">(38)</span>
                </div>
                <div class="product-price">
                  <span class="old-price">240.000 VND</span>
                  <span class="current-price">180.000 VND</span>
                </div>
              </div>
            </div>
          </div>
          <!-- End Product 2 -->

          <!-- Product 3 -->
          <div class="col-lg-3 col-md-6">
            <div class="product-item">
              <div class="product-image">
                <img src="{{ asset('assets/img/product/product-7.webp') }}" alt="Product Image" class="img-fluid" loading="lazy">
                <div class="product-actions">
                  <button class="action-btn wishlist-btn">
                    <i class="bi bi-heart"></i>
                  </button>
                </div>
                <button class="cart-btn">Thêm vào giỏ hàng</button>
              </div>
              <div class="product-info">
                <div class="product-category">Sản phẩm mới</div>
                <h4 class="product-name"><a href="product-details.html">Lọ lem</a></h4>
                <div class="product-rating">
                  <div class="stars">
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star"></i>
                    <i class="bi bi-star"></i>
                  </div>
                  <span class="rating-count">(12)</span>
                </div>
                <div class="product-price">95.000 VND</div>
              </div>
            </div>
          </div>
          <!-- End Product 3 -->

          <!-- Product 4 -->
          <div class="col-lg-3 col-md-6">
            <div class="product-item">
              <div class="product-image">
                <div class="product-badge trending-badge">Xu hướng</div>
                <img src="{{ asset('assets/img/product/product-10.webp') }}" alt="Product Image" class="img-fluid" loading="lazy">
                <div class="product-actions">
                  <button class="action-btn wishlist-btn active">
                    <i class="bi bi-heart-fill"></i>
                  </button>
                </div>
                <button class="cart-btn">Thêm vào giỏ hàng</button>
              </div>
              <div class="product-info">
                <div class="product-category">Nổi bật trong tuần</div>
                <h4 class="product-name"><a href="product-details.html">Sách giáo khoa toán lớp 1</a></h4>
                <div class="product-rating">
                  <div class="stars">
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                  </div>
                  <span class="rating-count">(56)</span>
                </div>
                <div class="product-price">165.000 VND</div>
              </div>
            </div>
          </div>
          <!-- End Product 4 -->

        </div>

      </div>

    </section><!-- /Best Sellers Section -->

    <!-- Cards Section -->
    <section id="cards" class="cards section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">
          <div class="col-lg-4 col-md-6 mb-5 mb-md-0" data-aos="fade-up" data-aos-delay="200">
            <div class="product-category">
              <h3 class="category-title">
                <i class="bi bi-fire"></i> Xu hướng đọc
              </h3>
              <div class="product-list">
                <div class="product-card">
                  <div class="product-image">
                    <img src="{{ asset('assets/img/product/product-1.webp') }}" alt="Premium Leather Tote" class="img-fluid">
                    <div class="product-badges">
                      <span class="badge-new">New</span>
                    </div>
                  </div>
                  <div class="product-info">
                    <h4 class="product-name">Cây xanh</h4>
                    <div class="product-rating">
                      <i class="bi bi-star-fill"></i>
                      <i class="bi bi-star-fill"></i>
                      <i class="bi bi-star-fill"></i>
                      <i class="bi bi-star-fill"></i>
                      <i class="bi bi-star-half"></i>
                      <span>(24)</span>
                    </div>
                    <div class="product-price">
                      <span class="current-price">87.50 VND</span>
                    </div>
                  </div>
                </div>

                <div class="product-card">
                  <div class="product-image">
                    <img src="{{ asset('assets/img/product/product-3.webp') }}" alt="Statement Earrings" class="img-fluid">
                  </div>
                  <div class="product-info">
                    <h4 class="product-name">Cây nấm nhỏ</h4>
                    <div class="product-rating">
                      <i class="bi bi-star-fill"></i>
                      <i class="bi bi-star-fill"></i>
                      <i class="bi bi-star-fill"></i>
                      <i class="bi bi-star-fill"></i>
                      <i class="bi bi-star-fill"></i>
                      <span>(41)</span>
                    </div>
                    <div class="product-price">
                      <span class="current-price">39.99 VND</span>
                    </div>
                  </div>
                </div>

                <div class="product-card">
                  <div class="product-image">
                    <img src="{{ asset('assets/img/product/product-5.webp') }}" alt="Organic Cotton Shirt" class="img-fluid">
                  </div>
                  <div class="product-info">
                    <h4 class="product-name">Triết học</h4>
                    <div class="product-rating">
                      <i class="bi bi-star-fill"></i>
                      <i class="bi bi-star-fill"></i>
                      <i class="bi bi-star-fill"></i>
                      <i class="bi bi-star-fill"></i>
                      <i class="bi bi-star"></i>
                      <span>(18)</span>
                    </div>
                    <div class="product-price">
                      <span class="current-price">45.00 VND</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 mb-5 mb-md-0" data-aos="fade-up" data-aos-delay="300">
            <div class="product-category">
              <h3 class="category-title">
                <i class="bi bi-award"></i> Bán chạy
              </h3>
              <div class="product-list">
                <div class="product-card">
                  <div class="product-image">
                    <img src="{{ asset('assets/img/product/product-2.webp') }}" alt="Slim Fit Denim" class="img-fluid">
                    <div class="product-badges">
                      <span class="badge-sale">-15%</span>
                    </div>
                  </div>
                  <div class="product-info">
                    <h4 class="product-name">Tôi thấy hoa vàng trên cỏ xanh</h4>
                    <div class="product-rating">
                      <i class="bi bi-star-fill"></i>
                      <i class="bi bi-star-fill"></i>
                      <i class="bi bi-star-fill"></i>
                      <i class="bi bi-star-fill"></i>
                      <i class="bi bi-star-fill"></i>
                      <span>(87)</span>
                    </div>
                    <div class="product-price">
                      <span class="current-price">68.00 VND</span>
                      <span class="old-price">80.00 VND</span>
                    </div>
                  </div>
                </div>

                <div class="product-card">
                  <div class="product-image">
                    <img src="{{ asset('assets/img/product/product-6.webp') }}" alt="Designer Handbag" class="img-fluid">
                  </div>
                  <div class="product-info">
                    <h4 class="product-name">Cho tôi 1 vé đi về tuổi thơ</h4>
                    <div class="product-rating">
                      <i class="bi bi-star-fill"></i>
                      <i class="bi bi-star-fill"></i>
                      <i class="bi bi-star-fill"></i>
                      <i class="bi bi-star-fill"></i>
                      <i class="bi bi-star-half"></i>
                      <span>(56)</span>
                    </div>
                    <div class="product-price">
                      <span class="current-price">129.990 VND</span>
                    </div>
                  </div>
                </div>

                <div class="product-card">
                  <div class="product-image">
                    <img src="{{ asset('assets/img/product/product-8.webp') }}" alt="Leather Crossbody" class="img-fluid">
                    <div class="product-badges">
                      <span class="badge-hot">Hot</span>
                    </div>
                  </div>
                  <div class="product-info">
                    <h4 class="product-name">Đắc nhân tâm</h4>
                    <div class="product-rating">
                      <i class="bi bi-star-fill"></i>
                      <i class="bi bi-star-fill"></i>
                      <i class="bi bi-star-fill"></i>
                      <i class="bi bi-star-fill"></i>
                      <i class="bi bi-star-fill"></i>
                      <span>(112)</span>
                    </div>
                    <div class="product-price">
                      <span class="current-price">95.50 VND</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 mb-5 mb-md-0" data-aos="fade-up" data-aos-delay="400">
            <div class="product-category">
              <h3 class="category-title">
                <i class="bi bi-star"></i>
              </h3>
              <div class="product-list">
                <div class="product-card">
                  <div class="product-image">
                    <img src="{{ asset('assets/img/product/product-7.webp') }}" alt="Pleated Midi Skirt" class="img-fluid">
                  </div>
                  <div class="product-info">
                    <h4 class="product-name">Người truyền ký ức</h4>
                    <div class="product-rating">
                      <i class="bi bi-star-fill"></i>
                      <i class="bi bi-star-fill"></i>
                      <i class="bi bi-star-fill"></i>
                      <i class="bi bi-star-fill"></i>
                      <i class="bi bi-star"></i>
                      <span>(32)</span>
                    </div>
                    <div class="product-price">
                      <span class="current-price">75.00 VND</span>
                    </div>
                  </div>
                </div>

                <div class="product-card">
                  <div class="product-image">
                    <img src="{{ asset('assets/img/product/product-4.webp') }}" alt="Geometric Earrings" class="img-fluid">
                    <div class="product-badges">
                      <span class="badge-limited">Giới hạn</span>
                    </div>
                  </div>
                  <div class="product-info">
                    <h4 class="product-name">Học ít hiểu nhiều</h4>
                    <div class="product-rating">
                      <i class="bi bi-star-fill"></i>
                      <i class="bi bi-star-fill"></i>
                      <i class="bi bi-star-fill"></i>
                      <i class="bi bi-star-fill"></i>
                      <i class="bi bi-star-half"></i>
                      <span>(47)</span>
                    </div>
                    <div class="product-price">
                      <span class="current-price">42.99 VND</span>
                    </div>
                  </div>
                </div>

                <div class="product-card">
                  <div class="product-image">
                    <img src="{{ asset('assets/img/product/product-9.webp') }}" alt="Structured Satchel" class="img-fluid">
                  </div>
                  <div class="product-info">
                    <h4 class="product-name">Siêu trí nhớ</h4>
                    <div class="product-rating">
                      <i class="bi bi-star-fill"></i>
                      <i class="bi bi-star-fill"></i>
                      <i class="bi bi-star-fill"></i>
                      <i class="bi bi-star-fill"></i>
                      <i class="bi bi-star-fill"></i>
                      <span>(64)</span>
                    </div>
                    <div class="product-price">
                      <span class="current-price">89.99 VND</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </section><!-- /Cards Section -->

    <!-- Call To Action Section -->
    <section id="call-to-action" class="call-to-action section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row">
          <div class="col-lg-8 mx-auto">
            <div class="main-content text-center" data-aos="zoom-in" data-aos-delay="200">
              <div class="offer-badge" data-aos="fade-down" data-aos-delay="250">
                <span class="limited-time">Giới hạn thời gian</span>
                <span class="offer-text">50% GIẢM GIÁ</span>
              </div>

              <h2 data-aos="fade-up" data-aos-delay="300">Giảm giá Flash độc quyền</h2>

              <p class="subtitle" data-aos="fade-up" data-aos-delay="350">Đừng bỏ lỡ đợt giảm giá lớn nhất trong năm của chúng tôi. Sản phẩm chất lượng cao với giá không thể tốt hơn chỉ trong 48 giờ tới.</p>

              <div class="countdown-wrapper" data-aos="fade-up" data-aos-delay="400">
                <div class="countdown d-flex justify-content-center" data-count="2025/12/31">
                  <div>
                    <h3 class="count-days"></h3>
                    <h4>Ngày</h4>
                  </div>
                  <div>
                    <h3 class="count-hours"></h3>
                    <h4>Giờ</h4>
                  </div>
                  <div>
                    <h3 class="count-minutes"></h3>
                    <h4>Phút</h4>
                  </div>
                  <div>
                    <h3 class="count-seconds"></h3>
                    <h4>Giây</h4>
                  </div>
                </div>
              </div>

              <div class="action-buttons" data-aos="fade-up" data-aos-delay="450">
                <a href="#" class="btn-shop-now">Mua ngay</a>
                <a href="#" class="btn-view-deals">Xem tất cả ưu đãi</a>
              </div>
            </div>
          </div>
        </div>

        <div class="row featured-products-row" data-aos="fade-up" data-aos-delay="500">
          <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="100">
            <div class="product-showcase">
              <div class="product-image">
                <img src="{{ asset('assets/img/product/product-5.webp') }}" alt="Featured Product" class="img-fluid">
                <div class="discount-badge">-45%</div>
              </div>
              <div class="product-details">
                <h6>Tiểu thuyết trinh thám</h6>
                <div class="price-section">
                  <span class="original-price">129.000 VND</span>
                  <span class="sale-price">71.000 VND</span>
                </div>
                <div class="rating-stars">
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <span class="rating-count">(324)</span>
                </div>
              </div>
            </div>
          </div><!-- End Product Showcase -->

          <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="150">
            <div class="product-showcase">
              <div class="product-image">
                <img src="{{ asset('assets/img/product/product-7.webp') }}" alt="Featured Product" class="img-fluid">
                <div class="discount-badge">-60%</div>
              </div>
              <div class="product-details">
                <h6>Tiền không ngủ</h6>
                <div class="price-section">
                  <span class="original-price">89.000 VND</span>
                  <span class="sale-price">36.000 VND</span>
                </div>
                <div class="rating-stars">
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-half"></i>
                  <span class="rating-count">(198)</span>
                </div>
              </div>
            </div>
          </div><!-- End Product Showcase -->

          <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="200">
            <div class="product-showcase">
              <div class="product-image">
                <img src="{{ asset('assets/img/product/product-11.webp') }}" alt="Featured Product" class="img-fluid">
                <div class="discount-badge">-35%</div>
              </div>
              <div class="product-details">
                <h6>Hạnh phúc tại tâm</h6>
                <div class="price-section">
                  <span class="original-price">159.000 VND</span>
                  <span class="sale-price">103.000 VND</span>
                </div>
                <div class="rating-stars">
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <span class="rating-count">(267)</span>
                </div>
              </div>
            </div>
          </div><!-- End Product Showcase -->

          <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="250">
            <div class="product-showcase">
              <div class="product-image">
                <img src="{{ asset('assets/img/product/product-1.webp') }}" alt="Featured Product" class="img-fluid">
                <div class="discount-badge">-55%</div>
              </div>
              <div class="product-details">
                <h6>Trên đường băng</h6>
                <div class="price-section">
                  <span class="original-price">75.000 VND</span>
                  <span class="sale-price">34.000 VND</span>
                </div>
                <div class="rating-stars">
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star"></i>
                  <span class="rating-count">(142)</span>
                </div>
              </div>
            </div>
          </div><!-- End Product Showcase -->
        </div>

      </div>

    </section><!-- /Call To Action Section -->

  </main>

  <footer id="footer" class="footer dark-background">
    <div class="footer-bottom">
      <div class="container">
        <div class="row gy-3 align-items-center">
          <div class="col-lg-6 col-md-12">
            <div class="copyright">
              <p>© <span></span> <strong class="sitename">MiuBook</strong></p>
            </div>
            <div class="credits mt-1">
              <!-- All the links in the footer should remain intact. -->
              <!-- You can delete the links only if you've purchased the pro version. -->
              <!-- Licensing information: https://bootstrapmade.com/license/ -->
              <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
              Cảm hứng <a href="https://bootstrapmade.com/">Mỗi ngày</a>
            </div>
          </div>

          <div class="col-lg-6 col-md-12">
            <div class="d-flex flex-wrap justify-content-lg-end justify-content-center align-items-center gap-4">
              <div class="legal-links">
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
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>
  <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/drift-zoom/Drift.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>

  <!-- Main JS File -->
  <script src="{{ asset('assets/js/main.js') }}"></script>

</body>

</html>
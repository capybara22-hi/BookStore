<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Category - NiceShop Bootstrap Template</title>
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

<body class="category-page">

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

    <!-- Page Title -->
    <div class="page-title light-background">
      <div class="container d-lg-flex justify-content-between align-items-center">
        <h1 class="mb-2 mb-lg-0">Sản phẩm</h1>
      </div>
    </div><!-- End Page Title -->

    <div class="container">
      <div class="row">

        <div class="col-lg-4 sidebar">

          <div class="widgets-container">

            <!-- Product Categories Widget -->
            <div class="product-categories-widget widget-item">

              <h3 class="widget-title">Danh mục sản phẩm</h3>

              <ul class="category-tree list-unstyled mb-0">

              <!-- Hiển thị danh mục và thể loại -->
              @foreach($danhmucs as $dm)
                @php
                  $collapseid = 'sub-'.$dm->ma_danh_muc;
                @endphp
                <li class="category-item">
                  <div class="d-flex justify-content-between align-items-center category-header collapsed" data-bs-toggle="collapse" data-bs-target="#{{ $collapseid }}" aria-expanded="false" aria-controls="{{ $collapseid }}">
                    <a href="javascript:void(0)" class="category-link">{{ $dm->ten_danh_muc }}</a>
                    <span class="category-toggle">
                      <i class="bi bi-chevron-down"></i>
                      <i class="bi bi-chevron-up"></i>
                    </span>
                  </div>
                  @if ($dm->theloai-> isNotEmpty())
                  <ul id="{{ $collapseid }}" class="subcategory-list list-unstyled collapse ps-3 mt-2">
                    @foreach ($dm->theloai as $tl)
                      <li><a href="#" class="subcategory-link">{{ $tl->ten_the_loai }}</a></li>
                    @endforeach
                  </ul>
                  @endif
                </li>
              @endforeach
              <!-- kết thúc hiển thị danh mục và thể loại -->
              </ul>

            </div><!--/Product Categories Widget -->

          </div>

        </div>

        <div class="col-lg-8">

          <!-- Category Header Section -->
          <section id="category-header" class="category-header section">

            <div class="container" data-aos="fade-up">

              <!-- Filter and Sort Options -->
              <div class="filter-container mb-4" data-aos="fade-up" data-aos-delay="100">
                <div class="row g-3">
                  <div class="col-12 col-md-6 col-lg-4">
                    <div class="filter-item search-form">
                      <label for="productSearch" class="form-label">Tìm kiếm sản phẩm</label>
                      <div class="input-group">
                        <input type="text" class="form-control" id="productSearch" placeholder="Tìm kiếm sản phẩm..." aria-label="Tìm kiếm sản phẩm">
                        <button class="btn search-btn" type="button">
                          <i class="bi bi-search"></i>
                        </button>
                      </div>
                    </div>
                  </div>

                  <div class="col-12 col-md-6 col-lg-2">
                    <div class="filter-item">
                      <label for="priceRange" class="form-label">Khoảng giá</label>
                      <select class="form-select" id="priceRange">
                        <option selected="">Tất cả giá</option>
                        <option>Dưới 25.000 VND</option>
                        <option>25.000 VND đến 50.000 VND</option>
                        <option>50.000 VND đến 100.000 VND</option>
                        <option>100.000 VND đến 200.000 VND</option>
                        <option>200.000 VND trở lên</option>
                      </select>
                    </div>
                  </div>

                  <div class="col-12 col-md-6 col-lg-2">
                    <div class="filter-item">
                      <label for="sortBy" class="form-label">Sắp xếp theo</label>
                      <select class="form-select" id="sortBy">
                        <option selected="">Nổi bật</option>
                        <option>Giá: Thấp đến Cao</option>
                        <option>Giá: Cao đến Thấp</option>
                      </select>
                    </div>
                  </div>
                </div>

                <div class="row mt-3">
                  <div class="col-12" data-aos="fade-up" data-aos-delay="200">
                    <div class="active-filters">
                      <span class="active-filter-label">Active Filters:</span>
                      <div class="filter-tags">
                        <span class="filter-tag">
                          Electronics <button class="filter-remove"><i class="bi bi-x"></i></button>
                        </span>
                        <span class="filter-tag">
                          $50 to $100 <button class="filter-remove"><i class="bi bi-x"></i></button>
                        </span>
                        <button class="clear-all-btn">Clear All</button>
                      </div>
                    </div>
                  </div>
                </div>

              </div>

            </div>

          </section><!-- /Category Header Section -->

          <!-- Category Product List Section -->
          <section id="category-product-list" class="category-product-list section">

            <div class="container" data-aos="fade-up" data-aos-delay="100">

              <div class="row g-4">
                <!-- Hiển thị danh sách sản phẩm -->
                @foreach ($sanphams as $sp)
                  <div class="col-6 col-xl-4">
                    <div class="product-card" data-aos="zoom-in">
                      <div class="product-image">
                        @foreach ($sp->file as $file)
                          @if ($loop->first) {{-- chỉ lấy ảnh đầu tiên --}}
                            <img src="{{ asset($file->duong_dan_luu) }}" class="main-image img-fluid" alt="Product">
                            <img src="{{ asset($file->duong_dan_luu) }}" class="hover-image img-fluid" alt="Product Variant">
                          @endif
                        @endforeach

                        
                      </div>

                      <div class="product-details">
                        <div class="product-category">Women's Fashion</div>
                        <h4 class="product-title">
                          <a href="{{ route('chitietsanpham', ['id' => $sp->ma_san_pham]) }}">{{ $sp->ten_san_pham }}</a>
                        </h4>
                        <div class="product-meta">
                          <div class="product-price">{{ number_format($sp->gia_tien_sp) }} VND</div>
                          <div class="product-rating">
                            <i class="bi bi-star-fill"></i>
                            4.8 <span>(42)</span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                @endforeach

              </div>

            </div>

          </section><!-- /Category Product List Section -->

          <!-- Category Pagination Section -->
          <section id="category-pagination" class="category-pagination section">

            <div class="container">
              <nav class="d-flex justify-content-center" aria-label="Page navigation">
                <ul>
                  <li>
                    <a href="#" aria-label="Previous page">
                      <i class="bi bi-arrow-left"></i>
                      <span class="d-none d-sm-inline">Previous</span>
                    </a>
                  </li>

                  <li><a href="#" class="active">1</a></li>
                  <li><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                  <li class="ellipsis">...</li>
                  <li><a href="#">8</a></li>
                  <li><a href="#">9</a></li>
                  <li><a href="#">10</a></li>

                  <li>
                    <a href="#" aria-label="Next page">
                      <span class="d-none d-sm-inline">Next</span>
                      <i class="bi bi-arrow-right"></i>
                    </a>
                  </li>
                </ul>
              </nav>
            </div>

          </section><!-- /Category Pagination Section -->

        </div>

      </div>
    </div>

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
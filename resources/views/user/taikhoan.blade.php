<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Account - NiceShop Bootstrap Template</title>
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

<body class="account-page">

  <header id="header" class="header sticky-top">
    <!-- Top Bar -->

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
                  <a class="dropdown-item d-flex align-items-center" href="{{ route('taikhoan')}}">
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
            <li><a href="{{ route('gioithieu') }}" class="active">Giới Thiệu</a></li>

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

            <li><a href="{{ route('lienhe') }}" class="active">Liên hệ</a></li>

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
        <h1 class="mb-2 mb-lg-0">Tài khoản</h1>
        <nav class="breadcrumbs">
        </nav>
      </div>
    </div><!-- End Page Title -->

    <!-- Account Section -->
    <section id="account" class="account section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <!-- Mobile Menu Toggle -->
        <div class="mobile-menu d-lg-none mb-4">
          <button class="mobile-menu-toggle" type="button" data-bs-toggle="collapse" data-bs-target="#profileMenu">
            <i class="bi bi-grid"></i>
            <span>Menu</span>
          </button>
        </div>

        <div class="row g-4">
          <!-- Profile Menu -->
          <div class="col-lg-3">
            <div class="profile-menu collapse d-lg-block" id="profileMenu">
              <!-- User Info -->
              <div class="user-info" data-aos="fade-right">
                <div class="user-avatar">
                  <img src="{{ asset('assets/img/person/person-f-1.webp') }}" alt="Profile" loading="lazy">
                  <span class="status-badge"><i class="bi bi-shield-check"></i></span>
                </div>
                <h4>{{ $nguoi_dung->name}}</h4>
                <div class="user-status">
                  <i class="bi bi-award"></i>
                  <span>Premium Member</span>
                </div>
              </div>

              <!-- Navigation Menu -->
              <nav class="menu-nav">
                <ul class="nav flex-column" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" data-bs-toggle="tab" href="#orders">
                      <i class="bi bi-box-seam"></i>
                      <span>Đơn hàng của tôi</span>
                      <span class="badge">{{ count($don_hang)}}</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#wishlist">
                      <i class="bi bi-heart"></i>
                      <span>Yêu thích</span>
                      <span class="badge">12</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#reviews">
                      <i class="bi bi-star"></i>
                      <span>Đánh giá của tôi</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#addresses">
                      <i class="bi bi-geo-alt"></i>
                      <span>Địa chỉ</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#settings">
                      <i class="bi bi-gear"></i>
                      <span>Thiết lập tài khoản</span>
                    </a>
                  </li>
                </ul>

                <div class="menu-footer">
                  <a href="{{ route('lienhe')}}" class="help-link">
                    <i class="bi bi-question-circle"></i>
                    <span>Hỗ trợ</span>
                  </a>
                  <a href="#" class="logout-link">
                    <i class="bi bi-box-arrow-right"></i>
                    <span>Đăng xuất</span>
                  </a>
                </div>
              </nav>
            </div>
          </div>

          <!-- Content Area -->
          <div class="col-lg-9">
            <div class="content-area">
              <div class="tab-content">
                <!-- Orders Tab -->
                <div class="tab-pane fade show active" id="orders">
                  <div class="section-header" data-aos="fade-up">
                    <h2>Đơn hàng của tôi</h2>
                    <div class="header-actions">
                      <div class="search-box">
                        <i class="bi bi-search"></i>
                        <input type="text" placeholder="Tìm kiếm đơn hàng...">
                      </div>
                      <div class="dropdown">
                        <button class="filter-btn" data-bs-toggle="dropdown">
                          <i class="bi bi-funnel"></i>
                          <span>Bộ lọc</span>
                        </button>
                        <ul class="dropdown-menu">
                          <li><a class="dropdown-item" href="#">Tất cả đơn hàng</a></li>
                          <li><a class="dropdown-item" href="#">Chờ xác nhận</a></li>
                          <li><a class="dropdown-item" href="#">Đang chuẩn bị hàng</a></li>
                          <li><a class="dropdown-item" href="#">Đang giao hàng</a></li>
                          <li><a class="dropdown-item" href="#">Đã giao hàng thành công</a></li>
                          <li><a class="dropdown-item" href="#">Đơn hàng đã bị hủy</a></li>
                        </ul>
                      </div>
                    </div>
                  </div>

                  <div class="orders-grid">
                    <!-- Order Card 1 -->
                    @foreach($don_hang as $dh)
                    <div class="order-card" data-aos="fade-up" data-aos-delay="100">
                      <div class="order-header">
                        <div class="order-id">
                          <span class="label">Mã đơn hàng:</span>
                          <span class="value">{{ $dh->ma_don_hang}}</span>
                        </div>
                        <div class="order-date">Feb 20, 2025</div>
                      </div>
                      <div class="order-content">
                        <div class="product-grid">
                          @foreach($sanphamgiohang as $gh)
                            @if($gh->ma_don_hang == $dh->ma_don_hang)
                              @php
                                  // Lấy file ảnh bìa của sản phẩm (bia_san_pham = 1)
                                  $anhBia = $gh->sanpham->file->where('bia_san_pham', 1)->first();
                              @endphp
                              <img src="{{ asset($anhBia->duong_dan_luu) }}" alt="Product" loading="lazy">
                            @endif
                          @endforeach
                          <!-- <img src="{{ asset('assets/img/product/product-2.webp') }}" alt="Product" loading="lazy">
                          <img src="{{ asset('assets/img/product/product-3.webp') }}" alt="Product" loading="lazy"> -->
                        </div>
                        <div class="order-info">
                          <div class="info-row">
                            <span>Trạng thái</span>
                            @switch($dh->trang_thai_dh)
                                @case(1)
                                  <span class="status processing">Đang chờ xác nhận đơn hàng</span>
                                  @break
                                @case(2)
                                  <span class="status processing">Đang chuẩn bị hàng</span>
                                  @break
                                @case(3)
                                  <span class="status shipped">Đang giao hàng</span>
                                  @break
                                @case(4)
                                  <span class="status delivered">Đã giao hàng thành công</span>
                                  @break
                                @case(5)
                                  <span class="status cancelled">Đơn hàng đã bị hủy</span>
                                  @break
                            @endswitch
                            
                          </div>
                          <div class="info-row">
                              <span>Sản phẩm</span>
                              @php $soluong = 0; @endphp
                              @foreach($sanphamgiohang as $gh)
                                  @if($gh->ma_don_hang == $dh->ma_don_hang)
                                      @php $soluong++; @endphp
                                  @endif
                              @endforeach
                              <span>{{ $soluong }} sản phẩm</span>
                          </div>
                          <div class="info-row">
                            <span>Thành tiền</span>
                            <span class="price">{{ number_format( $dh->thanh_tien)}} VND</span>
                          </div>
                        </div>
                      </div>
                      <div class="order-footer">
                        <button type="button" class="btn-track" data-bs-toggle="collapse" data-bs-target="#tracking{{ $dh->ma_don_hang}}" aria-expanded="false">Theo dõi đơn hàng</button>
                        <button type="button" class="btn-details" data-bs-toggle="collapse" data-bs-target="#details{{ $dh->ma_don_hang}}" aria-expanded="false">Xem chi tiết đơn hàng</button>
                      </div>

                      <!-- Order Tracking -->
                      <div class="collapse tracking-info" id="tracking{{ $dh->ma_don_hang}}">
                        <div class="tracking-timeline">
                          <div class="timeline-item {{ $dh->trang_thai_dh >= 1 ? 'completed' : '' }}">
                            <div class="timeline-icon">
                              <i class="bi bi-check-circle-fill"></i>
                            </div>
                            <div class="timeline-content">
                              <h5>Xác nhận đơn hàng</h5>
                              <p>Đơn hàng của bạn đang trong quá trình chờ xác nhận</p>
                              <span class="timeline-date">Feb 20, 2025 - 10:30 AM</span>
                            </div>
                          </div>

                          <div class="timeline-item {{ $dh->trang_thai_dh >= 2 ? 'completed' : '' }}">
                            <div class="timeline-icon">
                              <i class="bi bi-box-seam"></i>
                            </div>
                            <div class="timeline-content">
                              <h5>Chuẩn bị hàng</h5>
                              <p>Đơn hàng của bạn đang được chuẩn bị để gửi đi</p>
                              <span class="timeline-date">Feb 20, 2025 - 2:45 PM</span>
                            </div>
                          </div>


                          <div class="timeline-item {{ $dh->trang_thai_dh >= 3 ? 'completed' : '' }}" >
                            <div class="timeline-icon">
                              <i class="bi bi-truck"></i>
                            </div>
                            <div class="timeline-content">
                              <h5>Đang giao hàng</h5>
                              <p>Đơn hàng đang được giao tới bạn</p>
                            </div>
                          </div>

                          <div class="timeline-item {{ $dh->trang_thai_dh >= 4 ? 'completed' : '' }}">
                            <div class="timeline-icon">
                              <i class="bi bi-house-door"></i>
                            </div>
                            <div class="timeline-content">
                              <h5>Nhận hàng thành công</h5>
                              <p>Bạn đã nhận được hàng: Feb 22, 2025</p>
                            </div>
                            <div style=' margin-top: 30px;'>
                              <button style="background: {{ $dh->trang_thai_dh >= 3 ? 'gray': 'red'}}; color : {{ $dh->trang_thai_dh >= 3 ? 'black': 'white'}}; border-radius: 10px; width: 300px; height: 40px; margin-bottom:10px;" {{ $dh->trang_thai_dh >= 3 ? 'disabled' : ''}}>Hủy đơn hàng</button>
                              <p style='color:red;'>Đơn hàng đang được giao sẽ không được hủy nữa</p>
                            </div>
                          </div>
                        </div>
                      </div>

                      <!-- Order Details -->
                      <div class="collapse order-details" id="details{{ $dh->ma_don_hang}}">
                        <div class="details-content">
                          <div class="detail-section">
                            <h5>Thông tin đơn hàng</h5>            
                          </div>

                          <div class="detail-section">
                            <h5>Sản phẩm ({{$soluong}})</h5>
                            <div class="order-items">
                              @foreach($sanphamgiohang as $gh)
                                  @if($gh->ma_don_hang == $dh->ma_don_hang)
                                    @php
                                        // Lấy file ảnh bìa của sản phẩm (bia_san_pham = 1)
                                        $anhBia = $gh->sanpham->file->where('bia_san_pham', 1)->first();
                                    @endphp
                                      <div class="item">
                                        <img src="{{ asset($anhBia->duong_dan_luu) }}" alt="Product" loading="lazy">
                                        <div class="item-info">
                                          <h6>{{ $gh->ten_sp}}</h6>
                                          <div class="item-meta">
                                            <span class="sku">Tac gia:???</span>
                                            <span class="qty">SL: {{ $gh->so_luong_sp }}</span>
                                          </div>
                                        </div>
                                        <div class="item-price">{{ number_format($gh->tong_tien)}} VND</div>
                                      </div>
                                  @endif
                              @endforeach
                              
                            </div>
                          </div>

                          <div class="detail-section">
                            <h5>Giá tiền chi tiết</h5>
                            <div class="price-breakdown">
                              <div class="price-row">
                                <span>Thành tiền</span>
                                <span>{{ number_format($dh->tien_hang)}} VND</span>
                              </div>
                              <div class="price-row">
                                <span>Vận chuyển</span>
                                <span>{{ number_format($dh->phi_van_chuyen)}} VND</span>
                              </div>
                              <div class="price-row total">
                                <span>Thành tiền</span>
                                <span>{{ number_format($dh->thanh_tien)}} VND</span>
                              </div>
                            </div>
                          </div>

                          <div class="detail-section">
                            <h5>Địa chỉ giao hàng</h5>
                            <div class="address-info">
                              <p>Sarah Anderson<br>123 Main Street<br>Apt 4B<br>New York, NY 10001<br>United States</p>
                              <p class="contact">+1 (555) 123-4567</p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    @endforeach
                  </div>

                  <!-- Pagination -->
                  <div class="pagination-wrapper" data-aos="fade-up">
                    <button type="button" class="btn-prev" disabled="">
                      <i class="bi bi-chevron-left"></i>
                    </button>
                    <div class="page-numbers">
                      <button type="button" class="active">1</button>
                      <button type="button">2</button>
                      <button type="button">3</button>
                      <span>...</span>
                      <button type="button">12</button>
                    </div>
                    <button type="button" class="btn-next">
                      <i class="bi bi-chevron-right"></i>
                    </button>
                  </div>
                </div>

                <!-- Wishlist Tab -->
                <div class="tab-pane fade" id="wishlist">
                  <div class="section-header" data-aos="fade-up">
                    <h2>My Wishlist</h2>
                    <div class="header-actions">
                      <button type="button" class="btn-add-all">Add All to Cart</button>
                    </div>
                  </div>

                  <div class="wishlist-grid">
                    <!-- Wishlist Item 1 -->
                    <div class="wishlist-card" data-aos="fade-up" data-aos-delay="100">
                      <div class="wishlist-image">
                        <img src="{{ asset('assets/img/product/product-1.webp') }}" alt="Product" loading="lazy">
                        <button class="btn-remove" type="button" aria-label="Remove from wishlist">
                          <i class="bi bi-trash"></i>
                        </button>
                        <div class="sale-badge">-20%</div>
                      </div>
                      <div class="wishlist-content">
                        <h4>Lorem ipsum dolor sit amet</h4>
                        <div class="product-meta">
                          <div class="rating">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-half"></i>
                            <span>(4.5)</span>
                          </div>
                          <div class="price">
                            <span class="current">$79.99</span>
                            <span class="original">$99.99</span>
                          </div>
                        </div>
                        <button type="button" class="btn-add-cart">Add to Cart</button>
                      </div>
                    </div>

                    <!-- Wishlist Item 2 -->
                    <div class="wishlist-card" data-aos="fade-up" data-aos-delay="200">
                      <div class="wishlist-image">
                        <img src="{{ asset('assets/img/product/product-2.webp') }}" alt="Product" loading="lazy">
                        <button class="btn-remove" type="button" aria-label="Remove from wishlist">
                          <i class="bi bi-trash"></i>
                        </button>
                      </div>
                      <div class="wishlist-content">
                        <h4>Consectetur adipiscing elit</h4>
                        <div class="product-meta">
                          <div class="rating">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star"></i>
                            <span>(4.0)</span>
                          </div>
                          <div class="price">
                            <span class="current">$149.99</span>
                          </div>
                        </div>
                        <button type="button" class="btn-add-cart">Add to Cart</button>
                      </div>
                    </div>

                    <!-- Wishlist Item 3 -->
                    <div class="wishlist-card" data-aos="fade-up" data-aos-delay="300">
                      <div class="wishlist-image">
                        <img src="{{ asset('assets/img/product/product-3.webp') }}" alt="Product" loading="lazy">
                        <button class="btn-remove" type="button" aria-label="Remove from wishlist">
                          <i class="bi bi-trash"></i>
                        </button>
                        <div class="out-of-stock-badge">Out of Stock</div>
                      </div>
                      <div class="wishlist-content">
                        <h4>Sed do eiusmod tempor</h4>
                        <div class="product-meta">
                          <div class="rating">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <span>(5.0)</span>
                          </div>
                          <div class="price">
                            <span class="current">$199.99</span>
                          </div>
                        </div>
                        <button type="button" class="btn-notify">Notify When Available</button>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Reviews Tab -->
                <div class="tab-pane fade" id="reviews">
                  <div class="section-header" data-aos="fade-up">
                    <h2>My Reviews</h2>
                    <div class="header-actions">
                      <div class="dropdown">
                        <button class="filter-btn" data-bs-toggle="dropdown">
                          <i class="bi bi-funnel"></i>
                          <span>Sort by: Recent</span>
                        </button>
                        <ul class="dropdown-menu">
                          <li><a class="dropdown-item" href="#">Recent</a></li>
                          <li><a class="dropdown-item" href="#">Highest Rating</a></li>
                          <li><a class="dropdown-item" href="#">Lowest Rating</a></li>
                        </ul>
                      </div>
                    </div>
                  </div>

                  <div class="reviews-grid">
                    <!-- Review Card 1 -->
                    <div class="review-card" data-aos="fade-up" data-aos-delay="100">
                      <div class="review-header">
                        <img src="{{ asset('assets/img/product/product-1.webp') }}" alt="Product" class="product-image" loading="lazy">
                        <div class="review-meta">
                          <h4>Lorem ipsum dolor sit amet</h4>
                          <div class="rating">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <span>(5.0)</span>
                          </div>
                          <div class="review-date">Reviewed on Feb 15, 2025</div>
                        </div>
                      </div>
                      <div class="review-content">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                      </div>
                      <div class="review-footer">
                        <button type="button" class="btn-edit">Edit Review</button>
                        <button type="button" class="btn-delete">Delete</button>
                      </div>
                    </div>

                    <!-- Review Card 2 -->
                    <div class="review-card" data-aos="fade-up" data-aos-delay="200">
                      <div class="review-header">
                        <img src="{{ asset('assets/img/product/product-2.webp') }}" alt="Product" class="product-image" loading="lazy">
                        <div class="review-meta">
                          <h4>Consectetur adipiscing elit</h4>
                          <div class="rating">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star"></i>
                            <span>(4.0)</span>
                          </div>
                          <div class="review-date">Reviewed on Feb 10, 2025</div>
                        </div>
                      </div>
                      <div class="review-content">
                        <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                      </div>
                      <div class="review-footer">
                        <button type="button" class="btn-edit">Edit Review</button>
                        <button type="button" class="btn-delete">Delete</button>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Addresses Tab -->
                 
                <div class="tab-pane fade" id="addresses">
                  <div class="section-header" data-aos="fade-up">
                    <h2>Địa chỉ của tôi</h2>
                    <div class="header-actions">
                      <button type="button" class="btn-add-new">
                        <i class="bi bi-plus-lg"></i>
                        Thêm địa chỉ mới
                      </button>
                    </div>
                  </div>

                  <div class="addresses-grid">
                    @php 
                      $index = 1;
                    @endphp
                    <!-- Address Card 1 -->
                     @foreach($dia_chi as $dc)
                    <div class="address-card default" data-aos="fade-up" data-aos-delay="100">
                      <div class="card-header">
                        <h4>Địa chỉ @php echo $index++; @endphp </h4>
                        <!-- <span class="default-badge">Default</span> -->
                      </div>
                      <div class="card-body">
                        <p class="address-text"> {{ $dc->dia_chi}}</p>
                        <div class="contact-info">
                          <div><i class="bi bi-person"></i> {{ $dc->ten_nguoi_nhan}}</div>
                          <div><i class="bi bi-telephone"></i> (+84 ) {{$dc->so_dien_thoai}}</div>
                        </div>
                      </div>
                      <div class="card-actions">
                        <button type="button" class="btn-edit">
                          <i class="bi bi-pencil"></i>
                          Sửa
                        </button>
                        <button type="button" class="btn-remove">
                          <i class="bi bi-trash"></i>
                          Xóa
                        </button>
                      </div>
                    </div>
                    @endforeach
                  </div>
                </div>

                <!-- Settings Tab -->
                <div class="tab-pane fade" id="settings">
                  <div class="section-header" data-aos="fade-up">
                    <h2>Thiết lập tài khoản</h2>
                  </div>

                  <div class="settings-content">
                    <!-- Personal Information -->
                    <div class="settings-section" data-aos="fade-up">
                      <h3>Thông tin cá nhân</h3>
                      <form class="php-email-form settings-form">
                        <div class="row g-3">
                          <div class="col-md-6">
                            <label for="firstName" class="form-label">Họ tên</label>
                            <input type="text" class="form-control" id="firstName" value="{{ $nguoi_dung-> name}}" required="">
                          </div>
                          
                          <div class="col-md-6">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" value="{{ $nguoi_dung->email}}" required="">
                          </div>
                        </div>

                        <div class="form-buttons">
                          <button type="submit" class="btn-save">Lưu thay đổi</button>
                        </div>

                        <!-- <div class="loading">Loading</div>
                        <div class="error-message"></div>
                        <div class="sent-message">Your changes have been saved successfully!</div> -->
                      </form>
                    </div>

                    <!-- Security Settings -->
                    <div class="settings-section" data-aos="fade-up" data-aos-delay="200">
                      <h3>Thay đổi mật khẩu</h3>
                      <form class="php-email-form settings-form">
                        <div class="row g-3">
                          <div class="col-md-12">
                            <label for="currentPassword" class="form-label">Mật khẩu hiện tại</label>
                            <input type="password" class="form-control" id="currentPassword" required="">
                          </div>
                          <div class="col-md-6">
                            <label for="newPassword" class="form-label">Mật khẩu mới</label>
                            <input type="password" class="form-control" id="newPassword" required="">
                          </div>
                          <div class="col-md-6">
                            <label for="confirmPassword" class="form-label">Nhập lại mật khẩu mới</label>
                            <input type="password" class="form-control" id="confirmPassword" required="">
                          </div>
                        </div>

                        <div class="form-buttons">
                          <button type="submit" class="btn-save">Cập nhật mật khẩu mới</button>
                        </div>

                        <!-- <div class="loading">Loading</div>
                        <div class="error-message"></div>
                        <div class="sent-message">Your password has been updated successfully!</div> -->
                      </form>
                    </div>

                    <!-- Delete Account -->
                    <div class="settings-section danger-zone" data-aos="fade-up" data-aos-delay="300">
                      <h3>Xóa tài khoản</h3>
                      <div class="danger-zone-content">
                        <p>Khi bạn xóa tài khoản, sẽ không thể khôi phục lại. Vui lòng chắc chắn.</p>
                        <button type="button" class="btn-danger">Xóa tài khoản</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </section><!-- /Account Section -->

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
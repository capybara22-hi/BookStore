    <!-- Main Header -->
    <div class="main-header">
      <div class="container-fluid container-xl">
        <div class="d-flex py-3 align-items-center justify-content-between">

          <!-- Logo -->
          <a href="{{ $home }}" class="logo d-flex align-items-center">
            <!-- Uncomment the line below if you also wish to use an image logo -->
            <!-- <img src="assets/img/logo.webp" alt=""> -->
            <h1 class="sitename">MiuBook</h1>
          </a>

          <!-- Search -->
          <form action="{{ $searchRoute }}" class="search-form desktop-search-form">
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
                  <a class="dropdown-item d-flex align-items-center" href="{{ $taikhoan }}">
                    <i class="bi bi-person-circle me-2"></i>
                    <span>Hồ Sơ Của Tôi</span>
                  </a>
                  <a class="dropdown-item d-flex align-items-center" href="{{ $taikhoan }}">
                    <i class="bi bi-bag-check me-2"></i>
                    <span>Đơn Hàng Của Tôi</span>
                  </a>
                  <a class="dropdown-item d-flex align-items-center" href="{{ $taikhoan }}">
                    <i class="bi bi-heart me-2"></i>
                    <span>Danh Sách Yêu Thích</span>
                  </a>
                  <a class="dropdown-item d-flex align-items-center" href="{{ $taikhoan }}">
                    <i class="bi bi-gear me-2"></i>
                    <span>Cài Đặt</span>
                  </a>
                </div>
                <div class="dropdown-footer">
                  <a href="{{ $login }}" class="btn btn-primary w-100 mb-2">Đăng Nhập</a>
                  <a href="{{ $register }}" class="btn btn-outline-primary w-100">Đăng Ký</a>
                </div>
              </div>
            </div>

            <!-- Yêu thích -->
            <a href="{{ $taikhoan }}" class="header-action-btn d-none d-md-block">
              <i class="bi bi-heart"></i>
              <span class="badge">0</span>
            </a>

            <!-- Giỏ hàng -->
            <a href="{{ $giohang }}" class="header-action-btn">
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
            <li><a href="{{ $home }}" class="active">Trang Chủ</a></li>
            <li><a href="{{ $gioithieu }}" class="active">Giới Thiệu</a></li>

            <!-- Products Mega Menu 1 -->
            <li><a href="{{ $sanpham }}" class="active">Sản phẩm</a></li>
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

            <li><a href="{{ $lienhe }}" class="active">Liên hệ</a></li>

          </ul>
        </nav>
      </div>
    </div>
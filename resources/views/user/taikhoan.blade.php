@extends('components.homeLayout')

@section('taikhoan')
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
@endsection
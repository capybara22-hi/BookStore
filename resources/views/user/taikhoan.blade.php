@if(session()->has('successBYT'))
<script>
  alert("{{ session('successBYT') }}");
</script>
@elseif(session()->has('success'))
<script>
  alert("{{ session('success') }}");
</script>
@elseif(session()->has('successDG'))
<script>
  alert("{{ session('successDG') }}");
</script>
@elseif(session()->has('successXDG'))
<script>
  alert("{{ session('successXDG') }}");
</script>
@endif
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
                      <span class="badge">{{ count($yeu_thich) }}</span>
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
                        <button type="button" 
                                class="btn-order-action" 
                                data-dh="{{ $dh->ma_don_hang }}" 
                                data-status="{{ $dh->trang_thai_dh }}"
                                {{ $dh->trang_thai_dh == 6 ? 'disabled' : '' }}
                                style="
                                    {{ $dh->trang_thai_dh >= 4 ? 'background-color: orange; color: white;' : '' }}
                                    {{ $dh->trang_thai_dh == 6 ? 'background-color: gray; cursor: not-allowed;' : '' }}
                                ">
                            @if($dh->trang_thai_dh == 6)
                                Đã đánh giá
                            @elseif($dh->trang_thai_dh >= 4)
                                Đánh giá đơn hàng
                            @elseif($dh->trang_thai_dh == 3)
                                Xác nhận đã nhận
                            @else
                                Hủy đơn hàng
                            @endif
                        </button>
                        <button type="button" 
                                class="btn-details" 
                                data-bs-toggle="collapse" 
                                data-bs-target="#details{{ $dh->ma_don_hang }}" 
                                aria-expanded="false">
                            Xem chi tiết
                        </button>
                      </div>

                      <!-- Modal đánh giá -->
                      @if($dh->trang_thai_dh >= 4)
                      <div class="modal fade" id="evaluateModal{{ $dh->ma_don_hang }}" tabindex="-1" aria-labelledby="evaluateModalLabel{{ $dh->ma_don_hang }}" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered">
                              <div class="modal-content">
                                  <div class="modal-header">
                                      <h5 class="modal-title" id="evaluateModalLabel{{ $dh->ma_don_hang }}">Đánh giá đơn hàng {{ $dh->ma_don_hang }}</h5>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  <form action="{{ route('review.store') }}" method="POST">
                                      @csrf
                                      <div class="modal-body">
                                          <input type="hidden" name="ma_don_hang" value="{{ $dh->ma_don_hang }}">
                                          <div class="mb-3">
                                              <label for="rating{{ $dh->ma_don_hang }}" class="form-label">Đánh giá sao:</label>
                                              <select class="form-select" id="rating{{ $dh->ma_don_hang }}" name="rating">
                                                  <option value="5">5 - Tuyệt vời</option>
                                                  <option value="4">4 - Tốt</option>
                                                  <option value="3">3 - Trung bình</option>
                                                  <option value="2">2 - Kém</option>
                                                  <option value="1">1 - Rất kém</option>
                                              </select>
                                          </div>
                                          <div class="mb-3">
                                              <label for="comment{{ $dh->ma_don_hang }}" class="form-label">Bình luận:</label>
                                              <textarea class="form-control" id="comment{{ $dh->ma_don_hang }}" name="comment" rows="3"></textarea>
                                          </div>
                                      </div>
                                      <div class="modal-footer">
                                          <button type="submit" class="btn btn-primary">Gửi đánh giá</button>
                                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                                      </div>
                                  </form>
                              </div>
                          </div>
                      </div>
                      @endif

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

                </div>

                <!-- Wishlist Tab -->
                <div class="tab-pane fade" id="wishlist">
                  <div class="section-header" data-aos="fade-up">
                    <h2>Những cuốn sách yêu thích</h2>
                  </div>

                  <div class="wishlist-grid">
                    <!-- Wishlist Item 1 -->
                    @foreach($yeu_thich as $yt)
                      <div class="wishlist-card" data-aos="fade-up" data-aos-delay="100">
                          <div class="wishlist-image">
                              <img src="{{ asset('assets/img/product/product-1.webp') }}" alt="Product" loading="lazy">
                              
                              <!-- Nút xóa khỏi yêu thích -->
                              <form action="{{ route('yeuthich.toggle', $yt->ma_san_pham) }}" method="POST" style="display:inline">
                                  @csrf
                                  <button class="btn-remove" type="submit" aria-label="Remove from wishlist">
                                      <i class="bi bi-trash"></i>
                                  </button>
                              </form>
                          </div>

                          <div class="wishlist-content">
                              <h4>{{ $yt->sanpham->ten_san_pham }}</h4>

                              {{-- Rating --}}
                              @php
                                  $avgRating = round($yt->sanpham->reviews->avg('rating'), 1);
                                  $fullStars = floor($avgRating);
                                  $halfStar = ($avgRating - $fullStars) >= 0.5 ? 1 : 0;
                                  $emptyStars = 5 - $fullStars - $halfStar;
                              @endphp

                              <div class="product-meta">
                                  <div class="rating">
                                      @for($i=0; $i<$fullStars; $i++)
                                          <i class="bi bi-star-fill"></i>
                                      @endfor
                                      @if($halfStar)
                                          <i class="bi bi-star-half"></i>
                                      @endif
                                      @for($i=0; $i<$emptyStars; $i++)
                                          <i class="bi bi-star"></i>
                                      @endfor
                                      <span>({{ $avgRating }})</span>
                                  </div>

                                  <div class="price">
                                      <span class="current">{{ number_format($yt->sanpham->gia_tien_sp) }} VND</span>
                                  </div>
                              </div>

                              <!-- Thêm vào giỏ hàng -->
                              <form action="{{ route('themgiohang', ['id' => $yt->ma_san_pham]) }}" method="POST">
                                  @csrf
                                  <button type="submit" class="btn btn-primary btn-add-cart">
                                      <i class="bi bi-bag-plus"></i> Thêm vào giỏ hàng
                                  </button>
                              </form>
                          </div>
                      </div>
                    @endforeach

                  </div>
                </div>

                <!-- Reviews Tab -->
                <div class="tab-pane fade" id="reviews">
                  <div class="section-header" data-aos="fade-up">
                    <h2>Đánh giá đơn hàng</h2>
                    <div class="header-actions">
                      <div class="dropdown">
                        <button class="filter-btn" data-bs-toggle="dropdown">
                          <i class="bi bi-funnel"></i>
                          <span>Sắp xếp</span>
                        </button>
                        <ul class="dropdown-menu">
                          <li><a class="dropdown-item" href="#">Gần đây</a></li>
                          <li><a class="dropdown-item" href="#">Đánh giá cao - thấp</a></li>
                          <li><a class="dropdown-item" href="#">Đánh giá thấp - cao</a></li>
                        </ul>
                      </div>
                    </div>
                  </div>

                  <div class="reviews-grid">
                      @foreach($reviews as $review)
                          <div class="review-card" data-aos="fade-up">
                              <div class="review-header">
                                  <img src="{{ asset('assets/img/product/product-1.webp') }}" alt="Product" class="product-image" loading="lazy">
                                  <div class="review-meta">
                                      <h4>{{ $review->sanpham->ten_san_pham }}</h4>
                                      <div class="rating">
                                          @for($i=1; $i<=5; $i++)
                                              <i class="bi {{ $i <= $review->rating ? 'bi-star-fill' : 'bi-star' }}"></i>
                                          @endfor
                                          <span>({{ $review->rating }})</span>
                                      </div>
                                      <div class="review-date">Đánh giá vào: {{ $review->created_at->format('d M, Y') }}</div>
                                  </div>
                              </div>

                              <div class="review-content">
                                  <p>Nội dung đánh giá: {{ $review->comment }}</p>
                              </div>

                              <div class="review-footer" style="display:flex; gap:8px;">
                                  <button class="btn-edit-review"
                                          data-id="modal-{{ $review->ma_danh_gia }}"
                                          {{ $review->edit_count >= 2 ? 'disabled' : '' }}>
                                      Sửa
                                  </button>

                                  <form action="{{ route('review.destroy', $review->ma_danh_gia) }}" method="POST" style="display:inline">
                                      @csrf
                                      @method('DELETE')
                                      <button type="submit" class="btn-delete" onclick="return confirm('Bạn có chắc muốn xóa review này?')">
                                          Xóa
                                      </button>
                                  </form>
                              </div>
                          </div>

                          <!-- Modal sửa review -->
                          <div class="modal" id="modal-{{ $review->ma_danh_gia }}"
                              style="display:none; position: fixed; z-index: 9999; inset: 0; background: rgba(0,0,0,0.4); align-items: center; justify-content: center;">
                              
                              <div class="modal-content"
                                  style="background: #fff; width: 420px; border-radius: 14px; padding: 22px 24px; box-shadow: 0 20px 50px rgba(0,0,0,0.25); position: relative;">
                                  
                                  <span class="close-modal"
                                        style="position: absolute; top: 12px; right: 14px; font-size: 26px; cursor: pointer; color: #888;">
                                      &times;
                                  </span>

                                  <h4 style="text-align: center; margin-bottom: 18px; font-size: 20px; font-weight: 600;">
                                      Sửa đánh giá
                                  </h4>

                                  <form method="POST" action="{{ route('review.update', $review->ma_danh_gia) }}">
                                      @csrf

                                      <label style="font-weight: 500; margin-bottom: 6px; display:block;">Đánh giá:</label>
                                      <select name="rating" style="width: 100%; padding: 8px 10px; border-radius: 8px; border: 1px solid #ccc; margin-bottom: 14px;">
                                          @for($i=1;$i<=5;$i++)
                                              <option value="{{ $i }}" {{ $review->rating == $i ? 'selected' : '' }}>
                                                  {{ $i }} sao
                                              </option>
                                          @endfor
                                      </select>

                                      <label style="font-weight: 500; margin-bottom: 6px; display:block;">Nội dung:</label>
                                      <textarea name="comment" rows="4"
                                                style="width: 100%; padding: 8px 10px; border-radius: 8px; border: 1px solid #ccc; margin-bottom: 18px; resize: none;">{{ $review->comment }}
                                      </textarea>

                                      <button type="submit"
                                              style="width: 100%; background: orange; border: none; color: white; padding: 10px; border-radius: 8px; font-weight: 600; cursor: pointer;">
                                          Cập nhật
                                      </button>
                                  </form>
                              </div>
                          </div>

                      @endforeach
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
<script>
  document.addEventListener("DOMContentLoaded", function () {

    // Mở modal
    document.querySelectorAll(".btn-edit-review").forEach(btn => {
        btn.addEventListener("click", function () {
            let modalId = this.getAttribute("data-id");
            let modal = document.getElementById(modalId);
            if (modal) modal.style.display = "flex";
        });
    });

    // Đóng modal khi bấm nút X
    document.querySelectorAll(".close-modal").forEach(closeBtn => {
        closeBtn.addEventListener("click", function () {
            this.closest(".modal").style.display = "none";
        });
    });

    // Đóng modal khi click ra ngoài
    document.querySelectorAll(".modal").forEach(modal => {
        modal.addEventListener("click", function (e) {
            if (e.target === modal) modal.style.display = "none";
        });
    });

  });
  document.querySelectorAll('.btn-order-action').forEach(btn => {
      btn.addEventListener('click', function () {

          let status = parseInt(this.dataset.status);
          const maDH = this.dataset.dh;

          // ⛔ ĐÃ ĐÁNH GIÁ → KHÔNG LÀM GÌ
          if (status === 6) {
              return;
          }

          // ✅ XÁC NHẬN ĐÃ NHẬN HÀNG
          if (status === 3) {
              if (!confirm("Bạn đã nhận được hàng?")) return;

              fetch(`/user/don-hang/${maDH}/xac-nhan`, {
                  method: 'POST',
                  headers: {
                      'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                  }
              })
              .then(res => res.json())
              .then(data => {
                  if (data.status === 'success') {
                      alert("Xác nhận nhận hàng thành công");

                      // 🔁 cập nhật nút ngay
                      this.dataset.status = 4;
                      this.textContent = "Đánh giá đơn hàng";
                      this.style.background = "orange";
                      this.style.color = "white";
                  }
              });
          }

          // ⭐ MỞ MODAL ĐÁNH GIÁ
          else if (status === 4) {
              const modalEl = document.getElementById(`evaluateModal${maDH}`);
              if (modalEl) {
                  const modal = new bootstrap.Modal(modalEl);
                  modal.show();
              }
          }

          // ❌ HỦY ĐƠN
          else if (status < 3) {
              if (!confirm("Bạn có chắc muốn hủy đơn hàng?")) return;

              fetch(`/user/don-hang/${maDH}/huy`, {
                  method: 'POST',
                  headers: {
                      'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                  }
              })
              .then(res => res.json())
              .then(data => {
                  if (data.status === 'success') {
                      alert("Đơn hàng đã bị hủy");
                      location.reload();
                  }
              });
          }

      });
  });
</script>

@endsection
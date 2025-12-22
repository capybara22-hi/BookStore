@if(session()->has('success'))
<script>
  alert("{{ session('success') }}");
</script>
@elseif(session()->has('successYT'))
<script>
  alert("{{ session('successYT') }}");
</script>
@endif


@extends('components.homelayout')

@section('chitietsanpham')
<main class="main">

  <!-- Page Title -->
  <!-- <div class="page-title light-background">
    <div class="container d-lg-flex justify-content-between align-items-center">
      <h1 class="mb-2 mb-lg-0">Chi tiết sản phẩm</h1>
    </div>
  </div> -->
  <!-- End Page Title -->

  <!-- Product Details Section -->
  <section id="product-details" class="product-details section">

    <div class="container" data-aos="fade-up" data-aos-delay="100">

      <div class="row g-4">
        <!-- Ảnh sản phẩm -->
        <div class="col-lg-5" data-aos="zoom-in" data-aos-delay="150">
          <div class="product-gallery">
            @foreach($sanpham->file as $file)
            @if($file->bia_san_pham == 1)
            <div class="main-showcase">
              <div class="image-zoom-container" style="max-width: 400px; margin: 0 auto;">
                <img src="{{ asset($file->duong_dan_luu) }}" alt="{{ $file->ten_file }}" class="img-fluid main-product-image drift-zoom" id="main-product-image" data-zoom="{{ asset($file->duong_dan_luu) }}" style="max-height: 500px; object-fit: contain;">

                <div class="image-navigation">
                  <button class="nav-arrow prev-image image-nav-btn prev-image" type="button">
                    <i class="bi bi-chevron-left"></i>
                  </button>
                  <button class="nav-arrow next-image image-nav-btn next-image" type="button">
                    <i class="bi bi-chevron-right"></i>
                  </button>
                </div>
              </div>
            </div>
            @endif
            @endforeach
            <div class="thumbnail-grid">
              @foreach($sanpham->file as $file)
              <div class="thumbnail-wrapper thumbnail-item active" data-image="{{ asset($file->duong_dan_luu) }}">
                <img src="{{ asset($file->duong_dan_luu) }}" alt="{{ $file->ten_file }}" class="img-fluid">
              </div>
              @endforeach
            </div>
          </div>
        </div>

        <!-- chi tiết sản phẩm -->
        <div class="col-lg-7" data-aos="fade-left" data-aos-delay="200">
          <div class="product-details">
            <div class="product-badge-container">
              <span class="badge-category">Sách</span>
              <div class="rating-group">
                <div class="stars">
                  @for($i = 1; $i <= 5; $i++)
                    <i class="bi {{ $i <= round($avgRating) ? 'bi-star-fill' : 'bi-star' }}"></i>
                    @endfor
                </div>
                <span class="review-text">
                  ({{ $totalReviews }} đánh giá)
                </span>
              </div>
            </div>

            <h1 class="product-name"> {{ $sanpham->ten_san_pham }} </h1>
            <div class="pricing-section">
              <div class="price-display">
                <span class="sale-price">Giá tiền: {{ number_format($sanpham->gia_tien_sp)}} VND</span>
              </div>
              <div class="savings-info">
                <span class="save-amount">Tác giả : {{ $sanpham->tac_gia }}</span>
              </div>
            </div>

            <div class="product-description">
              <p>{{ $sanpham->mo_ta_san_pham }}</p>
            </div>

            <div class="availability-status">
              <div class="stock-indicator">
                <i class="bi bi-check-circle-fill"></i>
                <span class="stock-text">Số lượng trong kho:</span>
              </div>
              <div class="quantity-left">{{ $sanpham->so_luong_sp }}</div>
            </div>

            <div class="action-buttons" style="display:flex; gap:12px; margin-top:15px;">
              <!-- Form thêm vào giỏ hàng -->
              <div>
                <form action="{{ route('themgiohang',['id' => $sanpham->ma_san_pham]) }}" method="post">
                  @csrf
                  <div class="purchase-section">
                    <div class="quantity-control">
                      <label class="control-label">Số lượng:</label>
                      <div class="quantity-input-group">
                        <div class="quantity-selector">
                          <button class="quantity-btn decrease" type="button">
                            <i class="bi bi-dash"></i>
                          </button>
                          <input type="number" class="quantity-input" name="so_luong_sp" value="1" min="1" max="{{ $sanpham->so_luong_sp }}">
                          <button class="quantity-btn increase" type="button">
                            <i class="bi bi-plus"></i>
                          </button>
                        </div>
                      </div>
                    </div>

                    <div class="action-buttons">
                      @if($daCoTrongGio)
                      <button type="button" class="btn" style="background: orange; color: white; cursor: default" disabled>
                        <i class="bi bi-check-circle"></i>
                        Đã có trong giỏ
                      </button>
                      @else
                      <button class="btn primary-action" name="action" value="add" type="submit">
                        <i class="bi bi-bag-plus"></i>
                        Thêm vào giỏ hàng
                      </button>
                      @endif
                    </div>
                  </div>
                </form>
              </div>

              <!-- Form Yêu thích -->
              <div>
                <form id="yeuthich-form-{{ $sanpham->ma_san_pham }}" action="{{ route('yeuthich.toggle', $sanpham->ma_san_pham) }}" method="POST">
                  @csrf
                  <button type="submit" class="btn icon-action" title="Yêu thích"
                    style="
                                background: {{ $daYeuThich ? '#dc3545' : 'white' }};
                                color: {{ $daYeuThich ? 'white' : '#dc3545' }};
                                border: 2px solid #dc3545;
                                width:50px; height:38px; border-radius:10px;
                                margin-left:auto;
                                display:flex; align-items:center; justify-content:center;
                            ">
                    <i class="bi bi-heart"></i>
                  </button>
                </form>
              </div>

            </div>
          </div>
        </div>
      </div>

      <!-- REVIEWS SECTION -->
      <div class="row mt-5">
        <div class="col-12">

          <h3 class="mb-3">
            Đánh giá sản phẩm ({{ $totalReviews }})
          </h3>

          <!-- OVERVIEW -->
          <div class="reviews-header d-flex gap-5 mb-4">
            <div>
              <div style="font-size:32px;font-weight:bold">
                {{ $avgRating }}
              </div>
              <div>
                @for($i = 1; $i <= 5; $i++)
                  <i class="bi {{ $i <= round($avgRating) ? 'bi-star-fill' : 'bi-star' }}"></i>
                  @endfor
              </div>
              <small>{{ $totalReviews }} đánh giá</small>
            </div>
          </div>

          <!-- LIST REVIEW -->
          <div class="customer-reviews-list">

            @forelse($sanpham->reviews as $review)
            @if($review->is_hidden == 0)
            <div class="review-card mb-4 p-3 border rounded">
              <div class="d-flex align-items-center mb-2">
                <strong>{{ $review->user->name }}</strong>
                <span class="ms-3 text-muted">
                  {{ $review->created_at->format('d/m/Y') }}
                </span>
              </div>

              <div class="mb-2">
                @for($i=1; $i<=5; $i++)
                  <i class="bi {{ $i <= $review->rating ? 'bi-star-fill' : 'bi-star' }}"></i>
                  @endfor
              </div>


              <p>{{ $review->comment }}</p>

              @if(!empty($review->danh_gia))
              <div class="mt-2 p-3 bg-gray-100 rounded">
                <strong>Phản hồi từ cửa hàng:</strong>
                <div class="mt-1">{{ $review->danh_gia }}</div>
              </div>
              @endif

            </div>
            @endif
            @empty
            <p class="text-muted">
              Chưa có đánh giá nào cho sản phẩm này.
            </p>
            @endforelse

          </div>
        </div>
      </div>


    </div>
  </section><!-- /Product Details Section -->

</main>

<script>
</script>

@endsection
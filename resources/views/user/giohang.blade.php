@extends('components.homeLayout')

@section('giohang')
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
@endsection
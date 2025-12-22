@extends('components.homeLayout')

@section('thanhtoan')
<main class="main">
  @if(session()->has('don_hang'))
  <script>
    alert("{{ session('don_hang') }}");
  </script>
  @elseif(session()->has('errorDC'))
  <script>
    alert("{{ session('errorDC') }}");
  </script>
  @endif

  <!-- Page Title -->
  <div class="page-title light-background">
    <div class="container d-lg-flex justify-content-between align-items-center">
      <h1 class="mb-2 mb-lg-0">Thanh toán</h1>
      <nav class="breadcrumbs">

      </nav>
    </div>
  </div><!-- End Page Title -->

  <!-- Checkout Section -->
  <section id="checkout" class="checkout section">

    <div class="container" data-aos="fade-up" data-aos-delay="100">
      <div class="row justify-content-center">
        <div class="col-lg-6">
          <!-- Order Summary -->
          <div class="order-summary" data-aos="fade-left" data-aos-delay="200">
            <div class="order-summary-header">
              <h3>Đơn hàng</h3>
              <span class="item-count">{{ count($giohang)}} sản phẩm</span>
            </div>

            <div class="order-summary-content">
              <div class="order-items">
                @foreach($giohang as $gh)
                @php
                // Lấy file ảnh bìa của sản phẩm (bia_san_pham = 1)
                $anhBia = $gh->sanpham->file->where('bia_san_pham', 1)->first();
                @endphp
                @if($gh->trang_thai_mua == 0)
                <div class="order-item">
                  <div class="order-item-image">
                    <img src="{{ asset($anhBia->duong_dan_luu )}}" alt="Product" class="img-fluid">
                  </div>
                  <div class="order-item-details">
                    <h4>{{ $gh->ten_sp }}</h4>
                    <p class="order-item-variant">Tác giả: {{ $gh->sanpham->tac_gia }}</p>
                    <div class="order-item-price">
                      <span class="quantity">{{ $gh->so_luong_sp }} ×</span>
                      <span class="price">{{ number_format($gh->gia_sp) }} VND</span>
                    </div>
                  </div>
                </div>
                @endif
                @endforeach
              </div>

              <div class="order-totals">
                <div class="order-subtotal d-flex justify-content-between">
                  <span>Tổng tiền hàng</span>
                  <span class="tong_tien_hang">{{ number_format(session('tien_hang'))}} VND</span>
                </div>
                <div class="order-shipping d-flex justify-content-between">
                  <span>Vận chuyển</span>
                  <span class="van_chuyen">{{ number_format(session('phi_vc'))}} VND</span>
                </div>
                <div class="order-shipping d-flex justify-content-between">
                  <span>Giảm giá</span>
                  <span class="giam_gia">{{ number_format($tien_giam)}} VND</span>
                </div>
                <div class="order-total d-flex justify-content-between">
                  <span>Thành tiền</span>
                  <span class="thanh_tien">{{ number_format(session('thanh_tien'))}} VND</span>
                </div>
              </div>
            </div>
          </div>

          <!-- VNPay Payment Button -->
          <div class="vnpay-payment" style="margin-top: 30px; text-align: center;">
            <!-- <button type="button" id="btnVNPay" style="
              background: linear-gradient(135deg, #0088cc 0%, #005a8c 100%);
              color: white;
              border: none;
              padding: 15px 40px;
              font-size: 18px;
              font-weight: bold;
              border-radius: 8px;
              cursor: pointer;
              width: 100%;
              transition: all 0.3s ease;
              box-shadow: 0 4px 15px rgba(0, 136, 204, 0.3);
            " onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 6px 20px rgba(0, 136, 204, 0.4)';" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 15px rgba(0, 136, 204, 0.3)';">
              <i class="bi bi-credit-card" style="margin-right: 10px;"></i>
              Thanh toán qua VNPay
            </button> -->
            <form action="{{ route('thanhtoanvnpay') }}" method="post">
              @csrf
              <input type="hidden" name="total_vnpay" value="{{ number_format(session('thanh_tien'))}}">
              <button type="submit" class="btn btn-success check_out"
                name="redirect">Thanh toán VNPAY</button>
            </form>

          </div>
        </div>
      </div>

      <!-- Terms and Privacy Modals -->
      <div class="modal fade" id="termsModal" tabindex="-1" aria-labelledby="termsModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="termsModalLabel">Terms and Conditions</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam in dui mauris. Vivamus hendrerit arcu sed erat molestie vehicula. Sed auctor neque eu tellus rhoncus ut eleifend nibh porttitor. Ut in nulla enim. Phasellus molestie magna non est bibendum non venenatis nisl tempor.</p>
              <p>Suspendisse in orci enim. Vivamus hendrerit arcu sed erat molestie vehicula. Sed auctor neque eu tellus rhoncus ut eleifend nibh porttitor. Ut in nulla enim. Phasellus molestie magna non est bibendum non venenatis nisl tempor.</p>
              <p>Suspendisse in orci enim. Vivamus hendrerit arcu sed erat molestie vehicula. Sed auctor neque eu tellus rhoncus ut eleifend nibh porttitor. Ut in nulla enim. Phasellus molestie magna non est bibendum non venenatis nisl tempor.</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary" data-bs-dismiss="modal">I Understand</button>
            </div>
          </div>
        </div>
      </div>

      <div class="modal fade" id="privacyModal" tabindex="-1" aria-labelledby="privacyModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="privacyModalLabel">Privacy Policy</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam in dui mauris. Vivamus hendrerit arcu sed erat molestie vehicula. Sed auctor neque eu tellus rhoncus ut eleifend nibh porttitor. Ut in nulla enim.</p>
              <p>Suspendisse in orci enim. Vivamus hendrerit arcu sed erat molestie vehicula. Sed auctor neque eu tellus rhoncus ut eleifend nibh porttitor. Ut in nulla enim. Phasellus molestie magna non est bibendum non venenatis nisl tempor.</p>
              <p>Suspendisse in orci enim. Vivamus hendrerit arcu sed erat molestie vehicula. Sed auctor neque eu tellus rhoncus ut eleifend nibh porttitor. Ut in nulla enim. Phasellus molestie magna non est bibendum non venenatis nisl tempor.</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary" data-bs-dismiss="modal">I Understand</button>
            </div>
          </div>
        </div>
      </div>

    </div>

  </section><!-- /Checkout Section -->

</main>

<script>
  document.getElementById("btnVNPay").addEventListener("click", function(e) {
    e.preventDefault();

    // Vô hiệu hóa nút để tránh nhấn nhiều lần
    this.disabled = true;
    this.innerHTML = '<i class="bi bi-hourglass-split" style="margin-right: 10px;"></i>Đang xử lý...';

    // Tạo form để submit sang VNPay
    const form = document.createElement('form');
    form.method = 'POST';
    form.action = '{{ route("vnpay.payment") }}';

    // Thêm CSRF token
    const csrfInput = document.createElement('input');
    csrfInput.type = 'hidden';
    csrfInput.name = '_token';
    csrfInput.value = document.querySelector('meta[name="csrf-token"]').getAttribute("content");
    form.appendChild(csrfInput);

    // Submit form
    document.body.appendChild(form);
    form.submit();
  });
</script>
@endsection
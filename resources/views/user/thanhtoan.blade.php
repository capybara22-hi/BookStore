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
      <div class="row">
        <div class="col-lg-7">
          <!-- Checkout Form -->

          <div class="checkout-container" data-aos="fade-up">
            <form class="checkout-form">
              <!-- Customer Information -->
              <div class="checkout-section" id="customer-info">
                <br><br>
                <p style="text-align:center;"> <img src="<?php echo $qrcode; ?>" style="width: 300px; height: 350px;" alt=""></p>
                <p style='color: red; text-align:center;' id="cho_thanh_toan"> Đang chờ thanh toán <br> Vui lòng quét mã thanh toán <br> và nhấn nút xác nhận sau khi thanh toán thành công</p>
                <div class="section-header">
                  <h3> &emsp;&emsp;&emsp;&emsp; &emsp;&emsp;&emsp;&emsp; &emsp;&emsp;&nbsp;&nbsp;Thanh toán đơn hàng</h3>
                </div>
                <div class="section-content">
                  <div class="form-group">
                    <label for="">Số tài khoản: </label>
                    <input type="text" class="form-control" name="stk" id="" placeholder="" readonly value="{{$thanhtoan->so_tk}}">
                  </div>
                  <div class="form-group">
                    <label for="">Tên chủ tài khoản:</label>
                    <input type="text" class="form-control" name="ten_tk" id="" placeholder="" readonly value="{{$thanhtoan->ten_chu_tk}}">
                  </div>
                  <div class="form-group">
                    <label for="">Số tiền chuyển:</label>
                    <input type="text" class="form-control" name="tien_chuyen" id="so_tien_chuyen" placeholder="" readonly value="{{ number_format(session('thanh_tien')) }} VND">
                  </div>
                  <div class="form-group">
                    <label for="">Nội dung chuyển khoản:</label>
                    <input type="text" class="form-control" name="nd_chuyen" id="" placeholder="" readonly value="{{ $nguoidung->name}} - Thanh toán tiền sách - {{ $nguoidung->ma_nguoi_dung}}">
                  </div>
                  <div class="form-group">
                    <label for="">Ngân hàng người nhận:</label>
                    <input type="text" class="form-control" name="ngan_hang" id="" placeholder="" readonly value="{{$thanhtoan->ngan_hang}}">
                  </div>
                  <div class="form-group">
                    <button type="submit" class="form-control" style="background-color:green; color:white;" id="da_xac_nhan">
                      Xác nhận đã thanh toán
                    </button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>

        <div class="col-lg-5">
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
  document.getElementById("da_xac_nhan").addEventListener("click", function() {
    const tt = document.getElementById("cho_thanh_toan");
    tt.innerHTML = "Bạn đã xác nhận thanh toán";
    tt.style.color = "green";
    this.style.backgroundColor = "orange";
    this.disabled = false; // cho phép nhấn nút
    this.innerHTML = "Xem đơn hàng của bạn";

    fetch("/luu-session1", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
          "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content")
        },
        body: JSON.stringify({
          trang_thai: 1
        })
      })
      .then(response => response.json())
      .then(data => {
        console.log("Cập nhật thành công:", data);

        alert("Bạn đã đặt hàng thành công");

        // gán lại sự kiện click để chuyển trang
        this.onclick = function() {
          window.location.href = "/user/user/taikhoan"; // đường dẫn đến trang xem đơn hàng
        };

        // chặn quay lại trang trước
        history.pushState(null, null, location.href);
        window.onpopstate = function() {
          history.go(1);
        };
      })
      .catch(error => {
        console.error("Lỗi cập nhật:", error);
      });
  }, {
    once: true
  });;
</script>
@endsection
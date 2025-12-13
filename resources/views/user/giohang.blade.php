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
                                        <button class="remove-item" type="button" data-id="{{ $gh->ma_gio_hang }}">
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

                      @foreach($ds_van_chuyen as $vc)
                          <div class="form-check text-end">
                              <input class="form-check-input shipping-option"
                                type="radio"
                                name="shipping"
                                id="vc_{{ $vc->ma_van_chuyen }}"
                                data-fee="{{ $vc->so_tien}}"
                                data-cond="{{ $vc->dieu_kien ?? 0 }}"
                                value="{{ $vc->ma_van_chuyen }}">

                              <label class="form-check-label shipping-label"
                                  for="vc_{{ $vc->ma_van_chuyen }}"
                                  style="transition: 0.3s;">
                                {{ $vc->dv_van_chuyen }} - {{ number_format($vc->so_tien) }} VND

                                @if($vc->dieu_kien)
                                    <span class="shipping-condition">
                                        (Miễn phí từ {{ number_format($vc->dieu_kien) }}đ)
                                    </span>
                                @endif
                              </label>

                          </div>
                      @endforeach

                  </div>
              </div>

              <div class="summary-total">
                <span class="summary-label">Thành tiền</span>
                <span class="summary-value">0 VND</span>
              </div>
              
              <div class="checkout-button">
                @php
                    $coSanPhamChuaMua = $sanphamgiohang->contains('trang_thai_mua', 0);
                @endphp

                <div class="checkout-button">
                    <button id="btnThanhToan"
                        class="btn btn-accent w-100"
                        data-co-san-pham="{{ $coSanPhamChuaMua ? '1' : '0' }}">
                        Tiến hành thanh toán <i class="bi bi-arrow-right"></i>
                    </button>
                </div>
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

  <!-- tự động tăng giảm giá tiền sản phẩm -->
  <script>

    // KIỂM TRA MỞ / KHÓA VẬN CHUYỂN
      const updateShippingOptions = (totalItemsPrice) => {
        document.querySelectorAll(".shipping-option").forEach(radio => {
            const cond = parseFloat(radio.dataset.cond) || 0;
            const label = radio.closest(".form-check").querySelector(".shipping-label");

            if (cond > 0 && totalItemsPrice < cond) {
                radio.disabled = true;
                radio.checked = false;

                // 🔴 style inline
                label.style.color = "red";
                label.style.opacity = "0.6";
                label.style.cursor = "not-allowed";
            } else {
                radio.disabled = false;

                // 🔵 reset style
                label.style.color = "";
                label.style.opacity = "";
                label.style.cursor = "";
            }
        });

        // Nếu radio đang chọn bị khóa → chọn cái khác
        if (!document.querySelector(".shipping-option:checked")) {
            const firstEnabled = document.querySelector(".shipping-option:not(:disabled)");
            if (firstEnabled) firstEnabled.checked = true;
        }
      };
    // Chạy khi toàn bộ nội dung trang (HTML) đã được tải xong
    document.addEventListener("DOMContentLoaded", function () {

      // === LẤY CÁC PHẦN TỬ TRÊN GIAO DIỆN ===
      const cartItems = document.querySelectorAll(".cart-item"); // Danh sách tất cả sản phẩm trong giỏ hàng
      const totalItemsPriceEl = document.querySelector(".summary-item .summary-value"); // Tổng tiền hàng
      const shippingRadios = document.querySelectorAll("input[name='shipping']"); // Các lựa chọn giao hàng
      const taxEl = document.querySelector(".summary-item:nth-of-type(3) .summary-value"); // Tiền thuế
      const grandTotalEl = document.querySelector(".summary-total .summary-value"); // Tổng cộng (sau thuế + ship)

      // === HÀM LẤY PHÍ VẬN CHUYỂN DỰA THEO LỰA CHỌN ===
      const getShippingCost = () => {
        const selected = document.querySelector("input[name='shipping']:checked");
        if (!selected) return 0;
        
        // lấy phí vận chuyển từ data-fee
        const fee = parseFloat(selected.dataset.fee);
        const dv_vc = selected.id;
        // sessionStorage.setItem('dv_vc', dv_vc);
        return {
          fee: isNaN(fee) ? 0 : fee,
          dv_vc: dv_vc
        };
      };

      // === HÀM CẬP NHẬT TỔNG TIỀN GIỎ HÀNG ===
      const updateCartSummary = () => {
        let totalItemsPrice = 0; // Tổng tiền hàng (chưa thuế, chưa ship)

        // Lặp qua từng sản phẩm trong giỏ
        cartItems.forEach(item => {
          const quantityInput = item.querySelector(".quantity-input"); // Ô nhập số lượng
          const priceTag = item.querySelector(".current-price"); // Giá sản phẩm
          const itemTotal = item.querySelector(".item-total span"); // Ô hiển thị tổng tiền từng sản phẩm

          // Lấy số lượng
          const quantity = parseInt(quantityInput.value);

          // Lấy giá và chuyển từ chuỗi "35,000 VND" => 35000 (số)
          const price = parseFloat(
            priceTag.textContent
              .replace("VND", "") // bỏ chữ VND
              .replace(/,/g, "")  // bỏ dấu phẩy ngăn cách nghìn
              .trim()             // bỏ khoảng trắng dư
          );

          // Tính tổng tiền từng sản phẩm
          const total = quantity * price;

          // Hiển thị lại tổng tiền từng sản phẩm (có định dạng dấu phẩy)
          itemTotal.textContent = `${total.toLocaleString()} VND`;

          // Cộng dồn vào tổng toàn bộ giỏ hàng
          totalItemsPrice += total;
        });

        // Hiển thị tổng tiền hàng
        totalItemsPriceEl.textContent = `${totalItemsPrice.toLocaleString()} VND`;
        // sessionStorage.setItem('tien_hang', totalItemsPrice);
        // 🔴 BẮT BUỘC: kiểm tra điều kiện vận chuyển
        updateShippingOptions(totalItemsPrice);
        // Lấy phí vận chuyển
        const { fee: shipping, dv_vc } = getShippingCost();
        // sessionStorage.setItem('phi_vc', shipping);

        // Tính tổng cộng (hàng + thuế + phí ship)
        const grandTotal = totalItemsPrice  + shipping;

        // Hiển thị tổng cuối cùng ra giao diện
        grandTotalEl.textContent = `${grandTotal.toLocaleString()} VND`;
        // sessionStorage.setItem('thanh_tien', grandTotal);

        guiSessionDonHang(dv_vc, shipping, grandTotal, totalItemsPrice);
      };

      // === GẮN SỰ KIỆN CHO TỪNG SẢN PHẨM ===
      cartItems.forEach(item => {
        const quantityInput = item.querySelector(".quantity-input");
        const increaseBtn = item.querySelector(".increase");
        const decreaseBtn = item.querySelector(".decrease");

        // Khi người dùng nhập số lượng trực tiếp
        quantityInput.addEventListener("input", () => {
          // Đảm bảo số lượng không nhỏ hơn 1
          if (quantityInput.value < 1) quantityInput.value = 1;
          updateCartSummary();

          const cartId = item.dataset.id;
          updateQuantityToServer(cartId, quantityInput.value);
        });

        // Khi bấm nút tăng số lượng
        increaseBtn.addEventListener("click", () => {
          const current = parseInt(quantityInput.value);
          const max = parseInt(quantityInput.max) || 999;
          if (current < max) quantityInput.value = current;
          updateCartSummary();

          const cartId = item.dataset.id;
          updateQuantityToServer(cartId, quantityInput.value);
        });

        // Khi bấm nút giảm số lượng
        decreaseBtn.addEventListener("click", () => {
          const current = parseInt(quantityInput.value);
          if (current > 1) quantityInput.value = current;
          updateCartSummary();

          const cartId = item.dataset.id;
          updateQuantityToServer(cartId, quantityInput.value);
        });
      });

      // === GẮN SỰ KIỆN CHO LỰA CHỌN PHÍ GIAO HÀNG ===
      shippingRadios.forEach(radio => {
        radio.addEventListener("change", updateCartSummary);
      });

      // ======================= XÓA SẢN PHẨM TRONG GIỎ HÀNG =======================

      document.addEventListener("click", function (event) {
          const btnRemove = event.target.closest(".remove-item");

          if (btnRemove) {
              const cartItem = btnRemove.closest(".cart-item");
              const cartId = cartItem.dataset.id;

              if (!confirm("Bạn có chắc muốn xóa sản phẩm này?")) return;

              fetch("{{ route('giohang.xoa') }}", {
                  method: "POST",
                  headers: {
                      "Content-Type": "application/json",
                      "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
                  },
                  body: JSON.stringify({ ma_gio_hang: cartId })
              })
              .then(res => res.json())
              .then(data => {
                  if (data.status === "success") {
                      cartItem.remove();
                      updateCartSummary();
                  } else {
                      alert("Lỗi: " + data.message);
                  }
              })
              .catch(err => console.error("Lỗi khi xóa:", err));
          }
      });


      // === GỌI HÀM MỘT LẦN KHI MỚI LOAD TRANG ===
      updateCartSummary();

      
    });
    
    // === GỬI YÊU CẦU CẬP NHẬT LÊN SERVER ===
    const updateQuantityToServer = (cartId, newQuantity) => {
      fetch("/giohang/update", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
          "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content")
        },
        body: JSON.stringify({
          ma_gio_hang: cartId,
          so_luong_sp: newQuantity
        })
      })
      .then(response => response.json())
      .then(data => {
        console.log("Cập nhật thành công:", data);
      })
      .catch(error => {
        console.error("Lỗi cập nhật:", error);
      });
    };

    // // Gửi sesion thông tin đơn hàng
    const guiSessionDonHang = (ma_vc, phi_vc, thanh_tien, tien_hang) => {
      fetch("/luu-session", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
          "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content")
        },
        body: JSON.stringify({
          ma_vc: ma_vc,
          phi_vc: phi_vc,
          thanh_tien: thanh_tien,
          tien_hang: tien_hang
        })
      })
      .then(response => response.json())
      .then(data => {
        console.log("Cập nhật thành công:", data);
      })
      .catch(error => {
        console.error("Lỗi cập nhật:", error);
      });
    };

     document.getElementById("btnThanhToan").addEventListener("click", function () {
        const coSanPham = this.getAttribute("data-co-san-pham");

        if (coSanPham === "1") {
            // Có sản phẩm chưa mua → chuyển trang
            window.location.href = "{{ route('thanhtoan') }}";
        } else {
            // Không có sản phẩm → hiện cảnh báo
            alert("Không có sản phẩm nào cần thanh toán");
        }
    });
  </script>
@endsection
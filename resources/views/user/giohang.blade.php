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
                                            <span class="product-color">Tác giả: {{ $gh->sanpham->tac_gia }}</span>
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
              <div style="text-align:right">
                <button type="button"
                    id="btnOpenPromo"
                    style="
                      padding:6px 12px;
                      border-radius:6px;
                      border:1px solid #0d6efd;
                      background:#fff;
                      color:#0d6efd;
                      cursor:pointer;
                    ">
                  Chọn khuyến mãi
                </button>

                <div id="selectedPromoText"
                    style="margin-top:5px; font-size:13px; color:green; display:none;">
                </div>
              </div>


              <!-- MODAL KHUYẾN MÃI -->
              <div id="promoModal"
                  style="
                      display:none;
                      position:fixed;
                      top:100px; left:0;
                      width:100%; height:100%;
                      background:rgba(0,0,0,0.5);
                      z-index:9999;
                  ">

                <div style="
                    background:rgba(190, 178, 178);
                    width:400px;
                    max-width:90%;
                    margin:80px auto;
                    border-radius:10px;
                    padding:15px;
                ">
                  <h5 style="margin-bottom:10px;">Chọn khuyến mãi</h5>

                  <div id="promoList">
                    @foreach($ds_khuyen_mai as $km)
                      <div class="form-check" style="margin-bottom:8px;">
                        <input class="form-check-input promo-option"
                          type="radio"
                          name="promo"
                          id="km_modal_{{ $km->ma_khuyen_mai }}"
                          data-discount="{{ $km->phan_tram_giam }}"
                          data-cond="{{ $km->gia_don_hang }}"
                          value="{{ $km->ma_khuyen_mai }}">

                        <label for="km_modal_{{ $km->ma_khuyen_mai }}"
                          class="promo-label"
                          style="cursor:pointer;">
                          {{ $km->nd_khuyen_mai }} 
                        </label>
                      </div>
                    @endforeach
                  </div>

                  <div style="text-align:right; margin-top:15px;">
                    <button id="btnClosePromo"
                      style="margin-right:10px;">Hủy</button>

                    <button id="btnApplyPromo"
                      style="
                        background:#0d6efd;
                        color:#fff;
                        border:none;
                        padding:6px 12px;
                        border-radius:6px;
                      ">
                      Áp dụng
                    </button>
                  </div>
                </div>
              </div>


              <div class="summary-item shipping-item">
                <span class="summary-label">Vận chuyển</span>
                  <div class="shipping-options">

                      @foreach($ds_van_chuyen as $vc)
                          <div class="form-check text-end">
                              <input class="form-check-input shipping-option"
                                type="radio"
                                name="shipping"
                                id="{{ $vc->ma_van_chuyen }}"
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

              <div class="summary-item discount-item">
                <span class="summary-label">Giảm giá</span>
                <span class="summary-value" id="discountValue">0 VND</span>
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

    const updatePromoOptions = (totalItemsPrice) => {
      let hasValidSelected = false;

      document.querySelectorAll(".promo-option").forEach(radio => {
        const cond = parseFloat(radio.dataset.cond) || 0;
        const label = radio.closest(".form-check").querySelector(".promo-label");

        if (totalItemsPrice < cond) {
          radio.disabled = true;
          radio.checked = false;

          label.style.color = "red";
          label.style.opacity = "0.6";
          label.style.cursor = "not-allowed";
        } else {
          radio.disabled = false;

          label.style.color = "";
          label.style.opacity = "";
          label.style.cursor = "";
          if (radio.checked) hasValidSelected = true;
        }
      });

      // ❌ nếu KM đang áp bị mất điều kiện → reset UI
      if (!hasValidSelected) {
        document.getElementById("selectedPromoText").style.display = "none";
        document.getElementById("btnOpenPromo").innerText = "Chọn khuyến mãi";
      }
    };


    const getPromoDiscount = (totalItemsPrice) => {
      const selected = document.querySelector(".promo-option:checked");
      if (!selected) return 0;

      const percent = parseFloat(selected.dataset.discount) || 0;
      return totalItemsPrice * percent / 100;
    };


    // Chạy khi toàn bộ nội dung trang (HTML) đã được tải xong
    document.addEventListener("DOMContentLoaded", function () {

      // === LẤY CÁC PHẦN TỬ TRÊN GIAO DIỆN ===
      const cartItems = document.querySelectorAll(".cart-item"); // Danh sách tất cả sản phẩm trong giỏ hàng
      const totalItemsPriceEl = document.querySelector(".summary-item .summary-value"); // Tổng tiền hàng
      const shippingRadios = document.querySelectorAll("input[name='shipping']"); // Các lựa chọn giao hàng
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
        let totalItemsPrice = 0;

        cartItems.forEach(item => {
          const quantity = parseInt(item.querySelector(".quantity-input").value);
          const price = parseFloat(
            item.querySelector(".current-price").textContent
              .replace("VND", "")
              .replace(/,/g, "")
              .trim()
          );

          const total = quantity * price;
          item.querySelector(".item-total span").textContent =
            `${total.toLocaleString()} VND`;

          totalItemsPrice += total;
        });

        // Tổng tiền hàng
        totalItemsPriceEl.textContent =
          `${totalItemsPrice.toLocaleString()} VND`;

        // 1. KM theo tổng tiền hàng
        updatePromoOptions(totalItemsPrice);
        const discount = getPromoDiscount(totalItemsPrice);
        // ✅ hiển thị giảm giá
        document.getElementById("discountValue").textContent =
          `- ${discount.toLocaleString()} VND`;

        // 2. Vận chuyển vẫn theo tổng tiền hàng gốc
        updateShippingOptions(totalItemsPrice);
        const { fee: shipping, dv_vc } = getShippingCost();

        // ✅ 3. tổng cuối
        const grandTotal = totalItemsPrice - discount + shipping;

        grandTotalEl.textContent =
          `${grandTotal.toLocaleString()} VND`;

        // lưu session
        const promoId = getSelectedPromoId();
        guiSessionDonHang(
          dv_vc,
          shipping,
          grandTotal,
          totalItemsPrice,
          promoId,
          discount
        );

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
                    // Thay vì remove DOM, load lại trang
                    location.reload();
                } else {
                    alert("Lỗi: " + data.message);
                }
            })
            .catch(err => console.error("Lỗi khi xóa:", err));
        }
      });


      // === KHI CHỌN RADIO KHUYẾN MÃI → UPDATE NGAY GIẢM GIÁ ===
      document.querySelectorAll(".promo-option").forEach(radio => {
        radio.addEventListener("change", () => {
          updateCartSummary();
        });
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
    const guiSessionDonHang = (
        ma_vc,
        phi_vc,
        thanh_tien,
        tien_hang,
        ma_khuyen_mai,
        tien_giam
      ) => {
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
          tien_hang: tien_hang,
          ma_khuyen_mai: ma_khuyen_mai,
          tien_giam: tien_giam
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
    // ====== MODAL KHUYẾN MÃI ======
    const promoModal = document.getElementById("promoModal");
    const btnOpenPromo = document.getElementById("btnOpenPromo");
    const btnClosePromo = document.getElementById("btnClosePromo");
    const btnApplyPromo = document.getElementById("btnApplyPromo");

    // mở modal
    btnOpenPromo.addEventListener("click", () => {
      promoModal.style.display = "block";
    });

    // đóng modal
    btnClosePromo.addEventListener("click", () => {
      promoModal.style.display = "none";
    });

    // áp dụng khuyến mãi
    btnApplyPromo.addEventListener("click", () => {
      const selected = document.querySelector(".promo-option:checked");
      const promoTextEl = document.getElementById("selectedPromoText");

      if (selected) {
        const label = selected.closest(".form-check")
                            .querySelector(".promo-label").innerText;

        promoTextEl.innerText = "Đã áp dụng: " + label;
        promoTextEl.style.display = "block";

        btnOpenPromo.innerText = "Đổi khuyến mãi";
      } else {
        promoTextEl.innerText = "";
        promoTextEl.style.display = "none";
        btnOpenPromo.innerText = "Chọn khuyến mãi";
      }

      promoModal.style.display = "none";
      updateCartSummary();
    });


    // click ra ngoài modal thì đóng
    promoModal.addEventListener("click", (e) => {
      if (e.target === promoModal) {
        promoModal.style.display = "none";
      }
    });

    const getSelectedPromoId = () => {
      const selected = document.querySelector(".promo-option:checked");
      return selected ? selected.value : null;
    };


  </script>
@endsection
@extends('components.homeLayout')

@section('dathang')
@php
// Tính tổng tiền hàng trước để sử dụng trong điều kiện
$total = 0;
foreach($sanphamgiohang as $spgh) {
if($spgh->trang_thai_mua == 0){
$total += $spgh->tong_tien;
}
}
@endphp
<main class="main">
    <!-- Page Title -->
    <div class="page-title light-background">
        <div class="container d-lg-flex justify-content-between align-items-center">
            <h1 class="mb-2 mb-lg-0">Đặt hàng</h1>
            <nav class="breadcrumbs"></nav>
        </div>
    </div>

    <!-- Order Section -->
    <section id="order" class="checkout section">
        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="row">
                <!-- Left Column: Shipping & Payment -->
                <div class="col-lg-7">
                    <div class="checkout-container" data-aos="fade-up">

                        <!-- Địa chỉ giao hàng -->
                        <div class="checkout-section mb-4">
                            <div class="section-header d-flex justify-content-between align-items-center mb-3">
                                <h3 class="mb-0"><i class="bi bi-geo-alt"></i> Địa chỉ giao hàng</h3>
                                <a href="#" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#addressModal">
                                    <i class="bi bi-pencil"></i> Thay đổi
                                </a>
                            </div>
                            <div class="section-content p-3 bg-light rounded">
                                <div class="address-info">
                                    @if($dia_chi_mac_dinh)
                                    <p class="mb-1"><strong class="text-dark">Người nhận:</strong> <span id="tenNguoiNhan">{{ $dia_chi_mac_dinh->ten_nguoi_nhan }}</span></p>
                                    <p class="mb-1"><strong class="text-dark">Số điện thoại:</strong> <span id="sdt">{{ $dia_chi_mac_dinh->sdt }}</span></p>
                                    <p class="mb-0"><strong class="text-dark">Địa chỉ:</strong> <span id="diaChi">{{ $dia_chi_mac_dinh->dia_chi }}</span></p>
                                    @else
                                    <p class="mb-0 text-danger">Bạn chưa có địa chỉ mặc định. Vui lòng thêm địa chỉ.</p>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- Phương thức vận chuyển -->
                        <div class="checkout-section mb-4">
                            <div class="section-header mb-3">
                                <h3><i class="bi bi-truck"></i> Phương thức vận chuyển</h3>
                            </div>
                            <div class="section-content">
                                <div class="shipping-options">
                                    <!-- Danh sách vận chuyển sẽ được render từ controller -->
                                    @foreach($ds_van_chuyen as $dsvc)
                                    @php
                                    if($total < 300000 && $dsvc->ma_van_chuyen == 3){
                                        continue;
                                        }
                                        @endphp
                                        <div class="form-check mb-2 p-3 border rounded">
                                            <input class="form-check-input shipping-option" type="radio" name="shipping"
                                                id="vc{{ $dsvc->ma_van_chuyen }}"
                                                value="{{ $dsvc->ma_van_chuyen }}"
                                                data-fee="{{ $dsvc->so_tien }}">
                                            <label class="form-check-label w-100" for="vc{{ $dsvc->ma_van_chuyen }}">
                                                <div class="d-flex justify-content-between">
                                                    <span>{{ $dsvc->dv_van_chuyen }}</span>
                                                    <strong class="text-success">{{ number_format($dsvc->so_tien, 0, ',', '.') }} VNĐ</strong>
                                                </div>
                                                <small class="text-muted">{{ $dsvc->mo_ta }}</small>
                                            </label>
                                        </div>
                                        @endforeach
                                </div>
                            </div>
                        </div>

                        <!-- Phương thức thanh toán -->
                        <div class="checkout-section mb-4">
                            <div class="section-header mb-3">
                                <h3><i class="bi bi-credit-card"></i> Phương thức thanh toán</h3>
                            </div>
                            <div class="section-content">
                                <div class="payment-methods">
                                    <div class="payment-method-item">
                                        <input type="radio" name="payment" id="cod" value="cod" checked class="payment-radio">
                                        <label for="cod" class="payment-label">
                                            <div class="payment-icon">
                                                <i class="bi bi-cash-coin text-success"></i>
                                            </div>
                                            <div class="payment-info">
                                                <div class="payment-name">Thanh toán khi nhận hàng</div>
                                                <div class="payment-desc">Thanh toán bằng tiền mặt khi nhận hàng (COD)</div>
                                            </div>
                                        </label>
                                    </div>
                                    <div class="payment-method-item">
                                        <input type="radio" name="payment" id="online" value="online" class="payment-radio">
                                        <label for="online" class="payment-label">
                                            <div class="payment-icon">
                                                <i class="bi bi-wallet2 text-primary"></i>
                                            </div>
                                            <div class="payment-info">
                                                <div class="payment-name">Thanh toán online</div>
                                                <div class="payment-desc">Chuyển khoản ngân hàng hoặc quét mã QR</div>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Right Column: Order Summary -->
                <div class="col-lg-5">
                    <div class="order-summary" data-aos="fade-left" data-aos-delay="200">
                        <div class="order-summary-header">
                            <h3>Đơn hàng của bạn</h3>
                            <span class="item-count">
                                @php
                                $so_luong = 0;
                                foreach($sanphamgiohang as $sp){
                                if($sp->trang_thai_mua == 0){
                                $so_luong += $sp->so_luong_sp;
                                }
                                }
                                @endphp
                                {{$so_luong}} sản phẩm
                            </span>
                        </div>

                        <div class="order-summary-content">
                            <!-- Danh sách sản phẩm -->
                            <div class="order-items" style="max-height: 300px; overflow-y: auto;">
                                <!-- Sản phẩm mẫu - sẽ được render từ controller -->
                                @foreach($sanphamgiohang as $sp)
                                @php
                                // Lấy file ảnh bìa của sản phẩm (bia_san_pham = 1)
                                $anhBia = $sp->sanpham->file->where('bia_san_pham', 1)->first();
                                @endphp
                                @if($sp->trang_thai_mua == 0)
                                <div class="order-item">
                                    <div class="order-item-image">
                                        <img src="{{ asset($anhBia->duong_dan_luu ?? 'assets/img/no-image.jpg') }}" alt="{{ $sp->ten_sp }}" class="img-fluid">
                                    </div>
                                    <div class="order-item-details">
                                        <h4>{{ $sp->ten_sp }}</h4>
                                        <p class="order-item-variant">Tác giả: ABC</p>
                                        <div class="order-item-price">
                                            <span class="price">{{ number_format($sp->gia_sp, 0, ',', '.')  }}</span>
                                        </div>
                                    </div>
                                    <span class="quantity">x{{ $sp->so_luong_sp }}</span>

                                </div>
                                @endif
                                @endforeach
                            </div>

                            <!-- Tổng tiền -->
                            <div class="order-totals">
                                <div class="order-subtotal d-flex justify-content-between py-2">
                                    <span>Tổng tiền hàng</span>
                                    <span class="tong-tien-hang">
                                        {{ number_format($total, 0, ',', '.') }} VNĐ
                                    </span>
                                </div>
                                <div class="order-shipping d-flex justify-content-between py-2">
                                    <span>Phí vận chuyển</span>
                                    <span class="phi-van-chuyen">0 VNĐ</span>
                                </div>
                                <div class="order-discount d-flex justify-content-between py-2 text-danger">
                                    <span>Giảm giá</span>
                                    <span class="giam-gia">- {{ number_format($tien_giam ?? 0, 0, ',', '.') }} VNĐ</span>
                                </div>
                                <div class="order-total d-flex justify-content-between py-3 border-top">
                                    <span class="fw-bold">Tổng thanh toán</span>
                                    <span class="fw-bold text-primary thanh-tien">{{ number_format($total - ($tien_giam ?? 0), 0, ',', '.') }} VNĐ</span>
                                </div>
                            </div>

                            <!-- Nút đặt hàng -->
                            <button type="button" id="btnDatHang" class="btn btn-primary w-100 py-3 mt-3">
                                <i class="bi bi-check-circle"></i> Đặt hàng
                            </button>

                            <div class="text-center mt-3">
                                <a href="{{ route('giohang') }}" class="text-muted">
                                    <i class="bi bi-arrow-left"></i> Quay lại giỏ hàng
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<!-- Modal chọn địa chỉ -->
<div class="modal fade" id="addressModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Chọn địa chỉ giao hàng</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <!-- Danh sách địa chỉ -->
                <div class="address-list mb-4">
                    <h6 class="mb-3">Địa chỉ của bạn:</h6>
                    @forelse($dia_chi as $dc)
                    <div class="address-item p-3 mb-2 border rounded {{ $dc->mac_dinh == 1 ? 'border-primary' : '' }}">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="selected_address"
                                id="addr_{{ $dc->ma_dia_chi }}"
                                value="{{ $dc->ma_dia_chi }}"
                                {{ $dc->mac_dinh == 1 ? 'checked' : '' }}>
                            <label class="form-check-label w-100" for="addr_{{ $dc->ma_dia_chi }}">
                                <div class="d-flex justify-content-between align-items-start">
                                    <div>
                                        <strong>{{ $dc->ten_nguoi_nhan }}</strong>
                                        @if($dc->mac_dinh == 1)
                                        <span class="badge bg-primary ms-2">Mặc định</span>
                                        @endif
                                        <p class="mb-0 mt-1 text-muted">{{ $dc->sdt }}</p>
                                        <p class="mb-0 text-muted">{{ $dc->dia_chi }}</p>
                                    </div>
                                </div>
                            </label>
                        </div>
                    </div>
                    @empty
                    <div class="alert alert-info">
                        <i class="bi bi-info-circle"></i> Bạn chưa có địa chỉ nào. Vui lòng thêm địa chỉ mới.
                    </div>
                    @endforelse
                </div>

                <!-- Form thêm địa chỉ mới -->
                <div class="add-address-section">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h6 class="mb-0">Thêm địa chỉ mới</h6>
                        <button type="button" class="btn btn-sm btn-primary" id="btnToggleForm">
                            <i class="bi bi-plus-circle"></i> Thêm địa chỉ
                        </button>
                    </div>

                    <div id="addAddressForm" style="display: none;">
                        <form id="formThemDiaChi" method="POST" action="{{ route('diachi.store')}}">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Tên người nhận <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="ten_nguoi_nhan" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Số điện thoại <span class="text-danger">*</span></label>
                                    <input type="tel" class="form-control" name="sdt" required>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Địa chỉ <span class="text-danger">*</span></label>
                                <textarea class="form-control" name="dia_chi" rows="2" required></textarea>
                            </div>
                            <!-- <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" name="mac_dinh" id="macDinhCheck" value="1">
                                <label class="form-check-label" for="macDinhCheck">
                                    Đặt làm địa chỉ mặc định
                                </label>
                            </div> -->
                            <div class="d-flex gap-2">
                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-check-circle"></i> Lưu địa chỉ
                                </button>
                                <button type="button" class="btn btn-secondary" id="btnCancelForm">
                                    <i class="bi bi-x-circle"></i> Hủy
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                <button type="button" class="btn btn-primary" id="btnChonDiaChi">Xác nhận</button>
            </div>
        </div>
    </div>
</div>

<style>
    .address-item {
        cursor: pointer;
        transition: all 0.3s;
    }

    .address-item:hover {
        background-color: #f8f9fa;
    }

    .address-item .form-check-input:checked+.form-check-label {
        font-weight: 500;
    }
</style>

<script>
    // Toggle form thêm địa chỉ
    document.getElementById('btnToggleForm').addEventListener('click', function() {
        const form = document.getElementById('addAddressForm');
        form.style.display = form.style.display === 'none' ? 'block' : 'none';
        this.innerHTML = form.style.display === 'none' ?
            '<i class="bi bi-plus-circle"></i> Thêm địa chỉ' :
            '<i class="bi bi-dash-circle"></i> Đóng form';
    });

    document.getElementById('btnCancelForm').addEventListener('click', function() {
        document.getElementById('addAddressForm').style.display = 'none';
        document.getElementById('btnToggleForm').innerHTML = '<i class="bi bi-plus-circle"></i> Thêm địa chỉ';
        document.getElementById('formThemDiaChi').reset();
    });

    // Xác nhận chọn địa chỉ
    document.getElementById('btnChonDiaChi').addEventListener('click', function() {
        const selectedAddress = document.querySelector('input[name="selected_address"]:checked');

        if (selectedAddress) {
            const addressItem = selectedAddress.closest('.address-item');
            const tenNguoiNhan = addressItem.querySelector('strong').textContent;
            const sdt = addressItem.querySelectorAll('.text-muted')[0].textContent;
            const diaChi = addressItem.querySelectorAll('.text-muted')[1].textContent;

            // Cập nhật thông tin trên trang
            document.getElementById('tenNguoiNhan').textContent = tenNguoiNhan;
            document.getElementById('sdt').textContent = sdt;
            document.getElementById('diaChi').textContent = diaChi;

            // Đóng modal
            bootstrap.Modal.getInstance(document.getElementById('addressModal')).hide();
        } else {
            alert('Vui lòng chọn một địa chỉ!');
        }
    });
</script>

<style>
    .checkout-section {
        background: #fff;
        border-radius: 8px;
        padding: 20px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .section-header h3 {
        font-size: 1.25rem;
        font-weight: 600;
        color: #333;
    }

    .form-check {
        cursor: pointer;
        transition: all 0.3s;
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .form-check:hover {
        background-color: #f8f9fa;
    }

    .form-check-input {
        margin: 0;
        flex-shrink: 0;
        width: 20px;
        height: 20px;
        cursor: pointer;
    }

    .form-check-label {
        flex: 1;
        cursor: pointer;
        margin: 0;
        padding: 0;
    }

    .form-check-input:checked+.form-check-label {
        color: #0d6efd;
        font-weight: 500;
    }

    .order-summary {
        position: sticky;
        top: 20px;
        background: #fff;
        border-radius: 12px;
        padding: 24px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    .order-summary-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding-bottom: 16px;
        border-bottom: 1px solid #e9ecef;
        margin-bottom: 20px;
    }

    .order-summary-header h3 {
        font-size: 1.25rem;
        font-weight: 600;
        margin: 0;
    }

    .item-count {
        background: #e9ecef;
        padding: 4px 12px;
        border-radius: 12px;
        font-size: 0.875rem;
        color: #6c757d;
    }

    .order-item {
        display: flex;
        gap: 12px;
        padding: 12px 0;
        border-bottom: 1px solid #f0f0f0;
    }

    .order-item:last-child {
        border-bottom: none;
    }

    .order-item-image {
        width: 60px;
        height: 80px;
        flex-shrink: 0;
    }

    .order-item-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 4px;
    }

    .order-item-details h4 {
        font-size: 0.95rem;
        font-weight: 500;
        margin-bottom: 4px;
    }

    .order-item-variant {
        font-size: 0.85rem;
        color: #6c757d;
        margin-bottom: 8px;
    }

    .order-item-price {
        font-size: 0.9rem;
        color: #333;
    }

    .order-totals {
        margin-top: 20px;
        padding-top: 20px;
        border-top: 2px solid #e9ecef;
    }

    .address-info p strong {
        display: inline-block;
        min-width: 120px;
    }

    /* Payment Methods Styles */
    .payment-methods {
        display: flex;
        flex-direction: column;
        gap: 12px;
    }

    .payment-method-item {
        position: relative;
        border: 2px solid #e9ecef;
        border-radius: 8px;
        transition: all 0.3s ease;
    }

    .payment-method-item:hover {
        border-color: #cbd5e0;
        background-color: #f8f9fa;
    }

    .payment-radio {
        position: absolute;
        opacity: 0;
        cursor: pointer;
    }

    .payment-radio:checked+.payment-label {
        border-color: #0d6efd;
        background-color: #e7f3ff;
    }

    .payment-radio:checked+.payment-label::before {
        content: '';
        position: absolute;
        top: 12px;
        right: 12px;
        width: 24px;
        height: 24px;
        background-color: #0d6efd;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .payment-radio:checked+.payment-label::after {
        content: '✓';
        position: absolute;
        top: 12px;
        right: 12px;
        width: 24px;
        height: 24px;
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
        font-size: 14px;
    }

    .payment-label {
        display: flex;
        align-items: center;
        gap: 16px;
        padding: 16px;
        cursor: pointer;
        border-radius: 6px;
        transition: all 0.3s ease;
        position: relative;
    }

    .payment-icon {
        font-size: 32px;
        display: flex;
        align-items: center;
        justify-content: center;
        width: 48px;
        height: 48px;
        background-color: #f8f9fa;
        border-radius: 8px;
    }

    .payment-info {
        flex: 1;
    }

    .payment-name {
        font-weight: 600;
        font-size: 1rem;
        color: #212529;
        margin-bottom: 4px;
    }

    .payment-desc {
        font-size: 0.875rem;
        color: #6c757d;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Hàm lưu thông tin vào session
        function saveToSession() {
            const shippingMethod = document.querySelector('input[name="shipping"]:checked');
            if (!shippingMethod) return;

            const maVc = shippingMethod.value;
            const phiVc = parseInt(shippingMethod.dataset.fee) || 0;
            const tienHang = parseInt(document.querySelector('.tong-tien-hang').textContent.replace(/[^\d]/g, '')) || 0;
            const giamGia = parseInt(document.querySelector('.giam-gia').textContent.replace(/[^\d]/g, '')) || 0;
            const thanhTien = tienHang + phiVc - giamGia;

            // Gọi API lưu session
            fetch('/luu-session', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({
                        ma_vc: maVc,
                        phi_vc: phiVc,
                        tien_hang: tienHang,
                        tien_giam: giamGia,
                        thanh_tien: thanhTien,
                        ma_khuyen_mai: '{{ $ma_khuyen_mai ?? "" }}'
                    })
                })
                .then(response => response.json())
                .then(data => {
                    console.log('Session saved:', data);
                })
                .catch(error => {
                    console.error('Error saving session:', error);
                });
        }

        // Cập nhật phí vận chuyển khi chọn
        document.querySelectorAll('.shipping-option').forEach(radio => {
            radio.addEventListener('change', function() {
                const fee = parseInt(this.dataset.fee) || 0;
                document.querySelector('.phi-van-chuyen').textContent =
                    new Intl.NumberFormat('vi-VN').format(fee) + ' VNĐ';
                updateTotal();
                saveToSession(); // Lưu vào session mỗi khi thay đổi
            });
        });

        // Tự động chọn option đầu tiên
        const firstShipping = document.querySelector('.shipping-option');
        if (firstShipping) {
            firstShipping.checked = true;
            firstShipping.dispatchEvent(new Event('change'));
        }

        // Xử lý đặt hàng
        document.getElementById('btnDatHang').addEventListener('click', function() {
            const paymentMethod = document.querySelector('input[name="payment"]:checked').value;
            const shippingMethod = document.querySelector('input[name="shipping"]:checked');

            if (!shippingMethod) {
                alert('Vui lòng chọn phương thức vận chuyển');
                return;
            }

            const btnDatHang = this;
            btnDatHang.disabled = true;
            btnDatHang.innerHTML = '<i class="bi bi-hourglass-split"></i> Đang xử lý...';

            if (paymentMethod === 'online') {
                // Chuyển đến trang thanh toán online
                window.location.href = "{{ route('thanhtoan') }}";
            } else {
                // Thanh toán COD - tạo đơn hàng
                fetch('/luu-session1', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        },
                        body: JSON.stringify({
                            trang_thai: 1 // Trạng thái đã mua
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.successTDH) {
                            alert('Đơn hàng của bạn đã được đặt thành công!');
                            window.location.href = "{{ route('taikhoan') }}";
                        } else if (data.errorDC) {
                            alert(data.errorDC);
                            btnDatHang.disabled = false;
                            btnDatHang.innerHTML = '<i class="bi bi-check-circle"></i> Đặt hàng';
                        } else {
                            alert('Có lỗi xảy ra: ' + (data.error || 'Vui lòng thử lại'));
                            btnDatHang.disabled = false;
                            btnDatHang.innerHTML = '<i class="bi bi-check-circle"></i> Đặt hàng';
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('Có lỗi xảy ra khi đặt hàng. Vui lòng thử lại!');
                        btnDatHang.disabled = false;
                        btnDatHang.innerHTML = '<i class="bi bi-check-circle"></i> Đặt hàng';
                    });
            }
        });

        function updateTotal() {
            const tienHang = parseInt(document.querySelector('.tong-tien-hang').textContent.replace(/[^\d]/g, '')) || 0;
            const phiVC = parseInt(document.querySelector('.phi-van-chuyen').textContent.replace(/[^\d]/g, '')) || 0;
            const giamGia = parseInt(document.querySelector('.giam-gia').textContent.replace(/[^\d]/g, '')) || 0;

            const total = tienHang + phiVC - giamGia;
            document.querySelector('.thanh-tien').textContent =
                new Intl.NumberFormat('vi-VN').format(total) + ' VNĐ';
        }
    });
</script>
@endsection
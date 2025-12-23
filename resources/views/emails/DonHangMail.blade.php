<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xác nhận đơn hàng</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f5f5f5;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 30px;
        }

        h1 {
            color: #333;
            font-size: 22px;
            margin-bottom: 10px;
        }

        p {
            margin: 5px 0;
        }

        .section {
            margin-bottom: 25px;
        }

        .section-title {
            font-size: 16px;
            font-weight: bold;
            color: #333;
            margin-bottom: 10px;
            border-bottom: 1px solid #ddd;
            padding-bottom: 5px;
        }

        .info-row {
            padding: 5px 0;
        }

        .label {
            display: inline-block;
            width: 150px;
            color: #666;
        }

        .value {
            color: #333;
            font-weight: 500;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 15px 0;
        }

        th {
            background-color: #f9f9f9;
            padding: 10px;
            text-align: left;
            font-weight: 600;
            border-bottom: 2px solid #ddd;
        }

        td {
            padding: 10px;
            border-bottom: 1px solid #eee;
        }

        .text-right {
            text-align: right;
        }

        .text-center {
            text-align: center;
        }

        .total-section {
            margin-top: 20px;
            padding-top: 15px;
            border-top: 2px solid #ddd;
        }

        .total-row {
            padding: 5px 0;
            display: flex;
            justify-content: space-between;
        }

        .total-label {
            color: #666;
        }

        .total-value {
            font-weight: 600;
            color: #333;
        }

        .grand-total {
            font-size: 18px;
            font-weight: bold;
            color: #000;
            margin-top: 10px;
            padding-top: 10px;
            border-top: 1px solid #ddd;
        }

        .footer {
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #ddd;
            text-align: center;
            color: #666;
            font-size: 14px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Xác nhận đơn hàng</h1>
        <p>Cảm ơn bạn đã đặt hàng. Dưới đây là thông tin đơn hàng của bạn:</p>

        <div class="section">
            <div class="section-title">Thông tin đơn hàng</div>
            <div class="info-row">
                <span class="label">Mã đơn hàng:</span>
                <span class="value">#{{ $order->ma_don_hang }}</span>
            </div>
            <div class="info-row">
                <span class="label">Ngày đặt:</span>
                <span class="value">{{ \Carbon\Carbon::parse($order->ngay_dat_hang)->format('d/m/Y') }}</span>
            </div>
            <div class="info-row">
                <span class="label">Người nhận:</span>
                <span class="value">{{ $order->ten_nguoi_nhan }}</span>
            </div>
            <div class="info-row">
                <span class="label">Số điện thoại:</span>
                <span class="value">{{ $order->sdt }}</span>
            </div>
            <div class="info-row">
                <span class="label">Địa chỉ:</span>
                <span class="value">{{ $order->dia_chi }}</span>
            </div>
        </div>

        <div class="section">
            <div class="section-title">Danh sách sản phẩm</div>
            @if(isset($items) && $items->count() > 0)
            <table>
                <thead>
                    <tr>
                        <th>Sản phẩm</th>
                        <th class="text-center">Số lượng</th>
                        <th class="text-right">Đơn giá</th>
                        <th class="text-right">Thành tiền</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($items as $item)
                    @if($item->ma_don_hang == $order->ma_don_hang)
                    <tr>
                        <td>{{ $item->ten_sp ?? 'Sản phẩm' }}</td>
                        <td class="text-center">{{ $item->so_luong_sp }}</td>
                        <td class="text-right">{{ number_format($item->gia_sp, 0, ',', '.') }}đ</td>
                        <td class="text-right">{{ number_format($item->so_luong_sp * $item->gia_sp, 0, ',', '.') }}đ</td>
                    </tr>
                    @endif
                    @endforeach
                </tbody>
            </table>
            @else
            <p>Không có sản phẩm nào.</p>
            @endif
        </div>

        <div class="total-section">
            <div class="total-row">
                <span class="total-label">Tổng tiền hàng:</span>
                <span class="total-value">{{ number_format($order->tien_hang, 0, ',', '.') }}đ</span>
            </div>
            <div class="total-row">
                <span class="total-label">Phí vận chuyển:</span>
                <span class="total-value">{{ number_format($order->phi_van_chuyen, 0, ',', '.') }}đ</span>
            </div>
            @if($order->giam_gia > 0)
            <div class="total-row">
                <span class="total-label">Giảm giá:</span>
                <span class="total-value">-{{ number_format($order->giam_gia, 0, ',', '.') }}đ</span>
            </div>
            @endif
            <div class="total-row grand-total">
                <span>Tổng thanh toán:</span>
                <span>{{ number_format($order->thanh_tien, 0, ',', '.') }}đ</span>
            </div>
        </div>

        <div class="footer">
            <p>Cảm ơn bạn đã mua hàng!</p>
        </div>
    </div>
</body>

</html>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chào mừng đến với MiuBook</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 30px;
            border: 1px solid #dddddd;
        }

        h1 {
            color: #333333;
            font-size: 24px;
            margin: 0 0 20px 0;
        }

        p {
            color: #555555;
            line-height: 1.6;
            margin: 10px 0;
        }

        .info-box {
            background-color: #f9f9f9;
            border: 1px solid #e0e0e0;
            padding: 15px;
            margin: 20px 0;
        }

        .info-box p {
            margin: 5px 0;
        }

        .button {
            display: inline-block;
            background-color: #333333;
            color: #ffffff;
            text-decoration: none;
            padding: 12px 30px;
            margin: 20px 0;
        }

        .footer {
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #dddddd;
            color: #888888;
            font-size: 13px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Chào mừng đến với MiuBook</h1>

        <p>Xin chào <strong>{{ $user->name }}</strong>,</p>

        <p>Cảm ơn bạn đã đăng ký tài khoản tại MiuBook. Tài khoản của bạn đã được kích hoạt thành công.</p>

        <div class="info-box">
            <p><strong>Thông tin tài khoản:</strong></p>
            <p>Tên: {{ $user->name }}</p>
            <p>Email: {{ $user->email }}</p>
            <p>Ngày đăng ký: {{ now()->format('d/m/Y') }}</p>
        </div>

        <p>Bạn có thể bắt đầu khám phá và mua sắm sách ngay bây giờ.</p>

        <a href="{{ url('/') }}" class="button">Truy cập trang web</a>

        <div class="footer">
            <p>Nếu bạn cần hỗ trợ, vui lòng liên hệ: support@miubook.com</p>
            <p>© {{ date('Y') }} MiuBook. All rights reserved.</p>
        </div>
    </div>
</body>

</html>
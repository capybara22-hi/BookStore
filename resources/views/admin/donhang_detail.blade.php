@extends('components.layoutAdmin')

@section('donhangadmin')
<main class="h-full pb-16 overflow-y-auto">
  <div class="container grid px-6 mx-auto">
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">Chi tiết đơn hàng</h2>

    <div class="w-full mb-8 overflow-hidden rounded-lg shadow-xs bg-white p-6">
      <h3 class="text-lg font-medium" style="text-align: center;">Thông tin chung</h3>
      <table class="w-full table-auto mt-4">
        <tbody>
          <tr class="border-b">
            <td class="px-2 py-2 w-1/3"><strong>Mã đơn hàng:</strong> {{ $donhang->ma_don_hang }}</td>
            <td class="px-2 py-2 w-1/3"><strong>Người đặt:</strong> {{ optional($donhang->user)->name }}</td>
            <td class="px-2 py-2 w-1/3"><strong>Mã người dùng:</strong> {{ $donhang->ma_nguoi_dung }}</td>
          </tr>
          <tr>
            <td class="px-2 py-2"><strong>Ngày đặt:</strong> {{ $donhang->ngay_dat_hang }}</td>
            <td class="px-2 py-2">
              <strong>Trạng thái:</strong>
              @switch($donhang->trang_thai_dh)
                  @case(0)
                      Chờ xác nhận
                      @break
                  @case(1)
                      Đã xác nhận
                      @break
                  @case(2)
                      Đang giao hàng
                      @break
                  @case(3)
                      Đã giao hàng
                      @break
                  @case(4)
                      Đã hủy
                      @break
                  @default
                      Không xác định
              @endswitch
            </td>
            <td class="px-2 py-2"><strong>Thành tiền:</strong> {{ $donhang->thanh_tien ?? '-' }}</td>
          </tr>
        </tbody>
      </table>
    </div>

    <div class="w-full mb-8 overflow-hidden rounded-lg shadow-xs bg-white p-6">
      <h3 class="text-lg font-medium mb-4">Sản phẩm trong đơn</h3>
      @if($items && $items->count())
      <table class="w-full text-left">
        <thead>
          <tr>
            <th class="px-2 py-1" style="border: 1px solid #0a0a0aff;">Mã SP</th>
            <th class="px-2 py-1" style="border: 1px solid #0a0a0aff;">Tên</th>
            <th class="px-2 py-1" style="border: 1px solid #0a0a0aff;">Giá</th>
            <th class="px-2 py-1" style="border: 1px solid #0a0a0aff;">Số lượng</th>
            <th class="px-2 py-1" style="border: 1px solid #0a0a0aff;">Tổng</th>
          </tr>
        </thead>
        <tbody>
          @foreach($items as $it)
          <tr>
            <td class="px-2 py-1" style="border: 1px solid #0a0a0aff;">{{ $it->ma_san_pham }}</td>
            <td class="px-2 py-1" style="border: 1px solid #0a0a0aff;">{{ $it->ten_sp ?? '-' }}</td>
            <td class="px-2 py-1" style="border: 1px solid #0a0a0aff;">{{ $it->gia_sp ?? '-' }}</td>
            <td class="px-2 py-1" style="border: 1px solid #0a0a0aff;">{{ $it->so_luong_sp ?? '-' }}</td>
            <td class="px-2 py-1" style="border: 1px solid #0a0a0aff;">{{ $it->tong_tien ?? '-' }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
      @else
      <p>Không tìm thấy mục đơn hàng.</p>
      @endif

      <div class="mt-4">
        <a href="{{ route('donhangadmin') }}" class="px-3 py-2 bg-gray-600 text-white rounded">Quay lại</a>
      </div>
    </div>
  </div>
</main>
@endsection

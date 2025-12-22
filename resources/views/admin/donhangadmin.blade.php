@extends('components.layoutAdmin')

@section('donhangadmin')
<main class="h-full pb-16 overflow-y-auto">
  <div class="container grid px-6 mx-auto">
    <h2
      class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
      Danh sách đơn hàng
    </h2>
    <!-- With avatar -->
    <h4
      class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
      Chờ xác nhận
    </h4>
    <div class="w-full mb-8 overflow-hidden rounded-lg shadow-xs">
      <div class="w-full overflow-x-auto">
        <table class="w-full whitespace-no-wrap">
          <thead>
            <tr
              class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
              <th class="px-4 py-3">Người dùng</th>
              <th class="px-4 py-3">Mã đơn hàng</th>
              <th class="px-4 py-3">Xác Nhận</th>
              <th class="px-4 py-3">Xem chi tiết</th>
            </tr>
          </thead>
          <tbody
            class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
            @foreach($don_hang as $dh)
            @if($dh->trang_thai_dh == 1)
            <tr class="text-gray-700 dark:text-gray-400">
              <td class="px-4 py-3">
                <div class="flex items-center text-sm">
                  <!-- Avatar with inset shadow -->
                  <div
                    class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                    <img
                      class="object-cover w-full h-full rounded-full"
                      src="https://images.unsplash.com/flagged/photo-1570612861542-284f4c12e75f?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=200&fit=max&ixid=eyJhcHBfaWQiOjE3Nzg0fQ"
                      alt=""
                      loading="lazy" />
                    <div
                      class="absolute inset-0 rounded-full shadow-inner"
                      aria-hidden="true"></div>
                  </div>
                  <div>
                    <p class="font-semibold">{{$dh->User->name}}</p>
                    <p class="text-xs text-gray-600 dark:text-gray-400">
                      Mã người dùng: {{$dh->ma_nguoi_dung}}
                    </p>
                  </div>
                </div>
              </td>
              <td class="px-4 py-3 text-sm">
                {{$dh->ma_don_hang}}
              </td>
              <td class="px-4 py-3 text-xs">
                <form action="{{ route('donhangadmin.confirm', $dh->ma_don_hang) }}" method="POST" style="display:inline">
                  @csrf
                  <button type="submit" class="px-2 py-1 font-semibold leading-tight text-white bg-green-600 rounded" style="background-color: #4CAF50; width: 100px; height: 35px;">Xác nhận</button>
                </form>
              </td>
              <td class="px-4 py-3 text-sm">
                <a href="{{ route('donhangadmin.show', $dh->ma_don_hang) }}" class="px-2 py-1 font-semibold leading-tight text-white bg-purple-600 rounded">Xem chi tiết</a>
              </td>
            </tr>
            @endif
            @endforeach
          </tbody>
        </table>
      </div>
      <div
        class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">
      </div>
    </div>

    <!-- With avatar -->
    <h4
      class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
      Đơn hàng đang chuẩn bị
    </h4>
    <div class="w-full mb-8 overflow-hidden rounded-lg shadow-xs">
      <div class="w-full overflow-x-auto">
        <table class="w-full whitespace-no-wrap">
          <thead>
            <tr
              class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
              <th class="px-4 py-3">Người dùng</th>
              <th class="px-4 py-3">Mã đơn hàng</th>
              <th class="px-4 py-3">Chuẩn bị xong</th>
              <th class="px-4 py-3">Xem chi tiết</th>
            </tr>
          </thead>
          <tbody
            class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
            @foreach($don_hang as $dh)
            @if($dh->trang_thai_dh == 2)
            <tr class="text-gray-700 dark:text-gray-400">
              <td class="px-4 py-3">
                <div class="flex items-center text-sm">
                  <!-- Avatar with inset shadow -->
                  <div
                    class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                    <img
                      class="object-cover w-full h-full rounded-full"
                      src="https://images.unsplash.com/flagged/photo-1570612861542-284f4c12e75f?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=200&fit=max&ixid=eyJhcHBfaWQiOjE3Nzg0fQ"
                      alt=""
                      loading="lazy" />
                    <div
                      class="absolute inset-0 rounded-full shadow-inner"
                      aria-hidden="true"></div>
                  </div>
                  <div>
                    <p class="font-semibold">{{$dh->User->name}}</p>
                    <p class="text-xs text-gray-600 dark:text-gray-400">
                      Mã người dùng: {{$dh->ma_nguoi_dung}}
                    </p>
                  </div>
                </div>
              </td>
              <td class="px-4 py-3 text-sm">
                {{$dh->ma_don_hang}}
              </td>
              <td class="px-4 py-3 text-xs">
                <form action="{{ route('donhangadmin.confirm', $dh->ma_don_hang) }}" method="POST" style="display:inline">
                  @csrf
                  <button type="submit" class="px-2 py-1 font-semibold leading-tight text-white bg-green-600 rounded" style="background-color: #4CAF50; width: 100px; height: 35px;">Xác nhận</button>
                </form>
              </td>
              <td class="px-4 py-3 text-sm">
                <a href="{{ route('donhangadmin.show', $dh->ma_don_hang) }}" class="px-2 py-1 font-semibold leading-tight text-white bg-purple-600 rounded">Xem chi tiết</a>
              </td>
            </tr>
            @endif
            @endforeach
          </tbody>
        </table>
      </div>
      <div
        class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">
      </div>
    </div>
    <!-- With avatar -->
    <h4
      class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
      Đang giao hàng
    </h4>
    <div class="w-full mb-8 overflow-hidden rounded-lg shadow-xs">
      <div class="w-full overflow-x-auto">
        <table class="w-full whitespace-no-wrap">
          <thead>
            <tr
              class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
              <th class="px-4 py-3">Người dùng</th>
              <th class="px-4 py-3">Mã đơn hàng</th>
              <th class="px-4 py-3">Xác Nhận</th>
              <th class="px-4 py-3">Xem chi tiết</th>
            </tr>
          </thead>
          <tbody
            class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
            @foreach($don_hang as $dh)
            @if($dh->trang_thai_dh == 3)
            <tr class="text-gray-700 dark:text-gray-400">
              <td class="px-4 py-3">
                <div class="flex items-center text-sm">
                  <!-- Avatar with inset shadow -->
                  <div
                    class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                    <img
                      class="object-cover w-full h-full rounded-full"
                      src="https://images.unsplash.com/flagged/photo-1570612861542-284f4c12e75f?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=200&fit=max&ixid=eyJhcHBfaWQiOjE3Nzg0fQ"
                      alt=""
                      loading="lazy" />
                    <div
                      class="absolute inset-0 rounded-full shadow-inner"
                      aria-hidden="true"></div>
                  </div>
                  <div>
                    <p class="font-semibold">{{$dh->User->name}}</p>
                    <p class="text-xs text-gray-600 dark:text-gray-400">
                      Mã người dùng: {{$dh->ma_nguoi_dung}}
                    </p>
                  </div>
                </div>
              </td>
              <td class="px-4 py-3 text-sm">
                {{$dh->ma_don_hang}}
              </td>
              <td class="px-4 py-3 text-xs">
                <form action="{{ route('donhangadmin.confirm', $dh->ma_don_hang) }}" method="POST" style="display:inline">
                  @csrf
                  <button type="submit" class="px-2 py-1 font-semibold leading-tight text-white bg-green-600 rounded" style="background-color: #4CAF50; width: 100px; height: 35px;">Xác nhận</button>
                </form>
              </td>
              <td class="px-4 py-3 text-sm">
                <a href="{{ route('donhangadmin.show', $dh->ma_don_hang) }}" class="px-2 py-1 font-semibold leading-tight text-white bg-purple-600 rounded">Xem chi tiết</a>
              </td>
            </tr>
            @endif
            @endforeach
          </tbody>
        </table>
      </div>
      <div
        class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">
      </div>
    </div>

    <!-- With avatar -->
    <h4
      class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
      Hủy đơn hàng
    </h4>
    <div class="w-full mb-8 overflow-hidden rounded-lg shadow-xs">
      <div class="w-full overflow-x-auto">
        <table class="w-full whitespace-no-wrap">
          <thead>
            <tr
              class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
              <th class="px-4 py-3">Người dùng</th>
              <th class="px-4 py-3">Mã đơn hàng</th>
              <th class="px-4 py-3">Hủy đơn hàng</th>
              <th class="px-4 py-3">Xem chi tiết</th>
            </tr>
          </thead>
          <tbody
            class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
            @foreach($don_hang as $dh)
            @if($dh->trang_thai_dh == 1 || $dh->trang_thai_dh == 2)
            <tr class="text-gray-700 dark:text-gray-400">
              <td class="px-4 py-3">
                <div class="flex items-center text-sm">
                  <!-- Avatar with inset shadow -->
                  <div
                    class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                    <img
                      class="object-cover w-full h-full rounded-full"
                      src="https://images.unsplash.com/flagged/photo-1570612861542-284f4c12e75f?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=200&fit=max&ixid=eyJhcHBfaWQiOjE3Nzg0fQ"
                      alt=""
                      loading="lazy" />
                    <div
                      class="absolute inset-0 rounded-full shadow-inner"
                      aria-hidden="true"></div>
                  </div>
                  <div>
                    <p class="font-semibold">{{$dh->User->name}}</p>
                    <p class="text-xs text-gray-600 dark:text-gray-400">
                      Mã người dùng: {{$dh->ma_nguoi_dung}}
                    </p>
                  </div>
                </div>
              </td>
              <td class="px-4 py-3 text-sm">
                {{$dh->ma_don_hang}}
              </td>
              <td class="px-4 py-3 text-xs">
                <form action="{{ route('donhangadmin.cancel', $dh->ma_don_hang) }}" method="POST" style="display:inline">
                  @csrf
                  <button type="submit" class="px-2 py-1 font-semibold leading-tight text-white bg-red-600 rounded" style="background-color: #f44336; width: 100px; height: 35px;">Hủy đơn</button>
                </form>
              </td>
              <td class="px-4 py-3 text-sm">
                <a href="{{ route('donhangadmin.show', $dh->ma_don_hang) }}" class="px-2 py-1 font-semibold leading-tight text-white bg-purple-600 rounded">Xem chi tiết</a>
              </td>
            </tr>
            @endif
            @endforeach
          </tbody>
        </table>
      </div>
      <div
        class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">
      </div>
    </div>
  </div>
</main>
@endsection
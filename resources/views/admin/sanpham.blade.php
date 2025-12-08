@extends('components.layoutAdmin')

@section('sanphamadmin')
<main class="h-full pb-16 overflow-y-auto">
  <div class="container grid px-6 mx-auto">
    <h2
      class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
      Danh sách sản phẩm

      <!-- With avatar -->

      <div class="w-full mb-8 overflow-hidden rounded-lg shadow-xs">
        <div class="w-full overflow-x-auto">
          <table class="w-full whitespace-no-wrap">
            <thead>
              <tr
                class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                <th class="px-4 py-3">Mã sản phẩm</th>
                <th class="px-4 py-3">Tên sản phẩm</th>
                <th class="px-4 py-3">Tác giả</th>
                <th class="px-4 py-3">Giá tiền</th>
                <th class="px-4 py-3">Số lượng</th>
                <th class="px-4 py-3">Mô tả</th>
              </tr>
            </thead>
            <tbody
              class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
              @foreach($san_pham as $sp)
              <tr class="text-gray-700 dark:text-gray-400">
                <td class="px-4 py-3">
                  <div class="flex items-center text-sm">

                    <div>
                      <p class="font-semibold">{{ $sp->ma_san_pham}}</p>
                      <p class="text-xs text-gray-600 dark:text-gray-400">

                      </p>
                    </div>
                  </div>
                </td>
                <td class="px-4 py-3 text-sm">
                  {{$sp->ten_san_pham}}
                </td>
                <td class="px-4 py-3 text-xs">
                  <span
                    class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                    {{$sp->tac_gia}}
                  </span>
                </td>
                <td class="px-4 py-3 text-sm">
                  <Button>{{ $sp->gia_tien_sp}}</Button>
                </td>
                <td class="px-4 py-3 text-sm">
                  <Button>{{$sp->so_luong_sp}}</Button>
                </td>
                <td class="px-4 py-3 text-sm">
                  <Button>{{$sp->mo_ta_san_pham}}</Button>
                </td>
              </tr>
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
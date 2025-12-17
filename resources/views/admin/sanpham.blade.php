@extends('components.layoutAdmin')

@section('sanphamadmin')
<main class="h-full pb-16 overflow-y-auto" x-data="{ openEditModal: false, editProduct: {} }">

  <div class="container grid px-6 mx-auto">
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
      Danh sách sản phẩm
    </h2>

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
              <th class="px-4 py-3">Thao tác</th>
            </tr>
          </thead>
          <tbody
            class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
            @foreach($san_pham as $sp)
            <tr class="text-gray-700 dark:text-gray-400">
              <td class="px-4 py-3">
                <div class="flex items-center text-sm">

                  <div>
                    <p class="font-semibold">{{ $sp->code}}</p>
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
              <td class="px-4 py-3">
                <div class="flex items-center space-x-4 text-sm">
                  <!-- Nút Chỉnh sửa -->
                  <button
                    @click="openEditModal = true; editProduct = { id: '{{ $sp->ma_san_pham }}', code: '{{ $sp->code }}', ten: '{{ $sp->ten_san_pham }}', tacGia: '{{ $sp->tac_gia }}', gia: '{{ $sp->gia_tien_sp }}', soLuong: '{{ $sp->so_luong_sp }}', moTa: '{{ $sp->mo_ta_san_pham }}' }"
                    class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none hover:bg-gray-100  hover:bg-purple-100"
                    aria-label="Edit">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    </svg>
                  </button>

                  <!-- Nút Ẩn/Hiện -->
                  <button
                    class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-gray-600 rounded-lg dark:text-gray-400 focus:outline-none  hover:bg-gray-100"
                    aria-label="Toggle visibility">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                  </button>
                </div>
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

  <!-- Modal Chỉnh sửa sản phẩm -->
  <div x-show="openEditModal"
    x-transition:enter="transition ease-out duration-150"
    x-transition:enter-start="opacity-0"
    x-transition:enter-end="opacity-100"
    x-transition:leave="transition ease-in duration-150"
    x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0"
    class="fixed inset-0 z-30 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center"
    @click="openEditModal = false"
    style="display: none;">

    <!-- Modal -->
    <div x-show="openEditModal"
      x-transition:enter="transition ease-out duration-150"
      x-transition:enter-start="opacity-0 transform translate-y-1/2"
      x-transition:enter-end="opacity-100"
      x-transition:leave="transition ease-in duration-150"
      x-transition:leave-start="opacity-100"
      x-transition:leave-end="opacity-0  transform translate-y-1/2"
      @click.stop
      class="w-full px-6 py-4 overflow-hidden bg-white rounded-t-lg dark:bg-gray-800 sm:rounded-lg sm:m-4 sm:max-w-xl"
      role="dialog">

      <!-- Nút đóng -->
      <button
        @click="openEditModal = false"
        class="absolute top-0 right-0 mt-4 mr-4 text-gray-400 hover:text-gray-600 dark:hover:text-gray-300"
        aria-label="close">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg>
      </button>

      <!-- Tiêu đề -->
      <header class="mb-4">
        <h2 class="text-xl font-semibold text-gray-700 dark:text-gray-300">
          Chỉnh sửa sản phẩm
        </h2>
      </header>

      <!-- Form -->
      <form action="#" method="POST">
        @csrf
        @method('PUT')

        <div class="space-y-4">
          <!-- Code sản phẩm (readonly) -->
          <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-400">
              Mã sản phẩm
            </label>
            <input type="text" x-model="editProduct.code" readonly
              class="w-full mt-1 px-3 py-2 text-sm border border-gray-300 rounded-lg bg-gray-100 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300">
          </div>

          <!-- Tên sản phẩm -->
          <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-400">
              Tên sản phẩm
            </label>
            <input type="text" x-model="editProduct.ten" name="ten_san_pham"
              class="w-full mt-1 px-3 py-2 text-sm border border-gray-300 rounded-lg focus:border-purple-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300">
          </div>

          <!-- Tác giả -->
          <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-400">
              Tác giả
            </label>
            <input type="text" x-model="editProduct.tacGia" name="tac_gia"
              class="w-full mt-1 px-3 py-2 text-sm border border-gray-300 rounded-lg focus:border-purple-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300">
          </div>

          <!-- Giá tiền và Số lượng -->
          <div class="grid grid-cols-2 gap-4">
            <div>
              <label class="block text-sm font-medium text-gray-700 dark:text-gray-400">
                Giá tiền
              </label>
              <input type="number" x-model="editProduct.gia" name="gia_tien_sp"
                class="w-full mt-1 px-3 py-2 text-sm border border-gray-300 rounded-lg focus:border-purple-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300">
            </div>
            <div>
              <label class="block text-sm font-medium text-gray-700 dark:text-gray-400">
                Số lượng
              </label>
              <input type="number" x-model="editProduct.soLuong" name="so_luong_sp"
                class="w-full mt-1 px-3 py-2 text-sm border border-gray-300 rounded-lg focus:border-purple-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300">
            </div>
          </div>

          <!-- Mô tả -->
          <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-400">
              Mô tả sản phẩm
            </label>
            <textarea x-model="editProduct.moTa" name="mo_ta_san_pham" rows="3"
              class="w-full mt-1 px-3 py-2 text-sm border border-gray-300 rounded-lg focus:border-purple-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300"></textarea>
          </div>
        </div>

        <!-- Nút hành động -->
        <footer class="flex flex-col items-center justify-end px-6 py-3 -mx-6 -mb-4 space-y-4 sm:space-y-0 sm:space-x-6 sm:flex-row bg-gray-50 dark:bg-gray-800">
          <button @click="openEditModal = false" type="button"
            class="w-full px-5 py-3 text-sm font-medium leading-5 text-gray-700 transition-colors duration-150 border border-gray-300 rounded-lg dark:text-gray-400 sm:px-4 sm:py-2 sm:w-auto active:bg-transparent hover:border-gray-500 focus:border-gray-500 active:text-gray-500 focus:outline-none focus:shadow-outline-gray">
            Hủy
          </button>
          <button type="submit"
            class="w-full px-5 py-3 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg sm:w-auto sm:px-4 sm:py-2 active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
            Lưu thay đổi
          </button>
        </footer>
      </form>
    </div>
  </div>

</main>
@endsection
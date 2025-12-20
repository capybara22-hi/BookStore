@extends('components.layoutAdmin')

@section('sanphamadmin')
<main class="h-full pb-16 overflow-y-auto">

  <div class="container grid px-6 mx-auto">
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
      Danh sách sản phẩm
    </h2>

    <!-- Thông báo thành công -->
    @if(session('success'))
    <div class="mb-4 px-4 py-3 rounded-lg bg-green-100 border border-green-400 text-green-700 dark:bg-green-700 dark:text-green-100" role="alert">
      <div class="flex items-center justify-between">
        <div class="flex items-center">
          <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
          </svg>
          <span class="font-medium">{{ session('success') }}</span>
        </div>
        <button onclick="this.parentElement.parentElement.remove()" class="text-green-700 dark:text-green-100 hover:text-green-900">
          <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
          </svg>
        </button>
      </div>
    </div>
    @endif

    @if(session('error'))
    <div class="mb-4 px-4 py-3 rounded-lg bg-red-100 border border-red-400 text-red-700 dark:bg-red-700 dark:text-red-100" role="alert">
      <div class="flex items-center justify-between">
        <div class="flex items-center">
          <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
          </svg>
          <span class="font-medium">{{ session('error') }}</span>
        </div>
        <button onclick="this.parentElement.parentElement.remove()" class="text-red-700 dark:text-red-100 hover:text-red-900">
          <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
          </svg>
        </button>
      </div>
    </div>
    @endif

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
                    onclick="openEditModal('{{ $sp->ma_san_pham }}', '{{ $sp->code }}', '{{ $sp->ten_san_pham }}', '{{ $sp->tac_gia }}', '{{ $sp->gia_tien_sp }}', '{{ $sp->so_luong_sp }}', '{{ $sp->mo_ta_san_pham }}')"
                    class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none hover:bg-gray-100  hover:bg-purple-100"
                    aria-label="Edit">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    </svg>
                  </button>

                  <!-- Nút Ẩn/Hiện -->
                  <!-- onclick="toggleVisibility({{ $sp->ma_san_pham }}, this)" -->


                  <button
                    type="button"
                    data-id="{{ $sp->ma_san_pham }}"
                    data-status="{{ $sp->status }}"
                    class="toggle-status-btn flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-gray-600 rounded-lg dark:text-gray-400 focus:outline-none  hover:bg-gray-100"
                    aria-label="Toggle visibility">
                    <!-- Icon con mắt (hiển thị) -->
                    <svg class="eye-icon w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="display: {{ $sp->status == 1 ? 'block' : 'none' }}">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                    <!-- Icon con mắt gạch chéo (ẩn) -->
                    <svg class="eye-slash-icon w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="display: {{ $sp->status == 0 ? 'block' : 'none' }}">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
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
  <div id="editModal"
    class="fixed inset-0 z-30 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center transition-opacity duration-150"
    onclick="closeEditModal()"
    style="display: none;">

    <!-- Modal -->
    <div
      onclick="event.stopPropagation()"
      class="w-full px-6 py-4 overflow-hidden bg-white rounded-t-lg dark:bg-gray-800 sm:rounded-lg sm:m-4 sm:max-w-xl transition-all duration-150"
      role="dialog">

      <!-- Nút đóng -->
      <button
        onclick="closeEditModal()"
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
      <form action="{{ route('sanpham.update') }}" method="POST">
        @csrf
        @method('PUT')

        <div class="space-y-4">
          <!-- Mã id của sản phẩm -->
          <input type="hidden" id="ma_san_pham_edit" name="ma_san_pham_edit">
          <!-- Code sản phẩm (readonly) -->
          <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-400">
              Mã sản phẩm
            </label>
            <input type="text" id="editCode" name="ma_san_pham" readonly
              class="w-full mt-1 px-3 py-2 text-sm border border-gray-300 rounded-lg bg-gray-100 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300">
          </div>

          <!-- Tên sản phẩm -->
          <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-400">
              Tên sản phẩm
            </label>
            <input type="text" id="editTen" name="ten_san_pham"
              class="w-full mt-1 px-3 py-2 text-sm border border-gray-300 rounded-lg focus:border-purple-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300">
          </div>

          <!-- Tác giả -->
          <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-400">
              Tác giả
            </label>
            <input type="text" id="editTacGia" name="tac_gia"
              class="w-full mt-1 px-3 py-2 text-sm border border-gray-300 rounded-lg focus:border-purple-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300">
          </div>

          <!-- Giá tiền và Số lượng -->
          <div class="grid grid-cols-2 gap-4">
            <div>
              <label class="block text-sm font-medium text-gray-700 dark:text-gray-400">
                Giá tiền
              </label>
              <input type="number" id="editGia" name="gia_tien_sp"
                class="w-full mt-1 px-3 py-2 text-sm border border-gray-300 rounded-lg focus:border-purple-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300">
            </div>
            <div>
              <label class="block text-sm font-medium text-gray-700 dark:text-gray-400">
                Số lượng
              </label>
              <input type="number" id="editSoLuong" name="so_luong_sp"
                class="w-full mt-1 px-3 py-2 text-sm border border-gray-300 rounded-lg focus:border-purple-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300">
            </div>
          </div>

          <!-- Mô tả -->
          <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-400">
              Mô tả sản phẩm
            </label>
            <textarea id="editMoTa" name="mo_ta_san_pham" rows="3"
              class="w-full mt-1 px-3 py-2 text-sm border border-gray-300 rounded-lg focus:border-purple-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300"></textarea>
          </div>
        </div>

        <!-- Nút hành động -->
        <footer class="flex flex-col items-center justify-end px-6 py-3 -mx-6 -mb-4 space-y-4 sm:space-y-0 sm:space-x-6 sm:flex-row bg-gray-50 dark:bg-gray-800">
          <button onclick="closeEditModal()" type="button"
            class="w-full px-5 py-3 text-sm font-medium leading-5 text-gray-700 transition-colors duration-150 border border-gray-300 rounded-lg dark:text-gray-400 sm:px-4 sm:py-2 sm:w-auto active:bg-transparent hover:border-gray-500 focus:border-gray-500 active:text-gray-500 focus:outline-none focus:shadow-outline-gray">
            Hủy
          </button>
          <button type="submit" name="btn-update"
            class="w-full px-5 py-3 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg sm:w-auto sm:px-4 sm:py-2 active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
            Lưu thay đổi
          </button>
        </footer>
      </form>
    </div>
  </div>

</main>

<script>
  // Toggle visibility cho từng sản phẩm
  // function toggleVisibility(productId, button) {
  //   const eyeIcon = button.querySelector('.eye-icon');
  //   const eyeSlashIcon = button.querySelector('.eye-slash-icon');

  //   if (eyeIcon.style.display === 'none') {
  //     eyeIcon.style.display = 'block';
  //     eyeSlashIcon.style.display = 'none';
  //   } else {
  //     eyeIcon.style.display = 'none';
  //     eyeSlashIcon.style.display = 'block';
  //   }
  // }

  document.querySelectorAll('.toggle-status-btn').forEach(button => {
    button.addEventListener('click', function(e) {
      e.preventDefault(); // Ngăn form submit

      let id = this.dataset.id;
      let eyeIcon = this.querySelector('.eye-icon');
      let eyeSlashIcon = this.querySelector('.eye-slash-icon');

      fetch(`/sanphamadmin/${id}/toggle-status`, {
          method: 'PATCH',
          headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Accept': 'application/json',
            'Content-Type': 'application/json'
          }
        })
        .then(response => response.json())
        .then(data => {
          // Toggle icons dựa trên status mới
          if (data.status == 1) {
            eyeIcon.style.display = 'block';
            eyeSlashIcon.style.display = 'none';
          } else {
            eyeIcon.style.display = 'none';
            eyeSlashIcon.style.display = 'block';
          }
        })
        .catch(error => {
          console.error('Error:', error);
          alert('Có lỗi xảy ra khi thay đổi trạng thái!');
        });
    });
  });

  // Mở modal chỉnh sửa
  function openEditModal(id, code, ten, tacGia, gia, soLuong, moTa) {
    const modal = document.getElementById('editModal');

    document.getElementById('ma_san_pham_edit').value = id;

    // Set giá trị vào form
    document.getElementById('editCode').value = code;
    document.getElementById('editTen').value = ten;
    document.getElementById('editTacGia').value = tacGia;
    document.getElementById('editGia').value = gia;
    document.getElementById('editSoLuong').value = soLuong;
    document.getElementById('editMoTa').value = moTa;

    // Hiển thị modal
    modal.style.display = 'flex';
  }

  // Đóng modal
  function closeEditModal() {
    const modal = document.getElementById('editModal');
    modal.style.display = 'none';
  }
</script>

@endsection
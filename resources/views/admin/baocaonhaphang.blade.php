@extends('components.layoutAdmin')

@section('baocaonhaphang')
<main class="h-full pb-16 overflow-y-auto">
  <div class="container grid px-6 mx-auto">
    <h2
      class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
      Nhập hàng
    </h2>

    <!-- With avatar -->
    <div class="w-full mb-8 overflow-hidden rounded-lg shadow-xs">
      <div class="w-full overflow-x-auto">
        <table class="w-full whitespace-no-wrap">
          <thead>
            <tr
              class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
              <th class="px-4 py-3">Nhập hàng</th>
              <th class="px-4 py-3"></th>
              <th class="px-4 py-3">&nbsp;&nbsp;</th>
            </tr>
          </thead>
          @if (session('success'))
          <script>
            alert("{{ session('success') }}");
          </script>
          @endif

          @if(session('error'))
          <script>
            alert("{{ session('error') }}");
          </script>
          @endif
          <tbody
            class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
            <tr class="text-gray-700 dark:text-gray-400">
              <td class="px-4 py-3">
                <div class="flex items-center text-sm">
                  <div>
                    <form action="{{ route('nhaphang.import') }}" method="POST" enctype="multipart/form-data" class="flex">
                      @csrf
                      <input type="file" name="file" accept=".xlsx,.xls" required class="block w-full text-sm text-gray-500
                              file:mr-4 file:py-2 file:px-4
                              file:rounded file:border-0
                              file:text-sm file:font-semibold
                              file:bg-purple-50 file:text-purple-700
                              hover:file:bg-purple-100">
                      <button style="background:blue; color: white; width: 100px ; height: 30px; border-radius: 10px; border: 1px; margin-left: 50px;" type="submit">Nhập</button>
                    </form>
                    <p class="mt-4 text-xs text-gray-500 dark:text-gray-400" style="font-style: italic;">*Chỉ tải được file .xlsx, .xls <a href="{{ asset('assets/file/mau_nhap_hang.xlsx') }}" download style="color: blue; text-decoration: underline; font-style: italic;">Tải file mẫu nhập hàng</a></p>
                  </div>
                </div>
              </td>
              <td class="px-4 py-3 text-sm">

              </td>
              <td class="px-4 py-3 text-sm">
                <!-- <Button style="background:green; color: white; width: 150px ; height: 30px; border-radius: 10px; border: 1px;">Tải file excel mẫu</Button> -->

              </td>
            </tr>
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
      Lịch sử nhập hàng
    </h4>
    <div class="w-full mb-8 overflow-hidden rounded-lg shadow-xs">
      <div class="w-full overflow-x-auto">
        <table class="w-full whitespace-no-wrap">
          <thead>
            <tr
              class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
              <!-- <th class="px-4 py-3 text-center">STT</th> -->
              <th class="px-4 py-3 text-center">Người nhập</th>
              <th class="px-4 py-3 text-center">Ngày nhập</th>
              <th class="px-4 py-3 text-center">Xem chi tiết</th>
            </tr>
          </thead>
          <tbody
            class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
            @foreach($phieu_nhap_hang as $phieu)
            <tr class="text-gray-700 dark:text-gray-400">
              <!-- <td class="px-4 py-3 text-sm text-center">
                {{$phieu->id}}
              </td> -->
              <td class="px-4 py-3 text-sm text-center">
                {{$phieu->nguoiNhap->name ?? 'Không xác định'}}
              </td>
              <td class="px-4 py-3 text-sm text-center">
                <!-- <Button style="background:green; color: white; width: 100px ; height: 30px; border-radius: 10px; border: 1px;
                                  "></Button> -->
                {{$phieu->created_at->format('d/m/Y')}}
              </td>
              <td class="px-4 py-3 text-sm text-center">
                <a href="{{ route('chitietnhaphang', ['id' => $phieu->id]) }}"><Button style="background:blue; color: white; width: 100px ; height: 30px; border-radius: 10px; border: 1px;">Xem chi tiết</Button></a>
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
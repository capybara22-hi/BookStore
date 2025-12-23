@extends('components.layoutAdmin')

@section('index')
<main class="h-full overflow-y-auto">
  <div class="container px-6 mx-auto grid">
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">Quản lý Danh mục</h2>

    @if(session('success'))
    <div class="mb-4 text-green-700 bg-green-100 p-3 rounded">{{ session('success') }}</div>
    @endif

    <div class="mb-6 grid grid-cols-2 gap-6">
      <div>
        <h3 class="font-semibold mb-2">Thêm Danh mục</h3>
        <form action="{{ route('danhmuc.store') }}" method="POST" class="flex gap-2">
          @csrf
          <input name="ten_danh_muc" placeholder="Tên danh mục" class="border rounded px-3 py-2 w-1/2" required style='border: 1px solid #131212ff; padding: 4px 8px; margin: 8px;' />
          <input name="ten_the_loai" placeholder="(Tùy chọn) Tên thể loại khởi tạo" class="border rounded px-3 py-2 w-1/3" style='border: 1px solid #131212ff; padding: 4px 8px; margin: 8px;' />
          <button class="px-4 py-2 bg-blue-600 text-white rounded" style='background-color: #3165ccff;  padding: 4px 8px; margin: 8px;'>Thêm</button>
        </form>
        @error('ten_danh_muc')
        <div class="text-red-600">{{ $message }}</div>
        @enderror
      </div>

      <div>
        <h3 class="font-semibold mb-2">Thêm Thể loại</h3>
        <form action="{{ route('danhmuc.theloai.store') }}" method="POST" class="flex gap-2">
          @csrf
          <select name="ma_danh_muc" class="border rounded px-3 py-2 w-1/3" required style='border: 1px solid #131212ff; padding: 4px 8px; margin: 8px;'>
            <option value="">Chọn danh mục</option>
            @foreach($danhmucs as $opt)
            <option value="{{ $opt->ma_danh_muc }}">{{ $opt->ten_danh_muc }}</option>
            @endforeach
          </select>
          <input name="ten_the_loai" placeholder="Tên thể loại" class="border rounded px-3 py-2 w-1/3" required style='border: 1px solid #131212ff; padding: 4px 8px; margin: 8px;' />
          <button class="px-4 py-2 bg-green-600 text-white rounded" style='background-color: #10B981;  padding: 4px 8px; margin: 8px;'>Thêm thể loại</button>
        </form>
        @error('ten_the_loai')
        <div class="text-red-600">{{ $message }}</div>
        @enderror
      </div>
    </div>

      <div class="w-full overflow-hidden rounded-lg shadow-xs">
        <div class="p-4">
          <h3 class="font-semibold mb-2">Danh sách Thể loại</h3>
          <div class="overflow-x-auto">
            <table class="w-full whitespace-no-wrap mb-4">
              <thead>
                <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase bg-gray-50">
                  <th class="px-4 py-3" style="border:1px solid #151414ff; background-color: #856cbeff; color: white;">Mã thể loại</th>
                  <th class="px-4 py-3" style="border:1px solid #151414ff; background-color: #856cbeff; color: white;">Tên thể loại</th>
                  <th class="px-4 py-3" style="border:1px solid #151414ff; background-color: #856cbeff; color: white;">Danh mục</th>
                  <th class="px-4 py-3" style="border:1px solid #151414ff; background-color: #856cbeff; color: white;">Hành động</th>
                </tr>
              </thead>
              <tbody class="bg-white divide-y">
                @foreach($theloais as $tl)
                <tr class="text-gray-700">
                  <td class="px-4 py-3" style='background: #f0f0f0; border:1px solid #151414ff;'>{{ $tl->ma_the_loai }}</td>
                  <td class="px-4 py-3" style='border:1px solid #151414ff;'>
                    <a href="{{ route('danhmuc.theloai.sanpham', $tl->ma_the_loai) }}" class="text-blue-600">{{ $tl->ten_the_loai }}</a>
                  </td>
                  <td class="px-4 py-3" style='border:1px solid #151414ff;'>{{ optional($tl->danhmuc)->ten_danh_muc }}</td>
                  <td class="px-4 py-3" style='border:1px solid #151414ff;'>
                    <a href="{{ route('danhmuc.theloai.edit', $tl->ma_the_loai) }}" class="text-blue-600 mr-2" style='background-color: #3165ccff; padding: 4px 8px; color: white;'>Sửa</a>
                    <form action="{{ route('danhmuc.theloai.destroy', $tl->ma_the_loai) }}" method="POST" style="display:inline">
                      @csrf
                      @method('DELETE')
                      <button onclick="return confirm('Xóa thể loại?')" class="text-red-600" style='background-color: #fb2929ff; padding: 4px 8px; color: white;'>Xóa</button>
                    </form>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>

      <div class="w-full overflow-x-auto">
        <table class="w-full whitespace-no-wrap">
          <thead>
            <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase bg-gray-50">
              <th class="px-4 py-3" style="border:1px solid #151414ff; background-color: #856cbeff; color: white;">Mã danh mục</th>
              <th class="px-4 py-3" style="border:1px solid #151414ff; background-color: #856cbeff; color: white;">Tên danh mục</th>
              <th class="px-4 py-3" style="border:1px solid #151414ff; background-color: #856cbeff; color: white;">Hành động</th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y">
            @foreach($danhmucs as $dm)
            <tr class="text-gray-700">
              <td class="px-4 py-3" style='background: #f0f0f0; border:1px solid #151414ff;'>{{ $dm->ma_danh_muc }}</td>
              <td class="px-4 py-3" style='border:1px solid #151414ff;'>{{ $dm->ten_danh_muc }}</td>
              <td class="px-4 py-3" style='border:1px solid #151414ff;'>
                <a href="{{ route('danhmuc.edit', $dm->ma_danh_muc) }}" class="text-blue-600 mr-2" style='background-color: #3165ccff; padding: 4px 8px; color: white;'>Sửa</a>
                <form action="{{ route('danhmuc.destroy', $dm->ma_danh_muc) }}" method="POST" style="display:inline">
                  @csrf
                  @method('DELETE')
                  <button onclick="return confirm('Xóa danh mục?')" class="text-red-600" style='background-color: #fb2929ff; padding: 4px 8px; color: white;'>Xóa</button>
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>

      <div class="p-4">
        {{ $danhmucs->links() }}
      </div>
    </div>
  </div>
</main>
@endsection

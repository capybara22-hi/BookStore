@extends('components.layoutAdmin')

@section('index')
<main class="h-full overflow-y-auto">
  <div class="container px-6 mx-auto grid">
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">Sửa Thể loại</h2>

    <form action="{{ route('danhmuc.theloai.update', $item->ma_the_loai) }}" method="POST" class="max-w-lg">
      @csrf
      @method('PUT')
      <div class="mb-3">
        <label class="block mb-1">Tên thể loại</label>
        <input name="ten_the_loai" value="{{ old('ten_the_loai', $item->ten_the_loai) }}" class="border rounded px-3 py-2 w-full" required />
      </div>
      <div class="mb-3">
        <label class="block mb-1">Danh mục</label>
        <select name="ma_danh_muc" class="border rounded px-3 py-2 w-full" required>
          @foreach($danhmucs as $dm)
          <option value="{{ $dm->ma_danh_muc }}" @if($dm->ma_danh_muc == $item->ma_danh_muc) selected @endif>{{ $dm->ten_danh_muc }}</option>
          @endforeach
        </select>
      </div>
      <div class="flex gap-2">
        <button class="px-4 py-2 bg-green-600 text-white rounded" style='background-color: #3165ccff;'>Lưu</button>
        <a href="{{ route('danhmuc.index') }}" class="px-4 py-2 bg-gray-300 rounded" style="background-color: #fb2929ff;">Hủy</a>
      </div>
    </form>
  </div>
</main>
@endsection

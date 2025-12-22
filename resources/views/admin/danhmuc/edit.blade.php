@extends('components.layoutAdmin')

@section('index')
<main class="h-full overflow-y-auto">
  <div class="container px-6 mx-auto grid">
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">Sửa Danh mục</h2>

    <div class="mb-6">
      <form action="{{ route('danhmuc.update', $item->ma_danh_muc) }}" method="POST" class="flex gap-2">
        @csrf
        @method('PUT')
        <input name="ten_danh_muc" value="{{ old('ten_danh_muc', $item->ten_danh_muc) }}" placeholder="Tên danh mục" class="border rounded px-3 py-2 w-1/3" required />
        <button class="px-4 py-2 bg-green-600 text-white rounded" style='background-color: #3165ccff;'>Lưu</button>
        <a href="{{ route('danhmuc.index') }}" class="px-4 py-2 bg-gray-300 rounded" style="background-color: #fb2929ff;">Hủy</a>
      </form>
      @error('ten_danh_muc')
      <div class="text-red-600">{{ $message }}</div>
      @enderror
    </div>
  </div>
</main>
@endsection

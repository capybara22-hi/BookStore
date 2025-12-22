@extends('components.layoutAdmin')

@section('index')
<main class="h-full overflow-y-auto">
  <div class="container px-6 mx-auto grid">
    <h2 class="my-6 text-2xl font-semibold text-gray-700">Xác nhận xóa danh mục</h2>

    <div class="mb-4 p-4 bg-yellow-50 border-l-4 border-yellow-400">
      <p class="font-semibold">Danh mục: {{ $danhmuc->ten_danh_muc }} đang có {{ count($theloais) }} thể loại liên kết.</p>
      <p>Nếu bạn tiếp tục, hệ thống sẽ chuyển các thể loại này sang `ma_danh_muc = không xác định` và xóa danh mục.</p>
    </div>

    <div class="mb-4">
      <h3 class="font-semibold">Danh sách thể loại ảnh hưởng</h3>
      <ul class="list-disc ml-6 mt-2">
        @foreach($theloais as $tl)
        <li>{{ $tl->ma_the_loai }} - {{ $tl->ten_the_loai }}</li>
        @endforeach
      </ul>
    </div>

    <form action="{{ route('danhmuc.destroy', $danhmuc->ma_danh_muc) }}" method="POST">
      @csrf
      @method('DELETE')
      <input type="hidden" name="confirm" value="1" />
      <button class="px-4 py-2 bg-red-600 text-white rounded">Xác nhận xóa và chuyển thể loại</button>
      <a href="{{ route('danhmuc.index') }}" class="px-4 py-2 bg-gray-300 rounded ml-2">Hủy</a>
    </form>
  </div>
</main>
@endsection

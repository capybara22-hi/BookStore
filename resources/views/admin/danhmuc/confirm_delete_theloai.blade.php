@extends('components.layoutAdmin')

@section('index')
<main class="h-full overflow-y-auto">
  <div class="container px-6 mx-auto grid">
    <h2 class="my-6 text-2xl font-semibold text-gray-700">Xác nhận xóa thể loại</h2>

    <div class="mb-4 p-4 bg-yellow-50 border-l-4 border-yellow-400">
      <p class="font-semibold">Thể loại: {{ $theloai->ten_the_loai }} đang có {{ count($products) }} sản phẩm đang gán.</p>
      <p>Nếu bạn tiếp tục, hệ thống sẽ chuyển các sản phẩm này sang `ma_the_loai là không xác định` và xóa thể loại.</p>
    </div>

    <div class="mb-4">
      <h3 class="font-semibold">Danh sách sản phẩm ảnh hưởng</h3>
      <ul class="list-disc ml-6 mt-2">
        @foreach($products as $p)
        <li>{{ $p->ma_san_pham }} - {{ $p->ten_san_pham }}</li>
        @endforeach
      </ul>
    </div>

    <form action="{{ route('danhmuc.theloai.destroy', $theloai->ma_the_loai) }}" method="POST">
      @csrf
      @method('DELETE')
      <input type="hidden" name="confirm" value="1" />
      <button class="px-4 py-2 bg-red-600 text-white rounded">Xác nhận xóa và chuyển sản phẩm</button>
      <a href="{{ route('danhmuc.index') }}" class="px-4 py-2 bg-gray-300 rounded ml-2">Hủy</a>
    </form>
  </div>
</main>
@endsection

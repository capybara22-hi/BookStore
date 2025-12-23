@extends('components.layoutAdmin')

@section('index')
<main class="h-full overflow-y-auto">
  <div class="container px-6 mx-auto grid">
    <h2 class="my-6 text-2xl font-semibold text-gray-700">Sản phẩm cho thể loại: {{ $theloai->ten_the_loai }}</h2>

    @if(session('success'))
    <div class="mb-4 text-green-700 bg-green-100 p-3 rounded">{{ session('success') }}</div>
    @endif

    <form action="{{ route('danhmuc.theloai.sanpham.assign', $theloai->ma_the_loai) }}" method="POST">
      @csrf
      <div class="overflow-x-auto">
        <table class="w-full whitespace-no-wrap">
          <thead>
            <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase bg-gray-50">
              <th class="px-4 py-3" style="border:1px solid #151414ff; background-color: #856cbeff; color: white;">Chọn</th>
              <th class="px-4 py-3" style="border:1px solid #151414ff; background-color: #856cbeff; color: white;">Mã</th>
              <th class="px-4 py-3" style="border:1px solid #151414ff; background-color: #856cbeff; color: white;">Tên sản phẩm</th>
              <th class="px-4 py-3" style="border:1px solid #151414ff; background-color: #856cbeff; color: white;">Thể loại hiện tại</th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y">
            @foreach($products as $p)
            <tr class="text-gray-700">
              <td class="px-4 py-3" style='border:1px solid #151414ff;'>
                @php
                // Nếu sản phẩm có ma_the_loai khác và không phải 1 thì disable
                $hasOther = $p->ma_the_loai && $p->ma_the_loai != $theloai->ma_the_loai && $p->ma_the_loai != 1;
                @endphp
                <input type="checkbox" name="product_ids[]" value="{{ $p->ma_san_pham }}"
                  @if($p->ma_the_loai == $theloai->ma_the_loai) checked @endif
                  @if($hasOther) disabled title="Sản phẩm đã có thể loại khác: {{ optional($p->theloaisp)->ten_the_loai }}" @endif />
              </td>
              <td class="px-4 py-3" style='border:1px solid #151414ff;'>{{ $p->ma_san_pham }}</td>
              <td class="px-4 py-3" style='border:1px solid #151414ff;'>
                {{ $p->ten_san_pham }}
              </td>
              <td class="px-4 py-3" style='border:1px solid #151414ff;'>{{ optional($p->theloaisp)->ten_the_loai }}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>

      <div class="mt-4 flex gap-2">
        <button class="px-4 py-2 bg-blue-600 text-white rounded">Gán sản phẩm đã chọn</button>
        <a href="{{ route('danhmuc.index') }}" class="px-4 py-2 bg-gray-300 rounded" style="background-color: #d1f930ff;">Quay lại</a>
      </div>
    </form>

    <div class="mt-4">
      {{ $products->links() }}
    </div>
  </div>
</main>
@endsection

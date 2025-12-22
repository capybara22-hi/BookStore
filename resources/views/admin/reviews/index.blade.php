@extends('components.layoutAdmin')

@section('index')
<main class="h-full overflow-y-auto">
  <div class="container px-6 mx-auto">
    <h2 class="my-6 text-2xl font-semibold text-gray-700">Quản lý Đánh giá</h2>

    @if(session('success'))
    <div class="mb-4 text-green-700 bg-green-100 p-3 rounded">{{ session('success') }}</div>
    @endif

    <form method="GET" class="mb-4 flex gap-2">
      <select name="tab" onchange="this.form.submit()" class="border p-2">
        <option value="pending" @if($tab=='pending') selected @endif>Chưa phản hồi</option>
        <option value="replied" @if($tab=='replied') selected @endif>Đã phản hồi</option>
        <option value="all" @if($tab=='all') selected @endif>Tất cả</option>
      </select>
      <input type="text" name="q" value="{{ request('q') }}" placeholder="Tìm kiếm..." class="border p-2 flex-1" />
      <button class="px-4 py-2 bg-blue-600 text-white rounded">Lọc</button>
    </form>

    <div class="overflow-x-auto">
      <table class="w-full whitespace-no-wrap">
        <thead>
          <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase bg-gray-50">
            <th class="px-4 py-3" style="border:1px solid #151414ff; background-color: #856cbeff; color: white;">Mã đánh giá</th>
            <th class="px-4 py-3" style="border:1px solid #151414ff; background-color: #856cbeff; color: white;">Người dùng</th>
            <th class="px-4 py-3" style="border:1px solid #151414ff; background-color: #856cbeff; color: white;">Sản phẩm</th>
            <th class="px-4 py-3" style="border:1px solid #151414ff; background-color: #856cbeff; color: white;">Rating</th>
            <th class="px-4 py-3" style="border:1px solid #151414ff; background-color: #856cbeff; color: white;">Bình luận</th>
            <th class="px-4 py-3" style="border:1px solid #151414ff; background-color: #8a9a39ff; color: white;">Đã phản hồi</th>
            <th class="px-4 py-3" style="border:1px solid #151414ff; background-color: #63d5d7ff; color: white;">Ẩn</th>
            <th class="px-4 py-3" style="border:1px solid #151414ff; background-color: #e36060ff; color: white;">Hành động</th>
          </tr>
        </thead>
        <tbody class="bg-white divide-y">
          @foreach($reviews as $r)
          <tr class="text-gray-700">
            <td class="px-4 py-3" style='border:1px solid #151414ff;'>{{ $r->ma_danh_gia }}</td>
            <td class="px-4 py-3" style='border:1px solid #151414ff;'>{{ optional($r->user)->name }}</td>
            <td class="px-4 py-3" style='border:1px solid #151414ff;'>{{ optional($r->sanpham)->ten_san_pham }}</td>
            <td class="px-4 py-3" style='border:1px solid #151414ff;'>{{ $r->rating }}</td>
            <td class="px-4 py-3" style='border:1px solid #151414ff;'>{{ $r->comment }}</td>
            <td class="px-4 py-3" style='border:1px solid #151414ff;'>{{ $r->admin_reply ? 'Có' : 'Không' }}</td>
            <td class="px-4 py-3" style='border:1px solid #151414ff;'>{{ $r->is_hidden ? 'Có' : 'Không' }}</td>
            <td class="px-4 py-3" style='border:1px solid #151414ff;'>
              <button onclick="document.getElementById('reply-box-{{ $r->ma_danh_gia }}').classList.toggle('hidden')" class="text-sm px-2 py-1 bg-blue-200 rounded" style='margin-right:6px; background-color: #fba731ff; color: white;'>Phản hồi</button>

              <div id="reply-box-{{ $r->ma_danh_gia }}" class="hidden mt-2">
                <form action="{{ route('admin.reviews.reply', $r->ma_danh_gia) }}" method="POST">
                  @csrf
                  <textarea name="danh_gia" class="border p-2 w-full" rows="3" required>{{ old('danh_gia', $r->danh_gia ?? '') }}</textarea>
                  <div class="mt-2">
                    <button class="px-3 py-1 bg-green-600 text-white rounded" style="background-color: #6969b5ff; margin-bottom: 5px;">Gửi phản hồi</button>
                  </div>
                </form>
              </div>

              <form action="{{ route('admin.reviews.toggleHide', $r->ma_danh_gia) }}" method="POST" style="display:inline">
                @csrf
                <button class="text-sm px-2 py-1 bg-gray-200 rounded" style='color: #f6fcf6ff; background-color: #8a9a39ff;'>{{ $r->is_hidden ? 'Hiện' : 'Ẩn' }}</button>
              </form>

              <form action="{{ route('admin.reviews.destroy', $r->ma_danh_gia) }}" method="POST" style="display:inline" onsubmit="return confirm('Xóa đánh giá?')">
                @csrf
                @method('DELETE')
                <button class="text-sm px-2 py-1 bg-red-200 rounded" style='color: #f6fcf6ff; background-color: #e36060ff;'>Xóa</button>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>

    <div class="mt-4">{{ $reviews->links() }}</div>
  </div>
</main>
@endsection

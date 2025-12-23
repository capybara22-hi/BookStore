@extends('components.layoutAdmin')

@section('index')
<main class="h-full overflow-y-auto">
  <div class="container px-6 mx-auto">
    <h2 class="my-6 text-2xl font-semibold text-gray-700">Sửa Vận chuyển</h2>

    <form action="{{ route('vanchuyen.update', $item->ma_van_chuyen) }}" method="POST" class="grid grid-cols-1 gap-2 max-w-lg">
      @csrf
      @method('PUT')
      <input name="dv_van_chuyen" value="{{ old('dv_van_chuyen', $item->dv_van_chuyen) }}" placeholder="Dịch vụ vận chuyển" class="border rounded px-3 py-2" required style='border: 1px solid #131212ff; padding: 4px 8px; margin-bottom: 8px;' />
      <input name="so_tien" value="{{ old('so_tien', $item->so_tien) }}" placeholder="Số tiền" type="number" step="0.01" class="border rounded px-3 py-2" required style='border: 1px solid #131212ff; padding: 4px 8px; margin-bottom: 8px;' />
      <input name="mo_ta" value="{{ old('mo_ta', $item->mo_ta) }}" placeholder="Mô tả (tuỳ chọn)" class="border rounded px-3 py-2" style='border: 1px solid #131212ff; padding: 4px 8px; margin-bottom: 8px;' />
      <input name="dieu_kien" value="{{ old('dieu_kien', $item->dieu_kien) }}" placeholder="Điều kiện (tuỳ chọn)" class="border rounded px-3 py-2" style='border: 1px solid #131212ff; padding: 4px 8px; margin-bottom: 8px;' />
      <div>
        <button class="px-4 py-2 bg-green-600 text-white rounded" style='background-color: #3165ccff;'>Lưu</button>
        <a href="{{ route('vanchuyen.index') }}" class="px-4 py-2 bg-gray-300 rounded" style="background-color: #fb2929ff;">Hủy</a>
      </div>
    </form>
  </div>
</main>
@endsection

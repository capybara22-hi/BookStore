@extends('components.layoutAdmin')

@section('index')
<main class="h-full overflow-y-auto">
  <div class="container px-6 mx-auto">
    <h2 class="my-6 text-2xl font-semibold text-gray-700">Quản lý Vận chuyển</h2>

    @if(session('success'))
    <div class="mb-4 text-green-700 bg-green-100 p-3 rounded">{{ session('success') }}</div>
    @endif

    <div class="mb-6">
      <form action="{{ route('vanchuyen.store') }}" method="POST" class="grid grid-cols-4 gap-2">
        @csrf
        <input name="dv_van_chuyen" placeholder="Dịch vụ vận chuyển" class="border rounded px-3 py-2" required style='border: 1px solid #131212ff; padding: 4px 8px;' />
        <input name="so_tien" placeholder="Số tiền" type="number" step="0.01" class="border rounded px-3 py-2" required style='border: 1px solid #131212ff; padding: 4px 8px;' />
        <input name="mo_ta" placeholder="Mô tả (tuỳ chọn)" class="border rounded px-3 py-2" style='border: 1px solid #131212ff; padding: 4px 8px;' />
        <input name="dieu_kien" placeholder="Điều kiện (tuỳ chọn)" class="border rounded px-3 py-2" style='border: 1px solid #131212ff; padding: 4px 8px;' />
        <div class="col-span-4 mt-2">
          <button class="px-4 py-2 bg-blue-600 text-white rounded">Thêm</button>
        </div>
      </form>
    </div>

    <div class="overflow-x-auto">
      <table class="w-full whitespace-no-wrap">
        <thead>
          <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase bg-gray-50">
            <th class="px-4 py-3" style="border:1px solid #151414ff; background-color: #856cbeff; color: white;">Mã</th>
            <th class="px-4 py-3" style="border:1px solid #151414ff; background-color: #856cbeff; color: white;">Dịch vụ</th>
            <th class="px-4 py-3" style="border:1px solid #151414ff; background-color: #856cbeff; color: white;">Số tiền</th>
            <th class="px-4 py-3" style="border:1px solid #151414ff; background-color: #856cbeff; color: white;">Mô tả</th>
            <th class="px-4 py-3" style="border:1px solid #151414ff; background-color: #856cbeff; color: white;">Điều kiện</th>
            <th class="px-4 py-3" style="border:1px solid #151414ff; background-color: #856cbeff; color: white;">Hành động</th>
          </tr>
        </thead>
        <tbody class="bg-white divide-y">
          @foreach($vanchuyens as $vc)
          <tr class="text-gray-700">
            <td class="px-4 py-3" style='background: #f0f0f0; border:1px solid #151414ff;'>{{ $vc->ma_van_chuyen }}</td>
            <td class="px-4 py-3" style='border:1px solid #151414ff;'>{{ $vc->dv_van_chuyen }}</td>
            <td class="px-4 py-3" style='border:1px solid #151414ff;'>{{ number_format($vc->so_tien, 0, ',', '.') }}</td>
            <td class="px-4 py-3" style='border:1px solid #151414ff;'>{{ $vc->mo_ta }}</td>
            <td class="px-4 py-3" style='border:1px solid #151414ff;'>{{ $vc->dieu_kien }}</td>
            <td class="px-4 py-3" style='border:1px solid #151414ff;'>
              <a href="{{ route('vanchuyen.edit', $vc->ma_van_chuyen) }}" class="text-blue-600 mr-2" style='color: #f6fcf6ff; background-color: #8a9a39ff; padding: 4px 8px;'>Sửa</a>
              <form action="{{ route('vanchuyen.destroy', $vc->ma_van_chuyen) }}" method="POST" style="display:inline">
                @csrf
                @method('DELETE')
                <button onclick="return confirm('Xóa phương thức vận chuyển?')" class="text-red-600" style="background-color: #e34949ff; color: #f1f2edff; padding: 2px 8px;">Xóa</button>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>

    <div class="mt-4">{{ $vanchuyens->links() }}</div>
  </div>
</main>
@endsection

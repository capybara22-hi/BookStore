@extends('components.layoutAdmin')

@section('chitietnhaphang')
<div class="px-6 py-4 overflow-y-auto">
    <a href="{{route('nhaphang')}}" class="flex items-center">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
        </svg> Lịch sử nhập hàng
    </a>

    <div class="w-full p-6">
        <h1 class="text-center font-bold text-2xl">Chi tiết phiếu nhập</h1>
        <p class="mt-4 mb-4 font-bold">Phiếu nhập số: {{$phieu_nhap_hang->id}}</p>
        <p class="mt-4 mb-4 font-bold">Ngày nhập: {{$phieu_nhap_hang->created_at->format('d-m-Y')}}</p>
        <p class="mt-4 mb-4 font-bold">Người nhập: {{$phieu_nhap_hang->nguoiNhap->name ?? 'Không xác định'}}</p>
    </div>

    <div class="flex justify-center items-center mx-4 bg-white dark:bg-gray-800 rounded-lg w-[90%] max-h-[80vh] overflow-auto shadow-2xl">
        <table class="w-full whitespace-no-wrap border">
            <thead>
                <tr
                    class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-t border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                    <th class="px-4 py-3 text-center">Mã sản phẩm</th>
                    <th class="px-4 py-3 text-center">Tên sản phẩm</th>
                    <th class="px-4 py-3 text-center">Số lượng</th>
                    <th class="px-4 py-3 text-center">Đơn giá</th>
                    <th class="px-4 py-3 text-center">Thành tiền</th>
                </tr>
            </thead>
            <tbody
                class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                @php
                $tong_tien = 0;
                @endphp
                @foreach($chi_tiet_phieu_nhap as $chitiet)
                <tr class="text-gray-700 dark:text-gray-400">
                    <td class="px-4 py-3 text-sm text-center">
                        {{$chitiet->ma_san_pham}}
                    </td>
                    <td class="px-4 py-3 text-sm">
                        {{$chitiet->ten_san_pham}}
                    </td>
                    <td class="px-4 py-3 text-sm text-center">
                        {{$chitiet->so_luong}}
                    </td>
                    <td class="px-4 py-3 text-sm text-center">
                        {{ number_format($chitiet->don_gia, 0, ',', '.') }}
                    </td>
                    <td class="px-4 py-3 text-sm text-center">
                        {{ number_format($chitiet->so_luong * $chitiet->don_gia, 0, ',', '.') }}
                        @php
                        $tong_tien += $chitiet->so_luong * $chitiet->don_gia;
                        @endphp
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="flex justify-end">
        <p class="mt-6 p-6 font-bold">Tổng tiền: {{ number_format($tong_tien, 0, ',', '.') }} đ</p>

    </div>

</div>
@endsection
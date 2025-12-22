@extends("components.layoutAdmin")

@section('doanhthu')
<main class="h-full overflow-y-auto">
    <div class="container px-6 mx-auto grid">
        <!-- Tiêu đề -->
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Báo cáo doanh thu
        </h2>

        <!-- Bộ lọc -->
        <div class="mb-6 bg-white rounded-lg shadow-md dark:bg-gray-800 p-4">
            <form method="GET" class="grid grid-cols-1 md:grid-cols-4 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-400 mb-2">
                        Từ ngày
                    </label>
                    <input type="date" name="start_date"
                        class="block w-full text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-400 mb-2">
                        Đến ngày
                    </label>
                    <input type="date" name="end_date"
                        class="block w-full text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-400 mb-2">
                        Trạng thái
                    </label>
                    <select name="status"
                        class="block w-full text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md">
                        <option value="">Tất cả</option>
                        <option value="completed">Hoàn thành</option>
                        <option value="pending">Đang xử lý</option>
                        <option value="cancelled">Đã hủy</option>
                    </select>
                </div>
                <div class="flex items-end">
                    <button type="submit"
                        class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-md active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple w-full">
                        Lọc dữ liệu
                    </button>
                </div>
            </form>
        </div>

        <!-- Thẻ tổng quan -->
        <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">
            <!-- Tổng doanh thu -->
            <div class="flex items-center p-4 bg-white rounded-lg shadow-md dark:bg-gray-800">
                <div class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-orange-500">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"></path>
                    </svg>
                </div>
                <div>
                    <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                        Tổng doanh thu
                    </p>
                    <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                        0 đ
                    </p>
                </div>
            </div>

            <!-- Tổng đơn hàng -->
            <div class="flex items-center p-4 bg-white rounded-lg shadow-md dark:bg-gray-800">
                <div class="p-3 mr-4 text-green-500 bg-green-100 rounded-full dark:text-green-100 dark:bg-green-500">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
                    </svg>
                </div>
                <div>
                    <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                        Tổng đơn hàng
                    </p>
                    <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                        0
                    </p>
                </div>
            </div>

            <!-- Đơn hoàn thành -->
            <div class="flex items-center p-4 bg-white rounded-lg shadow-md dark:bg-gray-800">
                <div class="p-3 mr-4 text-blue-500 bg-blue-100 rounded-full dark:text-blue-100 dark:bg-blue-500">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"></path>
                    </svg>
                </div>
                <div>
                    <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                        Đơn hoàn thành
                    </p>
                    <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                        0
                    </p>
                </div>
            </div>

            <!-- Đơn trung bình -->
            <div class="flex items-center p-4 bg-white rounded-lg shadow-md dark:bg-gray-800">
                <div class="p-3 mr-4 text-teal-500 bg-teal-100 rounded-full dark:text-teal-100 dark:bg-teal-500">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z" clip-rule="evenodd"></path>
                    </svg>
                </div>
                <div>
                    <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                        Giá trị TB/đơn
                    </p>
                    <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                        0 đ
                    </p>
                </div>
            </div>
        </div>

        <!-- Biểu đồ doanh thu -->
        <div class="mb-8">
            <div class="bg-white rounded-lg shadow-md dark:bg-gray-800 p-4">
                <h4 class="mb-4 text-lg font-semibold text-gray-700 dark:text-gray-200">
                    Biểu đồ doanh thu theo ngày
                </h4>
                <canvas id="revenueChart" height="80"></canvas>
            </div>
        </div>

        <!-- Bảng chi tiết đơn hàng -->
        <div class="w-full overflow-hidden rounded-lg shadow-md">
            <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                        <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                            <th class="px-4 py-3">Mã đơn</th>
                            <th class="px-4 py-3">Khách hàng</th>
                            <th class="px-4 py-3">Ngày đặt</th>
                            <th class="px-4 py-3">Tổng tiền</th>
                            <th class="px-4 py-3">Trạng thái</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                        <!-- Dữ liệu sẽ được load ở đây -->
                        <tr>
                            <td colspan="5" class="px-4 py-8 text-sm text-center text-gray-500 dark:text-gray-400">
                                Không có dữ liệu
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>

<script>
    // Khởi tạo biểu đồ mẫu
    document.addEventListener('DOMContentLoaded', function() {
        const ctx = document.getElementById('revenueChart');
        if (ctx && typeof Chart !== 'undefined') {
            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: [],
                    datasets: [{
                        label: 'Doanh thu (VNĐ)',
                        data: [],
                        backgroundColor: 'rgba(124, 58, 237, 0.1)',
                        borderColor: 'rgba(124, 58, 237, 1)',
                        borderWidth: 2,
                        fill: true,
                        tension: 0.4
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: true,
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                callback: function(value) {
                                    return new Intl.NumberFormat('vi-VN').format(value) + ' đ';
                                }
                            }
                        }
                    },
                    plugins: {
                        legend: {
                            display: true,
                            position: 'top',
                        },
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    return 'Doanh thu: ' + new Intl.NumberFormat('vi-VN').format(context.parsed.y) + ' đ';
                                }
                            }
                        }
                    }
                }
            });
        }
    });
</script>
@endsection
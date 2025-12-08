@extends('components.layoutAdmin')

@section('khuyenmai')
<main class="h-full pb-16 overflow-y-auto">
  <div class="container grid px-6 mx-auto">
    <h2
      class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
      Khuyến mãi
    </h2>

    <button id="openModal"
      style="background:#9933FF; margin-bottom:30px; height:40px; border-radius:10px; 
                    box-shadow:1px 0px 2px 1px blue; border:none; padding:0 20px; cursor:pointer; font-size:16px; color: white;">
      Thêm khuyến mãi
    </button>

    <div id="modalOverlay"
      style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; 
                      background:rgba(0,0,0,0.5); z-index:999;">
      <div
        style="position:fixed; top:50%; left:50%; transform:translate(-50%, -50%); 
                      background:#fff; padding:20px; border-radius:12px; 
                      box-shadow:0px 4px 10px rgba(0,0,0,0.3); width:500px; max-width:90%; z-index:1000;">

        <div style="font-size:18px; font-weight:bold; margin-bottom:15px; color:#333;">
          Thêm khuyến mãi mới
        </div>

        <div style="margin-bottom:20px; font-size:14px; color:#555;">
          <label>Nội dung khuyến mãi:</label><br>
          <input type="text"
            style="width:100%; padding:8px; margin-top:5px; border-radius:6px; border:1px solid #ccc;"
            class="themTenKM" required><br><br>
          <label>Phần trăm giảm:</label><br>
          <input type="number"
            style="width:90%; padding:8px; margin-top:5px; border-radius:6px; border:1px solid #ccc;" placeholder="Nhập trong khoảng từ 1% đến 100%"
            class="themPhanTramKM" required> %<br><br>
          <label>Cho đơn: </label><br>
          <input type="number"
            style="width:90%; padding:8px; margin-top:5px; border-radius:6px; border:1px solid #ccc;" placeholder="Giá đơn hàng tối thiểu được nhận khuyến mãi"
            class="themGiaDonKM" required> VND<br><br>
          <label>Thời gian bắt đầu:</label><br>
          <input type="date"
            style="width:100%; padding:8px; margin-top:5px; border-radius:6px; border:1px solid #ccc;"
            class="timeBD" required><br><br>

          <label>Thời gian kết thúc:</label><br>
          <input type="date"
            style="width:100%; padding:8px; margin-top:5px; border-radius:6px; border:1px solid #ccc;"
            class="timeKT" required>
        </div>`
        <div id="tt_an" style="color:red;"></div>

        <div style="text-align:right;">
          <button id="closeModal"
            style="background:red; color:white; border:none; padding:8px 16px; 
                              border-radius:8px; cursor:pointer;">
            Đóng
          </button>
          <button
            class="luuKM"
            type="submit"
            style="background:blue; color:white; border:none; padding:8px 16px; 
                              border-radius:8px; cursor:pointer; margin-left:10px;">
            Lưu
          </button>
        </div>
      </div>
    </div>

    <!-- With avatar -->
    <div class="w-full mb-8 overflow-hidden rounded-lg shadow-xs">
      <div class="w-full overflow-x-auto">
        <table class="w-full whitespace-no-wrap">
          <thead>
            <tr
              class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
              <th class="px-4 py-3">Nội dung khuyến mãi</th>
              <th class="px-4 py-3">Thời gian bắt đầu</th>
              <th class="px-4 py-3">&emsp;&nbsp;Thời gian kết thúc</th>
              <th class="px-4 py-3">&nbsp;&nbsp;Sửa</th>
              <th class="px-4 py-3">&nbsp;&nbsp;Xóa</th>
            </tr>
          </thead>
          @foreach($dskm as $km)
          <tbody
            class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
            <tr class="text-gray-700 dark:text-gray-400">
              <td class="px-4 py-3">
                <div class="flex items-center text-sm">

                  <div>
                    <p class="font-semibold" style="color:green;">{{$km->nd_khuyen_mai}}</p>
                  </div>
                </div>
              </td>
              <td class="px-4 py-3 text-sm">
                <div class="flex items-center text-sm">

                  <div>
                    <p class="font-semibold">{{$km->ngay_bat_dau}}</p>
                  </div>
                </div>
              </td>
              <td class="px-4 py-3">
                <div class="flex items-center text-sm">

                  <div>
                    <p class="font-semibold">{{$km->ngay_ket_thuc}}</p>
                  </div>
                </div>
              </td>
              <td class="px-4 py-3 text-sm">
                <Button style="background:green; color: white; width: 100px ; height: 30px; border-radius: 10px; border: 1px;
                                " data-id="{{$km->ma_khuyen_mai}}" class="moBtnSua">Sửa</Button>
                <!-- Hộp thoại khi nhấn nút sửa -->
                <div class="anHienBtnSua" data-id="{{$km->ma_khuyen_mai}}"
                  style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; 
                                          background:rgba(0,0,0,0.5); z-index:999;">
                  <div
                    style="position:fixed; top:50%; left:50%; transform:translate(-50%, -50%); 
                                          background:#fff; padding:20px; border-radius:12px; 
                                          box-shadow:0px 4px 10px rgba(0,0,0,0.3); width:500px; max-width:90%; z-index:1000;">

                    <div style="font-size:18px; font-weight:bold; margin-bottom:15px; color:#333;">
                      Sửa khuyến mãi
                    </div>
                    <div style="margin-bottom:20px; font-size:14px; color:#555;">
                      <label>Nội dung khuyến mãi:</label><br>
                      <input type="text"
                        style="width:100%; padding:8px; margin-top:5px; border-radius:6px; border:1px solid #ccc;"
                        class="suaTenKM" required
                        value="{{$km->nd_khuyen_mai}}"><br><br>
                      <label>Phần trăm giảm:</label><br>
                      <input type="number"
                        style="width:90%; padding:8px; margin-top:5px; border-radius:6px; border:1px solid #ccc;" placeholder="Nhập trong khoảng từ 1% đến 100%"
                        class="themPhanTramKM" required
                        value="{{$km->phan_tram_giam}}"> %<br><br>
                      <label>Cho đơn: </label><br>
                      <input type="number"
                        style="width:90%; padding:8px; margin-top:5px; border-radius:6px; border:1px solid #ccc;" placeholder="Giá đơn hàng tối thiểu được nhận khuyến mãi"
                        class="suaGiaDonKM" required
                        value="{{$km->gia_don_hang}}"> VND<br><br>
                      <label>Thời gian bắt đầu:</label><br>
                      <input type="date"
                        style="width:100%; padding:8px; margin-top:5px; border-radius:6px; border:1px solid #ccc;"
                        class="suatimeBD" required
                        value="{{$km->ngay_bat_dau}}"><br><br>

                      <label>Thời gian kết thúc:</label><br>
                      <input type="date"
                        style="width:100%; padding:8px; margin-top:5px; border-radius:6px; border:1px solid #ccc;"
                        class="suatimeKT" required
                        value="{{$km->ngay_ket_thuc}}">
                    </div>
                    <div id="tt_an_sua" style="color:red;"></div>

                    <div style="text-align:right;">
                      <button class="dongBtnSua" data-id="{{$km->ma_khuyen_mai}}"
                        style="background:red; color:white; border:none; padding:8px 16px; 
                                                  border-radius:8px; cursor:pointer;">
                        Đóng
                      </button>
                      <button data-id="{{$km->ma_khuyen_mai}}"
                        class="luuBtnSua"
                        type="submit"
                        style="background:blue; color:white; border:none; padding:8px 16px; 
                                                  border-radius:8px; cursor:pointer; margin-left:10px;">
                        Lưu
                      </button>
                    </div>
                  </div>
              </td>
              <td class="px-4 py-3 text-sm">
                <Button style="background:blue; color: white; width: 100px ; height: 30px; border-radius: 10px; border: 1px;
                                ">Xóa</Button>
              </td>
            </tr>
          </tbody>
          @endforeach
        </table>
      </div>
      <div
        class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">
      </div>
    </div>
  </div>
</main>

<script>
  document.addEventListener("DOMContentLoaded", function() {
    const openModal = document.getElementById('openModal');
    const closeModal = document.getElementById('closeModal');
    const modalOverlay = document.getElementById('modalOverlay');

    // khai bao bien form them khuyen mai
    const themTenKM = document.querySelector('.themTenKM');
    const themPhanTramKM = document.querySelector('.themPhanTramKM');
    const themGiaDonKM = document.querySelector('.themGiaDonKM');
    const timeBD = document.querySelector('.timeBD');
    const timeKT = document.querySelector('.timeKT');
    const tt_an = document.getElementById('tt_an');
    const luuKM = document.querySelector('.luuKM');

    // khai bao bien sua khuyen mai
    const dongBtnSua = document.querySelectorAll('.dongBtnSua');
    const moBtnSua = document.querySelectorAll('.moBtnSua');


    // đóng form thêm khuyến mãi
    openModal.addEventListener('click', () => {
      modalOverlay.style.display = 'block';
    });

    closeModal.addEventListener('click', () => {
      modalOverlay.style.display = 'none';
    });

    window.addEventListener('click', (e) => {
      if (e.target === modalOverlay) {
        modalOverlay.style.display = 'none';
      }
    });

    //Đóng form sua khuyen mai      
    moBtnSua.forEach(btn => {
      btn.addEventListener("click", function() {
        const id = btn.getAttribute("data-id");
        const modal = document.querySelector(`.anHienBtnSua[data-id="${id}"]`);
        if (modal) modal.style.display = "block";
      });
    });

    dongBtnSua.forEach(btn => {
      btn.addEventListener("click", function() {
        const id = btn.getAttribute("data-id");
        const modal = document.querySelector(`.anHienBtnSua[data-id="${id}"]`);
        if (modal) modal.style.display = "none";
      });
    });

    // xu ly su kien khi nhan them khuyen mai moi
    luuKM.addEventListener('click', function() {
      modalOverlay.style.display = 'none';
      // lấy value sau khi nhập
      const valTenKM = themTenKM.value.trim();
      const valPhanTramKM = themPhanTramKM.value.trim();
      const valGiaDonKM = themGiaDonKM.value.trim();
      const valTimeBD = timeBD.value.trim();
      const valTimeKT = timeKT.value.trim();
      if (valTenKM === "" || valPhanTramKM === "" || valGiaDonKM === "" || valTimeBD === "" || valTimeKT === "") {
        tt_an.innerHTML = "BẠN PHẢI NHẬP ĐẦY ĐỦ THÔNG TIN!!!";
        return; // dừng lại, không gửi fetch
      }
      fetch("/khuyenmai/themkm", {
          method: "POST",
          headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content")
          },
          body: JSON.stringify({
            nd_km: valTenKM,
            phan_tram: valPhanTramKM,
            gia_don: valGiaDonKM,
            tg_bd: valTimeBD,
            tg_kt: valTimeKT
          })
        })
        .then(response => response.json())
        .then(data => {
          console.log("Thêm khuyến mãi thành công:", data);
        })
        .catch(error => {
          console.error("Thêm Khuyến mãi thất bại:", error);

        });
      window.location.href = window.location.href;
      alert("Bạn đã thêm khuyến mãi thành công");
    });

  });
</script>
@endsection
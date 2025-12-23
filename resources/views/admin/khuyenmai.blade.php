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
            class="timeKT" required><br><br>
          <label>Số lượng:</label><br>
          <input type="number"
            style="width:100%; padding:8px; margin-top:5px; border-radius:6px; border:1px solid #ccc;"
            class="themsoLuongKM" required>
        </div>
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
            <tr style="background:#999900; color:white; text-align:center;"
              class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
              <th class="px-4 py-3">Nội dung khuyến mãi</th>
              <th class="px-4 py-3">Thời gian bắt đầu</th>
              <th class="px-4 py-3">&emsp;&nbsp;Thời gian kết thúc</th>
              <th class="px-4 py-3">Số lượng</th>
              <th class="px-4 py-3">Ghi chú</th>
              <th class="px-4 py-3">&nbsp;&nbsp;Sửa</th>
              <th class="px-4 py-3">&nbsp;&nbsp;Xóa</th>
            </tr>
          </thead>
          @foreach($dskm as $km)
          <tbody
            class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
            <tr class="text-gray-700 dark:text-gray-400">
              <td class="px-4 py-3" style="border: 1px solid gray; background:#FF9966;">
                <div class="flex items-center text-sm">

                  <div>
                    <p class="font-semibold" style="color:black; word-wrap: break-word; white-space: normal;">{{$km->nd_khuyen_mai}}</p>
                  </div>
                </div>
              </td>
              <td class="px-4 py-3 text-sm" style="border: 1px solid gray;">
                <div class="flex items-center text-sm">

                  <div>
                    <p class="font-semibold">{{ \Carbon\Carbon::parse($km->ngay_bat_dau)->format('d/m/Y') }}</p>
                  </div>
                </div>
              </td>
              <td class="px-4 py-3" style="border: 1px solid gray;">
                <div class="flex items-center text-sm">

                  <div>
                    <p class="font-semibold">{{ \Carbon\Carbon::parse($km->ngay_ket_thuc)->format('d/m/Y') }}</p>
                  </div>
                </div>
              </td>
              <td class="px-4 py-3 text-sm" style="border: 1px solid gray; text-align:center;">
                <div>
                  <p class="font-semibold">{{ $km->so_luong }}</p>
                </div>
              </td>
              <td class="px-4 py-3 text-sm" style="border: 1px solid gray; text-align:center;">
                <?php
                  $expired = \Carbon\Carbon::now()->gt(\Carbon\Carbon::parse($km->ngay_ket_thuc));
                ?>
                <div>
                  <span class="km-status" data-enddate="{{$km->ngay_ket_thuc}}">
                    @if($expired)
                      <span style="color:red; font-weight:bold">Đã hết thời gian khuyến mãi</span>
                    @else
                      <span style="color:green">Đang áp dụng</span>
                    @endif
                  </span>
                </div>
              </td>
              <td class="px-4 py-3 text-sm" style="border: 1px solid gray;">
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
                        class="suaPhanTramKM" required
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
                        value="{{$km->ngay_ket_thuc}}"><br><br>
                      <label>Số lượng:</label><br>
                      <input type="number"
                        style="width:100%; padding:8px; margin-top:5px; border-radius:6px; border:1px solid #ccc;"
                        class="suasoluongKM" required
                        value="{{$km->so_luong}}">
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
                  <!-- end hộp thoại -->
              </td>
              <td class="px-4 py-3 text-sm" style="border: 1px solid gray;">
                <Button style="background:blue; color: white; width: 100px ; height: 30px; border-radius: 10px; border: 1px;
                                " data-id="{{$km->ma_khuyen_mai}}" class="btnXoaKM">Xóa</Button>
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
    const themsoLuongKM = document.querySelector('.themsoLuongKM');
    const tt_an = document.getElementById('tt_an');
    const luuKM = document.querySelector('.luuKM');

    // khai bao bien sua khuyen mai
    const dongBtnSua = document.querySelectorAll('.dongBtnSua');
    const moBtnSua = document.querySelectorAll('.moBtnSua');
    const luuBtnSua = document.querySelectorAll('.luuBtnSua');

    // khai báo biến xóa khuyến mãi
    const btnXoaKM = document.querySelectorAll('.btnXoaKM');


    // đóng form thêm khuyến mãi
    openModal.addEventListener('click', () => {
      modalOverlay.style.display = 'block';
    });

    // realtime check: cập nhật trạng thái khuyến mãi nếu đã qua ngày kết thúc
    function updateKMStatus() {
      const els = document.querySelectorAll('.km-status');
      const now = new Date();
      els.forEach(el => {
        const end = el.getAttribute('data-enddate');
        if (!end) return;
        const endDate = new Date(end + 'T23:59:59');
        if (now > endDate) {
          el.innerHTML = '<span style="color:red; font-weight:bold">Đã hết thời gian khuyến mãi</span>';
        } else {
          el.innerHTML = '<span style="color:green">Đang áp dụng</span>';
        }
      });
    }

    // Chạy ngay và lặp mỗi 60s để cập nhật theo thời gian thực
    updateKMStatus();
    setInterval(updateKMStatus, 60000);

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
      // lấy value sau khi nhập
      const valTenKM = themTenKM.value.trim();
      const valPhanTramKM = themPhanTramKM.value.trim();
      const valGiaDonKM = themGiaDonKM.value.trim();
      const valTimeBD = timeBD.value.trim();
      const valTimeKT = timeKT.value.trim();
      const valSoLuongKM = themsoLuongKM.value.trim();

      if (valTenKM === "" || valPhanTramKM === "" || valGiaDonKM === "" || valTimeBD === "" || valTimeKT === "" || valSoLuongKM === "") {
        tt_an.innerHTML = "BẠN PHẢI NHẬP ĐẦY ĐỦ THÔNG TIN!!!";
        return; // dừng lại, không gửi fetch
      }

      // Kiểm tra phần trăm giảm: phải là số trong khoảng 0-100
      const phanTramNum = parseFloat(valPhanTramKM);
      if (isNaN(phanTramNum) || phanTramNum < 0 || phanTramNum > 100) {
        tt_an.innerHTML = "Phần trăm giảm phải là số từ 0 đến 100.";
        return;
      }

      // Kiểm tra thời gian: thời gian kết thúc không được sớm hơn ngày bắt đầu
      const bd = new Date(valTimeBD);
      const kt = new Date(valTimeKT);
      if (kt < bd) {
        tt_an.innerHTML = "Thời gian kết thúc không được sớm hơn thời gian bắt đầu.";
        return;
      }

      modalOverlay.style.display = 'none';
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
            tg_kt: valTimeKT,
            so_luong: valSoLuongKM
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

    // --- LƯU SAU KHI SỬA ---
    luuBtnSua.forEach(btn => {
      btn.addEventListener("click", function() {
        const id = btn.getAttribute("data-id");
        const modal = document.querySelector(`.anHienBtnSua[data-id="${id}"]`);

        if (!modal) return;

        // Lấy dữ liệu từ form sửa
        const valTenKM = modal.querySelector('.suaTenKM').value.trim();
        const valPhanTramKM = modal.querySelector('.suaPhanTramKM').value.trim();
        const valGiaDonKM = modal.querySelector('.suaGiaDonKM').value.trim();
        const valTimeBD = modal.querySelector('.suatimeBD').value.trim();
        const valTimeKT = modal.querySelector('.suatimeKT').value.trim();
        const valSoLuongKM = modal.querySelector('.suasoluongKM').value.trim();

        const thongBaoErr = modal.querySelector('#tt_an_sua');


        // Kiểm tra rỗng
        if (!valTenKM || !valPhanTramKM || !valGiaDonKM || !valTimeBD || !valTimeKT || !valSoLuongKM) {
          thongBaoErr.innerHTML = "Vui lòng nhập đầy đủ thông tin!";
          return;
        }

        // Kiểm tra phần trăm giảm: 0-100
        const phanTramSua = parseFloat(valPhanTramKM);
        if (isNaN(phanTramSua) || phanTramSua < 0 || phanTramSua > 100) {
          thongBaoErr.innerHTML = "Phần trăm giảm phải là số từ 0 đến 100.";
          return;
        }

        // Kiểm tra thời gian: kết thúc phải >= bắt đầu
        const bd_sua = new Date(valTimeBD);
        const kt_sua = new Date(valTimeKT);
        if (kt_sua < bd_sua) {
          thongBaoErr.innerHTML = "Thời gian kết thúc không được sớm hơn thời gian bắt đầu.";
          return;
        }

        // Gửi API sửa
        fetch("/khuyenmai/suakm", {
            method: "POST",
            headers: {
              "Content-Type": "application/json",
              "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content")
            },
            body: JSON.stringify({
              id_sua: id,
              nd_km: valTenKM,
              phan_tram: valPhanTramKM,
              gia_don: valGiaDonKM,
              tg_bd: valTimeBD,
              tg_kt: valTimeKT,
              so_luong: valSoLuongKM
            })
          })
          .then(response => response.json())
          .then(data => {
            console.log("Sửa thành công:", data);
          })
          .catch(error => {
            console.error("Lỗi sửa KM:", error);
          });

        alert("Cập nhật khuyến mãi thành công!");
        window.location.reload();
      });
    });

    // xu ly su kien xoa khuyen mai theo ma_khuyen_mai
    btnXoaKM.forEach(btn => {
      btn.addEventListener('click', function() {
        const id = btn.getAttribute("data-id");

        fetch("/khuyenmai/xoakm", {
            method: "POST",
            headers: {
              "Content-Type": "application/json",
              "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content")
            },
            body: JSON.stringify({
              id_xoa: id
            })
          })
          .then(response => response.json())
          .then(data => {
            console.log("Gửi đi thành công:", data);
          })
          .catch(error => {
            console.error("Gửi đi thất bại:", error);

          });

        window.location.href = window.location.href;
        alert("Bạn đã xóa khuyến mãi thành công");
      });
    });
  });
</script>
@endsection
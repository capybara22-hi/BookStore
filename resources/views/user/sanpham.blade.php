@extends('components.homeLayout')

@section('sanpham')
<main class="main">

  <!-- Page Title -->
  <!-- <div class="page-title light-background">
    <div class="container d-lg-flex justify-content-between align-items-center">
      <h1 class="mb-2 mb-lg-0">Sản phẩm</h1>
    </div>
  </div> -->
  <!-- End Page Title -->
  <form action="{{ route('sanpham') }}" method="GET" id="filterForm" class="container">
    <!-- <div class="container"> -->
    <div class="row">

      <div class="col-lg-4 sidebar">

        <div class="widgets-container">

          <!-- Product Categories Widget -->
          <div class="product-categories-widget widget-item">

            <h3 class="widget-title">Danh mục sản phẩm</h3>

            <ul class="category-tree list-unstyled mb-0">

              <!-- Hiển thị danh mục và thể loại -->
              @foreach($danhmucs as $dm)
              @php
              $collapseid = 'sub-'.$dm->ma_danh_muc;
              @endphp
              <li class="category-item">
                <div class="d-flex justify-content-between align-items-center category-header collapsed" data-bs-toggle="collapse" data-bs-target="#{{ $collapseid }}" aria-expanded="false" aria-controls="{{ $collapseid }}">
                  <a href="javascript:void(0)" class="category-link">{{ $dm->ten_danh_muc }}</a>
                  <span class="category-toggle">
                    <i class="bi bi-chevron-down"></i>
                    <i class="bi bi-chevron-up"></i>
                  </span>
                </div>
                @if ($dm->theloai-> isNotEmpty())
                <ul id="{{ $collapseid }}" class="subcategory-list list-unstyled collapse ps-3 mt-2">
                  @foreach ($dm->theloai as $tl)
                  <li><a href="{{ route('sanpham', ['ma_the_loai' => $tl->ma_the_loai])}}" class="subcategory-link">{{ $tl->ten_the_loai }}</a></li>
                  @endforeach
                </ul>
                @endif
              </li>
              @endforeach
              <!-- kết thúc hiển thị danh mục và thể loại -->
            </ul>

          </div><!--/Product Categories Widget -->

        </div>

      </div>

      <div class="col-lg-8">

        <!-- Category Header Section -->
        <section id="category-header" class="category-header section">

          <div class="container" data-aos="fade-up">

            <!-- Filter and Sort Options -->
            <!-- <form action="{{ route('sanpham') }}" method="GET" id="filterForm" class="filter-container mb-4" data-aos="fade-up" data-aos-delay="100"> -->
            <div class="filter-container mb-4" data-aos="fade-up" data-aos-delay="100">
              <!-- <form action="{{ route('sanpham') }}" method="GET" id="filterForm" class="row g-3"> -->
              <div class="row g-3">
                <div class="col-12 col-md-6 col-lg-4">
                  <div class="filter-item search-form">
                    <label for="productSearch" class="form-label">Tìm kiếm sản phẩm</label>
                    <!-- <form action="{{ route('sanpham') }}" method="GET" class="input-group"> -->
                    <div class="input-group">
                      <input type="text" name="keySearch" class="form-control" id="productSearch"
                        placeholder="Tìm kiếm sản phẩm..." value="{{ $keyword ?? '' }}">
                      <button class="btn search-btn" type="submit">
                        <i class="bi bi-search"></i>
                      </button>
                    </div>

                    <!-- </form>          -->
                  </div>
                </div>
                <!-- Bắt đầu bộ lọc giá -->
                <!-- <form action="{{ route('sanpham') }}" method="GET" id="filterForm" class="col-12 col-md-6 col-lg-2"> -->
                <div class="col-12 col-md-6 col-lg-2" style="width:250px">
                  <div class="filter-item">
                    <label for="priceRange" class="form-label">Khoảng giá</label>
                    <select name="priceRange" class="form-select" onchange="document.getElementById('filterForm').submit();">
                      <option value="">Tất cả</option>
                      <option value="5" {{ (isset($priceRange) && $priceRange=='5') ? 'selected' : '' }}>Dưới 5.000 VND</option>
                      <option value="5to10" {{ (isset($priceRange) && $priceRange=='5to10') ? 'selected' : '' }}>5.000 VND đến 10.000 VND</option>
                      <option value="10to20" {{ (isset($priceRange) && $priceRange=='10to20') ? 'selected' : '' }}>10.000 VND đến 20.000 VND</option>
                      <option value="20to50" {{ (isset($priceRange) && $priceRange=='20to50') ? 'selected' : '' }}>20.000 VND đến 50.000 VND</option>
                      <option value="50" {{ (isset($priceRange) && $priceRange=='50') ? 'selected' : '' }}>50.000 VND trở lên</option>
                    </select>
                  </div>
                </div>
                <!-- </form> -->
                <!-- kết thúc bộ lọc giá -->
                <div class="col-12 col-md-6 col-lg-2" style="width:250px">
                  <div class="filter-item">
                    <label for="sortBy" class="form-label">Sắp xếp theo</label>
                    <select class="form-select" id="sortBy" name="sapXep" onchange="document.getElementById('filterForm').submit();">
                      <option>Nổi bật</option>
                      <option value="tang" {{(isset($sapXep) && $sapXep=='tang') ? 'selected' : '' }}>Giá: Thấp đến Cao</option>
                      <option value="giam" {{(isset($sapXep) && $sapXep == "giam") ? 'selected' : '' }}>Giá: Cao đến Thấp</option>
                    </select>
                  </div>
                </div>
              </div>
              <!-- </form> -->
              <div class="row mt-3">
                <div class="col-12" data-aos="fade-up" data-aos-delay="200">
                  <div class="active-filters">
                    <span class="active-filter-label">Active Filters:</span>
                    <div class="filter-tags">
                      {{-- Hiển thị bộ lọc giá nếu có --}}
                      @if(!empty($priceRange))
                      <span class="filter-tag">
                        @switch($priceRange)
                        @case('5')
                        Dưới 5.000 VND
                        @break
                        @case('5to10')
                        5.000 VND đến 10.000 VND
                        @break
                        @case('10to20')
                        10.000 VND đến 20.000 VND
                        @break
                        @case('20to50')
                        20.000 VND đến 50.000 VND
                        @break
                        @case('50')
                        50.000 VND trở lên
                        @break
                        @endswitch
                        <button class="filter-remove" value="xoaBoLoc" name="xoaBoLoc" onchange="document.getElementById('filterForm').submit();"><i class="bi bi-x"></i></button>
                      </span>
                      @endif

                      {{-- Hiển thị sắp xếp nếu có --}}
                      @if(!empty($sapXep))
                      <span class="filter-tag">
                        @switch($sapXep)
                        @case('tang')
                        Giá: Thấp đến Cao
                        @break
                        @case('giam')
                        Giá: Cao đến Thấp
                        @break
                        @endswitch
                        <button class="filter-remove"
                          value="xoaSapXep" name="xoaSapXep" onchange="document.getElementById('filterForm').submit();"><i class="bi bi-x"></i></button>
                      </span>
                      @endif
                      {{-- Hiển thị thể loại nếu có --}}
                      @if(!empty($ma_the_loai))
                      <span class="filter-tag">
                        {{$tentl->ten_the_loai}}
                        <button class="filter-remove"
                          value="xoaTheLoai" name="xoaTheLoai" onchange="document.getElementById('filterForm').submit();"><i class="bi bi-x"></i></button>
                      </span>
                      @endif

                      <button class="clear-all-btn" value="xoaAll" name="xoaAllBoLoc" onchange="document.getElementById('filterForm').submit();">Xóa tất cả bộ lọc và tìm kiếm</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- </form> -->
          </div>

        </section><!-- /Category Header Section -->

        <!-- Category Product List Section -->
        <section id="category-product-list" class="category-product-list section">

          <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row g-4">


              <!-- Hiển thị danh sách sản phẩm -->
              @foreach ($sanphams as $sp)
              @if($sp->status == 1)
              <div class="col-6 col-xl-3">
                <div class="product-card" data-aos="zoom-in">
                  <div class="product-image">
                    @foreach ($sp->file as $file)
                    @if ($loop->first) {{-- chỉ lấy ảnh đầu tiên --}}
                    <img src="{{ asset($file->duong_dan_luu) }}" class="main-image img-fluid" alt="Product">
                    <img src="{{ asset($file->duong_dan_luu) }}" class="hover-image img-fluid" alt="Product Variant">
                    @endif
                    @endforeach


                  </div>

                  <div class="product-details">
                    <!-- <div class="product-category">Women's Fashion</div> -->
                    <h4 class="product-title">
                      <a href="{{ route('chitietsanpham', ['id' => $sp->ma_san_pham]) }}">{{ $sp->ten_san_pham }}</a>
                    </h4>
                    <div class="product-price">
                      {{ number_format($sp->gia_tien_sp, 0, ',', '.') }}
                    </div>
                    @php
                    $avg = round($sp->reviews->avg('rating'), 1);
                    $count = $sp->reviews->count();
                    @endphp

                    <div class="product-rating">
                      <i class="bi bi-star-fill"></i>
                      {{ $avg > 0 ? $avg : '0.0' }}
                      <span>({{ $count }})</span>
                    </div>

                  </div>
                </div>
              </div>
              @endif

              @endforeach

            </div>

          </div>

        </section><!-- /Category Product List Section -->

        <!-- Category Pagination Section -->
        <!-- <section id="category-pagination" class="category-pagination section">

          <div class="container">
            <nav class="d-flex justify-content-center" aria-label="Page navigation">
              <ul>
                <li>
                  <a href="#" aria-label="Previous page">
                    <i class="bi bi-arrow-left"></i>
                    <span class="d-none d-sm-inline">Previous</span>
                  </a>
                </li>

                <li><a href="#" class="active">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li class="ellipsis">...</li>
                <li><a href="#">8</a></li>
                <li><a href="#">9</a></li>
                <li><a href="#">10</a></li>

                <li>
                  <a href="#" aria-label="Next page">
                    <span class="d-none d-sm-inline">Next</span>
                    <i class="bi bi-arrow-right"></i>
                  </a>
                </li>
              </ul>
            </nav>
          </div>

        </section> -->
        <!-- /Category Pagination Section -->

      </div>

    </div>
    <!-- </div> -->
  </form>
</main>

<div id="chatbot-icon"><img src="{{ asset('assets/img/about/chatbot.jpg') }}" alt="" style="width: 60px; height: 60px; border-radius: 50%; border: 2px solid #4e73df;"></div>

<div id="chatbot-box">
    <p style="color: #ffffffff; background: #832a9eff; padding: 10px;">Xin chào, hãy nói cho tôi nội dung sách bạn muốn tìm và tôi sẽ giúp bạn tìm kiếm.</p>
    <div id="chatbot-messages"></div>
    <div id="chatbot-input">        
        <input type="text" id="chatbot-text" placeholder="Nhập sách bạn muốn...">
        <button onclick="sendMessage()">Gửi</button>
    </div>
</div>
<script>
document.getElementById('chatbot-icon').onclick = function () {
    let box = document.getElementById('chatbot-box');
    box.style.display = box.style.display === 'flex' ? 'none' : 'flex';
};

function sendMessage() {
    let text = document.getElementById('chatbot-text').value;
    if (!text) return;

    let messages = document.getElementById('chatbot-messages');
    messages.innerHTML += `<div><b>Bạn:</b> ${text}</div>`;

    fetch('/user/chatbot', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        'Accept': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({ query: text })
    })
    .then(res => {
      if (!res.ok) throw new Error('Network response was not ok');
      return res.json();
    })
    .then(data => {
      messages.innerHTML += `<div><b>Chatbot:</b> ${data.reply}</div>`;
    })
    .catch(err => {
      console.error(err);
      messages.innerHTML += `<div><b>Chatbot:</b> Lỗi kết nối hoặc phản hồi không hợp lệ.</div>`;
    });

    document.getElementById('chatbot-text').value = '';
}
</script>
<style>
  #chatbot-icon {
      position: fixed;
      bottom: 150px;
      right: 20px;
      background: #4e73df;
      color: white;
      width: 60px;
      height: 60px;
      border-radius: 50%;
      display: flex;
      justify-content: center;
      align-items: center;
      cursor: pointer;
      font-size: 30px;
      z-index: 9999;
  }
  #chatbot-box {
      position: fixed;
      bottom: 220px;
      right: 20px;
      width: 320px;
      height: 420px;
      background: white;
      border-radius: 10px;
      border: 1px solid #ccc;
      display: none;
      flex-direction: column;
      z-index: 9999;
  }
  #chatbot-messages {
      flex: 1;
      padding: 10px;
      overflow-y: auto;
  }
  #chatbot-input {
      display: flex;
  }
  #chatbot-input input {
      flex: 1;
      padding: 10px;
      border: none;
      border-top: 1px solid #ccc;
  }
  #chatbot-input button {
      padding: 10px;
      background: #4e73df;
      color: white;
      border: none;
  }
</style>
@endsection
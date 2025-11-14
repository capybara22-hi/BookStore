@extends('components.homeLayout')

@section('sanpham')
<main class="main">

  <!-- Page Title -->
  <div class="page-title light-background">
    <div class="container d-lg-flex justify-content-between align-items-center">
      <h1 class="mb-2 mb-lg-0">Sản phẩm</h1>
    </div>
  </div><!-- End Page Title -->

  <div class="container">
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
                  <li><a href="#" class="subcategory-link">{{ $tl->ten_the_loai }}</a></li>
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
            <div class="filter-container mb-4" data-aos="fade-up" data-aos-delay="100">
              <div class="row g-3">
                <div class="col-12 col-md-6 col-lg-4">
                  <div class="filter-item search-form">
                    <label for="productSearch" class="form-label">Tìm kiếm sản phẩm</label>
                    <div class="input-group">
                      <input type="text" class="form-control" id="productSearch" placeholder="Tìm kiếm sản phẩm..." aria-label="Tìm kiếm sản phẩm">
                      <button class="btn search-btn" type="button">
                        <i class="bi bi-search"></i>
                      </button>
                    </div>
                  </div>
                </div>

                <div class="col-12 col-md-6 col-lg-2">
                  <div class="filter-item">
                    <label for="priceRange" class="form-label">Khoảng giá</label>
                    <select class="form-select" id="priceRange">
                      <option selected="">Tất cả giá</option>
                      <option>Dưới 25.000 VND</option>
                      <option>25.000 VND đến 50.000 VND</option>
                      <option>50.000 VND đến 100.000 VND</option>
                      <option>100.000 VND đến 200.000 VND</option>
                      <option>200.000 VND trở lên</option>
                    </select>
                  </div>
                </div>

                <div class="col-12 col-md-6 col-lg-2">
                  <div class="filter-item">
                    <label for="sortBy" class="form-label">Sắp xếp theo</label>
                    <select class="form-select" id="sortBy">
                      <option selected="">Nổi bật</option>
                      <option>Giá: Thấp đến Cao</option>
                      <option>Giá: Cao đến Thấp</option>
                    </select>
                  </div>
                </div>
              </div>

              <div class="row mt-3">
                <div class="col-12" data-aos="fade-up" data-aos-delay="200">
                  <div class="active-filters">
                    <span class="active-filter-label">Active Filters:</span>
                    <div class="filter-tags">
                      <span class="filter-tag">
                        Electronics <button class="filter-remove"><i class="bi bi-x"></i></button>
                      </span>
                      <span class="filter-tag">
                        $50 to $100 <button class="filter-remove"><i class="bi bi-x"></i></button>
                      </span>
                      <button class="clear-all-btn">Clear All</button>
                    </div>
                  </div>
                </div>
              </div>

            </div>

          </div>

        </section><!-- /Category Header Section -->

        <!-- Category Product List Section -->
        <section id="category-product-list" class="category-product-list section">

          <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row g-4">
              <!-- Hiển thị danh sách sản phẩm -->
              @foreach ($sanphams as $sp)
              <div class="col-6 col-xl-4">
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
                    <div class="product-category">Women's Fashion</div>
                    <h4 class="product-title">
                      <a href="{{ route('chitietsanpham', ['id' => $sp->ma_san_pham]) }}">{{ $sp->ten_san_pham }}</a>
                    </h4>
                    <div class="product-meta">
                      <div class="product-price">{{ number_format($sp->gia_tien_sp) }} VND</div>
                      <div class="product-rating">
                        <i class="bi bi-star-fill"></i>
                        4.8 <span>(42)</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              @endforeach

            </div>

          </div>

        </section><!-- /Category Product List Section -->

        <!-- Category Pagination Section -->
        <section id="category-pagination" class="category-pagination section">

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

        </section><!-- /Category Pagination Section -->

      </div>

    </div>
  </div>

</main>
@endsection
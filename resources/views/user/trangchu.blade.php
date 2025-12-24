@extends('components.homeLayout');

@section('home')
<main class="main">
    <!-- Hero Section -->
    <section id="hero" class="hero section">

        <div class="hero-container">
            <div class="hero-content">
                <div class="content-wrapper" data-aos="fade-up" data-aos-delay="100">
                    <h1 class="hero-title">Khám phá các tác phẩm tuyệt vời</h1>
                    <p class="hero-description">Chào mừng bạn đến với không gian của những câu chuyện và ý tưởng bất tận! Từ tiểu thuyết hấp dẫn đến sách kỹ năng thực tiễn — tất cả đều đang chờ bạn khám phá với ưu đãi độc quyền và giao hàng nhanh chóng.</p>
                    <div class="hero-actions" data-aos="fade-up" data-aos-delay="200">
                        <a href="{{ route('sanpham') }}" class="btn-primary">Mua Ngay</a>
                        <a href="{{ route('sanpham') }}" class="btn-secondary">Xem sản phẩm</a>
                    </div>
                    <div class="features-list" data-aos="fade-up" data-aos-delay="300">
                        <div class="feature-item">
                            <i class="bi bi-truck"></i>
                            <span>Miễn Phí Vận Chuyển</span>
                        </div>
                        <div class="feature-item">
                            <i class="bi bi-award"></i>
                            <span>Đảm Bảo Chất Lượng</span>
                        </div>
                        <div class="feature-item">
                            <i class="bi bi-headset"></i>
                            <span>Hỗ Trợ 24/7</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="hero-visuals">
                <div class="product-showcase" data-aos="fade-left" data-aos-delay="200">
                    <div class="product-card featured">
                        <img src="{{ asset('assets\img\person\toi-thay-hoa-vang-tren-co-xanh-1.jpg') }}" alt="Featured Product" class="img-fluid">
                        <div class="product-badge">Bán chạy nhất</div>
                        <div class="product-info">
                            <h4>Tôi thấy hoa vàng trên cỏ xanh</h4>
                            <div class="price">
                                <span class="sale-price">299.000 VND</span>
                                <span class="original-price">399.000 VND</span>
                            </div>
                        </div>
                    </div>

                    <!-- <div class="product-grid">
                        <div class="product-mini" data-aos="zoom-in" data-aos-delay="400">
                            <img src="{{ asset('assets/img/product/product-3.webp') }}" alt="Product" class="img-fluid">
                            <span class="mini-price">89.000 VND</span>
                        </div>
                        <div class="product-mini" data-aos="zoom-in" data-aos-delay="500">
                            <img src="{{ asset('assets/img/product/product-5.webp') }}" alt="Product" class="img-fluid">
                            <span class="mini-price">149.000 VND</span>
                        </div>
                    </div> -->
                </div>

                <div class="floating-elements">
                    <div class="floating-icon cart" data-aos="fade-up" data-aos-delay="600">
                        <i class="bi bi-cart3"></i>
                        <span class="notification-dot">3</span>
                    </div>
                    <div class="floating-icon wishlist" data-aos="fade-up" data-aos-delay="700">
                        <i class="bi bi-heart"></i>
                    </div>
                    <div class="floating-icon search" data-aos="fade-up" data-aos-delay="800">
                        <i class="bi bi-search"></i>
                    </div>
                </div>
            </div>
        </div>

    </section><!-- /Hero Section -->

    <!-- Promo Cards Section -->
    <section id="promo-cards" class="promo-cards section">
        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="row gy-4">

                <div class="col-lg-6">
                    <div class="category-featured" data-aos="fade-right" data-aos-delay="200">
                        <div class="category-image" style="display: flex; justify-content: center; align-items: center;">
                            <img src="{{ asset('assets\img\person\cay-cam-ngot-cua-toi.webp') }}" alt="Women's Collection" class="img-fluid" style="max-width: 300px; height: auto;">
                        </div>
                        <div class="category-content">
                            <span class="category-tag">Đang thịnh hành</span>
                            <h2>Bộ sưu tập sách mới</h2>
                            <p>Khám phá những cuốn sách mới nhất được tuyển chọn dành riêng cho bạn — từ tiểu thuyết cảm động, truyện trinh thám gay cấn cho đến những cuốn sách kỹ năng sống hữu ích.
                                Cùng đắm chìm trong thế giới tri thức và cảm xúc bất tận qua từng trang sách.</p>
                            <a href="#" class="btn-shop">khám phá ngay<i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">

                    <div class="row gy-4">

                        <div class="col-xl-6">
                            <div class="category-card cat-men" data-aos="fade-up" data-aos-delay="300">
                                <div class="category-image">
                                    <img src="{{ asset('assets\img\person\Tinh-yeu-trong-van-hoc-Viet-Nam.jpg') }}" alt="Men's Fashion" class="img-fluid">
                                </div>
                                <div class="category-content">
                                    <h4>Văn học Việt Nam</h4>
                                    <p>242 tựa sách</p>
                                    <a href="#" class="card-link">Xem ngay<i class="bi bi-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-6">
                            <div class="category-card cat-kids" data-aos="fade-up" data-aos-delay="400">
                                <div class="category-image">
                                    <img src="{{ asset('assets\img\person\hoang-tu-be-615311.jpg') }}" alt="Kid's Fashion" class="img-fluid">
                                </div>
                                <div class="category-content">
                                    <h4>Văn học nước ngoài</h4>
                                    <p>185 tựa sách</p>
                                    <a href="#" class="card-link">Xem ngay<i class="bi bi-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-6">
                            <div class="category-card cat-cosmetics" data-aos="fade-up" data-aos-delay="500">
                                <div class="category-image">
                                    <img src="{{ asset('assets\img\person\8-trang-8-9-1667829369397839092415.webp') }}" alt="Cosmetics" class="img-fluid">
                                </div>
                                <div class="category-content">
                                    <h4>Kinh tế và kỹ năng sống</h4>
                                    <p>127 tựa sách</p>
                                    <a href="#" class="card-link">Xem ngay<i class="bi bi-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-6">
                            <div class="category-card cat-accessories" data-aos="fade-up" data-aos-delay="600">
                                <div class="category-image">
                                    <img src="{{ asset('assets\img\person\OIP.webp') }}" alt="Accessories" class="img-fluid">
                                </div>
                                <div class="category-content">
                                    <h4>Khoa học và công nghệ</h4>
                                    <p>308 tựa sách</p>
                                    <a href="#" class="card-link">Xem ngay<i class="bi bi-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

        </div>
    </section><!-- /Promo Cards Section -->

    <!-- Best Sellers Section -->
    <section id="best-sellers" class="best-sellers section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Bán chạy</h2>
            <p>Khám phá những cuốn sách được yêu thích nhất — nơi hàng ngàn độc giả cùng tìm thấy nguồn cảm hứng mỗi ngày.</p>
        </div><!-- End Section Title -->

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row g-5">

                <!-- Product 1 -->
                <div class="col-lg-3 col-md-6">
                    <div class="product-item">
                        <div class="product-image">
                            <div class="product-badge">Giới hạn</div>
                            <img src="{{ asset('assets\img\person\cay-cam-ngot-cua-toi.webp') }}" alt="Product Image" class="img-fluid" loading="lazy">
                            {{-- Uncomment nếu sản phẩm hết hàng --}}
                            {{-- <div class="out-of-stock-overlay">
                              <div class="out-of-stock-badge">
                                <i class="bi bi-x-circle"></i>
                                <span>HẾT HÀNG</span>
                              </div>
                            </div> --}}
                            <div class="product-actions">
                                <button class="action-btn wishlist-btn">
                                    <i class="bi bi-heart"></i>
                                </button>
                            </div>
                            <button class="cart-btn">Thêm vào giỏ hàng</button>
                        </div>
                        <div class="product-info">
                            <div class="product-category">Được yêu thích</div>
                            <h4 class="product-name"><a href="product-details.html">Cây cam ngọt của tôi</a></h4>
                            <div class="product-rating">
                                <div class="stars">
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star"></i>
                                </div>
                                <span class="rating-count">(24)</span>
                            </div>
                            <div class="product-price">189.000 VND</div>
                        </div>
                    </div>
                </div>
                <!-- End Product 1 -->

                <!-- Product 2 -->
                <div class="col-lg-3 col-md-6">
                    <div class="product-item">
                        <div class="product-image">
                            <div class="product-badge sale-badge">Giảm 25%</div>
                            <img src="{{ asset('assets\img\person\OIP (1).webp') }}" alt="Product Image" class="img-fluid" loading="lazy">
                            <div class="product-actions">
                                <button class="action-btn wishlist-btn">
                                    <i class="bi bi-heart"></i>
                                </button>
                            </div>
                            <button class="cart-btn">Thêm vào giỏ hàng</button>
                        </div>
                        <div class="product-info">
                            <div class="product-category">Bán chạy</div>
                            <h4 class="product-name"><a href="product-details.html">Đắc nhân tâm</a></h4>
                            <div class="product-rating">
                                <div class="stars">
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-half"></i>
                                </div>
                                <span class="rating-count">(38)</span>
                            </div>
                            <div class="product-price">
                                <span class="old-price">240.000 VND</span>
                                <span class="current-price">180.000 VND</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Product 2 -->

                <!-- Product 3 -->
                <div class="col-lg-3 col-md-6">
                    <div class="product-item">
                        <div class="product-image">
                            <img src="{{ asset('assets\img\person\nhà giả kim.webp') }}" alt="Product Image" class="img-fluid" loading="lazy">
                            <div class="product-actions">
                                <button class="action-btn wishlist-btn">
                                    <i class="bi bi-heart"></i>
                                </button>
                            </div>
                            <button class="cart-btn">Thêm vào giỏ hàng</button>
                        </div>
                        <div class="product-info">
                            <div class="product-category">Sản phẩm mới</div>
                            <h4 class="product-name"><a href="product-details.html">Nhà giả kim</a></h4>
                            <div class="product-rating">
                                <div class="stars">
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star"></i>
                                    <i class="bi bi-star"></i>
                                </div>
                                <span class="rating-count">(12)</span>
                            </div>
                            <div class="product-price">95.000 VND</div>
                        </div>
                    </div>
                </div>
                <!-- End Product 3 -->

                <!-- Product 4 -->
                <div class="col-lg-3 col-md-6">
                    <div class="product-item">
                        <div class="product-image">
                            <div class="product-badge trending-badge">Xu hướng</div>
                            <img src="{{ asset('assets\img\person\trí tuệ nhân tạo.webp') }}" alt="Product Image" class="img-fluid" loading="lazy">
                            <div class="product-actions">
                                <button class="action-btn wishlist-btn active">
                                    <i class="bi bi-heart-fill"></i>
                                </button>
                            </div>
                            <button class="cart-btn">Thêm vào giỏ hàng</button>
                        </div>
                        <div class="product-info">
                            <div class="product-category">Nổi bật trong tuần</div>
                            <h4 class="product-name"><a href="product-details.html">AI - Trí tuệ nhân tạo</a></h4>
                            <div class="product-rating">
                                <div class="stars">
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                </div>
                                <span class="rating-count">(56)</span>
                            </div>
                            <div class="product-price">165.000 VND</div>
                        </div>
                    </div>
                </div>
                <!-- End Product 4 -->

            </div>

        </div>

    </section><!-- /Best Sellers Section -->

    <!-- Cards Section -->
    <section id="cards" class="cards section">

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row gy-4">
                <div class="col-lg-4 col-md-6 mb-5 mb-md-0" data-aos="fade-up" data-aos-delay="200">
                    <div class="product-category">
                        <h3 class="category-title">
                            <i class="bi bi-fire"></i> Xu hướng đọc
                        </h3>
                        <div class="product-list">
                            <div class="product-card">
                                <div class="product-image">
                                    <img src="{{ asset('assets\img\person\dế mèn.webp') }}" alt="Premium Leather Tote" class="img-fluid">
                                    <div class="product-badges">
                                        <span class="badge-new">New</span>
                                    </div>
                                </div>
                                <div class="product-info">
                                    <h4 class="product-name">Dế mèn phiêu lưu ký</h4>
                                    <div class="product-rating">
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-half"></i>
                                        <span>(24)</span>
                                    </div>
                                    <div class="product-price">
                                        <span class="current-price">87.50 VND</span>
                                    </div>
                                </div>
                            </div>

                            <div class="product-card">
                                <div class="product-image">
                                    <img src="{{ asset('assets\img\person\toi-thay-hoa-vang-tren-co-xanh-1.jpg') }}" alt="Statement Earrings" class="img-fluid">
                                </div>
                                <div class="product-info">
                                    <h4 class="product-name">Tôi thấy hoa vàng trên cỏ xanh</h4>
                                    <div class="product-rating">
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <span>(41)</span>
                                    </div>
                                    <div class="product-price">
                                        <span class="current-price">39.99 VND</span>
                                    </div>
                                </div>
                            </div>

                            <div class="product-card">
                                <div class="product-image">
                                    <img src="{{ asset('assets\img\person\cậu không hề nhỏ bé.webp') }}" alt="Organic Cotton Shirt" class="img-fluid">
                                </div>
                                <div class="product-info">
                                    <h4 class="product-name">Cậu không hề nhỏ bé</h4>
                                    <div class="product-rating">
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star"></i>
                                        <span>(18)</span>
                                    </div>
                                    <div class="product-price">
                                        <span class="current-price">45.00 VND</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mb-5 mb-md-0" data-aos="fade-up" data-aos-delay="300">
                    <div class="product-category">
                        <h3 class="category-title">
                            <i class="bi bi-award"></i> Bán chạy
                        </h3>
                        <div class="product-list">
                            <div class="product-card">
                                <div class="product-image">
                                    <img src="{{ asset('assets\img\person\thời gian tươi đẹp.webp') }}" alt="Slim Fit Denim" class="img-fluid">
                                    <div class="product-badges">
                                        <span class="badge-sale">-15%</span>
                                    </div>
                                </div>
                                <div class="product-info">
                                    <h4 class="product-name">Thời gian tươi đẹp</h4>
                                    <div class="product-rating">
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <span>(87)</span>
                                    </div>
                                    <div class="product-price">
                                        <span class="current-price">68.00 VND</span>
                                        <span class="old-price">80.00 VND</span>
                                    </div>
                                </div>
                            </div>

                            <div class="product-card">
                                <div class="product-image">
                                    <img src="{{ asset('assets\img\person\trời xanh.jpg') }}" alt="Designer Handbag" class="img-fluid">
                                </div>
                                <div class="product-info">
                                    <h4 class="product-name">Trời xanh</h4>
                                    <div class="product-rating">
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-half"></i>
                                        <span>(56)</span>
                                    </div>
                                    <div class="product-price">
                                        <span class="current-price">129.990 VND</span>
                                    </div>
                                </div>
                            </div>

                            <div class="product-card">
                                <div class="product-image">
                                    <img src="{{ asset('assets\img\person\review-tuoi-tre-dang-gia-bao-nhieu-1.jpg') }}" alt="Leather Crossbody" class="img-fluid">
                                    <div class="product-badges">
                                        <span class="badge-hot">Hot</span>
                                    </div>
                                </div>
                                <div class="product-info">
                                    <h4 class="product-name">Tuổi trẻ đáng giá bao nhiêu</h4>
                                    <div class="product-rating">
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <span>(112)</span>
                                    </div>
                                    <div class="product-price">
                                        <span class="current-price">95.50 VND</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mb-5 mb-md-0" data-aos="fade-up" data-aos-delay="400">
                    <div class="product-category">
                        <h3 class="category-title">
                            <i class="bi bi-star"></i>
                        </h3>
                        <div class="product-list">
                            <div class="product-card">
                                <div class="product-image">
                                    <img src="{{ asset('assets\img\person\harry.webp') }}" alt="Pleated Midi Skirt" class="img-fluid">
                                </div>
                                <div class="product-info">
                                    <h4 class="product-name">Harry portter</h4>
                                    <div class="product-rating">
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star"></i>
                                        <span>(32)</span>
                                    </div>
                                    <div class="product-price">
                                        <span class="current-price">75.00 VND</span>
                                    </div>
                                </div>
                            </div>

                            <div class="product-card">
                                <div class="product-image">
                                    <img src="{{ asset('assets\img\person\OIP (1).webp') }}" alt="Geometric Earrings" class="img-fluid">
                                    <div class="product-badges">
                                        <span class="badge-limited">Giới hạn</span>
                                    </div>
                                </div>
                                <div class="product-info">
                                    <h4 class="product-name">Đắc nhân tâm/h4>
                                        <div class="product-rating">
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-half"></i>
                                            <span>(47)</span>
                                        </div>
                                        <div class="product-price">
                                            <span class="current-price">42.99 VND</span>
                                        </div>
                                </div>
                            </div>

                            <div class="product-card">
                                <div class="product-image">
                                    <img src="{{ asset('assets\img\person\nhà giả kim.webp') }}" alt="Structured Satchel" class="img-fluid">
                                </div>
                                <div class="product-info">
                                    <h4 class="product-name">Nhà giả kim</h4>
                                    <div class="product-rating">
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <span>(64)</span>
                                    </div>
                                    <div class="product-price">
                                        <span class="current-price">89.99 VND</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </section><!-- /Cards Section -->

    <!-- Call To Action Section -->
    <section id="call-to-action" class="call-to-action section">

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="main-content text-center" data-aos="zoom-in" data-aos-delay="200">
                        <div class="offer-badge" data-aos="fade-down" data-aos-delay="250">
                            <span class="limited-time">Giới hạn thời gian</span>
                            <span class="offer-text">50% GIẢM GIÁ</span>
                        </div>

                        <h2 data-aos="fade-up" data-aos-delay="300">Giảm giá Flash độc quyền</h2>

                        <p class="subtitle" data-aos="fade-up" data-aos-delay="350">Đừng bỏ lỡ đợt giảm giá lớn nhất trong năm của chúng tôi. Sản phẩm chất lượng cao với giá không thể tốt hơn chỉ trong 48 giờ tới.</p>

                        <div class="countdown-wrapper" data-aos="fade-up" data-aos-delay="400">
                            <div class="countdown d-flex justify-content-center" data-count="2025/12/31">
                                <div>
                                    <h3 class="count-days"></h3>
                                    <h4>Ngày</h4>
                                </div>
                                <div>
                                    <h3 class="count-hours"></h3>
                                    <h4>Giờ</h4>
                                </div>
                                <div>
                                    <h3 class="count-minutes"></h3>
                                    <h4>Phút</h4>
                                </div>
                                <div>
                                    <h3 class="count-seconds"></h3>
                                    <h4>Giây</h4>
                                </div>
                            </div>
                        </div>

                        <div class="action-buttons" data-aos="fade-up" data-aos-delay="450">
                            <a href="#" class="btn-shop-now">Mua ngay</a>
                            <a href="#" class="btn-view-deals">Xem tất cả ưu đãi</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row featured-products-row" data-aos="fade-up" data-aos-delay="500">
                <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="100">
                    <div class="product-showcase">
                        <div class="product-image">
                            <img src="{{ asset('assets\img\person\OIP (1).webp') }}" alt="Featured Product" class="img-fluid">
                            <div class="discount-badge">-45%</div>
                        </div>
                        <div class="product-details">
                            <h6>Đắc nhân tâm</h6>
                            <div class="price-section">
                                <span class="original-price">129.000 VND</span>
                                <span class="sale-price">71.000 VND</span>
                            </div>
                            <div class="rating-stars">
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <span class="rating-count">(324)</span>
                            </div>
                        </div>
                    </div>
                </div><!-- End Product Showcase -->

                <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="150">
                    <div class="product-showcase">
                        <div class="product-image">
                            <img src="{{ asset('assets\img\person\cay-cam-ngot-cua-toi.webp') }}" alt="Featured Product" class="img-fluid">
                            <div class="discount-badge">-60%</div>
                        </div>
                        <div class="product-details">
                            <h6>Cây cam ngọt của tôi</h6>
                            <div class="price-section">
                                <span class="original-price">89.000 VND</span>
                                <span class="sale-price">36.000 VND</span>
                            </div>
                            <div class="rating-stars">
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-half"></i>
                                <span class="rating-count">(198)</span>
                            </div>
                        </div>
                    </div>
                </div><!-- End Product Showcase -->

                <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="200">
                    <div class="product-showcase">
                        <div class="product-image">
                            <img src="{{ asset('assets\img\person\harry.webp') }}" alt="Featured Product" class="img-fluid">
                            <div class="discount-badge">-35%</div>
                        </div>
                        <div class="product-details">
                            <h6>Harry Portter</h6>
                            <div class="price-section">
                                <span class="original-price">159.000 VND</span>
                                <span class="sale-price">103.000 VND</span>
                            </div>
                            <div class="rating-stars">
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <span class="rating-count">(267)</span>
                            </div>
                        </div>
                    </div>
                </div><!-- End Product Showcase -->

                <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="250">
                    <div class="product-showcase">
                        <div class="product-image">
                            <img src="{{ asset('assets\img\person\trí tuệ nhân tạo.webp') }}" alt="Featured Product" class="img-fluid">
                            <div class="discount-badge">-55%</div>
                        </div>
                        <div class="product-details">
                            <h6>AI - Trí tuệ nhân tạo</h6>
                            <div class="price-section">
                                <span class="original-price">75.000 VND</span>
                                <span class="sale-price">34.000 VND</span>
                            </div>
                            <div class="rating-stars">
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star"></i>
                                <span class="rating-count">(142)</span>
                            </div>
                        </div>
                    </div>
                </div><!-- End Product Showcase -->
            </div>

        </div>

    </section><!-- /Call To Action Section -->

</main>
@endsection
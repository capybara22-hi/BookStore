@extends('components.homeLayout')

@section('gioithieu')
<main class="main">

  <!-- Page Title -->
  <div class="page-title light-background">
    <div class="container d-lg-flex justify-content-between align-items-center">
      <h1 class="mb-2 mb-lg-0">Giới thiệu</h1>
    </div>
  </div><!-- End Page Title -->

  <!-- About 2 Section -->
  <section id="about-2" class="about-2 section">

    <div class="container" data-aos="fade-up" data-aos-delay="100">

      <span class="section-badge"><i class="bi bi-info-circle"></i>Về chúng tôi</span>
      <div class="row">
        <div class="col-lg-6">
          <h2 class="about-title">MiuBook</h2>
          <p class="about-description">Chào mừng bạn đến với MiuBook – nền tảng bán sách online uy tín, tiện lợi và dành cho tất cả những ai yêu thích việc đọc.</p>
          <p class="about-text">
          <h1>Tầm nhìn</h1>
          Chúng tôi hướng đến việc trở thành địa chỉ mua sách trực tuyến hàng đầu Việt Nam, kết nối hàng triệu độc giả và truyền cảm hứng đọc sách đến cộng đồng.</p>
        </div>
        <div class="col-lg-6">
          <p class="about-text">
          <h1>Sứ mệnh của chúng tôi</h1>
          <ul>

            <li>Chúng tôi tin rằng mỗi cuốn sách đều có sức mạnh thay đổi cuộc sống. Vì vậy, MiuBook được xây dựng với mục tiêu:</li>

            <li>Mang tri thức đến gần hơn với mọi người.</li>
            <li>Giúp độc giả tiếp cận sách nhanh chóng, dễ dàng, dù ở bất cứ đâu.</li>
            <li>Tạo ra một không gian đọc thông minh, hiện đại và thân thiện.</li>
          </ul>

          </p>

        </div>
      </div>

      <div class="row features-boxes gy-4 mt-3">
        <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
          <div class="feature-box">
            <div class="icon-box">
              <i class="bi bi-bullseye"></i>
            </div>
            <h3><a href="#" class="stretched-link">Uy tín – Chất lượng hàng đầu</a></h3>
            <p>Mỗi sản phẩm đều được kiểm tra kỹ lưỡng trước khi giao đến tay bạn.</p>
          </div>
        </div>

        <div class="col-lg-4" data-aos="fade-up" data-aos-delay="300">
          <div class="feature-box">
            <div class="icon-box">
              <i class="bi bi-person-check"></i>
            </div>
            <h3><a href="#" class="stretched-link">Trải nghiệm mua hàng dễ dàng</a></h3>
            <p>Giao diện thân thiện, thao tác đơn giản, chỉ vài cú click là có ngay cuốn sách bạn muốn.</p>
          </div>
        </div>

        <div class="col-lg-4" data-aos="fade-up" data-aos-delay="400">
          <div class="feature-box">
            <div class="icon-box">
              <i class="bi bi-clipboard-data"></i>
            </div>
            <h3><a href="#" class="stretched-link">Luôn lắng nghe khách hàng</a></h3>
            <p>Mọi đóng góp của bạn đều giúp chúng tôi hoàn thiện và mang đến trải nghiệm tốt hơn mỗi ngày.</p>
          </div>
        </div>
      </div>

      <div class="row mt-5">
        <div class="col-lg-12" data-aos="zoom-in" data-aos-delay="200">
          <div class="video-box">
            <img src="{{ asset('assets/img/about/about-wide-1.webp') }}" class="img-fluid" alt="Video Thumbnail">
            <a href="https://www.youtube.com/watch?v=Y7f98aduVJ8" class="glightbox pulsating-play-btn"></a>
          </div>
        </div>
      </div>

    </div>

  </section><!-- /About 2 Section -->

  <!-- Stats Section -->
  <section id="stats" class="stats section light-background">

    <div class="container" data-aos="fade-up" data-aos-delay="100">

      <div class="row gy-4">

        <div class="col-lg-3 col-md-6">
          <div class="stats-item">
            <i class="bi bi-emoji-smile"></i>
            <span data-purecounter-start="0" data-purecounter-end="232" data-purecounter-duration="1" class="purecounter"></span>
            <p><strong>Happy Clients</strong> <span>consequuntur quae</span></p>
          </div>
        </div><!-- End Stats Item -->

        <div class="col-lg-3 col-md-6">
          <div class="stats-item">
            <i class="bi bi-journal-richtext"></i>
            <span data-purecounter-start="0" data-purecounter-end="521" data-purecounter-duration="1" class="purecounter"></span>
            <p><strong>Projects</strong> <span>adipisci atque cum quia aut</span></p>
          </div>
        </div><!-- End Stats Item -->

        <div class="col-lg-3 col-md-6">
          <div class="stats-item">
            <i class="bi bi-headset"></i>
            <span data-purecounter-start="0" data-purecounter-end="1453" data-purecounter-duration="1" class="purecounter"></span>
            <p><strong>Hours Of Support</strong> <span>aut commodi quaerat</span></p>
          </div>
        </div><!-- End Stats Item -->

        <div class="col-lg-3 col-md-6">
          <div class="stats-item">
            <i class="bi bi-people"></i>
            <span data-purecounter-start="0" data-purecounter-end="32" data-purecounter-duration="1" class="purecounter"></span>
            <p><strong>Hard Workers</strong> <span>rerum asperiores dolor</span></p>
          </div>
        </div><!-- End Stats Item -->

      </div>

    </div>

  </section><!-- /Stats Section -->

  <!-- Testimonials Section -->
  <section id="testimonials" class="testimonials section">

    <div class="container">

      <div class="testimonial-masonry">

        <div class="testimonial-item" data-aos="fade-up">
          <div class="testimonial-content">
            <div class="quote-pattern">
              <i class="bi bi-quote"></i>
            </div>
            <p>“Giao hàng rất nhanh, đóng gói chắc chắn và sách mới 100%. Mình thường xuyên đặt tại đây vì giá tốt và chăm sóc khách hàng cực kỳ nhiệt tình.”</p>
            <div class="client-info">
              <div class="client-image">
                <img src="{{ asset('assets/img/product/nu.jpg') }}" alt="Client">
              </div>
              <div class="client-details">
                <h3>Nguyễn Minh Anh</h3>
                <span class="position">Hà Nội</span>
              </div>
            </div>
          </div>
        </div>

        <div class="testimonial-item highlight" data-aos="fade-up" data-aos-delay="100">
          <div class="testimonial-content">
            <div class="quote-pattern">
              <i class="bi bi-quote"></i>
            </div>
            <p>“Kho sách đa dạng, dễ tìm kiếm. Mỗi lần mình cần sách học tập hay sách kỹ năng đều lên đây xem trước. Khá hài lòng vì website mượt và thao tác dễ dàng.”</p>
            <div class="client-info">
              <div class="client-image">
                <img src="{{ asset('assets/img/product/giamdoc.png') }}" alt="Client">
              </div>
              <div class="client-details">
                <h3>Trần Hoàng Long</h3>
                <span class="position"> – TP. Hồ Chí Minh</span>
              </div>
            </div>
          </div>
        </div>

        <div class="testimonial-item" data-aos="fade-up" data-aos-delay="200">
          <div class="testimonial-content">
            <div class="quote-pattern">
              <i class="bi bi-quote"></i>
            </div>
            <p>“Mình mua combo sách giảm giá rất nhiều, tiết kiệm hơn mua ở cửa hàng truyền thống. Rất thích cách đóng gói cẩn thận và có giấy note cảm ơn nhỏ, rất dễ thương!”</p>
            <div class="client-info">
              <div class="client-image">
                <img src="{{ asset('assets/img/product/nu.jpg') }}" alt="Client">
              </div>
              <div class="client-details">
                <h3>Phương Nhi</h3>
                <span class="position"> – Đà Nẵng</span>
              </div>
            </div>
          </div>
        </div>

        <div class="testimonial-item" data-aos="fade-up" data-aos-delay="300">
          <div class="testimonial-content">
            <div class="quote-pattern">
              <i class="bi bi-quote"></i>
            </div>
            <p>“Dịch vụ hỗ trợ nhanh, đặt câu hỏi là có người phản hồi ngay. Đây là nơi mình yên tâm mua sách để đọc và tặng bạn bè.”</p>
            <div class="client-info">
              <div class="client-image">
                <img src="{{ asset('assets/img/product/nguoidung1.png') }}" alt="Client">
              </div>
              <div class="client-details">
                <h3>Hữu Trí</h3>
                <span class="position"> – Cần Thơ</span>
              </div>
            </div>
          </div>
        </div>

        <div class="testimonial-item highlight" data-aos="fade-up" data-aos-delay="400">
          <div class="testimonial-content">
            <div class="quote-pattern">
              <i class="bi bi-quote"></i>
            </div>
            <p>“Kho sách đa dạng, dễ tìm kiếm. Mỗi lần mình cần sách học tập hay sách kỹ năng đều lên đây xem trước. Khá hài lòng vì website mượt và thao tác dễ dàng.”</p>
            <div class="client-info">
              <div class="client-image">
                <img src="{{ asset('assets/img/product/boy.jpg') }}" alt="Client">
              </div>
              <div class="client-details">
                <h3>Hữu Trí</h3>
                <span class="position"> – Cần Thơ</span>
              </div>
            </div>
          </div>
        </div>

        <div class="testimonial-item" data-aos="fade-up" data-aos-delay="500">
          <div class="testimonial-content">
            <div class="quote-pattern">
              <i class="bi bi-quote"></i>
            </div>
            <p>“Mình mua combo sách giảm giá rất nhiều, tiết kiệm hơn mua ở cửa hàng truyền thống. Rất thích cách đóng gói cẩn thận và có giấy note cảm ơn nhỏ, rất dễ thương!”</p>
            <div class="client-info">
              <div class="client-image">
                <img src="{{ asset('assets/img/product/nguoidung1.png') }}" alt="Client">
              </div>
              <div class="client-details">
                <h3>Trần Hoàng Long</h3>
                <span class="position"> – TP. Hồ Chí Minh</span>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </section><!-- /Testimonials Section -->

</main>
@endsection
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Register - NiceShop Bootstrap Template</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">
  <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/aos/aos.css')}}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/drift-zoom/drift-basic.css')}}" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="{{ asset('assets/css/main.css')}}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceShop
  * Template URL: https://bootstrapmade.com/niceshop-bootstrap-ecommerce-template/
  * Updated: Aug 26 2025 with Bootstrap v5.3.7
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="register-page">

  <main class="main">
    <!-- Page Title -->
    <div class="page-title light-background">
      <div class="container d-lg-flex justify-content-between align-items-center">
        <h1 class="mb-2 mb-lg-0">MiuBook</h1>
        <nav class="breadcrumbs">
          <ol>
            <li><a href="{{ route('home') }}">Trang chủ</a></li>
            <li class="current">Đăng ký</li>
          </ol>
        </nav>
      </div>
    </div>
    <!-- End Page Title -->

    <!-- Register Section -->
    <section id="register" class="register section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row justify-content-center">
          <div class="col-lg-10">
            <div class="registration-form-wrapper">
              <div class="form-header text-center">
                <h2>Đăng ký tài khoản</h2>
                <p>Tạo tài khoản để trải nghiệm mua sắm cùng chúng tôi</p>
              </div>

              <div class="row">
                <div class="col-lg-8 mx-auto">
                  <form action="{{ route('postRegister') }}" method="post" novalidate>
                    @csrf
                    @if(session('message'))
                    <div style="color: green; margin: 10px 0;">
                      {{ session('message') }}
                    </div>
                    @endif
                    <!-- @if($errors->any())
                    <ul style="color: red;">
                      @foreach($errors->all() as $error)
                      <li>{{$error}}</li>
                      @endforeach
                    </ul>
                    @endif -->
                    <div class="form-floating mb-3">
                      <input type="text" class="form-control" id="fullName" name="name" value="{{ old('name')}}" placeholder="Tên tài khoản">
                      <label for="fullName">Tên tài khoản</label>
                    </div>
                    @error('name')
                    <div style="color: red; font-style: italic ; margin-bottom: 10px; opacity: 0.7;">*{{$message}}</div>
                    @enderror


                    <div class="form-floating mb-3">
                      <input type="text" class="form-control" id="registerPhone" name="phone" value="{{ old('phone')}}" placeholder="Số điện thoại" autocomplete="off">
                      <label for="registerPhone">Số điện thoại</label>
                    </div>
                    @error('phone')
                    <div style="color: red; font-style: italic ; margin-bottom: 10px; opacity: 0.7;">*{{$message}}</div>
                    @enderror

                    <div class="form-floating mb-3">
                      <input type="email" class="form-control" id="email" name="email" value="{{ old('email')}}" placeholder="Email">
                      <label for="email">Email</label>
                    </div>
                    @error('email')
                    <div style="color: red; font-style: italic ; margin-bottom: 10px; opacity: 0.7;">*{{$message}}</div>
                    @enderror

                    <div class="row mb-3">
                      <div class="col-md-6">
                        <div class="form-floating">
                          <input type="password" class="form-control" id="password" name="password" placeholder="Mật khẩu" minlength="8" autocomplete="new-password">
                          <label for="password">Mật khẩu</label>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-floating">
                          <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password" autocomplete="new-password">
                          <label for="confirmPassword">Xác nhận mật khẩu</label>
                        </div>
                      </div>
                    </div>
                    @error('password')
                    <div style="color: red; font-style: italic ; margin-bottom: 10px; opacity: 0.7;">*{{$message}}</div>
                    @enderror


                    <div class="form-check mb-4">
                      <!-- <input class="form-check-input" type="checkbox" id="termsCheck" name="termsCheck" required=""> -->
                      <label class="form-check-label" for="termsCheck">
                        <!-- I agree to the <a href="#">Terms of Service</a> and <a href="#">Privacy Policy</a> -->
                        Bằng việc đăng ký, bạn đã đồng ý với MiuBook về <a href="#">Điều khoản dịch vụ</a> và <a href="#">Chính sách bảo mật</a>
                      </label>
                    </div>

                    <!-- <div class="form-check mb-4">
                      <input class="form-check-input" type="checkbox" id="marketingCheck" name="marketingCheck">
                      <label class="form-check-label" for="marketingCheck">
                        I would like to receive marketing communications about products, services, and promotions
                      </label>
                    </div> -->

                    <div class="d-grid mb-4">
                      <button type="submit" class="btn btn-register">Đăng ký</button>
                    </div>

                    <div class="login-link text-center">
                      <p>Bạn đã có tài khoản? <a href="{{ route('dangnhap') }}">Đăng nhập</a></p>
                    </div>
                  </form>
                </div>
              </div>

              <div class="social-login">
                <div class="row">
                  <div class="col-lg-8 mx-auto">
                    <div class="divider">
                      <span>hoặc đăng ký với</span>
                    </div>
                    <div class="social-buttons">
                      <a href="#" class="btn btn-social">
                        <i class="bi bi-google"></i>
                        <span>Google</span>
                      </a>
                      <a href="#" class="btn btn-social">
                        <i class="bi bi-facebook"></i>
                        <span>Facebook</span>
                      </a>
                      <!-- <a href="#" class="btn btn-social">
                        <i class="bi bi-apple"></i>
                        <span>Apple</span>
                      </a> -->
                    </div>
                  </div>
                </div>
              </div>

              <div class="decorative-elements">
                <div class="circle circle-1"></div>
                <div class="circle circle-2"></div>
                <div class="circle circle-3"></div>
                <div class="square square-1"></div>
                <div class="square square-2"></div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </section>
    <!-- /Register Section -->
  </main>

  <footer id="footer" class="footer dark-background">
    <div class="footer-main">
      <div class="container">
        <div class="row gy-4">
          <div class="col-lg-4 col-md-6">
            <div class="footer-widget footer-about">
              <a href="{{ route('home') }}" class="logo">
                <span class="sitename">NiceShop</span>
              </a>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam in nibh vehicula, facilisis magna ut, consectetur lorem. Proin eget tortor risus.</p>

              <div class="social-links mt-4">
                <h5>Connect With Us</h5>
                <div class="social-icons">
                  <a href="#" aria-label="Facebook"><i class="bi bi-facebook"></i></a>
                  <a href="#" aria-label="Instagram"><i class="bi bi-instagram"></i></a>
                  <a href="#" aria-label="Twitter"><i class="bi bi-twitter-x"></i></a>
                  <a href="#" aria-label="TikTok"><i class="bi bi-tiktok"></i></a>
                  <a href="#" aria-label="Pinterest"><i class="bi bi-pinterest"></i></a>
                  <a href="#" aria-label="YouTube"><i class="bi bi-youtube"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-2 col-md-6 col-sm-6">
            <div class="footer-widget">
              <h4>Shop</h4>
              <ul class="footer-links">
                <li><a href="{{ route('sanpham') }}">New Arrivals</a></li>
                <li><a href="{{ route('sanpham') }}">Bestsellers</a></li>
                <li><a href="{{ route('sanpham') }}">Women's Clothing</a></li>
                <li><a href="{{ route('sanpham') }}">Men's Clothing</a></li>
                <li><a href="{{ route('sanpham') }}">Accessories</a></li>
                <li><a href="{{ route('sanpham') }}">Sale</a></li>
              </ul>
            </div>
          </div>

          <div class="col-lg-2 col-md-6 col-sm-6">
            <div class="footer-widget">
              <h4>Support</h4>
              <ul class="footer-links">
                <li><a href="#">Help Center</a></li>
                <li><a href="#">Order Status</a></li>
                <li><a href="#">Shipping Info</a></li>
                <li><a href="#">Returns &amp; Exchanges</a></li>
                <li><a href="#">Size Guide</a></li>
                <li><a href="#">Contact Us</a></li>
              </ul>
            </div>
          </div>

          <div class="col-lg-4 col-md-6">
            <div class="footer-widget">
              <h4>Contact Information</h4>
              <div class="footer-contact">
                <div class="contact-item">
                  <i class="bi bi-geo-alt"></i>
                  <span>123 Fashion Street, New York, NY 10001</span>
                </div>
                <div class="contact-item">
                  <i class="bi bi-telephone"></i>
                  <span>+1 (555) 123-4567</span>
                </div>
                <div class="contact-item">
                  <i class="bi bi-envelope"></i>
                  <span>hello@example.com</span>
                </div>
                <div class="contact-item">
                  <i class="bi bi-clock"></i>
                  <span>Monday-Friday: 9am-6pm<br>Saturday: 10am-4pm<br>Sunday: Closed</span>
                </div>
              </div>

              <div class="app-buttons mt-4">
                <a href="#" class="app-btn">
                  <i class="bi bi-apple"></i>
                  <span>App Store</span>
                </a>
                <a href="#" class="app-btn">
                  <i class="bi bi-google-play"></i>
                  <span>Google Play</span>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="footer-bottom">
      <div class="container">
        <div class="row gy-3 align-items-center">
          <div class="col-lg-6 col-md-12">
            <div class="copyright">
              <p>© <span>Copyright</span> <strong class="sitename">NiceShop</strong>. All Rights Reserved.</p>
            </div>
            <div class="credits mt-1">
              <!-- All the links in the footer should remain intact. -->
              <!-- You can delete the links only if you've purchased the pro version. -->
              <!-- Licensing information: https://bootstrapmade.com/license/ -->
              <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
              Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
            </div>
          </div>

          <div class="col-lg-6 col-md-12">
            <div class="d-flex flex-wrap justify-content-lg-end justify-content-center align-items-center gap-4">
              <div class="payment-methods">
                <div class="payment-icons">
                  <i class="bi bi-credit-card" aria-label="Credit Card"></i>
                  <i class="bi bi-paypal" aria-label="PayPal"></i>
                  <i class="bi bi-apple" aria-label="Apple Pay"></i>
                  <i class="bi bi-google" aria-label="Google Pay"></i>
                  <i class="bi bi-shop" aria-label="Shop Pay"></i>
                  <i class="bi bi-cash" aria-label="Cash on Delivery"></i>
                </div>
              </div>

              <div class="legal-links">
                <a href="#">Terms</a>
                <a href="#">Privacy</a>
                <a href="#">Cookies</a>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <!-- <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script> -->
  <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/drift-zoom/Drift.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>

  <!-- Main JS File -->
  <script src="{{ asset('assets/js/main.js') }}"></script>

</body>

</html>
@extends('components.layout_header')

@section('quenmatkhau')
<section id="login" class="login section">

    <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10">
                <div class="auth-container" data-aos="fade-in" data-aos-delay="200">

                    <!-- Login Form -->
                    <div class="auth-form login-form active">
                        <div class="form-header">
                            <h3>Chào mừng tới MiuBook</h3>
                            <p>Đổi mật khẩu</p>
                        </div>

                        @if(session('status'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('status') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif

                        @if(session('message'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('message') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif

                        <!-- @if($errors->any())
                <ul>
                  @foreach($errors->all() as $error)
                  <li>{{$error}}</li>
                  @endforeach
                </ul>
                @endif -->

                        <form class="auth-form-content" method="post" action="{{ route('password.email') }}" novalidate>
                            @csrf
                            <div class="input-group mb-3">
                                <span class="input-icon">
                                    <i class="bi bi-envelope"></i>
                                </span>
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Nhập email của bạn" autocomplete="email">
                            </div>
                            @error('email')
                            <div style="color: red; font-style: italic ; margin-bottom: 10px; opacity: 0.7;">*{{$message}}</div>
                            @enderror

                            <!-- <div class="input-group mb-3">
                                <span class="input-icon">
                                    <i class="bi bi-lock"></i>
                                </span>
                                <input type="password" class="form-control" name="password" placeholder="Nhập mật khẩu" autocomplete="current-password">
                                <span class="password-toggle">
                                    <i class="bi bi-eye"></i>
                                </span>
                            </div>
                            @error('password').
                            <div style="color: red; font-style: italic ; margin-bottom: 10px; opacity: 0.7;">*{{$message}}</div>
                            @enderror

                            <div class="form-options mb-4">
                                <a href="#" class="forgot-password fw-bold">Quên mật khẩu?</a>
                            </div> -->

                            <button type="submit" class="auth-btn primary-btn mb-3">
                                Xác minh tài khoản
                                <i class="bi bi-arrow-right"></i>
                            </button>

                            <div class="divider">
                                <span>or</span>
                            </div>

                            <div class="login-link switch-form">
                                <p>Bạn không có tài khoản? <a href="{{route('dangky')}}" class="fw-bold">Đăng ký tài khoản</a></p>

                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>

    </div>

</section><!-- /Login Section -->
@endsection
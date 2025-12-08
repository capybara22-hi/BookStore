@extends('components.layout_header')

@section('quenmatkhau')
<section id="login" class="login section">

    <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10">
                <div class="auth-container" data-aos="fade-in" data-aos-delay="200">

                    <!-- Reset Password Form -->
                    <div class="auth-form login-form active">
                        <div class="form-header">
                            <h3>Đặt lại mật khẩu</h3>
                            <p>Nhập mật khẩu mới của bạn</p>
                        </div>

                        @if(session('status'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('status') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif

                        <form class="auth-form-content" method="POST" action="{{ route('password.update') }}" novalidate>
                            @csrf
                            <input type="hidden" name="token" value="{{ $token }}">

                            <div class="input-group mb-3">
                                <span class="input-icon">
                                    <i class="bi bi-envelope"></i>
                                </span>
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Nhập email của bạn" required autocomplete="email">
                            </div>
                            @error('email')
                            <div style="color: red; font-style: italic ; margin-bottom: 10px; opacity: 0.7;">*{{$message}}</div>
                            @enderror

                            <div class="input-group mb-3">
                                <span class="input-icon">
                                    <i class="bi bi-lock"></i>
                                </span>
                                <input type="password" class="form-control" name="password" placeholder="Mật khẩu mới" required autocomplete="new-password">
                                <span class="password-toggle">
                                    <i class="bi bi-eye"></i>
                                </span>
                            </div>
                            @error('password')
                            <div style="color: red; font-style: italic ; margin-bottom: 10px; opacity: 0.7;">*{{$message}}</div>
                            @enderror

                            <div class="input-group mb-3">
                                <span class="input-icon">
                                    <i class="bi bi-lock"></i>
                                </span>
                                <input type="password" class="form-control" name="password_confirmation" placeholder="Xác nhận mật khẩu" required autocomplete="new-password">
                                <span class="password-toggle">
                                    <i class="bi bi-eye"></i>
                                </span>
                            </div>

                            <button type="submit" class="auth-btn primary-btn mb-3">
                                Đặt lại mật khẩu
                                <i class="bi bi-arrow-right"></i>
                            </button>

                            <div class="login-link switch-form">
                                <p>Nhớ mật khẩu? <a href="{{route('dangnhap')}}">Đăng nhập</a></p>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>

    </div>

</section>
@endsection
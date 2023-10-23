@extends('front.layouts.master')
@section('title', isset($title) ? $title : 'Home')
@section('description', isset($description) ? $description : '')
@section('keywords', isset($keywords) ? $keywords : '')
@section('content')
<!-- breadcrumb area start here  -->
<div class="breadcrumb-area">
    <div class="container">
        <div class="breadcrumb-wrap text-center">
            <h2 class="page-title">{{ __('Sign In') }}</h2>
            <ul class="breadcrumb-pages">
                <li class="page-item"><a class="page-item-link" href="{{ route('front') }}">{{ __('Home') }}</a></li>
                <li class="page-item">{{ __('Sign In') }}</li>
            </ul>
        </div>
    </div>
</div>
<!-- breadcrumb area end here  -->

<!-- about us area start here  -->
<div class="sign-in-page section">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-12 col-lg-5">
                <div class="login-wrap">
                    <div class="icon d-flex align-items-center justify-content-center">
                        <span class="far fa-user"></span>
                    </div>
                    <h1 class="text-center mb-4">{{ __('Sign In') }}</h1>
                    <form class="login-form" method="post" action="{{ route('user.sign.in.post') }}">
                        @csrf
                        <div class="form-group">
                            <input type="email" class="form-control rounded-left" placeholder="{{ __('Email') }}" name="email" value="{{ env('APP_DEMO') == true ? 'user1@gmail.com' : old('email') }}" required="">
                            @error('email')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <div class="d-flex justify-content-center align-items-center cursor-pointe">

                                <input type="password" class="form-control rounded-left" placeholder="{{ __('Password') }}" name="password" id="password" required>
                                <span class="toggle-password m-2 cursor-pointer" id="togglePassword">Hiện</span>
                            </div>
                            <span class="text-danger" id="password-error"></span> <!-- Thông báo lỗi mật khẩu -->
                        </div>
                        <div class="form-group">
                            <button type="submit" class="form-control btn btn-primary rounded submit px-3 primary-btn auth-btn">{{ __('Login') }}</button>
                        </div>
                        <hr>
                        <div class="form-group">
                            <a href="{{ route('user.redirect_google') }}" class="form-control btn btn-primary rounded submit px-3 google-btn"><i class="fab fa-google"></i> {{ __('Login With Google') }}</a>
                        </div>
                        <div class="form-group">
                            <a href="{{ route('user.redirect_facebook') }}" class="form-control btn btn-primary rounded submit px-3 facebook-btn"><i class="fab fa-facebook-f fa-fw"></i> {{ __('Login With Facebook') }}</a>
                        </div>
                        <hr>
                        <div class="remember-box form-group d-md-flex justify-content-between mb-0">
                            <div>
                                <label class="checkbox-wrap">{{ __('Remember Me') }}
                                    <input type="checkbox" name="remember">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="text-md-end text-lg-end">
                                <a href="{{ route('forget.password.get') }}" class="forget-password-link">{{ __('Forget Password') }}?</a>
                            </div>
                        </div>

                        <div class="already-have-account">
                            {{ __('Dont have an account?') }}<a href="{{ route('user.sign.up') }}" class="forget-password-link">{{ __('Sign Up') }}</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- about us area end here  -->
<script>
    const passwordInput = document.getElementById('password');
    const togglePasswordButton = document.getElementById('togglePassword');

    togglePasswordButton.addEventListener('click', function() {
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            togglePasswordButton.innerText = 'Ẩn';
        } else {
            passwordInput.type = 'password';
            togglePasswordButton.innerText = 'Hiện';
        }
    });

</script>

<script>
    // Lấy tham chiếu đến trường nhập mật khẩu và thông báo lỗi
    const passwordInput = document.getElementById('password');
    const passwordError = document.getElementById('password-error');

    // Thêm sự kiện người dùng nhập mật khẩu
    passwordInput.addEventListener('input', () => {
        const password = passwordInput.value;

        // Sử dụng regex để kiểm tra mật khẩu
        const regex = /^(?=.*[a-z])(?=.*[A-Z]).{8,}$/;

        if (regex.test(password)) {
            passwordError.textContent = ''; // Mật khẩu hợp lệ, không cần thông báo lỗi
        } else {
            passwordError.textContent = 'Mật khẩu phải có ít nhất 8 ký tự và chứa cả chữ hoa và chữ thường.';
        }
    });

</script>




@endsection

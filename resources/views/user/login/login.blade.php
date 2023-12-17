<!DOCTYPE html>
<html lang="en">

<head>
    <title>HL Shoe Store</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="{{ asset('assets/user/images/favicon.ico') }}" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/user/login/vendor/bootstrap/css/bootstrap.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/fontawesome/css/all.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/user/login/vendor/animate/animate.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/user/login/vendor/select2/select2.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/user/login/css/util.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/user/login/css/main.css') }}">
    <!--===============================================================================================-->
</head>

<body>

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-pic js-tilt" data-tilt>
                    <img src="{{ asset('assets/user/images/banner-qc.jpg') }}" alt="IMG">
                </div>

                <form class="login100-form validate-form" action="{{ route('xl-dang-nhap-user') }}" method="POST">
                    @csrf
                    <span class="login100-form-title">
                        Welcome bạn đến với website của chúng tôi
                    </span>

                    <div class="wrap-input100 validate-input" data-validate="Bạn chưa nhập tài khoản">
                        <input class="input100" type="text" name="username" placeholder="Tài khoản">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-user" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Bạn chưa nhập mật khẩu">
                        <input class="input100" type="password" name="password" placeholder="Mật khẩu">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn">
                            Đăng nhập
                        </button>
                    </div>

                    <div class="text-center p-t-12">
                        <span class="txt1">
                            Bạn quên
                        </span>
                        <a class="txt2" href="{{ route('trang-gui-mail') }}">
                            mật khẩu?
                        </a>
                    </div>

                    <div class="text-center p-t-136">
                        Nếu bạn chưa có
                        <a class="txt2" href="{{ route('trang-dang-ky') }}">
                            tải khoản
                            <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>




    <!--===============================================================================================-->
    <script src="{{ asset('assets/user/login/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('assets/user/login/vendor/bootstrap/js/popper.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('assets/user/login/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('assets/user/login/vendor/select2/select2.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('assets/user/login/vendor/tilt/tilt.jquery.min.js') }}"></script>
    <script>
        $('.js-tilt').tilt({
            scale: 1.1
        })
    </script>
    <!--===============================================================================================-->
    <script src="{{ asset('assets/user/login/js/main.js') }}"></script>
</body>

</html>

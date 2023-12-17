<!DOCTYPE html>
<html lang="en">
<head>
	<title>HL Shoe Store</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="{{ asset('assets/admin/images/favicon.ico')}}"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('assets/admin/login/vendor/bootstrap/css/bootstrap.min.css')}}"> 
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('assets/fontawesome/css/all.css')}}"> 
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('assets/admin/login/fonts/iconic/css/material-design-iconic-font.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('assets/admin/login/vendor/animate/animate.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('assets/admin/login/vendor/animsition/css/animsition.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('assets/admin/login/css/util.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('assets/admin/login/css/main.css')}}">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('{{asset('assets/admin/login/images/banner.png')}}');">
			<div class="wrap-login100">
				<form class="login100-form validate-form" method="POST" action="{{ route('xl-dang-nhap-admin') }}">
                    @csrf
					<span class="login100-form-logo">
						{{-- <i class="zmdi zmdi-landscape"></i> --}}
                        <img src="{{asset('assets/admin/images/logo.png')}}" alt="">
					</span>

					<span class="login100-form-title p-b-34 p-t-27">
						Đăng nhập hệ thống
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Vui lòng nhập tài khoản">
						<input class="input100" type="text" name="username" placeholder="Tài Khoản">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Vui lòng nhập mật khẩu">
						<input class="input100" id="show-password" type="password" name="password" placeholder="Mật khẩu">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
						<div class="input-group-append">
							<div class="input-group-text show">
								<span class="fas fa-eye" toggle="#old-password"></span>
							</div>
						</div>
					</div>

					{{-- <div class="contact100-form-checkbox">
						<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
						<label class="label-checkbox100" for="ckb1">
							Remember me
						</label>
					</div> --}}

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit">
							Đăng nhập
						</button>
					</div>

					<div class="text-center pt-4">
						<a href="{{ route('trang-chu-user') }}" class="nav-link link-home text-white" target="_blank">Xem Webite <i class="fa-solid fa-arrow-up-right-from-square fa-xs ml-1"></i></a>
					</div>

					{{-- <div class="text-center p-t-90">
						<a class="txt1" href="#">
							Forgot Password?
						</a>
					</div> --}}
				</form>
			</div>
		</div>
	</div>
	
<!--===============================================================================================-->
	<script src="{{asset('assets/admin/login/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('assets/admin/login/vendor/animsition/js/animsition.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('assets/admin/login/vendor/bootstrap/js/popper.js')}}"></script>
	<script src="{{asset('assets/admin/login/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('assets/admin/login/js/main.js')}}"></script>

</body>
</html>
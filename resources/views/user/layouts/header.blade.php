<div class="header">
    <div class="header-top">
        <div class="wrap-content">
            <div class="info-header">
                <i class="fa-solid fa-location-dot mr-1"></i>
                <span class="address-header" style="font-weight:bold">Địa chỉ: Đường Số 1, P. Trường Thọ, TP. Thủ
                    Đức</span>
            </div>
            <div class="wap-social-login">
                @if (isset(Auth::guard('user')->user()->id))
                    <div class="text-hello mr-2">
                        <p class="mb-0 w-100">Xin chào:</p>
                    </div>
                    <div class="info-user dropdown">
                        <a class="d-flex align-items-center show-dropdown" data-toggle="dropdown" href="">
                            <div class="avtar_user"><img class="" onerror="src='{{ asset('assets/user/images/noimage.png') }}'"
                                src="{{ asset('upload/avatar/' . Auth::guard('user')->user()->avatar) }}"
                                alt="Alt Photo" style="" /></div>
                            <span class="name_user ml-2">{{ Auth::guard('user')->user()->name }}</span>
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{ route('suadoi-thongtin-user', ['id' => Auth::guard('user')->user()->id]) }}">Thông tin cá nhân</a>
                            <a class="dropdown-item" href="{{ route('doi-matkhau-user', ['id' => Auth::guard('user')->user()->id]) }}">Đổi mật khẩu</a>
                            <a class="dropdown-item" href="{{ route('xl-logout-user') }}"><span>Đăng xuất</span> <i class="fa fa-sign-out"></i></a>
                        </div>
                    </div>
                @else
                    <div class="wrap-login-register">
                        <div class="wrap-login">
                            <a href="{{ route('dang-nhap-user') }}" class="" data-replace="Đăng nhập">
                                <span>Đăng nhập</span>
                                <i class="fa-solid fa-arrow-right-to-bracket ml-1"></i>
                            </a>
                        </div>
                        <div class="line-deco"></div>
                        <div class="wrap-register">
                            <a href="{{ route('trang-dang-ky') }}" class="" data-replace="Đăng ký">
                                <span>Đăng ký</span>
                                <i class="fa-solid fa-user-plus ml-1"></i>
                            </a>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <div class="header-bottom">
        <div class="wrap-content">
            <a class="logo-header" href="#">
                <img src="{{ asset('assets/user/images/logo.png') }}"alt="">
            </a>
            <a class="banner-header" href="#">
                <img src="{{ asset('assets/user/images/banner.jpg') }}"alt="">
            </a>
            <a class="hotline-header">
                <div>091 2345 678</div>
                <div>092 3456 789</div>
            </a>
        </div>
    </div>
</div>

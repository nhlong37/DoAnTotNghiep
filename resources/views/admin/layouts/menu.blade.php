<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-color navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav align-items-center">
        <li class="nav-item">
            <a class="nav-link" id="sidebarCollapse" data-widget="pushmenu" href="#" role="button"><i
                    class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ route('trang-chu-user') }}" class="nav-link link-home d-block" target="_blank">Xem Webite <i
                    class="fa-solid fa-arrow-up-right-from-square fa-xs ml-1"></i></a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto align-items-center">
        <li class="nav-item">
            <div class="user_profile_dd dropdown">
                <a class="nav-link d-block" data-toggle="dropdown" href="#">
                    <img class="img-responsive rounded-circle"
                        src="{{ asset('upload/avatar/' . Auth::guard('admin')->user()->avatar) }}"
                        onerror="src='{{ asset('assets/admin/images/noimage.png') }}'"alt="Alt Photo" style="" />
                    <span class="name_user">{{ Auth::guard('admin')->user()->name }}</span></a>
                <div class="dropdown-menu">
                    <a class="dropdown-item"
                        href="{{ route('suadoi-thongtin-admin', ['id' => Auth::guard('admin')->user()->id]) }}">Thông
                        tin
                        cá nhân</a>
                    <a class="dropdown-item" href="{{ route('xl-logout-admin') }}"><span>Đăng xuất</span> <i
                            class="fa fa-sign-out"></i></a>
                </div>
            </div>
        </li>
    </ul>

</nav>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('trang-chu-admin') }}" class="brand-link">
        <img src="{{ asset('assets/admin/images/logo.png') }}" alt="Logo company"
            class="brand-image img-circle elevation-3 ">
        <span class="brand-text ml-2 font-weight-light font-size-3">HL Shoe</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->

        <nav class="mt-4">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('trang-chu-admin') }}"
                        class="nav-link {{ $name == 'trang-chu-admin' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Trang chủ
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('nguoi-dung-admin') }}"
                        class="nav-link {{ $name == 'nguoi-dung-admin' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user"></i>
                        <p>Danh sách người dùng</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('don-hang') }}" class="nav-link {{ $name == 'don-hang' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-cart-shopping"></i>
                        <p>
                            Danh sách đơn hàng
                        </p>
                    </a>
                </li>

                <li
                    class="nav-item {{ $name == 'san-pham-admin' ||
                    $name == 'them-moi-san-pham-admin' ||
                    $name == 'sua-doi-san-pham-admin' ||
                    $name == 'sanpham-lv1-admin' ||
                    $name == 'themmoi-sanpham-lv1-admin' ||
                    $name == 'suadoi-sanpham-lv1-admin' ||
                    $name == 'sanpham-lv2-admin' ||
                    $name == 'themmoi-sanpham-lv2-admin' ||
                    $name == 'suadoi-sanpham-lv2-admin' ||
                    $name == 'tim-kiem-product' ||
                    $name == 'tim-kiem-brand' ||
                    $name == 'tim-kiem-type'
                        ? 'menu-open'
                        : '' }} ">

                    <a
                        class="nav-link {{ $name == 'san-pham-admin' ||
                        $name == 'them-moi-san-pham-admin' ||
                        $name == 'sua-doi-san-pham-admin' ||
                        $name == 'sanpham-lv1-admin' ||
                        $name == 'themmoi-sanpham-lv1-admin' ||
                        $name == 'suadoi-sanpham-lv1-admin' ||
                        $name == 'sanpham-lv2-admin' ||
                        $name == 'themmoi-sanpham-lv2-admin' ||
                        $name == 'suadoi-sanpham-lv2-admin' ||
                        $name == 'tim-kiem-product' ||
                        $name == 'tim-kiem-brand' ||
                        $name == 'tim-kiem-type'
                            ? 'active'
                            : '' }}">
                        <i class="nav-icon fas fa-boxes-stacked"></i>
                        <p>
                            Quản lý sản phẩm
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('san-pham-admin') }}"
                                class="nav-link {{ $name == 'san-pham-admin' ||
                                $name == 'them-moi-san-pham-admin' ||
                                $name == 'sua-doi-san-pham-admin' ||
                                $name == 'tim-kiem-product'
                                    ? 'active'
                                    : '' }}">
                                <i class="nav-icon-small fas fa-circle fa-2xs"></i>
                                <p>Danh sách sản phẩm</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('sanpham-lv1-admin') }}"
                                class="nav-link {{ $name == 'sanpham-lv1-admin' ||
                                $name == 'themmoi-sanpham-lv1-admin' ||
                                $name == 'suadoi-sanpham-lv1-admin' ||
                                $name == 'tim-kiem-brand'
                                    ? 'active'
                                    : '' }}">
                                <i class="nav-icon-small fas fa-circle fa-2xs"></i>
                                <p>Danh mục thương hiệu</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('sanpham-lv2-admin') }}"
                                class="nav-link {{ $name == 'sanpham-lv2-admin' ||
                                $name == 'themmoi-sanpham-lv2-admin' ||
                                $name == 'suadoi-sanpham-lv2-admin' ||
                                $name == 'tim-kiem-type'
                                    ? 'active'
                                    : '' }}">
                                <i class="nav-icon-small fas fa-circle fa-2xs"></i>
                                <p>Danh mục loại</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li
                    class="nav-item {{ $name == 'mau-sac-admin' ||
                    $name == 'them-moi-mau-sac-admin' ||
                    $name == 'sua-doi-mau-sac-admin' ||
                    $name == 'kich-thuoc-admin' ||
                    $name == 'them-moi-kich-thuoc-admin' ||
                    $name == 'sua-doi-kich-thuoc-admin' ||
                    $name == 'tim-kiem-color' ||
                    $name == 'tim-kiem-size'
                        ? 'menu-open'
                        : '' }}">
                    <a
                        class="nav-link {{ $name == 'mau-sac-admin' || $name == 'them-moi-mau-sac-admin' || $name == 'sua-doi-mau-sac-admin' || $name == 'kich-thuoc-admin' || $name == 'them-moi-kich-thuoc-admin' || $name == 'sua-doi-kich-thuoc-admin' ? 'active' : '' }} ">
                        <i class="nav-icon  fas fa-palette"></i>
                        <p>
                            Quản lý Màu - Size
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('mau-sac-admin') }}"
                                class="nav-link {{ $name == 'mau-sac-admin' || $name == 'them-moi-mau-sac-admin' || $name == 'sua-doi-mau-sac-admin' || $name == 'tim-kiem-color' ? 'active' : '' }}">
                                <i class="nav-icon-small fas fa-circle fa-2xs"></i>
                                <p>Danh sách màu sắc</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('kich-thuoc-admin') }}"
                                class="nav-link {{ $name == 'kich-thuoc-admin' || $name == 'them-moi-kich-thuoc-admin' || $name == 'sua-doi-kich-thuoc-admin' || $name == 'tim-kiem-size' ? 'active' : '' }}">
                                <i class="nav-icon-small fas fa-circle fa-2xs"></i>
                                <p>Danh sách size</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li
                    class="nav-item {{ $name == 'bai-viet-admin' ||
                    $name == 'them-moi-bai-viet-admin' ||
                    $name == 'sua-doi-bai-viet-admin' ||
                    $name == 'loai-bai-viet-admin' ||
                    $name == 'them-moi-loai-bai-viet-admin' ||
                    $name == 'sua-doi-loai-bai-viet-admin' ||
                    $name == 'tim-kiem-article' ||
                    $name == 'tim-kiem-type-article'
                        ? 'menu-open'
                        : '' }}">
                    <a
                        class="nav-link {{ $name == 'bai-viet-admin' ||
                        $name == 'them-moi-bai-viet-admin' ||
                        $name == 'sua-doi-bai-viet-admin' ||
                        $name == 'loai-bai-viet-admin' ||
                        $name == 'them-moi-loai-bai-viet-admin' ||
                        $name == 'sua-doi-loai-bai-viet-admin' ||
                        $name == 'tim-kiem-article' ||
                        $name == 'tim-kiem-type-article'
                            ? 'active'
                            : '' }} ">
                        <i class="nav-icon fas fa-duotone fa-clipboard"></i>
                        <p>
                            Quản lý Bài Viết
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('bai-viet-admin') }}"
                                class="nav-link {{ $name == 'bai-viet-admin' ||
                                $name == 'them-moi-bai-viet-admin' ||
                                $name == 'sua-doi-bai-viet-admin' ||
                                $name == 'tim-kiem-article'
                                    ? 'active'
                                    : '' }}">
                                <i class="nav-icon-small fas fa-circle fa-2xs"></i>
                                <p>Danh sách bài viết</p>
                            </a>
                        </li>

                    </ul>

                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('loai-bai-viet-admin') }}"
                                class="nav-link {{ $name == 'loai-bai-viet-admin' ||
                                $name == 'them-moi-loai-bai-viet-admin' ||
                                $name == 'sua-doi-loai-bai-viet-admin' ||
                                $name == 'tim-kiem-type-article'
                                    ? 'active'
                                    : '' }}">
                                <i class="nav-icon-small fas fa-circle fa-2xs"></i>
                                <p>Danh sách loại bài viết</p>
                            </a>
                        </li>

                    </ul>
                </li>



                <li
                    class="nav-item {{ $name == 'hinh-anh-admin' || $name == 'them-moi-hinh-anh-admin' || $name == 'sua-doi-hinh-anh-admin' ? 'menu-open' : '' }}">
                    <a
                        class="nav-link {{ $name == 'hinh-anh-admin' || $name == 'them-moi-hinh-anh-admin' || $name == 'sua-doi-hinh-anh-admin' ? 'active' : '' }} ">
                        <i class="nav-icon fas fa-duotone fa-image"></i>
                        <p>
                            Quản lý Hình Ảnh
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('hinh-anh-admin') }}"
                                class="nav-link {{ $name == 'hinh-anh-admin' || $name == 'them-moi-hinh-anh-admin' || $name == 'sua-doi-hinh-anh-admin' ? 'active' : '' }}">
                                <i class="nav-icon-small fas fa-circle fa-2xs"></i>
                                <p>Danh sách hình ảnh</p>
                            </a>
                        </li>
                    </ul>

                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->

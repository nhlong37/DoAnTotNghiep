<div class="menu">
    <div class="wrap-content">
        <ul class="menu-main menu_desktop">
            <li><a class="transition {{ $name == '' || $name == 'trang-chu-user' ? 'active' : '' }}"
                    href="{{ route('trang-chu-user') }}" title="Trang chủ">Trang chủ</a></li>
            <li class="menu-line"></li>
            <li><a class="transition" href="" title="Giới thiệu">Giới thiệu</a></li>
            <li class="menu-line"></li>
            <li>
                <a class="transition {{ $name == 'lay-ds-product' ? 'active' : '' }}"
                    href="{{ route('lay-ds-product') }}" title="sản phẩm">sản phẩm</a>

            </li>
            <li class="menu-line"></li>
            <li>
                <a class="transition" href="" title="Tin tức">Tin tức</a>
            </li>
            <li class="ml-auto li-last">

                <div class="search w-clear">
                    <input type="text" id="keyword" name="keyword" placeholder="Nhập từ khoá..." />
                    <a type="button" class="btn-search"><i class="fas fa-search"></i></a>
                </div>

                <a href="{{ route('lay-gio-hang') }}" class="li-cart d-block">
                    <div class="cart">
                        <div class="ico-cart">
                            <i class="fa-solid fa-cart-shopping"></i>
                        </div>
                        <div class="quantity-item">
                            {{ is_array(session('cart')) ? count(session('cart')) : 0}}
                        </div>
                    </div>
                </a>
            </li>
        </ul>
    </div>
</div>

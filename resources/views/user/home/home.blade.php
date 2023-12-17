@extends('user.index')
@section('body')
    @if(count($dsProductNew))
    <div class="box-sanpham-tc">
        <div class="wap_1200">
            <div class="box-title">
                <div class="title-main"><span>Sản phẩm mới</span></div>
                <div class="deco"></div>
            </div>
            <div class="page_moi css_flex_ajax">
                @foreach ($dsProductNew as $item)
                    <div class="product">
                        <a href="{{ route('chi-tiet-product', ['id'=>$item->id]) }}" class="box-product text-decoration-none">
                            <p class="pic-product scale-img">
                                <img class="" onerror="src='{{ asset('assets/admin/images/noimage.png') }}'"
                                    src="{{ asset('upload/product/' . $item->photo) }}" style=""
                                    alt="{{ $item->name }}" />
                            </p>
                            <div class="info-product">
                                <h3 class="name-product text-split">{{ $item->name }}</h3>

                            </div>
                        </a>
                        <div class="layout-price">
                            <p class="price-product">
                                <span class="label-price">Giá:</span>
                                @if ($item->sale_price > 0)
                                    <span class="price-new">{{ formatMoney($item->sale_price) }}</span>
                                    <span class="price-old">{{ formatMoney($item->price_regular) }}</span>
                                    <span
                                        class="price-per">- {{ round(100 - ($item->sale_price / $item->price_regular) * 100) }}%</span>
                                @else
                                    <span
                                        class="price-new">{{ formatMoney($item->price_regular) ? formatMoney($item->price_regular) : 'Liên hệ' }}</span>
                                @endif
                            </p>

                            <a class="cart-product text-decoration-none" href="{{ route('chi-tiet-product', ['id'=>$item->id]) }}">
                                <span class="btn-add cart-add addcart">
                                    <i class="fa-solid fa-arrow-right-to-bracket"></i>
                                </span>
                            </a>
                        </div>
                    </div>
                @endforeach

            </div>
            @if(count($dsProductNew) > 8)
                <p class="xemthem-sp"><a href="{{route('lay-ds-product')}}" class="text-decoration-none">Xem thêm</a></p>
            @endif
        </div>
    </div>
    @endif
    <div class="box-gioithieu">
        <div class="wap_1200">
            <div class="wap_gioithieu">
                <div class="wap_left">
                    <a class="pic-gioithieu" href="gioi-thieu" target="_blank">
                        <div class="scale-img"><img src="{{ asset('assets/user/images/pic-gt1.png') }}" /></div>
                    </a>
                </div>
                <div class="wap_center">
                    <div class="title-main">
                        <?php /*<p><?=substr($get_1bv['name'.$lang], 0,30)?> ?> ?> ?> ?> ?></p>
                        <span><?= substr($get_1bv['name' . $lang], 30) ?></span>*/?>
                        <span>Giới thiệu về công ty</span>
                    </div>
                    <div class="desc-main w-clear catchuoi6">
                        C# (hay C sharp) là một ngôn ngữ lập trình đơn giản, được phát triển bởi đội ngũ kỹ sư của Microsoft
                        vào năm 2000. C# là ngôn ngữ lập trình hiện đại, hướng đối tượng và được xây dựng trên nền tảng của
                        hai ngôn ngữ mạnh nhất là C++ và Java.
                        Trong các ứng dụng Windows truyền thống, mã nguồn chương trình được biên dịch trực tiếp thành mã
                        thực thi của hệ điều hành.
                        Trong các ứng dụng sử dụng .NET Framework, mã nguồn chương trình (C#, VB.NET) được biên dịch thành
                        mã ngôn ngữ trung gian MSIL (Microsoft intermediate language).
                        Sau đó mã này được biên dịch bởi Common Language Runtime (CLR) để trở thành mã thực thi của hệ điều
                        hành. Hình bên dưới thể hiện quá trình chuyển đổi MSIL code thành Native Code.
                    </div>
                    <div class="btn-xemthem">
                        <a href="gioi-thieu" class="text-decoration-none">Xem thêm</a>
                    </div>
                </div>
                <div class="wap_right">
                    <a class="pic-gioithieu" href="gioi-thieu" target="_blank">
                        <div class="scale-img"><img src="{{ asset('assets/user/images/pic-gt2.png') }}" /></div>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="box-sanpham-tc">
        <div class="wap_1200">
            <div class="box-title">
                <div class="title-main"><span>Sản phẩm nổi bật</span></div>
                <div class="deco"></div>
            </div>
            <div class="chay-sp">
                @foreach ($dsProductOutsanding as $item)
                    <div class="product">
                        <a href="{{ route('chi-tiet-product', ['id'=>$item->id]) }}" class="box-product text-decoration-none">
                            <p class="pic-product scale-img">
                                <img class="rounded" onerror="src='{{ asset('assets/admin/images/noimage.png') }}'"
                                    src="{{ asset('upload/product/' . $item->photo) }}" alt="Alt Photo" style=""
                                    alt="{{ $item->name }}" />
                            </p>
                            <div class="info-product">
                                <h3 class="name-product text-split">{{ $item->name }}</h3>

                            </div>
                        </a>
                        <div class="layout-price">


                            <p class="price-product">
                                <span class="label-price">Giá:</span>
                                @if ($item->sale_price > 0)
                                    <span class="price-new">{{ formatMoney($item->sale_price) }}</span>
                                    <span class="price-old">{{ formatMoney($item->price_regular) }}</span>
                                    <span
                                        class="price-per">- {{ round(100 - ($item->sale_price / $item->price_regular) * 100) }}%</span>
                                @else
                                    <span
                                        class="price-new">{{ formatMoney($item->price_regular) ? formatMoney($item->price_regular) : 'Liên hệ' }}</span>
                                @endif
                            </p>

                            <a class="cart-product text-decoration-none" href="{{ route('chi-tiet-product', ['id'=>$item->id]) }}">
                                <span class="btn-add cart-add addcart">
                                    <i class="fa-solid fa-arrow-right-to-bracket"></i>
                                </span>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="box-tintuc-video">
        <div class="wap_1200">
            <div class="wap-tin-video">
                <div class="left-intro">
                    <p class="title-intro"><span>Video clip</span></p>
                    <div class="videohome-intro" id="video-select">
                        <div class="video-main">
                            <img src="{{ asset('assets/user/images/video.jpg') }}">
                        </div>
                        <select class="listvideos">
                            <?php for ($i=0; $i < 4; $i++) { ?>
                            <option value="video {{ $i + 1 }}">video {{ $i + 1 }}</option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="right-intro">
                    <p class="title-intro"><span>Tin tức mới</span></p>
                    <div class="newshome-intro chay-tt w-clear">
                        {{-- /308x208x1/ --}}
                        <a class="news text-decoration-none w-clear" href="" title="">
                            <p class="pic-news scale-img"><img src="{{ asset('assets/user/images/poduct-7.jpg') }}"></p>
                            <div class="info-news">
                                <div class="time-type">
                                    <p class="type-news">Loại bài viết</p>
                                    <p class="time-news">09/12/2022</p>
                                </div>
                                <h3 class="name-news">Tên tin tức</h3>
                                <div class="desc-news text-split">Giày là một món đồ thời trang tạo nên phong cách của
                                    người dùng, không chỉ vậy mà giày còn là phụ kiện giúp bảo vệ đôi chân của bạn trong mọi
                                    hoạt động hàng ngày. thường được làm từ chất liệu da, gỗ, vải,... Tuy nhiên, khi công
                                    nghệ sản xuất phát triển thì giày được làm từ cao su, nhựa và các vật liệu hoá dầu khác.
                                    Tùy vào mục đích sử dụng và giới tính, mỗi hãng giày sẽ cho ra đời những kiểu dáng giày
                                    phù hợp.</div>
                                <div class="xemchitiet"><span>Xem chi tiết <i class="fas fa-arrow-right"></i></span></div>
                            </div>
                        </a>
                        <a class="news text-decoration-none w-clear" href="" title="">
                            <p class="pic-news scale-img"><img src="{{ asset('assets/user/images/poduct-8.jpg') }}"></p>
                            <div class="info-news">
                                <div class="time-type">
                                    <p class="type-news">Loại bài viết</p>
                                    <p class="time-news">09/12/2022</p>
                                </div>
                                <h3 class="name-news">Tên tin tức</h3>
                                <div class="desc-news text-split">Giày là một món đồ thời trang tạo nên phong cách của
                                    người dùng, không chỉ vậy mà giày còn là phụ kiện giúp bảo vệ đôi chân của bạn trong mọi
                                    hoạt động hàng ngày. thường được làm từ chất liệu da, gỗ, vải,... Tuy nhiên, khi công
                                    nghệ sản xuất phát triển thì giày được làm từ cao su, nhựa và các vật liệu hoá dầu khác.
                                    Tùy vào mục đích sử dụng và giới tính, mỗi hãng giày sẽ cho ra đời những kiểu dáng giày
                                    phù hợp.</div>
                                <div class="xemchitiet"><span>Xem chi tiết <i class="fas fa-arrow-right"></i></span></div>
                            </div>
                        </a>
                        <a class="news text-decoration-none w-clear" href="" title="">
                            <p class="pic-news scale-img"><img src="{{ asset('assets/user/images/poduct-9.jpg') }}"></p>
                            <div class="info-news">
                                <div class="time-type">
                                    <p class="type-news">Loại bài viết</p>
                                    <p class="time-news">09/12/2022</p>
                                </div>
                                <h3 class="name-news">Tên tin tức</h3>
                                <div class="desc-news text-split">Giày là một món đồ thời trang tạo nên phong cách của
                                    người dùng, không chỉ vậy mà giày còn là phụ kiện giúp bảo vệ đôi chân của bạn trong mọi
                                    hoạt động hàng ngày. thường được làm từ chất liệu da, gỗ, vải,... Tuy nhiên, khi công
                                    nghệ sản xuất phát triển thì giày được làm từ cao su, nhựa và các vật liệu hoá dầu khác.
                                    Tùy vào mục đích sử dụng và giới tính, mỗi hãng giày sẽ cho ra đời những kiểu dáng giày
                                    phù hợp.</div>
                                <div class="xemchitiet"><span>Xem chi tiết <i class="fas fa-arrow-right"></i></span></div>
                            </div>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

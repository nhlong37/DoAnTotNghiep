@extends('user.index')
@section('body')
@if (count($dsProductNew))
<div class="box-sanpham-tc">
    <div class="wap_1200">
        <div class="box-title">
            <div class="title-main"><span>Sản phẩm mới</span></div>
            <div class="deco"></div>
        </div>
        <div class="page_moi css_flex_ajax">
            @foreach ($dsProductNew as $item)
            <div class="product">
                <a href="{{ route('chi-tiet-product', ['id' => $item->id]) }}" class="box-product text-decoration-none">
                    <p class="pic-product scale-img">
                        <img class="" onerror="src='{{ asset('assets/admin/images/noimage.png') }}'"
                            src="{{ asset('upload/product/' . $item->photo) }}" style="" alt="{{ $item->name }}" />
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
                        <span class="price-per">-
                            {{ round(100 - ($item->sale_price / $item->price_regular) * 100) }}%</span>
                        @else
                        <span class="price-new">{{ formatMoney($item->price_regular) ? formatMoney($item->price_regular)
                            : 'Liên hệ' }}</span>
                        @endif
                    </p>

                    <a class="cart-product text-decoration-none"
                        href="{{ route('chi-tiet-product', ['id' => $item->id]) }}">
                        <span class="btn-add cart-add addcart">
                            <i class="fa-solid fa-arrow-right-to-bracket"></i>
                        </span>
                    </a>
                </div>
            </div>
            @endforeach

        </div>
        @if (count($dsProductNew) > 8)
        <p class="xemthem-sp"><a href="{{ route('lay-ds-product') }}" class="text-decoration-none">Xem thêm</a>
        </p>
        @endif
    </div>
</div>
@endif
<div class="box-gioithieu">
    <div class="wap_1200">
        <div class="wap_gioithieu">
            <div class="wap_left">
                <a class="pic-gioithieu" href="" target="_blank">
                    <div class="scale-img"><img src="{{ asset('assets/user/images/pic-gt1.png') }}" /></div>
                </a>
            </div>
            <div class="wap_center">
                <div class="title-main">
                    <?php /*<p><?=substr($get_1bv['name'.$lang], 0,30)?> ?> ?> ?> ?> ?> ?> ?></p>
                    <span>
                        <?= substr($get_1bv['name' . $lang], 30) ?>
                    </span>*/?>
                    <span>Giới thiệu về website</span>
                </div>
                <div class="desc-main w-clear catchuoi6">
                    HL Shoes Store được đông đảo người tiêu dùng Việt, đặc biệt là tại TPHCM biết tới là một đơn vị uy
                    tín, đã có trên 3 năm kinh nghiệm trong lĩnh vực ohana phối sỉ và lẻ hàng chính hãng, đặc biệt là
                    hàng thể thao. Hiện đơn vị đang tọa lạc tại địa chỉ Đường Số 1, Trường Thọ, TP Thủ Đức.
                </div>
                <div class="btn-xemthem">
                    <a href="" class="text-decoration-none">Xem thêm</a>
                </div>
            </div>
            <div class="wap_right">
                <a class="pic-gioithieu" href="" target="_blank">
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
                <a href="{{ route('chi-tiet-product', ['id' => $item->id]) }}" class="box-product text-decoration-none">
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
                        <span class="price-per">-
                            {{ round(100 - ($item->sale_price / $item->price_regular) * 100) }}%</span>
                        @else
                        <span class="price-new">{{ formatMoney($item->price_regular) ? formatMoney($item->price_regular)
                            : 'Liên hệ' }}</span>
                        @endif
                    </p>

                    <a class="cart-product text-decoration-none"
                        href="{{ route('chi-tiet-product', ['id' => $item->id]) }}">
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

        <div class="right-intro" style="width:100%">
            <p class="title-intro"><span>Tin tức mới</span></p>
            <div class="newshome-intro chay-tt w-clear">
                {{-- /308x208x1/ --}}
                @foreach ($dsNewsOutsanding as $item)
                <div class="news text-decoration-none w-clear">
                    <p class="pic-news scale-img"><img class="rounded"
                            onerror="src='{{ asset('assets/admin/images/noimage.png') }}'"
                            src="{{ asset('upload/article/' . $item->photo) }}" alt="Alt Photo" style=""
                            alt="{{ $item->name }}" /></p>
                    <div class="info-news">
                        <h3 class="name-news">{{ $item->name }}</h3>
                        <div class="desc-news text-split">{!! htmlspecialchars_decode($item->content) !!}</div>
                        <div class="xemchitiet"><a href="{{ route('chi-tiet-news', ['id'=>$item->id]) }}" title="{{ $item->name }}"><span>Xem chi tiết <i
                                        class="fas fa-arrow-right"></i></span></a></div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
@extends('user.index')
@section('body')
@if (count($dsProductNew))
<div class="box-sanpham-tc">
    <div class="wap_1200">
        <div class="box-title">
            <div class="title-main"><span>Sản phẩm mới</span></div>
            <div class="deco"></div>
        </div>
        <div class="chay-sp1 arrow-run">
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
    </div>
</div>
@endif

<div class="box-sanpham-tc">
    <div class="wap_1200">
        <div class="box-title">
            <div class="title-main"><span>Sản phẩm nổi bật</span></div>
            <div class="deco"></div>
        </div>
        <div class="chay-sp2 arrow-run">
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

<div class="box-sanpham-tc">
    <div class="wap_1200">
        <div class="box-title">
            <div class="title-main"><span>Sản phẩm khuyến mãi</span></div>
            <div class="deco"></div>
        </div>
        <div class="chay-sp3 arrow-run">
            @foreach ($dsProductDiscount as $item)
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
                        <h3 class="name-news text-split">{{ $item->name }}</h3>
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

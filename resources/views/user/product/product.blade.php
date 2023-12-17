@extends('user.index')
@section('body')
    <div class="wap_1200">
        <div class="template-pro">

            <div class="title-main"><span>Sản phẩm</span></div>
            <div class="content-main w-clear">
                @if (count($dsProduct))
                    <div class="css_flex_ajax">
                        @foreach ($dsProduct as $item)
                            <div class="product">
                                <a href="{{ route('chi-tiet-product', ['id' => $item->id]) }}"
                                    class="box-product text-decoration-none">
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
                                                class="price-per">-{{ round(100 - ($item->sale_price / $item->price_regular) * 100) }}%</span>
                                        @else
                                            <span
                                                class="price-new">{{ $item->price_regular > 0 ? formatMoney($item->price_regular) : 'Liên hệ' }}</span>
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
                @else
                    <div class="col-12">
                        <div class="alert alert-warning w-100" role="alert">
                            <strong>Không có sản phẩm nào!!!</strong>
                        </div>
                    </div>
                @endif
            </div>
            <div class="col-12">
                @if (count($dsProduct))
                    <div class="pagination-home w-100">
                        {!! $dsProduct->links() !!}
                    </div>
                @endif
            </div>

        </div>
    </div>
@endsection

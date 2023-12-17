@extends('user.index')
@section('body')
    <div class="wap_1200 layout-cart">
        <form class="form-cart validation-cart" action="{{ route('thanh-toan') }}" method="POST" id="form-cart"
            enctype="multipart/form-data">
            @csrf
            <div class="wrap-cart">
                @if (session('cart'))
                    <div class="row">
                        <div class="top-cart col-12 col-lg-7">
                            <p class="title-cart">Giỏ hàng của bạn:</p>
                            <div class="list-procart">
                                <div class="procart procart-label">
                                    <div class="form-row">
                                        <div class="pic-procart label-pro col-3 col-md-2">Hình ảnh</div>
                                        <div class="info-procart label-pro col-6 col-md-5">Thông tin sản phẩm</div>
                                        <div class="quantity-procart label-pro col-3 col-md-2"> Số lượng </div>
                                        <div class="price-procart label-pro col-3 col-md-3">Đơn giá</div>
                                    </div>
                                </div>

                                @foreach (session('cart') as $i => $details)
                                    @php
                                        $pid = $details['id_product'];
                                        $quantity = $details['quantity'];
                                        $color = $details['id_color'] ? $details['id_color'] : 0;
                                        $size = $details['id_size'] ? $details['id_size'] : 0;
                                        $code = $details['code'] ? $details['code'] : '';
                                        
                                        $proinfo = getProductInfo($pid);
                                        $pro_price = $proinfo['price_regular']; //Giá 1 sp
                                        $pro_price_new = $proinfo['sale_price']; //Giá mới 1 sp
                                        
                                        $pro_price_qty = $pro_price * $quantity; //Giá sau khi nhân số lượng
                                        $pro_price_new_qty = $pro_price_new * $quantity; //Giá mới sau khi nhân số lượng
                                        
                                        $nameColor = $colors->where('id', '=', $color)->first();
                                        $nameSize = $sizes->where('id', '=', $size)->first();
                                    @endphp
                                    <div class="procart">
                                        <div class="form-row">
                                            <div class="pic-procart col-3 col-md-2">
                                                <a class="text-decoration-none" href="" target="_blank"
                                                    title="">
                                                    <img class=""
                                                        onerror="src='{{ asset('assets/admin/images/noimage.png') }}'"
                                                        src="{{ asset('upload/product/' . $details['image']) }}"
                                                        style="" alt="" />
                                                </a>
                                                <a class="del-procart text-decoration-none" data-code="{{ $code }}">
                                                    <i class="fa fa-times-circle"></i>
                                                    <span>xoá</span>
                                                </a>
                                            </div>
                                            <div class="info-procart col-6 col-md-5">
                                                <h3 class="name-procart"><a class="text-decoration-none" href=""
                                                        target="_blank" title="">{{ $details['name'] }}</a></h3>
                                                <div class="properties-procart">

                                                    <p>Màu: <strong>
                                                            {{ isset($nameColor) ? $nameColor['name'] : 'Chưa chọn màu' }}
                                                        </strong></p>

                                                    <p>Size: <strong>
                                                            {{ isset($nameSize) ? $nameSize['name'] : 'Chưa chọn size' }}
                                                        </strong></p>

                                                </div>
                                            </div>
                                            <div class="quantity-procart col-3 col-md-2">
                                                <div class="quantity-counter-procart">
                                                    <span class="quantity-minus-pro-detail decrease"><i
                                                            class="fa-solid fa-minus"></i></span>
                                                    <input type="number" class="quantity-procart" min="1"
                                                        value="{{ $quantity }}" data-pid="{{ $pid }}"
                                                        data-code="{{ $code }}" readonly />
                                                    <span class="quantity-plus-pro-detail increase"><i
                                                            class="fa-solid fa-plus"></i></span>
                                                </div>
                                                <div class="show-available mt-2">Còn <span
                                                        class="quantity-available">{{ $details['available'] }}</span> sản
                                                    phẩm</div>
                                            </div>
                                            <div class="price-procart col-3 col-md-3">
                                                <div class="price-procart price-procart-rp">
                                                    @if ($pro_price_new_qty > 0)
                                                        <p class="price-new-cart load-price-new-{{ $code }}">
                                                            {{ formatMoney($pro_price_new_qty) }}</p>
                                                        <p class="price-old-cart load-price-{{ $code }}">
                                                            {{ formatMoney($pro_price_qty) }}</p>
                                                    @else
                                                        <p class="price-new-cart load-price-{{ $code }}">
                                                            {{ formatMoney($pro_price_qty) }}</p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                <div class="total-procart">
                                    <p class="label-pro">Tổng giá trị đơn hàng:</p>
                                    <p class="total-price load-price-total">{{ formatMoney(getOrderTotal()) }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="bottom-cart col-12 col-lg-5">
                            <div class="section-cart">
                                <p class="title-cart">Hình thức thanh toán:</p>
                                <div class="information-cart">

                                    <div class="payments-cart custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" id="payments" name="payments"
                                            value="1" checked />
                                        <label class="payments-label custom-control-label" for="payments">Thanh toán khi
                                            nhận hàng</label>
                                    </div>

                                </div>
                                <p class="title-cart">Thông tin giao hàng:</p>
                                <div class="information-cart">
                                    <div class="form-row">
                                        <div class="input-cart col-md-6">
                                            <input type="text" class="form-control text-sm field-name" id="fullname"
                                                name="fullname" placeholder="Họ tên"
                                                value="{{ !empty(Auth::guard('user')->user()->id) ? Auth::guard('user')->user()->username : '' }}" />
                                        </div>
                                        <div class="input-cart col-md-6">
                                            <input type="number" class="form-control text-sm field-phone" id="phone"
                                                name="phone" placeholder="Số điện thoại"
                                                value="{{ !empty(Auth::guard('user')->user()->id) ? Auth::guard('user')->user()->phone : '' }}" />
                                        </div>
                                    </div>
                                    <div class="input-cart">
                                        <input type="email" class="form-control text-sm field-email" id="email"
                                            name="email" placeholder="Email"
                                            value="{{ !empty(Auth::guard('user')->user()->id) ? Auth::guard('user')->user()->email : '' }}" />
                                    </div>
                                    <div class="input-cart">
                                        <input type="text" class="form-control text-sm field-address" id="address"
                                            name="address" placeholder="Địa chỉ"
                                            value="{{ !empty(Auth::guard('user')->user()->id) ? Auth::guard('user')->user()->address : '' }}" />
                                    </div>
                                    <div class="input-cart">
                                        <textarea class="form-control text-sm" id="requirements" name="requirements" placeholder="Yêu cầu khác"></textarea>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-dark btn-payment w-100" name="thanhtoan">Đặt hàng</button>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="wrap-empty">
                        <a href="{{ route('trang-chu-user') }}" class="empty-cart text-decoration-none w-100">
                            <img src="{{ asset('assets/user/images/empty.png') }}">
                            <p>Không tồn tại sản phẩm nào trong giỏ hàng!!!</p>
                            <span class="btn btn-dark btn-sm">Về trang chủ</span>
                        </a>
                    </div>
                @endif
            </div>
        </form>
    </div>
@endsection

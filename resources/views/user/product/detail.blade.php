@extends('user.index')
@section('body')
<div class="wap_detail">
    <div class="grid-pro-detail w-clear" data-id="{{ $rowDetail->id }}">
        <div class="row">
            <div class="left-pro-detail col-md-6 col-lg-6 mb-4">
                <div class="photo-prodetail">
                    <div class="chay-photo">
                        <div class="item-gallery">
                            <img class="rounded" onerror="src='{{ asset('assets/admin/images/noimage.png') }}'"
                                src="{{ asset('upload/product/' . $rowDetail->photo) }}" style="" />
                        </div>
                        @foreach ($dsGallery as $item)
                        <div class="item-gallery">
                            <a class="thumb-pro-detail">
                                <img class="rounded" onerror="src='{{ asset('assets/admin/images/noimage.png') }}'"
                                    src="{{ asset('upload/album/' . $item->photo) }}" style="" />
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
                @if (!empty($dsGallery))
                <div class="list-gallery">
                    <div class="chay-gallery">
                        @foreach ($dsGallery as $item)
                        <div class="item-gallery">
                            <a class="thumb-pro-detail">
                                <img class="rounded" onerror="src='{{ asset('assets/admin/images/noimage.png') }}'"
                                    src="{{ asset('upload/album/' . $item->photo) }}" style="" />
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif

            </div>
            <div class="right-pro-detail col-md-6 col-lg-6 mb-4">
                <p class="title-pro-detail mb-2">
                    <?= $rowDetail->name ?>
                </p>
                <ul class="attr-pro-detail">
                    <li class="w-clear">
                        <label class="attr-label-pro-detail">Mã:</label>
                        <div class="attr-content-pro-detail">{{ $rowDetail->code }}</div>
                    </li>
                    <li class="w-clear">
                        <label class="attr-label-pro-detail">Giá:</label>
                        <div class="attr-content-pro-detail">
                            @if ($rowDetail->sale_price > 0)
                            <span class="price-new-pro-detail">{{ formatMoney($rowDetail->sale_price) }}</span>
                            <span class="price-old-pro-detail">{{ formatMoney($rowDetail->price_regular) }}</span>
                            @else
                            <span class="price-new-pro-detail">{{ $rowDetail->price_regular > 0 ?
                                formatMoney($rowDetail->price_regular) : 'Liên hệ' }}
                            </span>
                            @endif
                        </div>
                    </li>
                    <li class="w-clear">
                        <label class="attr-label-pro-detail">Tổng số sao:</label>
                        <div class="attr-content-pro-detail">
                            <span class="price-new-pro-detail">
                                @for ($count = 1; $count <= 5; $count++) @php if ($count <=$rating) {
                                    $color='color:#ffcc00;' ; } else { $color='color:#ccc;' ; } @endphp <span
                                    title="Đánh giá số sao" id="{{ $rowDetail->id }}-{{ $count }}"
                                    data-index="{{ $count }}" data-product_id="{{ $rowDetail->id }}"
                                    style="cursor:pointer; {{ $color }}; font-size:30px;" data-rating="{{ $rating }}">
                                    &#9733;
                            </span>
                            @endfor
                            </span>
                        </div>
                    </li>
                    <li class="w-clear">
                        <label class="attr-label-pro-detail d-block">Số lượng:</label>
                        <div class="attr-content-pro-detail d-flex align-items-center ">
                            <div class="quantity-pro-detail">
                                <span class="quantity-minus-pro-detail decrease"><i
                                        class="fa-solid fa-minus"></i></span>
                                <input type="number" class="qty-pro" min="1" value="1" readonly />
                                <span class="quantity-plus-pro-detail increase"><i class="fa-solid fa-plus"></i></span>
                            </div>
                            <div class="show-available ml-4">Còn <span class="quantity-available">0</span> sản phẩm có
                                sẵn</div>
                        </div>
                    </li>
                    <input type="hidden" value="{{ $rowDetail->id }}" class="id-pro-detail" />
                    <li class="size-block-pro-detail w-clear">
                        <label class="attr-label-pro-detail d-block">Size:</label>
                        <div class="attr-content-pro-detail d-block">
                            @if (count($rowSize))
                            @foreach ($rowSize as $k => $v)
                            <label for="size-pro-detail-{{ $v->id }}" class="size-pro-detail text-decoration-none">
                                <input type="radio" value="{{ $v->id }}" id="size-pro-detail-{{ $v->id }}"
                                    name="size-pro-detail">
                                {{ $v->name }}
                            </label>
                            @endforeach
                            @else
                            Chưa có size
                            @endif
                        </div>
                    </li>

                    <li class="color-block-pro-detail w-clear">
                        <label class="attr-label-pro-detail d-block">Màu sắc:</label>
                        <div class="attr-content-pro-detail d-block">
                            @if (count($rowColor))
                            @foreach ($rowColor as $k => $v)
                            <label for="color-pro-detail-{{ $v->id }}" class="color-pro-detail text-decoration-none"
                                data-idproduct="{{ $rowDetail->id }}" style="background-color: {{ $v->code }}">
                                <input type="radio" value="{{ $v->id }}" id="color-pro-detail-{{ $v->id }}"
                                    name="color-pro-detail">
                            </label>
                            @endforeach
                            @else
                            Chưa có màu sắc
                            @endif
                        </div>
                    </li>
                </ul>
                <div class="cart-pro-detail">
                    <a class="btn btn-success add-cart rounded-0 mr-2" data-id="{{ $rowDetail->id }}">
                        <div class="bg-add">
                            <i class="fas fa-cart-plus mr-1"></i>
                            <span>Thêm vào giỏ hàng</span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home"
                    aria-selected="true">Thông tin sản phẩm</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="comment-tab" data-toggle="tab" href="#comment" role="tab"
                    aria-controls="comment" aria-selected="true">Đánh giá</a>
            </li>
        </ul>
        <div class="tab-content pt-4 pb-4" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                @if (!empty($rowDetail->content))
                <div class="w-clear" id="content">{!! htmlspecialchars_decode($rowDetail->content) !!}</div>
                @else
                <div class="col-12 text-2xl">
                    Thông tin đang cập nhật
                </div>
                @endif
            </div>

            <div class="tab-pane fade" id="comment" role="tabpanel" aria-labelledby="comment-tab">
                <div class="col-sm-12" id="comment_style">
                    <form>
                        @csrf
                        <div id="comment_show"></div>
                        <input type="hidden" class="id_product" data-status="0" name="id_product"
                            value="{{ $rowDetail->id }}" />
                        @if(Auth::guard('user')->check())
                        <input type="hidden" class="id_user" name="id_user"
                            value="{{ Auth::guard('user')->user()->id }}" />
                        <input type="hidden" class="avatar" name="avatar"
                            value="{{ Auth::guard('user')->user()->avatar }}" />
                        @else
                        <input type="hidden" class="" name="" value="" />
                        <input type="hidden" class="" name="" value="" />
                        @endif
                        <!-- <div class="row  style_comment" style="background-color: #F0FFFF">
                                    <div class="col-sm-2">
                                        <input type="hidden" class="comment_product_id" name="comment_product_id"
                                            value="{{ $rowDetail->id }}" />
                                        <img width="200px" src="{{ asset('.upload/avatar/avatar.png') }}"
                                            class="img img-avatar" />
                                    </div>
                                    <div class="col-sm-10">
                                        <p style="color: blue">@Hung</p>
                                        <p>
                                            C# (hay C sharp) là một ngôn ngữ lập trình đơn giản, được phát triển bởi đội ngũ kỹ
                                            sư
                                            của Microsoft
                                            vào năm 2000. C# là ngôn ngữ lập trình hiện đại, hướng đối tượng và được xây dựng
                                            trên
                                            nền tảng của
                                            hai ngôn ngữ mạnh nhất là C++ và Java.
                                            Trong các ứng dụng Windows truyền thống, mã nguồn chương trình được biên dịch trực
                                            tiếp
                                            thành mã
                                            thực thi của hệ điều hành.
                                        </p>
                                    </div>
                                </div> -->
                    </form>
                    @if(Auth::guard('user')->check())
                    @foreach($id_order_product as $k => $id_user)
                    @if(Auth::guard('user')->user()->id==$id_user->id_user)
                    <form action="#">
                        @csrf
                        <p><b>Viết đánh giá của bạn</b></p>
                        <div class="col">
                            <div class="row">
                                <ul class="list-inline rating" title="Average Rating">
                                    <div class="row-md-10">
                                        @for ($count = 1; $count <= 5; $count++) @php if ($count <=$rating) {
                                            $color='color:#ffcc00;' ; } else { $color='color:#ccc;' ; } @endphp <span
                                            title="Đánh giá số sao" id="{{ $rowDetail->id }}-{{ $count }}"
                                            data-index="{{ $count }}" data-product_id="{{ $rowDetail->id }}"
                                            data-id_user="{{Auth::guard('user')->user()->id}}"
                                            style="cursor:pointer; {{ $color }}; font-size:30px;"
                                            data-rating="{{ $rating }}" class="rating">
                                            &#9733;
                                            </span>
                                            @endfor
                                    </div>
                                </ul>

                            </div>
                        </div>
                        <div class="col-md-12 comment_style">
                            <span>
                                <textarea name="content" class="form-control content" placeholder="Nội dung bình luận"
                                    rows="5"></textarea>
                            </span>
                            <div class="notify_comment">
                                <p></p>
                            </div>
                            <button type="button" class="btn btn-warning send-comment">Gửi bình luận</button>
                        </div>
                    </form>
                    @break
                    @endif
                    @endforeach
                    @endif
                </div>
            </div>
        </div>

        {{-- <ul class="nav nav-tabs" id="myTab" role="tablist">

        </ul>
        <div class="tab-content pt-4 pb-4" id="myTabContent">

        </div> --}}
    </div>
</div>
@endsection
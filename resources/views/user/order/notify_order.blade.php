@extends('user.index')
@section('body')
<div class="wrap-invoice">
    <div class="layout-invoice">
        <div class="text-center mb-4">
            <div class="title-receive">
                <img src="{{ asset('assets/user/images/nutcheck.png') }}" alt="Icon">
                <span>Thông báo</span>
            </div>
            <p class="slogan-receive">
                Cảm ơn quý khách đã đặt hàng tại <a href="<?php //$optsetting['website'] ?>" class="slogan-receive__link" target="_blank"><?php //$optsetting['website'] ?></a>
            </p>
            <p class="slogan-receive">
                Đơn hàng <span class="slogan-receive__code"><?php //$invoice['code'] ?></span> đã được tiếp nhận. Chúng tôi sẽ liên lạc với quý khách trong vòng 24h để xác nhận đơn hàng
            </p>
            <p class="slogan-receive">
                Nếu quý khách có yêu cầu đặc biệt, vui lòng liên hệ chúng tôi tại <a href="<?php //$optsetting['fanpage'] ?>" class="slogan-receive__link" target="_blank" title="Facebook">Facebook</a> hoặc
                Hotline: <a href="tel:<?php //preg_replace('/[^0-9]/', '', $optsetting['hotline']); ?>" title="Hotline" class="slogan-receive__link"><?php //$optsetting['hotline'] ?></a> - Zalo: <a href="https://zalo.me/<?php //preg_replace('/[^0-9]/', '', $optsetting['zalo']); ?>" title="Zalo" class="slogan-receive__link"><?php //$optsetting['zalo'] ?></a>
            </p>
        </div>

        <div class="top-invoice p-0 mb-4">
            <div class="info-receive">
                <div class="heading-receive">
                    <img src="{{ asset('assets/user/images/shopping-cart.png') }}" alt="Icon">
                    <span>Giỏ hàng của bạn</span>
                </div>
                <div class="all-receive">
                    <?php /*foreach ($invoice_detail as $key => $value) { ?>
                        <div class="item-receive">
                            <div class="item-receive__left">
                                <div class="item-receive__image">
                                    <img onerror="this.src='{{ asset('assets/admin/images/noimage.png') }}" src="" alt="" width="135" height="120">
                                </div>
                                <div class="item-receive__info">
                                    <p class="item-receive__name">Tên sản phẩm: <span><?= $value['name'] ?></span></p>
                                    <p class="item-receive__code">Mã sản phẩm: <span><?= $invoice['code'] ?></span></p>
                                </div>
                            </div>
                            <div class="item-receive__right">
                                <div class="item-receive__price">
                                    Giá:
                                    <?php if ($value['sale_price'] > 0 && $value['regular_price'] > 0) { ?>
                                        <span class="price-new"><?= $func->formatMoney($value['sale_price']) ?></span>
                                        <span class="price-old"><?= $func->formatMoney($value['regular_price']) ?></span>
                                    <?php } elseif ($value['regular_price'] > 0) { ?>
                                        <span class="price-new"><?= $func->formatMoney($value['regular_price']) ?></span>
                                    <?php } else { ?>
                                        <span class="price-new"><?= lienhe ?></span>
                                    <?php } ?>
                                </div>
                                <div class="item-receive__quantity">Số lượng: <span><?php // //$value['quantity'] ?></span></div>
                            </div>
                        </div>
                    <?php }*/ ?>
                    @foreach ($invoice_detail as $k => $v)
                        <div class="item-receive">
                            <div class="item-receive__left">
                                <div class="item-receive__image">
                                    <img onerror="this.src='{{ asset('assets/admin/images/noimage.png') }}" src="{{ asset('upload/product/' . $v->photo) }}" alt="" width="135" height="120">
                                </div>
                                <div class="item-receive__info">
                                    <p class="item-receive__name">Tên sản phẩm: <span><?= $v['name'] ?></span></p>
                                    <p class="item-receive__code">Mã sản phẩm: <span><?= $invoice['code'] ?></span></p>
                                </div>
                            </div>
                            <div class="item-receive__right">
                                <div class="item-receive__price">
                                    Giá:
                                    <?php if ($info_product['sale_price'] > 0 && $info_product['regular_price'] > 0) { ?>
                                        <span class="price-new"><?= $func->formatMoney($info_product['sale_price']) ?></span>
                                        <span class="price-old"><?= $func->formatMoney($info_product['regular_price']) ?></span>
                                    <?php } elseif ($info_product['regular_price'] > 0) { ?>
                                        <span class="price-new"><?= $func->formatMoney($info_product['regular_price']) ?></span>
                                    <?php } else { ?>
                                        <span class="price-new">Liên hệ</span>
                                    <?php } ?>
                                </div>
                                <div class="item-receive__quantity">Số lượng: <span><?php $v['quantity'] ?></span></div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>

            <div class="money-procart money-procart--detail border-0 pt-3 pb-3">
                <div class="total-procart d-flex align-items-center justify-content-between">
                    <p>Tổng tiền hàng <span class="tong-so-luong">(<span><?php count($invoice_detail) ?></span> sản phẩm)</span> :</p>
                    <p class="total-price load-price-total"><?php $func->formatMoney($invoice['total_price']) ?></p>
                </div>
            </div>
        </div>

        <div class="middle-invoice">
            <div class="heading-receive">
                <img src="{{ asset('assets/user/images/information-button.png') }}" alt="Icon">
                <span>Thông tin của bạn</span>
            </div>
            <table class="table table-borderless">
                <tbody>
                    <tr>
                        <th scope="row">Khách hàng:</th>
                        <td><?php // //$name_user['fullname'] ?></td>
                    </tr>
                    <?php if (!empty($invoice['address'])) { ?>
                        <tr>
                            <th scope="row">Địa chỉ nhận hàng:</th>
                            <td><?php // $name_user['address'] ?></td>
                        </tr>
                    <?php } else { ?>
                        <tr>
                            <th scope="row">Địa chỉ nhận hàng:</th>
                            <td><?php // $name_user['address'] ?></td>
                        </tr>
                    <?php } ?>
                    <tr>
                        <th scope="row">Số điện thoại:</th>
                        <td><?php // $name_user['phone'] ?></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="bottom-invoice">
            <div class="heading-receive">
                <img src="{{ asset('assets/user/images/coin.png') }}" alt="Icon">
                <span>Hình thức thanh toán</span>
            </div>
            <div class="layout-payment">
                <div class="name-payment"><?php // $payment['name' . $lang] ?></div>
            </div>
        </div>
    </div>
    <div class="back-home">
        <a href="<?php // $configBase ?>" class="text-decoration-none d-flex align-items-center justify-content-center">
            <img src="{{ asset('assets/user/images/muiten-tiepnhan.png') }}" alt="Icon">
            <span>Quay lại trang chủ</span>
        </a>
    </div>
</div>
@endsection
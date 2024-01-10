@extends('user.index')
@section('body')
    <div class="wap_detail_news">

        <div class="title-main"><span>{{ $rowDetail->name }}</span></div>
        <div class="time-main"><i class="fas fa-calendar-week"></i><span>Ngày đăng:
                <?= humanTiming($rowDetail->created_at) ?></span></div>
        @if (!empty($rowDetail->content))
            <div class="content-main autoHeight w-clear" id="toc-content">
                HL Shoe là một website bán giày chuyên nghiệp, uy tín, được nhiều khách hàng tin tưởng lựa chọn. Website cung cấp đa dạng các loại giày 
                từ giày thể thao, giày sneaker, ... với nhiều mẫu mã, kiểu dáng, màu sắc khác nhau, phù hợp với mọi nhu cầu và sở thích của khách hàng
                Website HL Shoe được thiết kế với giao diện thân thiện, dễ sử dụng, giúp khách hàng dễ dàng tìm kiếm và lựa chọn sản phẩm. Website cũng có đầy đủ các thông tin về sản phẩm, bao gồm hình ảnh, mô tả, giá cả,... 
                giúp khách hàng có thể tham khảo và đưa ra quyết định mua hàng chính xác. HL Shoe cam kết mang đến cho khách hàng những sản phẩm chất lượng, chính hãng với giá cả hợp lý. Website cũng có chính sách đổi trả hàng trong vòng 7 ngày nếu sản phẩm không đúng mẫu mã, kích cỡ, hoặc có lỗi do nhà sản xuất.
                <p>Dưới đây là một số ưu điểm nổi bật của website HL Shoe:</p>
                <ul>
                    <li>Đa dạng các loại giày với nhiều mẫu mã, kiểu dáng, màu sắc khác nhau, phù hợp với mọi nhu cầu và sở thích của khách hàng.</li>
                    <li>Thiết kế website thân thiện, dễ sử dụng, giúp khách hàng dễ dàng tìm kiếm và lựa chọn sản phẩm.</li>
                    <li>Cung cấp đầy đủ các thông tin về sản phẩm, giúp khách hàng có thể tham khảo và đưa ra quyết định mua hàng chính xác.</li>
                    <li>Cam kết mang đến cho khách hàng những sản phẩm chất lượng, chính hãng với giá cả hợp lý.</li>
                    <li>Có chính sách đổi trả hàng trong vòng 7 ngày nếu sản phẩm không đúng mẫu mã, kích cỡ, hoặc có lỗi do nhà sản xuất.</li>
                </ul>
            </div>
        @else
            <div class="alert alert-warning w-100" role="alert">
                <strong>Nội dung đang cập nhật</strong>
            </div>
        @endif
        @if (!empty($rowDetail->content))
            <div class="share">
                <b>Chia sẻ:</b>
                <div class="social-plugin w-clear">
                    <div class="a2a_kit a2a_kit_size_32 a2a_default_style" data-a2a-title="Share">
                        <a class="a2a_button_facebook"></a>
                        <a class="a2a_button_twitter"></a>
                        <a class="a2a_button_facebook_messenger"></a>
                        <a class="a2a_dd" href="https://www.addtoany.com/share"></a>
                    </div>
                    <style type="text/css">
                        .a2a_svg {
                            width: 30px !important;
                            height: 30px !important
                        }

                        .a2a_svg svg {
                            background-size: 22px 22px !important;
                            height: 22px !important;
                            width: 22px !important;
                            top: 50%;
                            left: 50%;
                            transform: translate(-50%, -50%);
                            margin: 0;
                        }
                    </style>
                </div>
            </div>
        @endif
    </div>
@endsection

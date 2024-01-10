@extends('user.index')
@section('body')
    <div class="wap_detail_news">

        <div class="title-main"><span>{{ $rowDetail->name }}</span></div>
        <div class="time-main"><i class="fas fa-calendar-week"></i><span>Ngày đăng:
                <?= humanTiming($rowDetail->created_at) ?></span></div>
        @if (!empty($rowDetail->content))
            <div class="content-main autoHeight w-clear" id="toc-content">{!! htmlspecialchars_decode($rowDetail->content) !!}</div>
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

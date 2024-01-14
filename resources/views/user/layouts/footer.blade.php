<div class="footer">
    <div class="footer-article">
        <div class="wrap-content wap_footer">

            <div class="footer-news" id="main_footer">
                <p class="footer-title">Liên hệ thông tin</p>
                <div class="footer-info">
                    <ul class="footer-ul">
                        <li>Địa chỉ: Đường số 1, Phường Trường Thọ, TP Thủ Đức</li>
                        <li>Email: hlshoestore@gmail.com</li>
                        <li>Hotline: 0362.243.977</li>
                    </ul>
                </div>
            </div>
            <div class="footer-news">
                <p class="footer-title">Chính sách</p>
                <ul class="footer-ul">
                    @foreach ($dsPolicies as $item)
                        <li><a href="{{ route('chi-tiet-policy', ['id' => $item->id]) }}"
                                title="{{ $item->name }}">{{ $item->name }}</a></li>
                    @endforeach
                </ul>
            </div>
            <div class="footer-news">
                <div class="fb-page" data-href="https://www.facebook.com/profile.php?id=61555313947383"
                    data-tabs="timeline" data-width="500" data-height="200" data-small-header="false"
                    data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
                    <blockquote cite="https://www.facebook.com/profile.php?id=61555313947383"
                        class="fb-xfbml-parse-ignore"><a
                            href="https://www.facebook.com/profile.php?id=61555313947383">HL Shoe Store</a></blockquote>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-powered">
        <div class="wrap-content">
            <div class="wap_copy">
                <p class="copyright">© Copyright 2024 <span>HL Shoe Store</span></p>
            </div>
        </div>
    </div>
</div>

{{-- <a class="btn-map btn-frame text-decoration-none" target="_blank" href="">
    <div class="animated infinite zoomIn kenit-alo-circle"></div>
    <div class="animated infinite pulse kenit-alo-circle-fill"></div>
    <i><img src="{{ asset('assets/user/images/maps.png') }}" alt="Bản đồ"></i>
</a>    
<a class="btn-zalo btn-frame text-decoration-none" target="_blank" href="">
    <div class="animated infinite zoomIn kenit-alo-circle"></div>
    <div class="animated infinite pulse kenit-alo-circle-fill"></div>
    <i><img src="{{ asset('assets/user/images/zl.png') }}" alt="Zalo"></i>
</a>
<a class="btn-phone btn-frame text-decoration-none" href="">
    <div class="animated infinite zoomIn kenit-alo-circle"></div>
    <div class="animated infinite pulse kenit-alo-circle-fill"></div>
    <i><img src="{{ asset('assets/user/images/hl.png') }}" alt="Hotline"></i>

</a> --}}

<a class="btn-messenger btn-frame text-decoration-none" href="https://www.messenger.com/t/61555313947383/" target="_blank">
    {{-- <div class="animated infinite zoomIn kenit-alo-circle"></div>
    <div class="animated infinite pulse kenit-alo-circle-fill"></div> --}}
    <i><img src="{{ asset('assets/user/images/ms.png') }}" alt="Messenger"></i>

</a>


<div class="progress-wrap cursor-pointer">
    <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
    </svg>
</div>



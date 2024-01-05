@extends('user.index')
@section('body')
    <div class="wap_1200">
        <div class="template-pro">
            <div class="title-main"><span>Tin tức</span></div>
            <div class="content-main w-clear">
                @if (count($dsNews))
                    <div class="css_flex_ajax">
                        @foreach ($dsNews as $item)
                            <div class="news text-decoration-none w-clear">
                                <p class="pic-news scale-img"><img class="rounded"
                                        onerror="src='{{ asset('assets/admin/images/noimage.png') }}'"
                                        src="{{ asset('upload/article/' . $item->photo) }}" alt="Alt Photo" style=""
                                        alt="{{ $item->name }}" /></p>
                                <div class="info-news">
                                    <h3 class="name-news">{{ $item->name }}</h3>
                                    <div class="desc-news text-split">{!! htmlspecialchars_decode($item->content) !!}</div>
                                    <div class="xemchitiet"><a href="" title="{{ $item->name }}"><span>Xem chi tiết
                                                <i class="fas fa-arrow-right"></i></span></a></div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="col-12">
                        <div class="alert alert-warning w-100" role="alert">
                            <strong>Không có tin tức nào!!!</strong>
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

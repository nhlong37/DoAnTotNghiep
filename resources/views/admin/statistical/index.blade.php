@extends('admin.index')
@section('body')
    <div class="content-wrapper">
        <section class="content-header text-sm">
            <div class="container-fluid">
                <div class="row">
                    <ol class="breadcrumb float-sm-left pl-3">
                        <li class="breadcrumb-item"><a href="{{ route('trang-chu-admin') }}" title="Bảng điều khiển">Bảng điều
                                khiển</a></li>
                        <li class="breadcrumb-item active">Thống kê</li>
                    </ol>
                </div>
            </div>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="flex_statistical">
                    <div class="item_statistical btn btn-sm bg-gradient-primary">
                        <a href="{{ route('loadstatistical',['type' => 'products']) }}">
                            <div class="content_statistical">
                                <p class="text-white">Xuất file excel danh sách sản phẩm</p>
                            </div>
                            <div class="img_statistical">
                            <ion-icon name="download-outline"></ion-icon>
                            </div>
                        </a>
                    </div>
                    {{-- <div class="item_statistical">
                        <a href="{{ route('loadstatisticalcate',['type' => 'products']) }}">
                            <div class="content_statistical">
                                <p>Xuất file excel danh sách sản phẩm theo danh mục cấp 1</p>
                            </div>
                            <div class="img_statistical">
                                <ion-icon name="download-outline"></ion-icon>
                            </div>
                        </a>
                    </div> --}}
                </div>
            </div>
        </section>
    </div>
@endsection

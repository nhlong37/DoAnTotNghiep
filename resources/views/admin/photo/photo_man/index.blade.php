@extends('admin.index')
@section('body')
    {{-- <div class="box_btn_search">
        <div class="flex_btn_search">
            <div class="btn_add"><a href="{{ route('loadaddphoto-admin', ['type' => $type_man, 'cate' => 'man']) }}">Thêm
                    mới</a></div>
            <div class="btn_delete_all">Xóa tất cả</div>
        </div>
    </div>
    <div class="box_table_list_product">
        <table class="table table_list_product align-middle">
            <thead>
                <tr class="sty_head_table">
                    <th></th>
                    <th class="text-center">STT</th>
                    <th class="text-center">Hình Ảnh</th>
                    <th class="text-center">Tên hình ảnh</th>
                    <th class="text-center">Link hình ảnh</th>
                    <th class="text-center">Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($photo as $k => $v)
                    <tr>
                        <td class="text-center">
                            <input class="sty_checkbox form-check-input" type="checkbox">
                        </td>
                        <td class="text-center">{{ $k + 1 }}</td>
                        <td class="text-center">
                            <a href="{{ route('loadupdatphoto', ['id' => $v['id'], 'type' => $type_man, 'cate' => 'man']) }}">
                                @if ($v['photo'] != null)
                                    <img class="img_main" src="{{ asset('upload/photo/' . $v['photo']) }}" width="100"
                                        height="100" alt="">
                                @else
                                    <img class="img_main" src="{{ asset('adminate/images/noimg.jpg') }}" width="100"
                                        height="100" alt="">
                                @endif
                            </a>
                        </td>
                        <td class="text-center">{{ $v['name'] }}</td>
                        <td class="text-center">{{ $v['link'] }}</td>
                        <td class="text-center">
                            <div class="flex_options">
                                <a
                                    href="{{ route('loadupdatphoto', ['id' => $v['id'], 'type' => $type_man, 'cate' => 'man']) }}"><span><ion-icon
                                            name="create-outline"></ion-icon></span></a>
                                <a class="delete_main" data-id="{{ $v['id'] }}" data-type_man="{{ $type_man }}"
                                    data-cate="man" data-type="photo"><span><ion-icon
                                            name="trash-outline"></ion-icon></span></a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div> --}}
    
    <div class="content-wrapper">
        <section class="content-header text-sm">
            <div class="container-fluid">
                <div class="row">
                    <ol class="breadcrumb float-sm-left pl-3">
                        <li class="breadcrumb-item"><a href="{{ route('trang-chu-admin') }}" title="Bảng điều khiển">Bảng điều
                                khiển</a></li>
                        <li class="breadcrumb-item active">Quản lý hình ảnh slideshow</li>
                    </ol>
                </div>
            </div>
        </section>
    
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="card-footer text-sm sticky-top">
                    <a class="btn btn-sm bg-gradient-primary text-white" href="{{ route('loadaddphoto-admin', ['type' => $type_man, 'cate' => 'man']) }}"
                        title="Thêm mới"><i class="fas fa-plus mr-2"></i>Thêm mới</a>
                </div>
    
                <div class="card card-primary card-outline text-sm mb-0">
                    <div class="card-header">
                        <h3 class="card-title"><b>Danh sách hình ảnh</b></h3>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table card-table table-hover">
                            <thead>
                                <tr>
                                    
                                    <th class="align-middle text-center" width="10%">STT</th>
    
                                    <th class="align-middle" style="width:30%">Hình</th>
    
                                    <th class="align-middle" style="width:30%">Tên</th>
    
                                    <th class="align-middle text-center" style="width:10%">Thao tác</th>
                                </tr>
                            </thead>
                            @if (count($dsPhoto))
                                @foreach ($dsPhoto as $k => $item)
                                    <tbody>
                                        <tr>
                                           
                                            <td class="align-middle">
                                                <input type="number"
                                                    class="form-control form-control-mini m-auto update-numb" min="0"
                                                    value="{{ $serial++ }}" data-id="" data-table="photo"
                                                    readonly>
                                            </td>
    
                                            <td class="align-middle">
                                                   
                                                    <a href="{{ route('loadupdatphoto-admin', ['id' => $item['id'], 'type' => $type_man, 'cate' => 'man']) }}">
                                                        @if ($item['photo'] != null)
                                                            <img class="img_main" src="{{ asset('upload/photo/' . $item['photo']) }}" width="200"
                                                                height="100" alt="">
                                                        @else
                                                            <img class="img_main" src="{{ asset('adminate/images/noimg.jpg') }}" width="200"
                                                                height="100" alt="">
                                                        @endif
                                                    </a>
                                            </td>
    
                                            <td class="align-middle">
                                                <a class="text-dark text-break"
                                                    href="{{ route('loadupdatphoto-admin', ['id' => $item['id'], 'type' => $type_man, 'cate' => 'man']) }}"
                                                    title="{{ $item->name }}">{{ $item->name }}</a>
                                            </td>
    
                                            <td class="align-middle text-center text-md text-nowrap">
                                                <a class="text-primary mr-2 modify-item"
                                                    href="{{ route('loadupdatphoto-admin', ['id' => $item['id'], 'type' => $type_man, 'cate' => 'man']) }}"
                                                    title="Chỉnh sửa"><i class="fas fa-edit"></i></a>
    
                                                    <a class="text-danger delete-item" data-href="slide"
                                                    data-id="{{ $item->id }}" title="Xóa"><i
                                                        class="fas fa-trash-alt"></i></a>
                                            </td>
                                        </tr>
                                    </tbody>
                                @endforeach
                            @else
                                <tbody>
                                    <tr>
                                        <td colspan="100" class="text-center">Không có dữ liệu</td>
                                    </tr>
                                </tbody>
                            @endif
                        </table>
                    </div>
                </div>
    
                <div class="card-footer text-sm">
                    @if (count($dsPhoto))
                        <div class="card-pagination">
                            {!! $dsPhoto->links() !!}
                        </div>
                    @endif
                </div>
            </div>
        </section>
    </div>

@endsection

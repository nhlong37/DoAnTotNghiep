@extends('admin.index')
@section('body')
<div class="content-wrapper">
    <section class="content-header text-sm">
        <div class="container-fluid">
            <div class="row">
                <ol class="breadcrumb float-sm-left pl-3">
                    <li class="breadcrumb-item"><a href="{{ route('trang-chu-admin') }}" title="Bảng điều khiển">Bảng điều
                            khiển</a></li>
                    <li class="breadcrumb-item active">Quản lý hình ảnh</li>
                </ol>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card-footer text-sm sticky-top">
                <a class="btn btn-sm bg-gradient-primary text-white" href="{{ route('them-moi-hinh-anh-admin') }}"
                    title="Thêm mới"><i class="fas fa-plus mr-2"></i>Thêm mới</a>
                {{-- <a class="btn btn-sm bg-gradient-danger text-white" id="delete-all" title="Xóa tất cả"><i
                        class="far fa-trash-alt mr-2"></i>Xóa tất cả</a> --}}
                <div class="form-inline form-search d-inline-block align-middle ml-3">
                    <div class="input-group input-group-sm">
                        <input class="form-control form-control-navbar text-sm" type="search" id="keyword"
                            placeholder="Tìm kiếm" aria-label="Tìm kiếm" name="keyword" value="">
                        <div class="input-group-append bg-primary rounded-right">
                            <button class="btn btn-navbar text-white" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
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
                                                <a href="{{ route('sua-doi-hinh-anh-admin', ['id' => $item->id]) }}"
                                                    title="{{ $item->name }}">
                                                    <img class="rounded img-preview"
                                                        src="{{ asset('upload/photo/' . $item->photo) }}"
                                                        onerror="src='{{ asset('assets/admin/images/noimage.png') }}'"
                                                        alt="Alt Photo" style="" />
                                                </a>
                                            </td>


                                        <td class="align-middle">
                                            <a class="text-dark text-break"
                                                href="{{ route('sua-doi-hinh-anh-admin', ['id' => $item->id]) }}"
                                                title="{{ $item->name }}">{{ $item->name }}</a>
                                        </td>

                                        <td class="align-middle text-center text-md text-nowrap">
                                            <a class="text-primary mr-2 modify-item"
                                                href="{{ route('sua-doi-hinh-anh-admin', ['id' => $item->id]) }}"
                                                title="Chỉnh sửa"><i class="fas fa-edit"></i></a>

                                            <a class="text-danger delete-item"
                                                data-href="{{ route('xl-xoa-bo-hinh-anh-admin') . '?id=' . $item->id }}"
                                                data-bs-toggle="modal" data-bs-target="#popup-notify-delete"
                                                title="Xóa"><i class="fas fa-trash-alt"></i></a>
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

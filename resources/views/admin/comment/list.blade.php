@extends('admin.index')
@section('body')
<div class="content-wrapper">
    <section class="content-header text-sm">
        <div class="container-fluid">
            <div class="row">
                <ol class="breadcrumb float-sm-left pl-3">
                    <li class="breadcrumb-item"><a href="{{ route('trang-chu-admin') }}" title="Bảng điều khiển">Bảng
                            điều
                            khiển</a></li>
                    <li class="breadcrumb-item active">Quản lý bình luận</li>
                </ol>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- <div class="card-footer text-sm sticky-top">
                <a class="btn btn-sm bg-gradient-primary text-white" href="{{ route('them-moi-san-pham-admin') }}"
                    title="Thêm mới"><i class="fas fa-plus mr-2"></i>Thêm mới</a>
                <div class="form-inline form-search d-inline-block align-middle ml-3">

                    <div class="input-group input-group-sm">
                        <input class="form-control form-control-navbar text-sm" type="search" name="keyword"
                            id="keyword" placeholder="Tìm kiếm" aria-label="Tìm kiếm" value="" data-href="product">
                        <div class="input-group-append bg-primary rounded-right">
                            <button class="btn btn-navbar text-white btn-search" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>

                </div>
            </div> -->
            <!-- <div id="notify_comment"></div> -->
            <div class="card card-primary card-outline text-sm mb-0">
                <div class="card-header">
                    <h3 class="card-title"><b>Danh sách bình luận</b></h3>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table card-table table-hover">
                        <thead>
                            <tr>
                                {{-- <th class="align-middle" width="5%">
                                    <div class="custom-control custom-checkbox my-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="selectall-checkbox">
                                        <label for="selectall-checkbox" class="custom-control-label"></label>
                                    </div>
                                </th> --}}

                                <th class="align-middle text-center" width="10%">STT</th>
                                <!-- 
                                    <th class="align-middle">Hình</th>

                                    {{-- <th class="align-middle">Hình 2</th> --}} -->

                                <th class="align-middle text-center">Tên người bình luận</th>

                                <th class="align-middle ">Nội dung</th>

                                <th class="align-middle">Trả lời</th>

                                <th class="align-middle text-center">Ngày gửi</th>

                                <th class="align-middle text-center">Trạng thái</th>

                                <th class="align-middle text-center">Chức năng</th>


                            </tr>
                        </thead>
                        @if (count($dsComment))
                        @foreach ($dsComment as $k => $item)
                        <!-- @php
                                        $arr_status = !empty($item->status) ? explode(',', $item->status) : [];
                                    @endphp -->
                        <tbody>
                            <tr data-id="{{ $item->id }}">

                                <td class="align-middle">
                                    <input type="number" class="form-control form-control-mini m-auto update-numb"
                                        min="0" value="{{ $serial++ }}" data-id="" data-table="comment" readonly>
                                </td>
                                <!-- <td class="align-middle">
                                                <a href="{{ route('sua-doi-san-pham-admin', ['id' => $item->id]) }}"
                                                    title="{{ $item->name }}">
                                                    <img class="rounded img-preview"
                                                        src="{{ asset('upload/product/' . $item->photo) }}"
                                                        onerror="src='{{ asset('assets/admin/images/noimage.png') }}'"
                                                        alt="Alt Photo" style="" />
                                                </a>
                                            </td> -->
                                <td class="align-middle text-center">
                                    <!-- <a class="text-dark text-break"
                                        href="{{ route('sua-doi-san-pham-admin', ['id' => $item->id]) }}"
                                        title="{{ $item->name }}"></a> -->
                                    {{ $item->comment_name }}
                                </td>
                                <td class="align-middle "  width="20%">
                                    <!-- <a class="text-dark text-break"
                                        href="{{ route('sua-doi-san-pham-admin', ['id' => $item->id]) }}"
                                        title="{{ $item->name }}"></a> -->
                                    {{ $item->content }}
                                    <p>Trả lời:</p>
                                    <ol class="list_rep">
                                        
                                        @foreach($comment_rep as $k => $comment_reply)
                                        @if($comment_reply->content_parent_comment==$item->id)
                                        <li style="color:blue">{{$comment_reply->content}}</li>
                                        @endif
                                        @endforeach
                                </ol>
                                </td>
                                <td class="align-middle text-center">
                                    <!-- <a class="text-dark text-break"
                                        href="{{ route('sua-doi-san-pham-admin', ['id' => $item->id]) }}"
                                        title="{{ $item->name }}">
                                    </a> -->

                                    <textarea class="form-control reply_comment_{{$item->id}}"></textarea>
                                    <p></p>
                                    <p><button class="btn btn-default btn-xs btn-reply-comment" type="button"
                                            data-comment_id="{{$item->id}}" data-id="{{$item->id_product}}">Trả lời bình
                                            luận</button></p>
                                </td>
                                <td class="align-middle text-center">
                                    <!-- <a class="text-dark text-break"
                                        href="{{ route('sua-doi-san-pham-admin', ['id' => $item->id]) }}"
                                        title="{{ $item->name }}"></a> -->
                                    {{ $item->created_at }}
                                </td>
                                <td class="align-middle text-center">
                                    <!-- <a class="text-dark text-break"
                                        href="{{ route('sua-doi-san-pham-admin', ['id' => $item->id]) }}"
                                        title="{{ $item->name }}"></a> -->
                                    <!-- <input type="hidden" {{ $item->status }} /> -->
                                    @if($item->status==1)
                                    <input type="button" data-comment_status="0" data-comment_id="{{$item->id}}"
                                        id="{{$item->id_product}}" class="btn btn-primary btn-xs comment_duyet_btn"
                                        value="Duyệt" />
                                    @else
                                    <input type="button" data-comment_status="1" data-comment_id="{{$item->id}}"
                                        id="{{$item->id_product}}" class="btn btn-warning btn-xs comment_duyet_btn"
                                        value="Chưa Duyệt" />
                                    @endif
                                </td>
                                <td class="align-middle text-center text-md text-nowrap">
                                    <!-- <a class="text-primary mr-2 modify-item"
                                        href="{{ route('sua-doi-san-pham-admin', ['id' => $item->id]) }}"
                                        title="Chỉnh sửa"><i class="fas fa-edit"></i></a> -->
                                    <a class="text-danger delete-item" data-href="comment" data-id="{{ $item->id }}"
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
                @if (count($dsComment))
                <div class="card-pagination">
                    {!! $dsComment->links() !!}
                </div>
                @endif
            </div>
        </div>
    </section>
</div>
@endsection
@extends('user.index')
@section('body')
<div class="wap_1200">
    <div class="template-pro">

        <div class="title-main"><span>CHI TIẾT ĐƠN HÀNG</span></div>
        <div class="card card-primary card-outline text-sm mb-0">
            <div class="card-header">
                <h6 class="card-title"><b></b></h6>
            </div>
            <div class="card-body table-responsive p-0">
                <table class="table card-table table-hover">
                    <thead>
                        <tr>
                            <th class="align-middle text-center" width="10%">STT</th>


                            <th class="align-middle text-center" style="width:10%">Hình ảnh</th>

                            <th class="align-middle text-center" style="width:10%">Màu sắc</th>

                            <th class="align-middle text-center" style="width:10%">Kích thước</th>

                            <th class="align-middle text-center" style="width:30%">Tên sản phẩm</th>

                            <th class="align-middle text-center" style="width:30%">Đơn giá</th>

                            <th class="align-middle text-center" style="width:30%">Số lượng</th>

                            <th class="align-middle text-center" style="width:20%">Tống giá trị Hoá Đơn</th>

                            <th class="align-middle text-center">Thao tác</th>
                        </tr>
                    </thead>
                    @if (count($dsOrderDetail))
                    @foreach ($dsOrderDetail as $k => $item)
                    {{-- @php
                    $arr_status = !empty($item->status) ? explode(',', $item->status) : [];
                    @endphp --}}
                    <tbody>
                        <tr data-id="{{ $item->id }}">

                            <td class="align-middle">
                                <input type="number" class="form-control form-control-mini m-auto update-numb" min="0"
                                    value="{{ $serial++ }}" data-id="" data-table="product" readonly>
                            </td>
                            <td class="align-middle">
                                <a href="{{ route('sua-doi-san-pham-admin', ['id' => $item->id]) }}"
                                    title="{{ $item->name }}">
                                    <img class="rounded img-preview"
                                        src="{{ asset('upload/product/' . $item->photo_product) }}"
                                        onerror="src='{{ asset('assets/admin/images/noimage.png') }}'" alt="Alt Photo"
                                        style="" />
                                </a>
                            </td>

                             {{-- <td class="align-middle">
                                <a class="text-dark text-break" title="{{ $size->name }}">{{ $size->name }}</a>
                            </td>--}}

                            {{--<td class="align-middle">
                                <a class="text-dark text-break" title="{{ $color->name }}">{{ $color->name }}</a>
                            </td> --}}

                            
                            <td class="align-middle">
                                <a class="text-dark text-break" title="{{ $item->name_product }}">{{ $item->price }}</a>
                            </td>
                            <td class="align-middle">
                                <a class="text-dark text-break" title="{{ $item->name_product }}">{{ $item->price }}</a>
                            </td>

                            <td class="align-middle">
                                <a class="text-dark text-break" title="{{ $item->name_product }}">{{ $item->quantity
                                    }}</a>
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

    </div>
</div>
@endsection
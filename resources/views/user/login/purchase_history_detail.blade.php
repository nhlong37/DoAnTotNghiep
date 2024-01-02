@extends('user.index')
@section('body')
<div class="wap_1200">
    <div class="template-pro">

        <div class="title-main"><span>CHI TIẾT ĐƠN HÀNG</span></div>
        <div class="card card-primary card-outline text-sm mb-0">
            <div class="card-header">
                <h6 class="card-title" style="text-align:center"><b>THÔNG TIN KHÁCH HÀNG</b></h6>
            </div>
            <div class="card-body table-responsive p-0">
                <table class="table card-table table-hover">
                    <thead>
                        <tr>
                            <th class="align-middle text-center" width="10%">STT</th>

                            <th class="align-middle text-center" style="width:20%">Hoá Đơn</th>

                            <th class="align-middle text-center" style="width:20%">Khách hàng</th>

                            <th class="align-middle text-center" style="width:30%">Tổng tiền</th>

                            <!-- <th class="align-middle text-center" style="width:10%">Số điện thoại</th> -->

                            <th class="align-middle text-center" style="width:30%">Ngày đặt</th>

                            <!-- <th class="align-middle text-center">Thao tác</th> -->
                        </tr>
                    </thead>
                    @if (count($dsOrder))
                    @foreach ($dsOrder as $k => $item)
                    <tbody>
                        <tr>
                            <td class="align-middle">
                                <input type="number" class="form-control form-control-mini m-auto update-numb" min="0"
                                    style="text-align: center" value="{{ $k+1 }}" data-id="" data-table="product"
                                    readonly>
                            </td>
                            <td class="align-middle text-center">
                                <span class="text-dark text-break" href="" title="Mã Hoá Đơn">{{ $item->code }}</span>
                            </td>

                            <td class="align-middle text-center">
                                <a class="text-dark text-break"
                                    href="{{route('chitiet-lichsu-muahang-user', ['id' => $item->id] )}}"
                                    title="Tên khách hàng">{{ $item->fullname
                                    }}</a>
                            </td>


                            <td class="align-middle text-center">
                                <a class="text-dark text-break" title="Tống giá trị Hoá Đơn">{{
                                    formatMoney($item->total_price) }}</a>
                            </td>

                            <!-- <td class="align-middle text-center">
                                <span class="text-dark text-break" href="" title="Số điện thoại">{{ $item->phone
                                    }}</span>
                            </td> -->

                            <td class="align-middle text-center">
                                <span class="text-dark text-break" href="" title="Ngày đặt">{{
                                    $item->created_at->format('h:m d/m/Y') }}</span>
                            </td>

                            <!-- <td class="align-middle text-center text-md text-nowrap">
                                <a class="text-primary mr-2 modify-item"
                                    href="{{ route('chitiet-lichsu-muahang-user', ['id'=>$item->id]) }}"
                                    title="Xem chi tiết">Xem Chi Tiết</a>
                            </td> -->
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
        <div class="col-12">
            @if (count($dsOrder))
            <div class="card-pagination">
                {!! $dsOrder->links() !!}
            </div>
            @endif
        </div>
    </div>
    <div class="card-header">
        <h6 class="card-title " style="text-align:center"><b></b>THÔNG TIN ĐƠN HÀNG
        </h6>
    </div>
    <div class="card-body table-responsive p-0">
        <table class="table card-table table-hover">
            <thead>
                <tr>
                    <th class="align-middle text-center" width="10%">STT</th>

                    <th class="align-middle text-center" style="width:10%">Hình ảnh</th>

                    <th class="align-middle text-center" style="width:10%">Màu sắc</th>

                    <th class="align-middle text-center" style="width:10%">Kích thước</th>

                    <th class="align-middle text-center" style="width:10%">Sản phẩm</th>

                    <th class="align-middle text-center" style="width:20%">Đơn giá</th>

                    <th class="align-middle text-center" style="width:10%">Số lượng</th>

                    <th class="align-middle text-center" style="width:40%">Tống tiền</th>

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
                        <input type="number" class="form-control form-control-mini m-auto update-numb"
                            style="text-align: center" min="0" value="{{ $k+1 }}" data-id="" data-table="product"
                            readonly>
                    </td>
                    <td class="align-middle">
                        <a href="{{ route('sua-doi-san-pham-admin', ['id' => $item->id]) }}" title="{{ $item->name }}">
                            <img class="rounded img-preview" src="{{ asset('upload/product/' . $item->photo_product) }}"
                                onerror="src='{{ asset('assets/admin/images/noimage.png') }}'" alt="Alt Photo"
                                style="" />
                        </a>
                    </td>
                    @foreach($idcolor as $c)
                    <td class="align-middle text-center">
                        <a class="text-dark text-break" title="{{ $c->name }}">{{ $c->name
                            }}</a>
                    </td>
                    @endforeach
                    @foreach($idsize as $s)
                    <td class="align-middle text-center">
                        <a class="text-dark text-break" title="{{ $s->name }}">{{ $s->name
                            }}</a>
                    </td>
                    @endforeach
                    <td class="align-middle text-center">
                        <a class="text-dark text-break" title="{{ $item->name_product }}">{{ $item->name_product
                            }}</a>
                    </td>
                    <td class="align-middle text-center">
                        <a class="text-dark text-break" title="{{ $item->name_product }}">{{ formatMoney($item->price)
                            }}</a>
                    </td>

                    <td class="align-middle text-center">
                        <a class="text-dark text-break" title="{{ $item->name_product }}">{{ $item->quantity
                            }}</a>
                    </td>
                    <td class="align-middle text-center">
                        <a class="text-dark text-break" title="{{ $item->name_product }}">{{
                            formatMoney($item->quantity*$item->price)
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
@endsection
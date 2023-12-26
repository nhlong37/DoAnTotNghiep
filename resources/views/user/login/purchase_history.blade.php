@extends('user.index')
@section('body')
<div class="wap_1200">
    <div class="template-pro">

        <div class="title-main"><span>LỊCH SỬ MUA HÀNG</span></div>
        <div class="card card-primary card-outline text-sm mb-0">
                    <div class="card-header">
                        <h6 class="card-title"><b>Danh sách đơn hàng</b></h6>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table card-table table-hover">
                            <thead>
                                <tr>
                                    <th class="align-middle text-center" width="10%">STT</th>

                                    <th class="align-middle text-center" style="width:10%">Mã Hoá Đơn</th>

                                    <th class="align-middle text-center" style="width:20%">Tên khách hàng</th>

                                    <th class="align-middle text-center" style="width:10%">Số điện thoại</th>

                                    <th class="align-middle text-center" style="width:30%">Trạng Thái</th>

                                    <th class="align-middle text-center" style="width:30%">Tống giá trị Hoá Đơn</th>

                                    <th class="align-middle text-center">Thao tác</th>
                                </tr>
                            </thead>
                            @if (count($dsOrder))
                                @foreach ($dsOrder as $k => $item)
                                    <tbody>
                                        <tr>
                                            <td class="align-middle">
                                                <input type="number"
                                                    class="form-control form-control-mini m-auto update-numb" min="0"
                                                    value="{{ $serial++ }}" data-id="" data-table="product"
                                                    readonly>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span class="text-dark text-break"
                                                    href=""
                                                    title="Mã Hoá Đơn">{{ $item->code }}</span>
                                            </td>

                                            <td class="align-middle text-center">
                                                <span class="text-dark text-break"
                                                    href=""
                                                    title="Tên khách hàng">{{ $item->fullname }}</span>
                                            </td>

                                            <td class="align-middle text-center">
                                                <span class="text-dark text-break"
                                                    href=""
                                                    title="Số điện thoại">{{ $item->phone }}</span>
                                            </td>

                                            <td class="align-middle text-center">
                                                <span class="text-dark text-break"
                                                    href=""
                                                    title="Địa chỉ">{{ $item->created_at->format('h:m d-m-Y') }}</span>
                                            </td>

                                            <td class="align-middle text-center">
                                                <a class="text-dark text-break"
                                                    href=""
                                                    title="Tống giá trị Hoá Đơn">{{ formatMoney($item->total_price) }}</a>
                                            </td>                                          
                                            <td class="align-middle text-center text-md text-nowrap">
                                                <a class="text-primary mr-2 modify-item"
                                                    href="{{ route('chitiet-lichsu-muahang-user', ['id'=>$item->id]) }}"
                                                    title="Xem chi tiết">Xem Chi Tiết</a>

                                               
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
                    @if (count($dsOrder))
                        <div class="card-pagination">
                            {!! $dsOrder->links() !!}
                        </div>
                    @endif
                </div>
       
    </div>
</div>
@endsection
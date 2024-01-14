@extends('user.index')
@section('body')
    <div class="wap_1200">
        <div class="template-pro">
            <div class="title-main"><span>LỊCH SỬ MUA HÀNG</span></div>
            @if (count($dsOrder))
                @foreach ($dsOrder as $k => $item)
                    <div class="card card-primary card-outline text-sm mb-4">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h6 class="card-title mb-0"><b>THÔNG TIN ĐƠN HÀNG</b></h6>
                            <div class="card-cancle {{ ($item->status == 'moidat') ? 'd-block' : 'd-none' }}">
                                <form action="{{ route('huy-donhang-user') }}">
                                    <input type="hidden" name="id_order" value="{{$item->id}}">
                                    <button type="submit" class="btn-sm bg-danger text-white border-0">Huỷ đơn hàng</button>
                                </form>
                            </div>
                        </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table card-table table-hover mb-0">
                                <thead class="mb-0">
                                    <tr>
                                        {{-- <th class="align-middle text-center" style="width:10%">STT</th> --}}

                                        <th class="align-middle text-center" style="width:10%">Hoá Đơn</th>

                                        <th class="align-middle text-center" style="width:20%">Email</th>

                                        <th class="align-middle text-center" style="width:10%">Điện thoại</th>

                                        <th class="align-middle text-center" style="width:10%">Tổng tiền</th>

                                        <th class="align-middle text-center" style="width:20%">Trạng thái</th>

                                        <th class="align-middle text-center" style="width:30%">Ngày đặt</th>

                                        <!-- <th class="align-middle text-center">Thao tác</th> -->
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        {{-- <td class="align-middle" style="text-align: center; max-width: 10%">
                                <span>{{ $k+1 }}</span>
                            </td> --}}
                                        <td class="align-middle text-center" style="max-width: 10%">
                                            <a class="text-dark text-break"
                                                href="{{ route('chitiet-lichsu-muahang-user', ['id' => $item->id]) }}"
                                                title="Mã Hoá Đơn">{{ $item->code }}</a>
                                        </td>

                                        <td class="align-middle text-center">
                                            <span class="text-dark text-break" title="Email">{{ $item->email }}<span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="text-dark text-break" title="Điện thoại">{{ $item->phone }}<span>
                                        </td>

                                        <td class="align-middle text-center">
                                            <span class="text-dark text-break" title="Tống giá trị Hoá Đơn"
                                                style="max-width: 10%">{{ formatMoney($item->total_price) }}<span>
                                        </td>
                                            
                                        <td class="align-middle text-center">
                                            <span class="text-dark text-break"
                                                title="Trạng thái">
                                                @if ($item->status == 'daxacnhan')
                                                    {{ "Đã xác nhận" }}
                                                @elseif($item->status == 'danggiao')
                                                    {{ "Đang giao" }}
                                                @elseif($item->status == 'dagiao')
                                                    {{ "Đã giao" }}
                                                @elseif($item->status == 'dahuy')
                                                    {{ "Đã huỷ" }}
                                                @else
                                                    {{ "Mới đặt" }}
                                                @endif
                                            </span>
                                        </td>

                                        <td class="align-middle text-center">
                                            <span class="text-dark text-break"
                                                title="Ngày đặt">{{ $item->created_at->format('h:m d/m/Y') }}</span>
                                        </td>

                            <!-- <td class="align-middle text-center text-md text-nowrap">
                                <a class="text-primary mr-2 modify-item"
                                    href="{{ route('chitiet-lichsu-muahang-user', ['id'=>$item->id]) }}"
                                    title="Xem chi tiết">Xem Chi Tiết</a>
                            </td> -->
                        </tr>
                    </tbody>
                    
                    <thead>
                        <tr>
                            <th class="align-middle text-center" width="10%">Hình ảnh</th>

                                        <th class="align-middle text-center" style="width:30%">Sản phẩm</th>

                                        <th class="align-middle text-center" style="width:10%">Màu</th>

                                        <th class="align-middle text-center" style="width:10%">Kích thước</th>

                                        <th class="align-middle text-center" style="width:20%">Đơn giá</th>

                                        <th class="align-middle text-center" style="width:30%">Số lượng</th>

                                        <!-- <th class="align-middle text-center">Thao tác</th> -->
                                    </tr>
                                </thead>
                                @foreach ($order_detail as $k => $order)
                                    @if ($item->id == $order->id_order)
                                        <tbody>
                                            <tr>
                                                <td class="align-middle" style="text-align: center; max-width:20%">
                                                    <span><img
                                                            src="{{ asset('/upload/product/' . $order->photo_product) }}"></span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <a class="text-dark text-break"
                                                        href="{{ route('chi-tiet-product', ['id'=> $order->id_product]) }}"
                                                        title="">{{ $order->name_product }}</a>
                                                </td>

                                                @foreach ($data_id_color as $k => $c)
                                                    @if ($c->id == $order->id_color)
                                                        <td class="align-middle text-center">
                                                            <span class="text-dark text-break" href=""
                                                                title="">{{ $c->name }}</span>
                                                        </td>
                                                    @endif
                                                @endforeach

                                                @foreach ($data_id_size as $k => $s)
                                                    @if ($s->id == $order->id_size)
                                                        <td class="align-middle text-center">
                                                            <span class="text-dark text-break" href=""
                                                                title="">{{ $s->name }}</span>
                                                        </td>
                                                    @endif
                                                @endforeach

                                                <td class="align-middle text-center">
                                                    <a class="text-dark text-break"
                                                        title="Tống giá trị Hoá Đơn">{{ formatMoney($order->price) }}</a>
                                                </td>

                                                <td class="align-middle text-center">
                                                    <span class="text-dark text-break" href=""
                                                        title="">{{ $order->quantity }}</span>
                                                </td>

                            <!-- <td class="align-middle text-center text-md text-nowrap">
                                <a class="text-primary mr-2 modify-item"
                                    href="{{ route('chitiet-lichsu-muahang-user', ['id'=>$item->id]) }}"
                                    title="Xem chi tiết">Xem Chi Tiết</a>
                            </td> -->
                        </tr>
                    </tbody>
                    @endif
                    @endforeach
                </table>
            </div>
        </div>
        @endforeach
        @else
        <div class="wrap-empty">
                <a href="{{ route('trang-chu-user') }}" class="empty-cart text-decoration-none w-100">
                    <img src="{{ asset('assets/user/images/empty.png') }}">
                    <p>Không tồn tại đơn hàng nào!!!</p>
                    <span class="btn btn-dark btn-sm">Về trang chủ</span>
                </a>
            </div>
        @endif
        <div class="col-12">
            @if (count($dsOrder))
            <div class="card-pagination">
                {!! $dsOrder->links() !!}
            </div>
            @endif
        </div>
    </div>
</div>
@endsection

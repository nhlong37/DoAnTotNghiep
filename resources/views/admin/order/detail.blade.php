@extends('admin.index')
@section('body')
    <div class="content-wrapper">
        <section class="content-header text-sm">
            <div class="container-fluid">
                <div class="row">
                    <ol class="breadcrumb float-sm-left pl-3">
                        <li class="breadcrumb-item"><a href="{{ route('trang-chu-admin') }}" title="Bảng điều khiển">Bảng điều
                                khiển</a></li>

                        <li class="breadcrumb-item"><a href="{{ route('san-pham-admin') }}" title="Quản lý hoá đơn">Quản lý
                                hoá đơn</a></li>

                    </ol>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                <form class="validation-form" method="post" action="" enctype="multipart/form-data">
                    @csrf
                    <div class="card-footer text-sm sticky-top">
                        <button type="submit" class="btn btn-sm bg-gradient-primary submit-check"><i
                                class="far fa-save mr-2"></i>Lưu</button>
                        <button type="reset" class="btn btn-sm bg-gradient-secondary"><i class="fas fa-redo mr-2"></i>Làm
                            lại</button>
                        <a class="btn btn-sm bg-gradient-danger" href="{{ route('don-hang') }}" title="Thoát"><i
                                class="fas fa-sign-out-alt mr-2"></i>Thoát</a>
                    </div>
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card card-default color-palette-box card-primary card-outline text-sm">
                                <div class="card-header">
                                    <h3 class="card-title">Thông tin đơn hàng</h3>
                                </div>
                                <div class="card-body row">
                                    <div class="form-group title col-md-4 col-sm-6">
                                        <label for="name-product">Mã Hoá Đơn</label>
                                        <input type="text" class="form-control check-valid text-sm" name="code"
                                            id="code" placeholder="Mã Hoá Đơn" value="{{ $orderDetail->code }}"
                                            readonly>
                                    </div>
                                    <div class="form-group title col-md-4 col-sm-6">
                                        <label for="name-product">Tên khách hàng</label>
                                        <input type="text" class="form-control check-valid text-sm" name="fullname"
                                            id="fullname" placeholder="Tên khách hàng" value="{{ $orderDetail->fullname }}"
                                            readonly>
                                    </div>

                                    <div class="form-group title col-md-4 col-sm-6">
                                        <label for="name-product">Số điện thoại</label>
                                        <input type="number" class="form-control check-valid text-sm" name="phone"
                                            id="phone" placeholder="Số điện thoại" value="{{ $orderDetail->phone }}"
                                            readonly>
                                    </div>
                                    <div class="form-group title col-md-4 col-sm-6">
                                        <label for="name-product">Địa chỉ</label>
                                        <input type="text" class="form-control check-valid text-sm" name="address"
                                            id="address" placeholder="Địa chỉ" value="{{ $orderDetail->address }}"
                                             readonly>
                                    </div>
                                    <div class="form-group title col-md-4 col-sm-6">
                                        <label for="name-product">Email</label>
                                        <input type="email" class="form-control check-valid text-sm" name="email"
                                            id="email" placeholder="Email" value="{{ $orderDetail->email }}"  readonly>
                                    </div>
                                    <div class="form-group title col-md-4 col-sm-6">
                                        <label for="name-product">Ngày đặt</label>
                                        <input type="text" class="form-control check-valid text-sm" name="date"
                                            id="date" placeholder="Ngày đặt" value="{{ $orderDetail->created_at }}"
                                            readonly>
                                    </div>

                                    <div class="form-group title col-md-12 col-sm-12">
                                        <label for="name-product">Phương thức thanh toán</label>
                                        <input type="text" class="form-control check-valid text-sm" name="payment"
                                            id="payment"
                                            value="{{ $orderDetail->payment == 'vnpay' ? 'Thanh toán qua VNPay' : 'Thanh toán khi nhận hàng' }}"
                                            readonly>
                                    </div>

                                    <div class="form-group title col-md-12 col-sm-12">
                                        <label for="name-product">Ghi chú</label>
                                        <textarea name="content" id="content" rows="5" class="form-control check-valid text-sm" readonly>{{ $orderDetail->content }}</textarea>
                                    </div>

                                    {{-- <div class="form-group title col-md-12 col-sm-12">
                                        <label for="name-product">Trạng thái đơn hàng</label>
                                        <select id="select-status" name="status" class="form-control select2"
                                            {{ $orderDetail->status == 'dathanhtoan' ? 'disabled' : '' }}>
                                            <option value="moidat" {{ $orderDetail->status == 'moidat' ? 'selected' : '' }}>
                                                Mới Đặt</option>
                                            <option
                                                value="daxacnhan"{{ $orderDetail->status == 'daxacnhan' ? 'selected' : '' }}>
                                                Đã Xác Nhận</option>
                                            <option
                                                value="dathanhtoan"{{ $orderDetail->status == 'dathanhtoan' ? 'selected' : '' }}>
                                                Đã Thanh toán</option>
                                        </select>
                                    </div> --}}

                                    <div class="form-group title col-md-12 col-sm-12">
                                        <label for="name-product">Trạng thái đơn hàng</label>
                                        <select id="select-status" name="status" class="form-control select2" {{ $orderDetail->status == 'dagiao' ? 'disabled' : '' }}>
                                            <option value="moidat" {{ ($orderDetail->status=='moidat')? "selected" : "" }}>Mới Đặt</option>
                                            <option value="daxacnhan"{{ ($orderDetail->status=='daxacnhan')? "selected" : "" }}>Đã Xác Nhận</option>
                                            <option value="danggiao"{{ ($orderDetail->status=='danggiao')? "selected" : "" }}>Đang giao</option>
                                            <option value="dagiao"{{ ($orderDetail->status=='dagiao')? "selected" : "" }}>Đã Giao</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12">
                            <div class="card card-default color-palette-box card-primary card-outline text-sm">
                                <div class="card-header">
                                    <h3 class="card-title">Chi tiết đơn hàng</h3>
                                </div>
                                <div class="card-body">
                                    <table class="table card-table table-hover">
                                        <thead>
                                            <tr>
                                                <th class="align-middle text-center" width="10%">STT</th>

                                                <th class="align-middle">Hình</th>

                                                <th class="align-middle" style="width:30%">Tên sản phẩm</th>

                                                <th class="align-middle text-center">Màu sắc</th>

                                                <th class="align-middle text-center">Size</th>

                                                <th class="align-middle">Đơn Giá</th>

                                                <th class="align-middle text-center">Số lượng</th>
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
                                                            <input type="number"
                                                                class="form-control form-control-mini m-auto update-numb"
                                                                min="0" value="{{ $serial++ }}"
                                                                data-id="" data-table="product" readonly>
                                                        </td>
                                                        <td class="align-middle">
                                                            <a title="{{ $item->name }}">
                                                                <img class="rounded img-preview"
                                                                    src="{{ asset('upload/product/' . $item->photo_product) }}"
                                                                    onerror="src='{{ asset('assets/admin/images/noimage.png') }}'"
                                                                    alt="Alt Photo" style="" />
                                                            </a>
                                                        </td>

                                                        <td class="align-middle">
                                                            <a class="text-dark text-break"
                                                                href="{{ route('sua-doi-san-pham-admin', ['id' => $item->id_product]) }}"
                                                                title="{{ $item->name_product }}">{{ $item->name_product }}</a>
                                                        </td>

                                                        @foreach ($dsIDC as $c)
                                                            @if ($item->id_color == $c->id)
                                                                <td class="align-middle text-center">
                                                                    <a class="text-dark text-break"
                                                                        title="{{ $c->name }}">{{ $c->name }}</a>
                                                                </td>
                                                            @endif
                                                        @endforeach
                                                        @foreach ($dsIDS as $s)
                                                            @if ($item->id_size == $s->id)
                                                                <td class="align-middle text-center">
                                                                    <a class="text-dark text-break"
                                                                        title="{{ $s->name }}">{{ $s->name }}</a>
                                                                </td>
                                                            @endif
                                                        @endforeach

                                                        <td class="align-middle">
                                                            <a class="text-dark text-break"
                                                                title="{{ $item->name_product }}">{{ formatMoney($item->price) }}</a>
                                                        </td>

                                                        <td class="align-middle text-center">
                                                            <a class="text-dark text-break"
                                                                title="{{ $item->name_product }}">{{ $item->quantity }}</a>
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
                                @if (count($dsOrderDetail))
                                    <div class="card-pagination">
                                        {!! $dsOrderDetail->links() !!}
                                    </div>
                                @endif
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </section>
    </div>
@endsection

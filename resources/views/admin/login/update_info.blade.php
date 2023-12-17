@extends('admin.index')
@section('body')
    <div class="content-wrapper">
        <section class="content">
            <form id="form_user" class="validation-form" novalidate action="{{route('xl-suadoi-thongtin-admin', ['id'=>Auth::guard('admin')->user()->id])}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-header text-sm sticky-top">
                    <button type="submit" class="btn btn-sm bg-gradient-primary submit-check"><i
                            class="far fa-save mr-2"></i>Lưu</button>
                    <button type="reset" class="btn btn-sm bg-gradient-secondary"><i class="fas fa-redo mr-2"></i>Làm
                        lại</button>
                </div>

                <div class="row">
                    <div class="col-xl-4">
                        <div class="card card-primary card-outline text-sm">
                            <div class="card-header">
                                <h3 class="card-title">Avatar</h3>
                            </div>
                            <div class="card-body">
                                <div class="photoUpload-zone">
                                    <div class="photoUpload-detail" id="photoUpload-preview">
                                        <img class="rounded" onerror="src='{{ asset('assets/admin/images/noimage.png') }}'"
                                            src="{{ asset('upload/avatar/' . Auth::guard('admin')->user()->avatar) }}" alt="Alt Photo" style="" />
                                    </div>
                                    <label class="photoUpload-file" id="photo-zone" for="file-zone">
                                        <input type="file" name="file" id="file-zone">
                                        <i class="fas fa-cloud-upload-alt"></i>
                                        <p class="photoUpload-drop">Kéo và thả hình vào đây</p>
                                        <p class="photoUpload-or">hoặc</p>
                                        <p class="photoUpload-choose btn btn-sm bg-gradient-success">Chọn hình</p>
                                    </label>
                                    <div class="photoUpload-dimension">Width: 270px - Height: 270px
                                        (.jpg|.png|.jpeg)</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-8">
                        <div class="card card-primary card-outline text-sm">
                            <div class="card-header">
                                <h3 class="card-title">Thông tin người dùng</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="username">Tên đăng nhập:</label>
                                        <input type="text" class="form-control text-sm" name="username"
                                            id="username" placeholder="Tên đăng nhập" value="{{ Auth::guard('admin')->user()->username }}" readonly>
                                    </div>
                                    <div class="form-group col-md-6 btn-change-password">
                                        <label for="username">Mật khẩu:</label>
                                        <a class="w-100" href="{{ route('doi-matkhau-admin', ['id'=>Auth::guard('admin')->user()->id]) }}">Đổi mật khẩu</a>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="fullname">Họ tên:</label>
                                        <input type="text" class="form-control text-sm" name="fullname" id="fullname"
                                            placeholder="Họ tên" value="{{ Auth::guard('admin')->user()->name }}" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="email">Email:</label>
                                        <input type="email" class="form-control text-sm" name="email" id="email"
                                            placeholder="Email" value="{{ Auth::guard('admin')->user()->email }}" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="phone">Điện thoại:</label>
                                        <input type="text" class="form-control text-sm" name="phone" id="phone"
                                            placeholder="Điện thoại" value="{{ Auth::guard('admin')->user()->phone }}" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="gender">Giới tính:</label>
                                        <select class="custom-select text-sm" name="gender" id="gender" required>
                                            <option value="0">Chọn giới tính</option>
                                            <option value="1" {{ (Auth::guard('admin')->user()->gender == 1) ? 'selected' : '' }} >Nam</option>
                                            <option value="2" {{ (Auth::guard('admin')->user()->gender == 2) ? 'selected' : '' }}>Nữ</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="birthday">Ngày sinh:</label>
                                        <input type="date" class="form-control text-sm max-date" name="birthday"
                                            id="birthday" placeholder="Ngày sinh"
                                            value="{{ !empty(Auth::guard('admin')->user()->birthday) ? Auth::guard('admin')->user()->birthday : 'Chưa có thông tin này' }}"
                                            autocomplete="off" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="address">Địa chỉ:</label>
                                        <input type="text" class="form-control text-sm" name="address"
                                            id="address" placeholder="Địa chỉ" value="{{ !empty(Auth::guard('admin')->user()->address) ? Auth::guard('admin')->user()->address : 'Chưa có thông tin này' }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </section>
    </div>
@endsection

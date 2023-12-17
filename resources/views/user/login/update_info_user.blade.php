@extends('user.index')
@section('body')
    <div class="wap_1200">
        <div class="form-update-info">
            <form id="form_user" class="validation-form" novalidate
                action="{{ route('xl-suadoi-thongtin-user', ['id' => Auth::guard('user')->user()->id]) }}" method="post"
                enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-xl-4">
                        <div class="card card-primary card-outline text-sm">
                            <div class="card-header">
                                <h3 class="card-title">Avatar</h3>
                            </div>
                            <div class="card-body">
                                <div class="photoUpload-zone">
                                    <div class="photoUpload-detail photoUpload-update" id="photoUpload-preview">
                                        <img class="rounded" onerror="src='{{ asset('assets/user/images/noimage.png') }}'"
                                            src="{{ asset('upload/avatar/' . Auth::guard('user')->user()->avatar) }}"
                                            alt="Alt Photo" style="" />
                                    </div>
                                    <label class="photoUpload-file mt-2" id="photo-zone" for="file-zone">
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" name="file" id="file-zone">
                                                <label class="custom-file-label" for="file-zone">Chọn ảnh</label>
                                            </div>
                                        </div>
                                    </label>
                                    <div class="photoUpload-dimension">Định dạng file: .jpg|.png|.jpeg</div>
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
                                        <input type="text" class="form-control text-sm" name="username" id="username"
                                            placeholder="Tên đăng nhập" value="{{ Auth::guard('user')->user()->username }}"
                                            readonly>
                                    </div>
                                    
                                    <div class="form-group col-md-6">
                                        <label for="fullname">Họ tên:</label>
                                        <input type="text" class="form-control text-sm" name="fullname" id="fullname"
                                            placeholder="Họ tên" value="{{ Auth::guard('user')->user()->name }}" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="email">Email:</label>
                                        <input type="email" class="form-control text-sm" name="email" id="email"
                                            placeholder="Email" value="{{ Auth::guard('user')->user()->email }}" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="phone">Điện thoại:</label>
                                        <input type="text" class="form-control text-sm" name="phone" id="phone"
                                            placeholder="Điện thoại" value="{{ Auth::guard('user')->user()->phone }}"
                                            required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="gender">Giới tính:</label>
                                        <select class="custom-select text-sm" name="gender" id="gender" required>
                                            <option value="0">Chọn giới tính</option>
                                            <option value="1"
                                                {{ Auth::guard('user')->user()->gender == 1 ? 'selected' : '' }}>Nam
                                            </option>
                                            <option value="2"
                                                {{ Auth::guard('user')->user()->gender == 2 ? 'selected' : '' }}>Nữ
                                            </option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="birthday">Ngày sinh:</label>
                                        <input type="date" class="form-control text-sm max-date" name="birthday"
                                            id="birthday" placeholder="Ngày sinh"
                                            value="{{ !empty(Auth::guard('user')->user()->birthday) ? Auth::guard('user')->user()->birthday : 'Chưa có thông tin này' }}"
                                            autocomplete="off" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="address">Địa chỉ:</label>
                                        <input type="text" class="form-control text-sm" name="address" id="address"
                                            placeholder="Địa chỉ"
                                            value="{{ !empty(Auth::guard('user')->user()->address) ? Auth::guard('user')->user()->address : 'Chưa có thông tin này' }}">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-sm bg-gradient-primary submit-check"><i
                                        class="far fa-save mr-2"></i>Lưu</button>
                                <button type="reset" class="btn btn-sm bg-gradient-secondary"><i
                                        class="fas fa-redo mr-2"></i>Làm
                                    lại</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

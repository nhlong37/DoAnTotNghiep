<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">
    <!-- Title Page-->
    <title>Đăng Ký Tài Khoản HL Shoes</title>

    <link rel="icon" type="image/png" href="{{ asset('assets/user/images/favicon.ico') }}" />
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/user/css/register.css') }}">
</head>

<body>
    <div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
        <div class="wrapper">
            <div class="card card-5">
                <div class="card-heading">
                    <h2 class="title">Đăng Ký Tài Khoản</h2>
                </div>
                @if (session('notification'))
                    <div class="alert alert-warning" role="alert">
                        {{ session('notification') }}
                    </div>
                @endif
                @if (session('notification1'))
                    <div class="alert alert-warning" role="alert">
                        {{ session('notification1') }}
                    </div>
                @endif
                @if (session('alert-success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('alert-success') }}
                    </div>
                @endif
                <div class="card-body">
                    <form action="{{ route('xl-dang-ky-nguoi-dung') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-xl-4 left-register">
                                <div class="card card-primary card-outline text-sm">
                                    <div class="card-header">
                                        <h3 class="card-title">Avatar</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="photoUpload-zone">
                                            <div class="photoUpload-detail" id="photoUpload-preview">
                                                <img class="rounded"
                                                    onerror="src='{{ asset('assets/user/images/noimage.png') }}'"
                                                    src="" alt="Alt Photo" style="" />
                                            </div>
                                            <label class="photoUpload-file mt-2" id="photo-zone" for="file-zone">
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" name="file" id="file-zone">
                                                        <label class="custom-file-label" for="file-zone">Chọn
                                                            ảnh</label>
                                                    </div>
                                                </div>
                                            </label>
                                            <div class="photoUpload-dimension">Định dạng file: .jpg|.png|.jpeg</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-8 right-register">
                                <div class="card card-primary card-outline text-sm">
                                    <div class="card-header">
                                        <h3 class="card-title">Thông tin người dùng</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label for="username">Tên đăng nhập:</label>
                                                <input type="text" class="form-control text-sm" name="username"
                                                    id="username" placeholder="Tên đăng nhập" required>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label for="username">Mật khẩu:</label>
                                                <input type="password" class="form-control text-sm" name="password"
                                                    id="password" placeholder="Mật khẩu" required>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label for="fullname">Họ tên:</label>
                                                <input type="text" class="form-control text-sm" name="fullname"
                                                    id="fullname" placeholder="Họ tên" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="email">Email:</label>
                                                <input type="email" class="form-control text-sm" name="email"
                                                    id="email" placeholder="Email" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="phone">Điện thoại:</label>
                                                <input type="text" class="form-control text-sm" name="phone"
                                                    id="phone" placeholder="Điện thoại" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="gender">Giới tính:</label>
                                                <select class="custom-select text-sm" name="gender" id="gender"
                                                    required>
                                                    <option value="0">Chọn giới tính</option>
                                                    <option value="1">
                                                        Nam
                                                    </option>
                                                    <option value="2">
                                                        Nữ
                                                    </option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="birthday">Ngày sinh:</label>
                                                <input type="date" class="form-control text-sm max-date"
                                                    name="birthday" id="birthday" placeholder="Ngày sinh"
                                                    autocomplete="off" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="address">Địa chỉ:</label>
                                                <input type="text" class="form-control text-sm" name="address"
                                                    id="address" placeholder="Địa chỉ">
                                            </div>
                                        </div>

                                        <div class="d-flex justify-center">
                                            <input type="submit" value="Đăng ký" class="btn btn-success">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/user/js/jquery.min.js') }}"></script>
    <script src="{{asset('assets/user/js/register.js')}}"></script>
</body>

</html>
<!-- end document-->

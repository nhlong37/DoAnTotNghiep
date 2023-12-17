@extends('admin.index')
@section('body')
    <div class="content-wrapper">
        <section class="content-header text-sm">
            <div class="container-fluid">
                <div class="row">
                    <ol class="breadcrumb float-sm-left pl-3">
                        <li class="breadcrumb-item"><a href="{{ route('trang-chu-admin') }}" title="Bảng điều khiển">Bảng điều
                                khiển</a></li>
                        <li class="breadcrumb-item active">Thêm mới bài viết</li>
                    </ol>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                <form class="validation-form" method="post" action="{{ route('xl-them-moi-bai-viet-admin') }}"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="card-footer text-sm sticky-top">
                        <button type="submit" class="btn btn-sm bg-gradient-primary submit-check"><i
                                class="far fa-save mr-2"></i>Lưu</button>
                        <button type="reset" class="btn btn-sm bg-gradient-secondary"><i class="fas fa-redo mr-2"></i>Làm
                            lại</button>
                        <a class="btn btn-sm bg-gradient-danger" href="{{ route('bai-viet-admin') }}" title="Thoát"><i
                                class="fas fa-sign-out-alt mr-2"></i>Thoát</a>
                    </div>
                    <div class="card card-primary card-outline text-sm">
                        <div class="card-header">
                            <h3 class="card-title">Danh mục bài viết</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                        class="fas fa-minus"></i></button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group-category row">

                                <div class="form-group col-xl-6 col-sm-4">
                                    <label class="d-block" for="id_list">Danh mục loại bài viết</label>
                                    <select id="select-newtype" name="type" class="form-control select2 ">
                                        <option value="0">Chọn Danh mục</option>
                                        @foreach ($dsType as $k => $value)
                                            <option value="{{ $value->id }}">{{ $value->name }}</option>
                                        @endforeach
                                    </select>
                                </div>


                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card card-default color-palette-box card-primary card-outline text-sm">
                                <div class="card-header">
                                    <h3 class="card-title">Thông tin bài viết</h3>
                                </div>
                                <div class="card-body card-article">
                                    <div class="form-group title">
                                        <label for="name-product">Tên bài viết:</label>
                                        <input type="text" class="form-control check-valid text-sm" name="tenbaiviet"
                                            id="fullname" placeholder="Tên bài viết"
                                            @error('tenbaiviet') is-invalid @enderror>
                                        @error('tenbaiviet')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group titleProduct">
                                        <label for="nameProduct">Nội dung:</label>
                                        <textarea class="form-control  text-sm form-ckeditor" name="noidung" id="" rows="10"
                                            placeholder="Nội dung" @error('noidung') is-invalid @enderror>
                                            @error('noidung')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </textarea>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12">
                            <div class="card card-primary card-outline text-sm">
                                <div class="card-header">
                                    <h3 class="card-title">Hình ảnh bài viết</h3>
                                </div>
                                <div class="card-body">
                                    <div class="photoUpload-zone">
                                        <div class="photoUpload-detail" id="photoUpload-preview">
                                            <img class="rounded"
                                                onerror="src='{{ asset('assets/admin/images/noimage.png') }}'"
                                                src="" alt="Alt Photo" style="" />
                                        </div>
                                        <label class="photoUpload-file" id="photo-zone" for="file-zone">
                                            <input type="file" name="file" id="file-zone">
                                            <i class="fas fa-cloud-upload-alt"></i>
                                            <p class="photoUpload-drop">Kéo và thả hình vào đây</p>
                                            <p class="photoUpload-or">hoặc</p>
                                            <p class="photoUpload-choose btn btn-sm bg-gradient-success">Chọn hình</p>
                                        </label>
                                        <div class="photoUpload-dimension">Width: 734px - Height: 734px (.jpg|.png|.jpeg)</div>
                                    </div>
                                </div>
                            </div>

                            <div class="card card-primary card-outline text-sm">
                                <div class="card-header">
                                    <h3 class="card-title">Hình ảnh 2 bài viết</h3>
                                </div>
                                <div class="card-body">
                                    <div class="photoUpload-zone -bottom-3">
                                        <div class="photoUpload-detail" id="photoUpload-preview2">
                                            <img class="rounded"
                                                onerror="src='{{ asset('assets/admin/images/noimage.png') }}'"
                                                src="" alt="Alt Photo" style="" />
                                        </div>
                                        <label class="photoUpload-file" id="photo-zone2" for="file-zone2">
                                            <input type="file" name="file2" id="file-zone2">
                                            <i class="fas fa-cloud-upload-alt"></i>
                                            <p class="photoUpload-drop">Kéo và thả hình vào đây</p>
                                            <p class="photoUpload-or">hoặc</p>
                                            <p class="photoUpload-choose btn btn-sm bg-gradient-success">Chọn hình</p>
                                        </label>
                                        <div class="photoUpload-dimension">Width: 734px - Height: 734px (.jpg|.png|.jpeg)</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>
@endsection

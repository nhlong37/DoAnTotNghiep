@extends('admin.index')
@section('body')
    <div class="content-wrapper">
        <section class="content-header text-sm">
            <div class="container-fluid">
                <div class="row">
                    <ol class="breadcrumb float-sm-left pl-3">
                        <li class="breadcrumb-item"><a href="{{ route('trang-chu-admin') }}" title="Bảng điều khiển">Bảng điều
                                khiển</a></li>
                        <li class="breadcrumb-item active">Giới thiệu</li>
                    </ol>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                <form
                    action="{{ !empty($detailNew) ? route('xl-sua-gioi-thieu-admin', ['id' => $detailNew->id]) : route('xl-them-gioi-thieu-admin') }}"
                    method="POST" enctype="multipart/form-data">
                    @csrf
                    @if (!empty($detailNew))
                        @method('put')
                    @endif
                    <div class="card-footer text-sm sticky-top">
                        @if (!empty($detailNew))
                            <button type="submit" class="btn btn-sm bg-gradient-primary submit-check"><i
                                    class="far fa-save mr-2"></i>Cập nhật</button>
                        @else
                            <button type="submit" class="btn btn-sm bg-gradient-primary submit-check"><i
                                    class="far fa-save mr-2"></i>Lưu</button>
                        @endif
                        <button type="reset" class="btn btn-sm bg-gradient-secondary"><i class="fas fa-redo mr-2"></i>Làm
                            lại</button>
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
                                            value="{{ !empty($detailNew) ? $detailNew->name : '' }}"
                                            @error('tenbaiviet') is-invalid @enderror>
                                        @error('tenbaiviet')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group titleProduct">
                                        <label for="nameProduct">Nội dung:</label>
                                        <textarea class="form-control  text-sm form-ckeditor" name="noidung" id="" rows="10"
                                            placeholder="Nội dung" @error('noidung') is-invalid @enderror>
                                            {{ !empty($detailNew) ? $detailNew->content : '' }}
                                            @error('noidung')
<div class="invalid-feedback">{{ $message }}</div>
@enderror
                                        </textarea>
                                    </div>

                                </div>
                            </div>
                        </div>
                        {{-- <div class="col-xl-4">
                            <div class="card card-primary card-outline text-sm">
                                <div class="card-header">
                                    <h3 class="card-title">Hình ảnh giới thiệu</h3>
                                </div>
                                <div class="card-body">
                                    <div class="photoUpload-zone">
                                        <div class="photoUpload-detail" id="photoUpload-preview">
                                            @if ($update != null)
                                                @if ($update['photo'] != null)
                                                    <img src="{{ asset('upload/photo/' . $update['photo']) }}"
                                                        alt="" class="rounded" />
                                                @else
                                                    <img src="{{ asset('assets/admin/images/noimage.png') }}" alt=""
                                                        class="rounded" />
                                                @endif
                                            @else
                                                <img src="{{ asset('assets/admin/images/noimage.png') }}" alt=""
                                                    class="rounded" />
                                            @endif
                                        </div>
                                        <label class="photoUpload-file" id="photo-zone" for="file-zone">
                                            <input type="file" name="file" id="file-zone">
                                            <i class="fas fa-cloud-upload-alt"></i>
                                            <p class="photoUpload-drop">Kéo và thả hình vào đây</p>
                                            <p class="photoUpload-or">hoặc</p>
                                            <p class="photoUpload-choose btn btn-sm bg-gradient-success">Chọn hình</p>
                                        </label>
                                        <div class="photoUpload-dimension">Width: 734px - Height: 734px
                                            (.jpg|.png|.jpeg)</div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </form>
            </div>
        </section>
    </div>
@endsection


@extends('admin.index')
@section('body')
    <div class="content-wrapper">
        <section class="content-header text-sm">
            <div class="container-fluid">
                <div class="row">
                    <ol class="breadcrumb float-sm-left pl-3">
                        <li class="breadcrumb-item"><a href="{{ route('trang-chu-admin') }}" title="Bảng điều khiển">Bảng điều
                                khiển</a></li>
                        <li class="breadcrumb-item active">Chỉnh sửa hình ảnh</li>
                    </ol>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                <form class="validation-form" method="post" action="{{ route('xl-sua-doi-hinh-anh-admin', ['id' => $detailPhoto->id]) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-footer text-sm sticky-top">
                        <button type="submit" class="btn btn-sm bg-gradient-primary submit-check"><i class="far fa-save mr-2"></i>Lưu</button>
                        <button type="reset" class="btn btn-sm bg-gradient-secondary"><i class="fas fa-redo mr-2"></i>Làm lại</button>
                        <a class="btn btn-sm bg-gradient-danger" href="{{ route('hinh-anh-admin') }}" title="Thoát"><i class="fas fa-sign-out-alt mr-2"></i>Thoát</a>
                    </div>
                    <div class="card card-primary card-outline text-sm">
                        <div class="card-header">
                            <h3 class="card-title">Danh mục hình ảnh</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                        class="fas fa-minus"></i></button>
                            </div>
                        </div>
                        <div class="card-body">
                            @csrf
                            <div class="form-group-category row">
                            <div class="form-group title">
                                        <label for="name-newtype">Thông tin hình ảnh:</label>
                                        <input type="text" class="form-control for-seo text-sm" name="tenhinhanh"
                                            id="fullname" placeholder="Tên loại bài viết" value="{{ $detailPhoto->name }}" @error('tenhinhanh') is-invalid @enderror>
                                        @error('tenhinhanh') <div class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        
                        <div class="col-xl-12">
                            <div class="card card-primary card-outline text-sm">
                                <div class="card-header">
                                    <h3 class="card-title">Hình ảnh</h3>
                                </div>
                                <div class="card-body">
                                    {{-- Image --}}
                                    <div class="photoUpload-zone">
                                        <div class="photoUpload-detail" id="photoUpload-preview">
                                            <img class="rounded" onerror="src='{{ asset('assets/admin/images/noimage.png') }}'"
                                                src="{{ asset('upload/photo/' . $detailPhoto->photo) }}" alt="Alt Photo" style="" />
                                        </div>
                                        <label class="photoUpload-file" id="photo-zone" for="file-zone">
                                            <input type="file" name="file" id="file-zone">
                                            <i class="fas fa-cloud-upload-alt"></i>
                                            <p class="photoUpload-drop">Kéo và thả hình vào đây</p>
                                            <p class="photoUpload-or">hoặc</p>
                                            <p class="photoUpload-choose btn btn-sm bg-gradient-success">Chọn hình</p>
                                        </label>
                                        <div class="photoUpload-dimension">Width: 270px - Height: 270px (.jpg|.png|.jpeg)</div>
                                    </div>
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

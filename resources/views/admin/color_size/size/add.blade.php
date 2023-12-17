@extends('admin.index')
@section('body')
    <div class="content-wrapper">
        <section class="content-header text-sm">
            <div class="container-fluid">
                <div class="row">
                    <ol class="breadcrumb float-sm-left pl-3">
                        <li class="breadcrumb-item"><a href="{{ route('trang-chu-admin') }}" title="Bảng điều khiển">Bảng điều
                                khiển</a></li>
                        <li class="breadcrumb-item active">Thêm mới Size</li>
                    </ol>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                <form class="validation-form" method="post" action="{{route('xl-them-moi-kich-thuoc-admin')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-footer text-sm sticky-top">
                        <button type="submit" class="btn btn-sm bg-gradient-primary submit-check"><i class="far fa-save mr-2"></i>Lưu</button>
                        <button type="reset" class="btn btn-sm bg-gradient-secondary"><i class="fas fa-redo mr-2"></i>Làm lại</button>
                        <a class="btn btn-sm bg-gradient-danger" href="{{ route('kich-thuoc-admin') }}" title="Thoát"><i class="fas fa-sign-out-alt mr-2"></i>Thoát</a>
                    </div>
                    
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card card-default color-palette-box card-primary card-outline text-sm">
                                <div class="card-header">
                                    <h3 class="card-title">Thông tin Size</h3>
                                </div>
                                <div class="card-body card-article">
                                    <div class="form-group title">
                                        <label for="name-product">Size:</label>
                                        <input type="text" class="form-control for-seo text-sm" name="tensize"
                                            id="fullname" placeholder="Size" @error('tensize') is-invalid @enderror>
                                        @error('tensize') <div class="invalid-feedback">{{ $message }}</div>@enderror
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

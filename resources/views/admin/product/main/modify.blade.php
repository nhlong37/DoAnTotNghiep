@extends('admin.index')
@section('body')
    <div class="content-wrapper">
        <section class="content-header text-sm">
            <div class="container-fluid">
                <div class="row">
                    <ol class="breadcrumb float-sm-left pl-3">
                        <li class="breadcrumb-item"><a href="{{ route('trang-chu-admin') }}" title="Bảng điều khiển">Bảng điều
                                khiển</a></li>

                        <li class="breadcrumb-item"><a href="{{ route('sanpham-lv1-admin') }}" title="Quản lý sản phẩm">Quản
                                lý sản phẩm</a></li>

                        <li class="breadcrumb-item active">Chỉnh sửa sản phẩm</li>
                    </ol>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                <form class="validation-form" method="post"
                    action="{{ route('xl-sua-doi-san-pham-admin', ['id' => $detailSP->id]) }}"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="card-footer text-sm sticky-top">
                        <button type="submit" class="btn btn-sm bg-gradient-primary submit-check"><i
                                class="far fa-save mr-2"></i>Lưu</button>
                        <button type="reset" class="btn btn-sm bg-gradient-secondary"><i class="fas fa-redo mr-2"></i>Làm
                            lại</button>
                        <a class="btn btn-sm bg-gradient-danger" href="{{ route('san-pham-admin') }}" title="Thoát"><i
                                class="fas fa-sign-out-alt mr-2"></i>Thoát</a>
                    </div>
                    <div class="card card-primary card-outline text-sm">
                        <div class="card-header">
                            <h3 class="card-title">Danh mục sản phẩm</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                        class="fas fa-minus"></i></button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group-category row">

                                <div class="form-group col-xl-6 col-sm-4">
                                    <label class="d-block" for="id_list">Danh mục thương hiệu:</label>
                                    <select id="select-brand" name="brand" class="form-control select2">
                                        <option value="0">Chọn Danh mục</option>
                                        @foreach ($level1 as $k => $value)
                                            <option value="{{ $value->id }}"
                                                {{ $value->id == $detailSP->id_brand ? 'selected' : '' }}>
                                                {{ $value->name }}</option>
                                        @endforeach
                                    </select>

                                </div>

                                <div class="form-group col-xl-6 col-sm-4">
                                    <label class="d-block" for="id_list">Danh mục loại sản phẩm:</label>
                                    <select id="select-type" name="type" class="form-control select2">
                                        <option value="0">Chọn Danh mục</option>
                                        @foreach ($level2 as $k => $value)
                                            <option value="{{ $value->id }}"
                                                {{ $value->id == $detailSP->id_type ? 'selected' : '' }}>
                                                {{ $value->name }}</option>
                                        @endforeach
                                    </select>

                                </div>

                                <div class="form-group col-xl-6 col-sm-4">
                                    <label class="d-block" for="id_color">Danh mục màu sắc:</label>
                                    <select id="select-color" name="color[]" class="select multiselect" multiple="multiple">
                                        @foreach ($dsColor as $value)
                                            @php
                                                $check = '';
                                                if (in_array($value->id, $arrIdColor)) {
                                                    $check = 'selected="selected"';
                                                }
                                            @endphp
                                            <option value="{{ $value->id }}" {{ $check }}>{{ $value->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group col-xl-6 col-sm-4">
                                    <label class="d-block" for="id_size">Danh mục kích thước:</label>
                                    <select id="select-size" name="size[]" class="select multiselect" multiple="multiple">
                                        @foreach ($dsSize as $value)
                                            @php
                                                $check = '';
                                                if (in_array($value->id, $arrIdSize)) {
                                                    $check = 'selected="selected"';
                                                }
                                            @endphp
                                            <option value="{{ $value->id }}" {{ $check }}>{{ $value->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-8">
                            <div class="card card-default color-palette-box card-primary card-outline text-sm">
                                <div class="card-header">
                                    <h3 class="card-title">Thông tin sản phẩm</h3>
                                </div>
                                <div class="card-body card-article">
                                    <div class="form-group title">
                                        <label for="name-product">Tên sản phẩm:</label>
                                        <input type="text" class="form-control for-seo text-sm" name="tensp"
                                            id="fullname" placeholder="Tên sản phẩm" value="{{ $detailSP->name }}"
                                            @error('tensp') is-invalid @enderror>
                                        @error('tensp')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group titleProduct">
                                        <label for="nameProduct">Nội dung:</label>
                                        <textarea class="form-control for-seo text-sm form-ckeditor" name="noidung" id="" rows="10"
                                            placeholder="Nội dung">{!! $detailSP->content !!}</textarea>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-3">
                                            <label class="d-block" for="code-product">Mã sản phẩm:</label>
                                            <input type="text" class="form-control text-sm" name="masp"
                                                id="code" placeholder="Mã sản phẩm" value="{{ $detailSP->code }}"
                                                readonly>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="d-block" for="code-product">Số lượng tồn kho:</label>
                                            <input type="text" class="form-control check-valid text-sm" name="soluong"
                                                id="code" placeholder="Số lượng tồn kho"
                                                @error('soluong') is-invalid @enderror value="{{ $detailSP->quantity }}">
                                            @error('soluong')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="d-block" for="regular_price">Giá gốc:</label>
                                            <div class="input-group">
                                                <input type="text"
                                                    class="form-control format-price regular_price text-sm" name="giagoc"
                                                    id="regular_price" placeholder="Giá gốc"
                                                    value="{{ $detailSP->price_regular }}">
                                                <div class="input-group-append">
                                                    <div class="input-group-text"><strong>VNĐ</strong></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="d-block" for="sale_price">Giá mới:</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control format-price sale_price text-sm"
                                                    name="giamoi" id="sale_price" placeholder="Giá mới"
                                                    value="{{ $detailSP->sale_price }}">
                                                <div class="input-group-append">
                                                    <div class="input-group-text"><strong>VNĐ</strong></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4">

                            <div class="card card-primary card-outline text-sm">
                                <div class="card-header">
                                    <h3 class="card-title">Hình ảnh sản phẩm</h3>
                                </div>
                                <div class="card-body">
                                    {{-- Image --}}
                                    <div class="photoUpload-zone">
                                        <div class="photoUpload-detail" id="photoUpload-preview">
                                            <img class="rounded"
                                                onerror="src='{{ asset('assets/admin/images/noimage.png') }}'"
                                                src="{{ asset('upload/product/' . $detailSP->photo) }}" alt="Alt Photo"
                                                style="" />
                                        </div>
                                        <label class="photoUpload-file" id="photo-zone" for="file-zone">
                                            <input type="file" name="file" id="file-zone">
                                            <i class="fas fa-cloud-upload-alt"></i>
                                            <p class="photoUpload-drop">Kéo và thả hình vào đây</p>
                                            <p class="photoUpload-or">hoặc</p>
                                            <p class="photoUpload-choose btn btn-sm bg-gradient-success">Chọn hình</p>
                                        </label>
                                        <div class="photoUpload-dimension">Width: 734px - Height: 734px (.jpg|.png|.jpeg)
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card card-primary card-outline text-sm">
                        <div class="card-header">
                            <h3 class="card-title">Album sản phẩm</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                        class="fas fa-minus"></i></button>
                            </div>
                        </div>
                        <div class="card-body upload__box">
                            <input type="hidden" name="gallery_table" id="gallery_table" value="gallery">
                            <div class="form-group">
                                <label for="filer-gallery" class="label-filer-gallery mb-3">Album hình:
                                    (.jpg|.png|.jpeg)</label>
                                <input type="file" name="filenames[]" id="filer-gallery" data-table="gallery"
                                    multiple="multiple" data-max_length="50">
                                <input type="hidden" class="col-filer"
                                    value="col-xl-2 col-lg-3 col-md-3 col-sm-4 col-6">
                            </div>
                            <div class="container-upload-img">
                                @foreach ($dsGallery as $item)
                                    <div class="col-img">
                                        <div class="card mb-4 shadow-sm">
                                            <a class="delete_1hinh" data-id="{{$item->id}}" title="Xóa ảnh này ?">
                                                <svg fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"></path></svg>
                                            </a>
                                            <img class="rounded"
                                                onerror="src='{{ asset('assets/admin/images/noimage.png') }}'"
                                                src="{{ asset('upload/album/' . $item->photo) }}" alt="Alt Photo"
                                                style="" />
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>
@endsection

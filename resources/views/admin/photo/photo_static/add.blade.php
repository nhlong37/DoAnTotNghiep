@extends('admin.index')
@section('body')
    <div class="content-wrapper">
        <section class="content-header text-sm">
            <div class="container-fluid">
                <div class="row">
                    <ol class="breadcrumb float-sm-left pl-3">
                        <li class="breadcrumb-item"><a href="{{ route('trang-chu-admin') }}" title="Bảng điều khiển">Bảng điều
                                khiển</a></li>
                        <li class="breadcrumb-item active">Logo</li>
                    </ol>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                <form
                    action="{{ $convert_photo != null ? route('handleupdatphoto-admin', ['id' => $convert_photo['id'], 'type' => $type_man, 'cate' => 'static']) : route('handleaddphoto-admin', ['type' => $type_man, 'cate' => 'static']) }}"
                    method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-footer text-sm sticky-top">
                        @if ($convert_photo != null)
                            <button type="submit" class="btn btn-sm bg-gradient-primary submit-check"><i
                                    class="far fa-save mr-2"></i>Cập nhật</button>
                        @else
                            <button type="submit" class="btn btn-sm bg-gradient-primary submit-check"><i
                                    class="far fa-save mr-2"></i>Lưu</button>
                        @endif
                        <button type="reset" class="btn btn-sm bg-gradient-secondary"><i class="fas fa-redo mr-2"></i>Làm
                            lại</button>
                    </div>
                    <div class="card card-primary card-outline text-sm">
                        <div class="card-header">
                            <h3 class="card-title">Hình ảnh</h3>
                        </div>
                        <div class="card-body">
                            <div class="box_photo_man mb-3">
                                <div class="box_img mb-3">
                                    @if ($convert_photo != null)
                                        @if ($convert_photo['photo'] != null)
                                            <img src="{{ asset('upload/photo/' . $convert_photo['photo']) }}"
                                                alt="" style="max-width: 300px" />
                                        @else
                                            <img src="{{ asset('assets/admin/images/noimage.png') }}" alt="" style="max-width: 300px"/>
                                        @endif
                                    @else
                                        <img src="{{ asset('assets/admin/images/noimage.png') }}" alt="" style="max-width: 300px" />
                                    @endif
                                </div>
                                <div class="input-group mb-3">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input form-control" name="photo_man" id="photo_man" value="{{ $convert_photo != null ? $convert_photo['photo'] : '' }}" />
                                        <label class="custom-file-label" for="photo_man">Chọn hình ảnh...</label>
                                    </div>
                                </div>
                                @error('photo_man')
                                    <span class="message_red">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="box_input">
                                <label for="title">Tên hình ảnh</label>
                                <input type="text" class="form-control" name="photo_name" id="photo_name"
                                    placeholder="Tên hình ảnh"
                                    value="{{ $convert_photo != null ? $convert_photo['name'] : '' }}">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>
@endsection

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TablePhoto;
use Illuminate\Support\Str;

class PhotoController extends Controller
{
    public function index($type,$cate) {
        if($cate == 'man') {
            $limit =  10;
            $dsPhoto = TablePhoto::where('type',$type)->latest()->paginate($limit);
            $type_man = $type;
            // lấy trang hiện tại
            $current = $dsPhoto->currentPage();
            // lấy số thứ tự đầu tiên nhưng theo dạng mảng (là số 0)
            $perSerial = $limit * ($current - 1);
            $serial = $perSerial + 1;
            return view('admin.photo.photo_man.index', compact('dsPhoto','type_man','serial'));
        } else if($cate == 'static') {
            $type_man = $type;            
            $photo = TablePhoto::where('type',$type)->get()->toArray();
            if($photo != null) {
                $convert_photo = TablePhoto::where('type',$type)->firstOrFail();
            } else {
                $convert_photo = NULL;
            }
            return view('admin.photo.photo_static.add', compact('convert_photo','type_man'));  
        } else {
            return  view('admin.index');  
        }
    }

    public function loadAddPhoto($type,$cate) {
        $type_man = $type;
        $update = null;
        if($cate == 'man') {
            return view('admin.photo.photo_man.add', compact('update','type_man'));
        }
    }

    public function handleAddPhoto(Request $data, $type, $cate) {
        $add = new TablePhoto;
        $data->validate(
            [
                'photo_man' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5120',
            ],
            [
                'photo_man.mimes' => 'Ảnh phải là những định dạng jpeg, png, jpg, gif, svg',
                'photo_man.max' => 'Ảnh chỉ nhập ảnh có kích thước bé hơn 5MB',
            ]
        );
        if($data->photo_man != NULL) {
            $images = $data->photo_man;      
            $imageName = time().'.'.$images->extension();  
            $images->move(public_path('upload/photo'), $imageName);
            $add->photo = $imageName;
        }
        $add->type = $type;
        $add->name = $data->photo_name;
        $add->link = $data->photo_link;
        if($cate == 'man') {
            $add->save();
            return redirect()->route('photo-admin',[$type,$cate])->with('noti','Thêm hình ảnh thành công !!!');
        } else {
            $add->save();
            return redirect()->route('photo-admin',[$type,$cate])->with('noti','Thêm hình ảnh thành công !!!');
        }
    }

    public function loadUpdatPhoto($id, $type, $cate)
    {
        $pageName = 'Chỉnh sửa hình ảnh';
        $update = TablePhoto::find($id);
        $type_man = $type;

        if ($update == null) {
            return view('admin.photo.photo_man.index');
        } else {
            return view('admin.photo.photo_man.add', compact('update','type_man'));
        }
    }

    public function handleUpdatPhoto(Request $data, $id, $type, $cate) {
        $add = TablePhoto::find($id);
        $data->validate(
            [
                'photo_man' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5120',
            ],
            [
                'photo_man.mimes' => 'Ảnh phải là những định dạng jpeg, png, jpg, gif, svg',
                'photo_man.max' => 'Ảnh chỉ nhập ảnh có kích thước bé hơn 2MB',
            ]
        );

        if($data->photo_man != NULL) {
            if($add['photo'] != NULL) {
                $removeFile = public_path('upload/photo/'.$add['photo']);
                if(file_exists($removeFile)) {
                    unlink($removeFile);
                }
            }
            $images = $data->photo_man;      
            $imageName = time().'.'.$images->extension();  
            $images->move(public_path('upload/photo/'), $imageName);
            $add->photo = $imageName;
        }
        $add->type = $type;
        $add->name = $data->photo_name;
        $add->link = $data->photo_link;
        if($cate == 'man') {
            $add->save();
            return redirect()->route('photo-admin',[$type,$cate])->with('noti','Cập nhật dung lượng thành công !!!');
        } else {
            $add->save();
            return redirect()->route('photo-admin',[$type,$cate])->with('noti','Cập nhật dung lượng thành công !!!');
        }
    }

    public function deletPhoto($id, $type, $cate)
    {
        $dlt = TablePhoto::find($id);
        if ($dlt == null || $dlt->deleted_at != NULL) {
            return view('photo');
        } else {
            if($dlt['photo'] != NULL) {
                $removeFile = public_path('upload/photo/'.$dlt['photo']);
                if(file_exists($removeFile)) {
                    unlink($removeFile);
                }
            }
            $dlt->delete();
            return redirect()->route('photo-admin',[$type,$cate]);
        }
    }
}

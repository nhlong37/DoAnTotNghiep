<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TablePhoto;
use Illuminate\Support\Str;
class PhotoController extends Controller
{
    public function getsphoto(Request $req)
    {
        $limit =  10;
        //latest() = orderBy('created_at','desc')
        $dsPhoto = TablePhoto::latest()->paginate($limit);
        // lấy trang hiện tại
        $current = $dsPhoto->currentPage();
        // lấy số thứ tự đầu tiên nhưng theo dạng mảng (là số 0)
        $perSerial = $limit * ($current - 1);
        $serial = $perSerial + 1;
        return view('.admin.photo.list', compact('dsPhoto', 'serial'));
    }
    public function Return_tpladm_addphoto()
    {
        $photo = TablePhoto::all();
       

        return view('.admin.photo.add', compact('photo'));
    }

    public function addphoto(Request $req)
    {

        $random = Str::random(5);

        // tạo 1 item mới
        $itemphoto = new TablePhoto();
        // lưu các mục vào csdl
        $itemphoto->name = $req->tenhinhanh;

        if ($req->file != null) {
            // lọc ra đuôi file
            $extension = $req->file->getClientOriginalExtension();
            if ($extension == 'jpg' || $extension == 'png' || $extension = 'jpeg') {
                // đổi tên hình
                $filename = 'photo-' . $random . '.' . $req->file->getClientOriginalExtension();
                // lấy tên file để lưu vào csdl
                $itemphoto->photo = $filename;
                //Lưu trữ file vào thư mục product trong public -> upload -> product
                $req->file->move(public_path('upload/photo/'), $filename);
            } else {
                return redirect()->back();
            }
        }
        $itemphoto->save();

        return redirect()->route('hinh-anh-admin');
    }

    public function Return_tpladm_modifyphoto(Request $req, $id)
    {
        $photo = TablePhoto::find($id);

        return view('.admin.photo.modify', ['detailPhoto'  => $photo]);
    }

    public function modifyphoto(Request $req, $id)
    {
        // tạo 1 chuỗi ngẫu nhiên 
        $random = Str::random(5);

        //tìm xem sản phẩm có hay không
        $itemphoto = TablePhoto::find($id);
        if ($itemphoto == null) {
            return "không tìm thấy hình ảnh nào có ID = {$id} này";
        }
        $itemphoto->name = $req->tenhinhanh;

            // lọc ra đuôi file
            $extension = $req->file->getClientOriginalExtension();
            if ($extension == 'jpg' || $extension == 'png' || $extension = 'jpeg' || $extension == 'gif') {
                // đổi tên hình
                $filename = 'photo-' . $random . '.' . $req->file->getClientOriginalExtension();
                // lấy tên file để lưu vào csdl
                $itemphoto->photo = $filename;
                //Lưu trữ file vào thư mục new trong public -> upload -> new
                $req->file->move(public_path('upload/photo/'), $filename);
            } else {
                
                return redirect()->back();
            }
        

        $itemphoto->save();
        return redirect()->route('hinh-anh-admin');
    }

    public function deletephoto(Request $req)
    {
        $photo = TablePhoto::find($req->id);
        if ($photo == null) {
            return "không tìm thấy thấy hình ảnh nào có ID = {$req->id} này";
        }

        $photo->delete();
        return redirect()->route('hinh-anh-admin');
    }
}

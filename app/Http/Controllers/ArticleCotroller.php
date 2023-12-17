<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TableArticle;
use App\Models\TableTypeArticle;
use Illuminate\Support\Str;
use App\Http\Requests\xlAddRequestNew;

class ArticleCotroller extends Controller
{
    //
    public function getsnew(Request $req)
    {
        $limit =  10;
        //latest() = orderBy('created_at','desc')
        $dsNew = TableArticle::latest()->paginate($limit);
        // lấy trang hiện tại
        $current = $dsNew->currentPage();
        // lấy số thứ tự đầu tiên nhưng theo dạng mảng (là số 0)
        $perSerial = $limit * ($current - 1);
        $serial = $perSerial + 1;
        return view('.admin.new.list', compact('dsNew', 'serial'));
    }
    public function Return_tpladm_addnew()
    {
        $dsType = TableTypeArticle::all();
        return view('.admin.new.add', compact('dsType'));
    }

    public function addnews(xlAddRequestNew $req)
    {

        $random = Str::random(5);

        // tạo 1 item mới
        $itemnew = new TableArticle();
        // lưu các mục vào csdl
        $itemnew->name = $req->tenbaiviet;
        $itemnew->content = htmlspecialchars($req->noidung);
        ($req->type > 0) ? $itemnew->id_type = $req->type : 0;
        if ($req->file != null) {
            // kiểm tra kích thước
            $size = $req->file->getSize();
            if ($size > 512000) {
                return "Dung lượng hình ảnh lớn. Dung lượng cho phép <= 500MB ~ 512000KB";
            }
            // lọc ra đuôi file
            $extension = $req->file->getClientOriginalExtension();
            if ($extension == 'jpg' || $extension == 'png' || $extension = 'jpeg') {
                // đổi tên hình
                $filename = 'article-' . $random . '.' . $req->file->getClientOriginalExtension();
                // lấy tên file để lưu vào csdl
                $itemnew->photo = $filename;
                //Lưu trữ file vào thư mục product trong public -> upload -> product
                $req->file->move(public_path('upload/article/'), $filename);
            } else {
                return "Định dạng ảnh không đúng. Định dạng cho phép (.jpg|.png|.jpeg)";
            }
        }
        if ($req->file2 != null) {
            // kiểm tra kích thước
            $size = $req->file2->getSize();
            if ($size > 512000) {
                return "Dung lượng hình ảnh lớn. Dung lượng cho phép <= 500MB ~ 512000KB";
            }
            // lọc ra đuôi file2
            $extension = $req->file2->getClientOriginalExtension();
            if ($extension == 'jpg' || $extension == 'png' || $extension = 'jpeg') {
                // đổi tên hình
                $filename2 = 'article-' . $random . '.' . $req->file2->getClientOriginalExtension();
                // lấy tên file2 để lưu vào csdl
                $itemnew->photo2 = $filename2;
                //Lưu trữ file2 vào thư mục product trong public -> upload -> product
                $req->file2->move(public_path('upload/article/'), $filename);
            } else {
                return "Định dạng ảnh không đúng. Định dạng cho phép (.jpg|.png|.jpeg)";
            }
        }
        $itemnew->save();
        return redirect()->route('bai-viet-admin');
    }
    public function Return_tpladm_modifynew(Request $req, $id)
    {
        $new = TableArticle::find($id);
        $dsType = TableTypeArticle::all();
        return view('.admin.new.modify', ['detailNew'  => $new], compact('dsType'));
    }

    public function modifynews(xlAddRequestNew $req, $id)
    {
        // tạo 1 chuỗi ngẫu nhiên 
        $random = Str::random(5);

        $itemnew = TableArticle::find($id);
        if ($itemnew == null) {
            return "không tìm thấy bài viết nào có ID = {$id} này";
        }
        $itemnew->name = $req->tenbaiviet;
        $itemnew->content = htmlspecialchars($req->noidung);
        ($req->type > 0) ? $itemnew->id_type = $req->type : 0;
        if ($req->file != null) {
            // kiểm tra kích thước
            $size = $req->file->getSize();
            if ($size > 512000) {
                return "Dung lượng hình ảnh lớn. Dung lượng cho phép <= 500MB ~ 512000KB";
            }
            // lọc ra đuôi file
            $extension = $req->file->getClientOriginalExtension();
            if ($extension == 'jpg' || $extension == 'png' || $extension = 'jpeg') {
                // đổi tên hình
                $filename = 'article-' . $random . '.' . $req->file->getClientOriginalExtension();
                // lấy tên file để lưu vào csdl
                $itemnew->photo = $filename;
                //Lưu trữ file vào thư mục product trong public -> upload -> product
                $req->file->move(public_path('upload/article/'), $filename);
            } else {
                return "Định dạng ảnh không đúng. Định dạng cho phép (.jpg|.png|.jpeg)";
            }
        }

        if ($req->file2 != null) {
            // kiểm tra kích thước
            $size = $req->file2->getSize();
            if ($size > 512000) {
                return "Dung lượng hình ảnh lớn. Dung lượng cho phép <= 500MB ~ 512000KB";
            }
            // lọc ra đuôi file2
            $extension = $req->file2->getClientOriginalExtension();
            if ($extension == 'jpg' || $extension == 'png' || $extension = 'jpeg') {
                // đổi tên hình
                $filename2 = 'article-' . $random . '.' . $req->file2->getClientOriginalExtension();
                // lấy tên file2 để lưu vào csdl
                $itemnew->photo2 = $filename2;
                //Lưu trữ file2 vào thư mục product trong public -> upload -> product
                $req->file2->move(public_path('upload/article/'), $filename2);
            } else {
                return "Định dạng ảnh không đúng. Định dạng cho phép (.jpg|.png|.jpeg)";
            }
        }
        $itemnew->save();

        return redirect()->route('bai-viet-admin');
    }

    public function deletenews(Request $req)
    {
        $new = TableArticle::find($req->id);
        if ($new == null) {
            return "không tìm thấy thấy bài viết nào có ID = {$req->id} này";
        }

        $new->delete();
        return redirect()->route('bai-viet-admin');
    }

    public function searchArticleAdmin(Request $req)
    {
        //kiểm tra xem nhập keyword chưa
        if ($req->keyword != null) {
            $limit = 10;
            $dsNew = TableArticle::where('name', 'like', '%' . $req->keyword . '%')->latest()->paginate($limit);
            // lấy trang hiện tại
            $current = $dsNew->currentPage();
            // lấy số thứ tự đầu tiên nhưng theo dạng mảng (là số 0)
            $perSerial = $limit * ($current - 1);
            $serial = $perSerial + 1;
        }
        return view('.admin.new.list', compact('dsNew','serial'));
    }
}

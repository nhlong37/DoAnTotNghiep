<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TableArticle;
use App\Models\TableTypeArticle;
use Illuminate\Support\Str;
use App\Http\Requests\xlAddRequestNew;

class ArticleCotroller extends Controller
{
    // Tin tức // 
    public function getnews(Request $req)
    {
        $limit =  10;
        $dsNew = TableArticle::where('type','tin-tuc')->latest()->paginate($limit);
        // lấy trang hiện tại
        $current = $dsNew->currentPage();
        // lấy số thứ tự đầu tiên nhưng theo dạng mảng (là số 0)
        $perSerial = $limit * ($current - 1);
        $serial = $perSerial + 1;
        return view('.admin.article.news.list', compact('dsNew', 'serial'));
    }
    public function return_tpladm_addnew()
    {
        return view('.admin.article.news.add');
    }

    public function addnews(xlAddRequestNew $req)
    {

        $random = Str::random(5);

        // tạo 1 item mới
        $itemnew = new TableArticle();
        // lưu các mục vào csdl
        $itemnew->name = $req->tenbaiviet;
        $itemnew->content = htmlspecialchars($req->noidung);
        $itemnew->type = 'tin-tuc';
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
        $itemnew->save();
        return redirect()->route('tin-tuc-admin');
    }
    public function return_tpladm_modifynew(Request $req, $id)
    {
        $new = TableArticle::find($id);
        return view('.admin.article.news.modify', ['detailNew'  => $new]);
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
        $itemnew->type = 'tin-tuc';
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
        
        $itemnew->save();

        return redirect()->route('tin-tuc-admin');
    }

    public function deletenews(Request $req)
    {
        $new = TableArticle::find($req->id);
        if ($new == null) {
            return "không tìm thấy thấy bài viết nào có ID = {$req->id} này";
        }

        $new->delete();
        return redirect()->route('tin-tuc-admin');
    }

    public function searchNewsAdmin(Request $req)
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
        return view('.admin.article.news.list', compact('dsNew','serial'));
    }
    
    // Chính sách //

    public function getpolicies(Request $req)
    {
        $limit =  10;
        //latest() = orderBy('created_at','desc')
        $dsNew = TableArticle::where('type','chinh-sach')->latest()->paginate($limit);
        // lấy trang hiện tại
        $current = $dsNew->currentPage();
        // lấy số thứ tự đầu tiên nhưng theo dạng mảng (là số 0)
        $perSerial = $limit * ($current - 1);
        $serial = $perSerial + 1;
        return view('.admin.article.policies.list', compact('dsNew', 'serial'));
    }
    public function return_tpladm_addpolicies()
    {
        return view('.admin.article.policies.add');
    }

    public function addpolicies(xlAddRequestNew $req)
    {

        $random = Str::random(5);

        // tạo 1 item mới
        $itemnew = new TableArticle();
        // lưu các mục vào csdl
        $itemnew->name = $req->tenbaiviet;
        $itemnew->content = htmlspecialchars($req->noidung);
        $itemnew->type = 'chinh-sach';
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
        $itemnew->save();
        return redirect()->route('chinh-sach-admin');
    }
    public function return_tpladm_modifypolicies(Request $req, $id)
    {
        $new = TableArticle::find($id);
        return view('.admin.article.policies.modify', ['detailNew'  => $new]);
    }

    public function modifypolicies(xlAddRequestNew $req, $id)
    {
        // tạo 1 chuỗi ngẫu nhiên 
        $random = Str::random(5);

        $itemnew = TableArticle::find($id);
        if ($itemnew == null) {
            return "không tìm thấy bài viết nào có ID = {$id} này";
        }
        $itemnew->name = $req->tenbaiviet;
        $itemnew->content = htmlspecialchars($req->noidung);
        $itemnew->type = 'chinh-sach';
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
        
        $itemnew->save();

        return redirect()->route('chinh-sach-admin');
    }

    public function deletepolicies(Request $req)
    {
        $new = TableArticle::find($req->id);
        if ($new == null) {
            return "không tìm thấy thấy bài viết nào có ID = {$req->id} này";
        }

        $new->delete();
        return redirect()->route('chinh-sach-admin');
    }

    public function searchPoliciesAdmin(Request $req)
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
        return view('.admin.article.policies.list', compact('dsNew','serial'));
    }
    // Chính sách //
}

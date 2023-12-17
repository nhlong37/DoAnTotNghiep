<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\xlAddRequestNewType;
use Illuminate\Support\Str;
use App\Models\TableTypeArticle;
class TypeArticleCotroller extends Controller
{
    //
    public function getsnewtype(Request $req)
    {
        $limit =  10;
        //latest() = orderBy('created_at','desc')
        $dsNewType = TableTypeArticle::latest()->paginate($limit);
        // lấy trang hiện tại
        $current = $dsNewType->currentPage();
        // lấy số thứ tự đầu tiên nhưng theo dạng mảng (là số 0)
        $perSerial = $limit * ($current - 1);
        $serial = $perSerial + 1;
        return view('.admin.newtype.list', compact('dsNewType', 'serial'));
    }
    public function Return_tpladm_addnewtype()
    {
        $newtype = TableTypeArticle::all();
       

        return view('.admin.newtype.add', compact('newtype'));
    }

    public function addnewstype(xlAddRequestNewType $req)
    {

        $random = Str::random(5);

        // tạo 1 item mới
        $itemnewtype = new TableTypeArticle();
        // lưu các mục vào csdl
        $itemnewtype->name = $req->tenloaibaiviet;

        $itemnewtype->save();

        return redirect()->route('loai-bai-viet-admin');
    }

    public function Return_tpladm_modifynewtype(Request $req, $id)
    {
        $newtype = TableTypeArticle::find($id);

        return view('.admin.newtype.modify', ['detailNewType'  => $newtype]);
    }

    public function modifynewtypes(xlAddRequestNewType $req, $id)
    {
        // tạo 1 chuỗi ngẫu nhiên 
        $random = Str::random(5);

        //tìm xem sản phẩm có hay không
        $itemnewtype = TableTypeArticle::find($id);
        if ($itemnewtype == null) {
            return "không tìm thấy loại bài viết nào có ID = {$id} này";
        }
        $itemnewtype->name = $req->tenloaibaiviet;

        $itemnewtype->save();
        return redirect()->route('loai-bai-viet-admin');
    }

    public function deletenewtypes(Request $req)
    {
        $newtype = TableTypeArticle::find($req->id);
        if ($newtype == null) {
            return "không tìm thấy thấy loại bài viết nào có ID = {$req->id} này";
        }

        $newtype->delete();
        return redirect()->route('loai-bai-viet-admin');
    }
    public function searchTypeArticle(Request $req)
    {
        //kiểm tra xem nhập keyword chưa
        if ($req->keyword != null) {
            $limit = 10;
            $dsNewType = TableTypeArticle::where('name', 'like', '%' . $req->keyword . '%')->latest()->paginate($limit);
            // lấy trang hiện tại
            $current = $dsNewType->currentPage();
            // lấy số thứ tự đầu tiên nhưng theo dạng mảng (là số 0)
            $perSerial = $limit * ($current - 1);
            $serial = $perSerial + 1;
        }
        return view('.admin.newtype.list', compact('dsNewType','serial'));
    }
}

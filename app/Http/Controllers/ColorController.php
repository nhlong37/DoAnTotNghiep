<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TableColor;
use App\Models\TableSize;
use App\Http\Requests\xlAddRequestColor;
use App\Http\Requests\xlAddRequestSize;

class ColorController extends Controller
{
    public function getcolors(Request $req)
    {
        $limit =  10;
        $dscolor = TableColor::latest()->paginate($limit);
        // lấy trang hiện tại
        $current = $dscolor->currentPage();
        // lấy số thứ tự đầu tiên nhưng theo dạng mảng (là số 0)
        $perSerial = $limit * ($current - 1);
        $serial = $perSerial + 1;
        return view('.admin.color_size.color.list', compact('dscolor', 'serial'));
    }

    public function Return_tpladm_addcolor()
    {
        return view('.admin.color_size.color.add');
    }

    public function addColor(xlAddRequestColor $req)
    {
        // tạo 1 item mới
        $itemColor = new TableColor();
        // lưu các mục vào csdl
        $itemColor->name = $req->tenmau;
        $itemColor->code = $req->mamau;

        $itemColor->save();
        return redirect()->route('mau-sac-admin');
    }

    public function Return_tpladm_modifycolor(Request $req, $id)
    {
        $itemColor = TableColor::find($id);
        return view('.admin.color_size.color.modify', ['detailColor' => $itemColor]);
    }

    public function modifyColor(xlAddRequestColor $req, $id)
    {
        //tìm xem sản phẩm có hay không
        $itemColor = TableColor::where('id', $id)->first();
        if ($itemColor == null) {
            return "không tìm thấy danh mục màu nào có ID = {$id} này ";
        }
        $itemColor->code = $req->mamau;
        $itemColor->name = $req->tenmau;

        $itemColor->save();
        return redirect()->route('mau-sac-admin');
    }

    public function deleteColor(Request $req)
    {
        $itemColor = TableColor::find($req->id);
        if ($itemColor == null) {
            return "không tìm thấy sản phẩm có ID = {$req->id} này";
        }

        $itemColor->delete();
        return redirect()->route('mau-sac-admin');
    }

    public function getsizes(Request $req)
    {
        $limit =  10;
        $dsSize = TableSize::latest()->paginate($limit);
       
        // lấy trang hiện tại
        $current = $dsSize->currentPage();
        // lấy số thứ tự đầu tiên nhưng theo dạng mảng (là số 0)
        $perSerial = $limit * ($current - 1);
        $serial = $perSerial + 1;
        return view('.admin.color_size.size.list', compact('dsSize', 'serial'));
    }

    public function Return_tpladm_addsize()
    {
        return view('.admin.color_size.Size.add');
    }

    public function addSize(xlAddRequestSize $req)
    {
        // tạo 1 item mới
        $itemSize = new TableSize();
        // lưu các mục vào csdl
        $itemSize->name = $req->tensize;

        $itemSize->save();
        return redirect()->route('kich-thuoc-admin');
    }

    public function Return_tpladm_modifysize(Request $req, $id)
    {
        $itemSize = TableSize::find($id);
        return view('.admin.color_size.size.modify', ['detailSize' => $itemSize]);
    }

    public function modifySize(xlAddRequestSize $req, $id)
    {
        //tìm xem sản phẩm có hay không
        $itemSize = TableSize::where('id', $id)->first();
        if ($itemSize == null) {
            return "không tìm thấy size nào có ID = {$id} này";
        }
        $itemSize->name = $req->tensize;

        $itemSize->save();
        return redirect()->route('kich-thuoc-admin');
    }

    public function deleteSize(Request $req)
    {
        $itemSize = TableSize::find($req->id);
        if ($itemSize == null) {
            return "không tìm thấy size nào có ID = {$req->id} này";
        }

        $itemSize->delete();
        return redirect()->route('kich-thuoc-admin');
    }

    public function searchColorAdmin(Request $req)
    {
        //kiểm tra xem nhập keyword chưa
        if ($req->keyword != null) {
            $limit = 10;
            $dscolor = TableColor::where('name', 'like', '%' . $req->keyword . '%')->latest()->paginate($limit);
            // lấy trang hiện tại
            $current = $dscolor->currentPage();
            // lấy số thứ tự đầu tiên nhưng theo dạng mảng (là số 0)
            $perSerial = $limit * ($current - 1);
            $serial = $perSerial + 1;
        }
        return view('.admin.color_size.color.list', compact('dscolor','serial'));
    }

    public function searchSizeAdmin(Request $req)
    {
        //kiểm tra xem nhập keyword chưa
        if ($req->keyword != null) {
            $limit = 10;
            //kiểm tra xem nhập keyword chưa
       
            $dsSize = TableSize::where('name', 'like', '%' . $req->keyword . '%')->latest()->paginate($limit);

            // lấy trang hiện tại
            $current = $dsSize->currentPage();
            // lấy số thứ tự đầu tiên nhưng theo dạng mảng (là số 0)
            $perSerial = $limit * ($current - 1);
            $serial = $perSerial + 1;
        }
        return view('.admin.color_size.size.list', compact('dsSize','serial'));
    }
}

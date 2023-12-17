<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TableUser;

class UserController extends Controller
{
    //
    public function getsusers(Request $req)
    {
        $limit =  10;
        //latest() = orderBy('created_at','desc')
        
        $dsUser = TableUser::where('id_role','=',2)->latest()->paginate($limit);
        // if ($req->keyword != null) {
        //     $dsUser = TableUser::where('name', 'like', '%' . $req->keyword . '%')->latest()->paginate($limit);
        // }
        
        // lấy trang hiện tại
        $current = $dsUser->currentPage();
        // lấy số thứ tự đầu tiên nhưng theo dạng mảng (là số 0)
        $perSerial = $limit * ($current - 1);
        $serial = $perSerial + 1;
        return view('.admin.user_of_admin.list', compact('dsUser', 'serial'));
    }
    public function deleteuser(Request $req)
    {
        $itemuser = TableUser::find($req->id);
        if ($itemuser == null) {
            return "không tìm thấy người dùng có ID = {$req->id} ";
        }

        $itemuser->delete();
        return redirect()->route('nguoi-dung-admin');
    }
}

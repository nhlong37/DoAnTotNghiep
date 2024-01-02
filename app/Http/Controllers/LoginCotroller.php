<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\TableColor;
use App\Models\TableVariantsPCS;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\xlDangNhapRequest;
use App\Models\TableUser;
use App\Models\TableOrder;
use App\Models\TableOrderDetail;
use App\Models\TableSize;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use Illuminate\Database\Eloquent\Builder;

class LoginCotroller extends Controller
{
    // ---------------- ADMIN ---------------- //
    function index_login()
    {
        return view('.admin.login.login');
    }

    function xlLoginAdmin(Request $req)
    {
        //Kiểm Giá trị input có bằng giá trị trông cơ sở dữ liệu
        if (Auth::guard('admin')->attempt($req->only(['username', 'password']))) {
            //Đúng thì vào trang trong
            return redirect()->route('trang-chu-admin');
        } else {
            //Sai thì load lại trang login
            return redirect()->route('dang-nhap-admin');
        }
    }

    public function xlLogoutAdmin(Request $req): RedirectResponse
    {
        if (Auth::guard('admin')->check()) // kiểm đã đăng nhập chưa
        {
            Auth::guard('admin')->logout();
            $req->session()->regenerateToken();
            return redirect()->route('dang-nhap-admin');
        }
        return redirect()->route('dang-nhap-admin');
    }


    function index_update()
    {
        return view('.admin.login.update_info');
    }

    function xl_update_info(Request $req, $id)
    {
        // tạo 1 chuỗi ngẫu nhiên 
        $random = Str::random(5);
        $info = TableUser::where('id', $id)->first();
        if ($info == null) {
            return "không tìm thấy người dùng nào có ID = {$id} này";
        }
        $info->name = $req->fullname;
        // $info->name = Hash::make($req->password);
        $info->email = $req->email;
        $info->phone = $req->phone;
        ($req->gender > 0) ? $info->gender = $req->gender : $info->gender = 0;
        $info->birthday = $req->birthday;
        $info->address = $req->address;

        if ($req->file != null) {
            // kiểm tra kích thước
            $size = $req->file->getSize();
            if ($size > 102400) {
                return "Dung lượng hình ảnh lớn. Dung lượng cho phép <= 100MB ~ 102400KB";
            }
            // lọc ra đuôi file
            $extension = $req->file->getClientOriginalExtension();
            if ($extension == 'jpg' || $extension == 'png' || $extension = 'jpeg') {
                // đổi tên hình
                $filename = 'avatar-' . $random . '.' . $req->file->getClientOriginalExtension();
                // lấy tên file để lưu vào csdl
                $info->avatar = $filename;
                //Lưu trữ file vào thư mục avatar trong public -> upload -> avatar
                $req->file->move(public_path('upload/avatar/'), $filename);
            } else {
                return "Định dạng ảnh không đúng. Định dạng cho phép (.jpg|.png|.jpeg)";
            }
        }
        $info->save();
        return redirect()->route('trang-chu-admin');
    }

    function index_change_password_admin()
    {
        return view('.admin.login.change_password');
    }

    function xl_change_password(Request $req, $id)
    {
        $change = TableUser::find($id);

        if ($change == null) {
            return "không tìm thấy người dùng nào có ID = {$id} này";
        }

        if ($change == $req->oldpassword || !empty($req->oldpassword)) {
            if ($req->newpassword < 6 || $req->renewpassword < 6) {
                return "Mật khẩu mới có độ dài bé hơn 6 ký tự";
            } else {
                if ($req->newpassword != $req->renewpassword) {
                    return "Xác nhận mật khẩu mới không trùng khớp";
                } elseif (empty($req->newpassword) || empty($req->renewpassword)) {
                    return "Chưa nhập mật khẩu!!!";
                } else {
                    $change->password = Hash::make($req->renewpassword);
                }
            }
        } else {
            return "Mật khẩu cũ của bạn chưa đúng!!! hoặc bạn chưa nhập mật khẩu cũ";
        }

        $change->save();
        return redirect()->route('dang-nhap-admin');
    }
    // ---------------- ADMIN ---------------- //



    // ---------------- USER ---------------- //

    function index_login_user()
    {
        return view('.user.login.login');
    }
    public function GetPurchaseHistory(Request $req)
    {
        $limit = 5;
        $id = (int)$req->id;
        $iduser = TableOrder::where('id_user', $req->id)->select('id_user')->firstOrFail();
        //dd($iduser);
        //dd(Auth::guard('user')->user()->id);
        $limit = 10;
        $dsOrder = TableOrder::where('id_user', $req->id)->orderBy('created_at','DESC')->latest()->paginate($limit);

        
        $current = $dsOrder->currentPage();
        // lấy số thứ tự đầu tiên nhưng theo dạng mảng (là số 0)
        $perSerial = $limit * ($current - 1);
        $serial = $perSerial + 1;
        return view('.user.login.purchase_history',compact('dsOrder'));
    }
    public function GetPurchaseHistoryDetail(Request $req,$id)
    {
        $limit = 10;
        //$id_order = (int)$req->id;
        $infoOrder = TableOrder::find($id);
        //dd($infoOrder);
        $detail_order = TableOrderDetail::find($id);
        $namecolor_orderdetail = TableColor::join('table_order_detail','table_color.id','table_order_detail.id_color')->select('name')->get();
        $id_color_orderdetail = TableColor::join('table_order_detail','table_color.id','table_order_detail.id_color')->select('id_color')->get();
        $idcolor = TableColor::where('id',$detail_order->id_color)->get('name');
        $idsize = TableSize::where('id',$detail_order->id_size)->get('name');
        //dd($idcolor);
        //dd($namecolor_orderdetail);
        $id_size_orderdetail = TableSize::join('table_order_detail','table_size.id','=','table_order_detail.id_size')->select('name')->get();
       

        //$id_color = TableColor::join('table_order_detail','table_color.id','=','table_order_detail.id_color')->select('id_color')->first();
        //$id_size = TableSize::join('table_order_detail','table_size.id','=','table_order_detail.id_size')->select('id_size')->first();
        $dsOrderDetail = TableOrderDetail::where('id_order', $infoOrder->id)->latest()->paginate($limit);
        $dsOrder = TableOrder::where('id',$infoOrder->id)->latest()->paginate($limit);
        //dd($dsOrder);
        $id_order = TableOrder::where('id', $detail_order->id)->select('code','fullname','phone','address','created_at')->get();
        
        //dd($id_order);
        // lấy trang hiện tại
        $current = $dsOrder->currentPage();
        // lấy số thứ tự đầu tiên nhưng theo dạng mảng (là số 0)
        $perSerial = $limit * ($current - 1);
        $serial = $perSerial + 1;

        return view('.user.login.purchase_history_detail', ['orderDetail' => $infoOrder], compact('dsOrderDetail','dsOrder','namecolor_orderdetail','idsize','idcolor','id_order','id_color_orderdetail','id_size_orderdetail'));
    }

    function xlLoginUser(Request $req)
    {

        $role = TableUser::where('username', $req->username)->first();
        if ($role->id_role == 2) {
            //Kiểm Giá trị input có bằng giá trị trông cơ sở dữ liệu
            if (Auth::guard('user')->attempt($req->only(['username', 'password']))) {
                //Đúng thì vào trang trong
                return redirect()->route('trang-chu-user');
            } else {
                //Sai thì load lại trang login
                return redirect()->route('dang-nhap-user');
            }
        } else {
            //Sai thì load lại trang login
            return redirect()->route('dang-nhap-user');
        }
    }

    public function xlLogoutUser(Request $req): RedirectResponse
    {
        if (Auth::guard('user')->check()) // this means that the user was logged in.
        {
            Auth::guard('user')->logout();
            $req->session()->regenerateToken();
            return redirect()->route('trang-chu-user');
        }
        return redirect()->route('trang-chu-user');
    }

    function index_change_password_user()
    {
        return view('.user.login.change_password');
    }
    function xl_change_password_user(Request $req, $id)
    {
        $change = TableUser::find($id);

        if ($change == null) {
            return "không tìm thấy người dùng nào có ID = {$id} này";
        }

        if ($change == $req->oldpassword || !empty($req->oldpassword)) {
            if ($req->newpassword < 6 || $req->renewpassword < 6) {
                return "Mật khẩu mới có độ dài bé hơn 6 ký tự";
            } else {
                if ($req->newpassword != $req->renewpassword) {
                    return "Xác nhận mật khẩu mới không trùng khớp";
                } elseif (empty($req->newpassword) || empty($req->renewpassword)) {
                    return "Chưa nhập mật khẩu!!!";
                } else {
                    $change->password = Hash::make($req->renewpassword);
                }
            }
        } else {
            return "Mật khẩu cũ của bạn chưa đúng!!! hoặc bạn chưa nhập mật khẩu cũ";
        }

        $change->save();
        return redirect()->route('trang-dang-nhap');
    }

    function index_update_user()
    {
        return view('.user.login.update_info_user');
    }
    function xl_update_info_user(Request $req, $id)
    {
        // tạo 1 chuỗi ngẫu nhiên 
        $random = Str::random(5);
        $info = TableUser::where('id', $id)->first();
        if ($info == null) {
            return "không tìm thấy người dùng nào có ID = {$id} này";
        }
        $info->name = $req->fullname;
        // $info->name = Hash::make($req->password);
        $info->email = $req->email;
        $info->phone = $req->phone;
        ($req->gender > 0) ? $info->gender = $req->gender : $info->gender = 1;
        $info->birthday = $req->birthday;
        $info->address = $req->address;

        if ($req->file != null) {
            // kiểm tra kích thước
            $size = $req->file->getSize();
            if ($size > 102400) {
                return "Dung lượng hình ảnh lớn. Dung lượng cho phép <= 100MB ~ 102400KB";
            }
            // lọc ra đuôi file
            $extension = $req->file->getClientOriginalExtension();
            if ($extension == 'jpg' || $extension == 'png' || $extension = 'jpeg') {
                // đổi tên hình
                $filename = 'avatar-' . $random . '.' . $req->file->getClientOriginalExtension();
                // lấy tên file để lưu vào csdl
                $info->avatar = $filename;
                //Lưu trữ file vào thư mục avatar trong public -> upload -> avatar
                $req->file->move(public_path('upload/avatar/'), $filename);
            } else {
                return "Định dạng ảnh không đúng. Định dạng cho phép (.jpg|.png|.jpeg)";
            }
        }
        $info->save();
        return redirect()->route('trang-chu-user');
    }

    public function GetForgotPasswordIndex()
    {
        return view('.user.login.forgot_password');
    }

    public function SendMail()
    {
        return view('.user.mail.sendmail');
    }

    public function xl_SendMail(Request $req)
    {
        $req->validate([
            'email' => 'required'
        ], [
            'email.required' => 'Vui lòng nhập địa chỉ Email hợp lệ!'
        ]);

        //$user = TableUser::where('email', $req->email)->first();
        // $token = Str::random(20);
        // $user->update(['token' => $token]);
        $mailData = [
            'title' => 'Xin chào ' . $req->name,
            'body' => 'Xin chào, vui lòng nhấn đường dẫn bên dưới đê tiến hành xác nhận tài khoản của bạn .',
            'email' => $req->email
        ];
        Mail::to($req->email)->send(new SendMail($mailData));

        // $user->update([$status => 1, 'token' => null]);
        return redirect()->route('dang-nhap-user')->with('yes', 'Vui lòng kiểm tra Email để tiến hành thay đổi mật khẩu');
    }

    public function xl_forgot_password(Request $req)
    {
        // $change = TableUser::find();

        // if ($change == null) {
        //     return "không tìm thấy người dùng nào có ID = {$id} này";
        // }

        // if ($change == $req->oldpassword || !empty($req->oldpassword)) {
        //     if ($req->newpassword < 6 || $req->renewpassword < 6) {
        //         return "Mật khẩu mới có độ dài bé hơn 6 ký tự";
        //     } else {
        //         if ($req->newpassword != $req->renewpassword) {
        //             return "Xác nhận mật khẩu mới không trùng khớp";
        //         } elseif (empty($req->newpassword) || empty($req->renewpassword)) {
        //             return "Chưa nhập mật khẩu!!!";
        //         } else {
        //             $change->password = Hash::make($req->renewpassword);
        //         }
        //     }
        // } else {
        //     return "Mật khẩu cũ của bạn chưa đúng!!! hoặc bạn chưa nhập mật khẩu cũ";
        // }

        // $change->save();
        // return redirect()->route('trang-dang-nhap');
    }

    public function GetRegisterIndex()
    {
        return view('.user.register.index');
    }

    public function addRegister(Request $req)
    {
        // if(){
        // tạo 1 chuỗi ngẫu nhiên 
        $random = Str::random(5);
        $info = new TableUser();

        $info->name = $req->fullname;
        $info->id_role = 2;
        $info->username = $req->username;
        $info->password = Hash::make($req->password);
        $info->email = $req->email;
        $info->phone = $req->phone;
        ($req->gender > 0) ? $info->gender = $req->gender : $info->gender = 0;
        $info->birthday = $req->birthday;
        $info->address = $req->address;

        if ($req->file != null) {
            // kiểm tra kích thước
            $size = $req->file->getSize();
            if ($size > 102400) {
                return "Dung lượng hình ảnh lớn. Dung lượng cho phép <= 100MB ~ 102400KB";
            }
            // lọc ra đuôi file
            $extension = $req->file->getClientOriginalExtension();
            if ($extension == 'jpg' || $extension == 'png' || $extension = 'jpeg') {
                // đổi tên hình
                $filename = 'avatar-' . $random . '.' . $req->file->getClientOriginalExtension();
                // lấy tên file để lưu vào csdl
                $info->avatar = $filename;
                //Lưu trữ file vào thư mục avatar trong public -> upload -> avatar
                $req->file->move(public_path('upload/avatar/'), $filename);
            } else {
                return "Định dạng ảnh không đúng. Định dạng cho phép (.jpg|.png|.jpeg)";
            }
        }
        $info->save();
        // }
        if (Auth::guard('user')->attempt($req->only(['username', 'password']))) {
            //Đúng thì vào trang trong
            return redirect()->route('trang-chu-user');
        }
    }

    // ---------------- USER ---------------- //
}

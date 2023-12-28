<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\xlAddRequestProduct;
use App\Http\Requests\xlAddRequestDmucLevel;
use App\Http\Requests\xlAddRequestOrder;
use Illuminate\Support\Str;
use App\Models\TableProduct;
use App\Models\TableComment;
use App\Models\TableRating;
use App\Models\TableOrder;
use App\Models\TableBrand;
use App\Models\TableProductType;
use App\Models\TableColor;
use App\Models\TableSize;
use App\Models\TableAlbum;
use App\Models\TableVariantsPCS;
use App\Models\TableOrderDetail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{

    // ---------------- ADMIN ---------------- //
    // Sản phẩm //
    public function index_product(Request $req)
    {
        $limit =  10;
        //latest() = orderBy('created_at','desc')
        $dsProduct = TableProduct::latest()->paginate($limit);

        // lấy trang hiện tại
        $current = $dsProduct->currentPage();
        // lấy số thứ tự đầu tiên nhưng theo dạng mảng (là số 0)
        $perSerial = $limit * ($current - 1);
        $serial = $perSerial + 1;
        return view('.admin.product.main.list', compact('dsProduct', 'serial'));
    }

    public function index_addpro()
    {

        $level1 = TableBrand::all();
        $level2 = TableProductType::all();

        $dsColor = TableColor::all();
        $dsSize = TableSize::all();

        return view('.admin.product.main.add', compact('level1', 'level2', 'dsColor', 'dsSize'));
    }

    public function addproducts(xlAddRequestProduct $req)
    {
        $random = Str::random(5);

        // tạo 1 item mới
        $itemproduct = new TableProduct();
        // lưu các mục vào csdl
        $itemproduct->code = $req->masp;
        $itemproduct->name = $req->tensp;
        $itemproduct->content = htmlspecialchars($req->noidung);
        // kiểm tra xem giá có rỗng không, có giá trị thì thay thế ký tự , =  ký tự rỗng, ngược lại thì gán = 0 
        $itemproduct->price_regular = (isset($req->giagoc) && !empty($req->giagoc)) ? str_replace(',', '', $req->giagoc) : 0;
        $itemproduct->sale_price = (isset($req->giamoi) && !empty($req->giamoi)) ? str_replace(",", "", $req->giamoi) : 0;
        ($req->brand > 0) ? $itemproduct->id_brand = $req->brand : 0;
        ($req->type > 0) ? $itemproduct->id_type = $req->type : 0;
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
                $filename = 'product-' . $random . '.' . $req->file->getClientOriginalExtension();
                // lấy tên file để lưu vào csdl
                $itemproduct->photo = $filename;
                //Lưu trữ file vào thư mục product trong public -> upload -> product
                $req->file->move(public_path('upload/product/'), $filename);
            } else {
                return "Định dạng ảnh không đúng. Định dạng cho phép (.jpg|.png|.jpeg)";
            }
        }
        $itemproduct->save();

        if (!empty($req->size)) {
            $arr_size = $req->size;
            $count_size = count($req->size);
            for ($i = 0; $i < $count_size; $i++) {
                $arr_color = $req->color;
                $count_color = count($req->color);
                for ($j = 0; $j < $count_color; $j++) {
                    $pro_color = new TableVariantsPCS();
                    $pro_color->id_product = $itemproduct->id;
                    $pro_color->id_size = $arr_size[$i];
                    $pro_color->id_color = $arr_color[$j];
                    $pro_color->quantity = 0;
                    $pro_color->save();
                }
            }
        }

        //kiểm tra xem có file ko
        if (!empty($req->filenames)) {
            foreach ($req->filenames as $image) {
                // tạo random mới
                $randomNew = Str::random(5);
                // tạo mới hình con
                $picture = new TableAlbum();
                $destinationPath = public_path('upload/album/');
                $filename = 'pictureProduct-' . $randomNew . '.' . $image->getClientOriginalExtension();
                $image->move($destinationPath, $filename);
                $picture->id_product  = $itemproduct->id;
                $picture->photo = $filename;
                $picture->save();
            }
        }
        return redirect()->route('san-pham-admin')->with('noti', 'Thêm sản phẩm thành công !!!');
    }

    public function index_modifypro(Request $req, $id)
    {
        $product = TableProduct::find($id);
        $level1 = TableBrand::all();
        $level2 = TableProductType::all();
        $dsGallery = TableAlbum::where('id_product', $id)->get();
        $dsColor = TableColor::all();
        $dsSize = TableSize::all();

        // Lấy danh sách color theo sản phẩm và size theo sản phẩm
        $listSelectedColor = TableVariantsPCS::where('id_product', $id)->get();
        $listSelectedSize = TableVariantsPCS::where('id_product', $id)->get();
        // Lấy mảng id từ danh sách color theo sản phẩm
        $arrIdColor = [];
        foreach ($listSelectedColor as $k => $v) {
            array_push($arrIdColor, $v->id_color);
        }

        // Lấy mảng id từ danh sách size theo sản phẩm
        $arrIdSize = [];
        foreach ($listSelectedSize as $k => $v) {
            array_push($arrIdSize, $v->id_size);
        }
        $list_advanted = TableVariantsPCS::where('id_product', $id)
            ->join('table_size', 'table_variants_pcs.id_size', '=', 'table_size.id')
            ->join('table_color', 'table_variants_pcs.id_color', '=', 'table_color.id')
            ->select('table_variants_pcs.*', 'table_size.name as name_size', 'table_color.name as name_color')
            ->get()
            ->toArray();

        return view('.admin.product.main.modify', ['detailSP'  => $product], compact('level1', 'level2', 'dsColor', 'dsSize', 'arrIdColor', 'arrIdSize', 'dsGallery', 'list_advanted'));
    }

    public function modifyproducts(xlAddRequestProduct $req, $id)
    {
        // tạo 1 chuỗi ngẫu nhiên 
        $random = Str::random(5);

        //tìm xem sản phẩm có hay không
        $itemproduct = TableProduct::find($id);
        if ($itemproduct == null) {
            return "không tìm thấy sản phẩm nào có ID = {$id} này";
        }
        $itemproduct->code = $req->masp;
        $itemproduct->name = $req->tensp;
        $itemproduct->content = htmlspecialchars($req->noidung);
        // kiểm tra xem giá có rỗng không, có giá trị thì thay thế ký tự ',' =  ký tự rỗng '' , ngược lại thì gán = 0 
        $itemproduct->price_regular = (isset($req->giagoc) && !empty($req->giagoc)) ? str_replace(",", "", $req->giagoc) : 0;
        $itemproduct->sale_price = (isset($req->giamoi) && !empty($req->giamoi)) ? str_replace(",", "", $req->giamoi) : 0;
        ($req->brand > 0) ? $itemproduct->id_brand = $req->brand : 0;
        ($req->type > 0) ? $itemproduct->id_type = $req->type : 0;
        if ($req->file != null) {
            // kiểm tra kích thước
            $size = $req->file->getSize();
            if ($size > 512000) {

                return "Dung lượng hình ảnh lớn. Dung lượng cho phép <= 100MB ~ 512000KB";
            }
            // lọc ra đuôi file
            $extension = $req->file->getClientOriginalExtension();
            if ($extension == 'jpg' || $extension == 'png' || $extension = 'jpeg') {
                // đổi tên hình
                $filename = 'product-' . $random . '.' . $req->file->getClientOriginalExtension();
                // lấy tên file để lưu vào csdl
                $itemproduct->photo = $filename;
                //Lưu trữ file vào thư mục product trong public -> upload -> product
                $req->file->move(public_path('upload/product/'), $filename);
            } else {

                return "Định dạng ảnh không đúng. Định dạng cho phép (.jpg|.png|.jpeg)";
            }
        }

        $itemproduct->save();

        if (!empty($req->size)) {
            $arr_size = $req->size;
            $count_size = count($req->size);
            for ($i = 0; $i < $count_size; $i++) {
                $arr_color = $req->color;
                $count_color = count($req->color);
                for ($j = 0; $j < $count_color; $j++) {
                    if (TableVariantsPCS::where([
                        ['id_product', '=', $id],
                        ['id_size', '=', $arr_size[$i]],
                        ['id_color', '=', $arr_color[$j]],
                    ])->get()->toArray() == NULL) {
                        $pro_color = new TableVariantsPCS();
                        $pro_color->id_product = $itemproduct->id;
                        $pro_color->id_size = $arr_size[$i];
                        $pro_color->id_color = $arr_color[$j];
                        $pro_color->quantity = 0;
                        $pro_color->save();
                    }
                }
            }
        }

        if ($req->id_adv != NULL) {
            $count_id_adv = count($req->id_adv);
            for ($i = 0; $i < $count_id_adv; $i++) {
                $add_quantity = TableVariantsPCS::where([
                    ['id_product', '=', $id],
                    ['id', '=', $req->id_adv[$i]],
                ])->firstOrFail();
                $add_quantity->quantity =  $req->quantity[$i];
                $add_quantity->save();
            }
        }

        if ($req->color != NULL && $req->size != NULL) {
            TableVariantsPCS::where('id_product', $id)->whereNotIn('id_color', $req->color)->delete();
            TableVariantsPCS::where('id_product', $id)->whereNotIn('id_size', $req->size)->delete();
            TableVariantsPCS::withTrashed()->where('id_product', $id)->whereNotIn('id_color', $req->color)->forceDelete();
            TableVariantsPCS::withTrashed()->where('id_product', $id)->whereNotIn('id_size', $req->size)->forceDelete();
        }

        //kiểm tra xem có nhập file hay không
        if ($req->hasFile('filenames')) {
            foreach ($req->filenames as $image) {
                // tạo random mới
                $randomNew = Str::random(5);
                // tạo mới hình con
                $picture = new TableAlbum();
                $destinationPath = public_path('upload/album/');
                $filename = 'pictureProduct-' . $randomNew . '.' . $image->getClientOriginalExtension();
                $image->move($destinationPath, $filename);
                $picture->id_product  = $itemproduct->id;
                $picture->photo = $filename;
                $picture->save();
            }
        }
        return redirect()->route('san-pham-admin');
    }

    public function deleteproducts(Request $req)
    {
        $products = TableProduct::find($req->id);
        if ($products == null) {
            return "không tìm thấy sản phẩm nào có ID = {$req->id} này";
        }
        if (!empty($products->photo)) {
            $image_path = public_path('upload/product/' . $products->photo);
            if (file_exists($image_path)) {
                unlink($image_path);
            }
        }

        $arr_picture = TableAlbum::where('id_product', $req->id)->get();
        foreach ($arr_picture as $v) {
            $path = public_path('upload/album/' . $v->photo);
            if (file_exists($path)) {
                unlink($path);
            }
            $v->delete();
        }

        $products->delete();
        return redirect()->route('san-pham-admin');
    }

    public function removeFormGallery(Request $req)
    {
        $arr_picture = TableAlbum::where('id', $req->id)->get();
        foreach ($arr_picture as $v) {
            $image_path = public_path('upload/album/' . $v->photo);
            if (file_exists($image_path)) {
                unlink($image_path);
            }
            $v->delete();
        }
    }
    // Sản phẩm //

    // Danh mục thương hiệu //
    public function index_brand(Request $req)
    {
        $limit =  10;
        $dslevel1 = TableBrand::latest()->paginate($limit);
        //kiểm tra xem nhập keyword chưa

        // lấy trang hiện tại
        $current = $dslevel1->currentPage();
        // lấy số thứ tự đầu tiên nhưng theo dạng mảng (là số 0)
        $perSerial = $limit * ($current - 1);
        $serial = $perSerial + 1;
        return view('.admin.product.brand.list', compact('dslevel1', 'serial'));
    }

    public function index_addbrand()
    {
        return view('.admin.product.brand.add');
    }

    public function addlevel1(xlAddRequestDmucLevel $req)
    {
        // tạo 1 item mới
        $itemlevel1 = new TableBrand();
        // lưu các mục vào csdl
        $itemlevel1->name = $req->tendm;
        $itemlevel1->save();
        return redirect()->route('sanpham-lv1-admin');
    }

    public function index_modifybrand($id)
    {
        $level1 = TableBrand::find($id);
        return view('.admin.product.brand.modify', ['detailLV1'  => $level1]);
    }

    public function modifylevel1(xlAddRequestDmucLevel $req, $id)
    {
        $itemlevel1 = TableBrand::find($id);
        if ($itemlevel1 == null) {
            return "không tìm thấy danh mục nào có ID = {$id} này";
        }
        // lưu các mục vào csdl
        $itemlevel1->name = $req->tendm;
        $itemlevel1->save();
        return redirect()->route('sanpham-lv1-admin');
    }

    public function deletelevel1(Request $req)
    {
        $itemlevel1 = TableBrand::find($req->id);
        if ($itemlevel1 == null) {
            return "không tìm thấy sản phẩm có ID = {$req->id} ";
        }

        $itemlevel1->delete();
        return redirect()->route('sanpham-lv1-admin');
    }

    // Danh mục thương hiệu //

    // Danh mục loại //
    public function index_type(Request $req)
    {
        $limit =  10;
        $dslevel2 = TableProductType::latest()->paginate($limit);
        //kiểm tra xem nhập keyword chưa
        // lấy trang hiện tại
        $current = $dslevel2->currentPage();
        // lấy số thứ tự đầu tiên nhưng theo dạng mảng (là số 0)
        $perSerial = $limit * ($current - 1);
        $serial = $perSerial + 1;
        return view('.admin.product.type.list', compact('dslevel2', 'serial'));
    }

    public function index_addtype()
    {
        return view('.admin.product.type.add');
    }

    public function addlevel2(xlAddRequestDmucLevel $req)
    {
        // tạo 1 item mới
        $itemlevel2 = new TableProductType();
        // lưu các mục vào csdl
        $itemlevel2->name = $req->tendm;
        $itemlevel2->save();
        return redirect()->route('sanpham-lv2-admin');
    }

    public function index_modifytype($id)
    {
        $level2 = TableProductType::find($id);

        return view('.admin.product.type.modify', ['detailLV2'  => $level2]);
    }

    public function modifylevel2(xlAddRequestDmucLevel $req, $id)
    {
        $itemlevel2 = TableProductType::find($id);
        if ($itemlevel2 == null) {
            return "không tìm thấy danh mục nào có ID = {$id} này";
        }
        // lưu các mục vào csdl
        $itemlevel2->name = $req->tendm;
        $itemlevel2->save();
        return redirect()->route('sanpham-lv2-admin');
    }

    public function deletelevel2(Request $req)
    {
        $itemlevel2 = TableProductType::find($req->id);
        if ($itemlevel2 == null) {
            return "không tìm thấy sản phẩm có nào ID = {$req->id} này";
        }

        $itemlevel2->delete();
        return redirect()->route('sanpham-lv2-admin');
    }

    // Danh mục loại //

    // public function setStatus(Request $req)
    // {
    //     if ($req->id) {
    //         // lấy giá trị cột được chọn tạo ra 1 mảng riêng
    //         $status_detail = TableProduct::where('id', $req->id)->pluck('status');
    //         // cắt mảng thành từng phần tử nhỏ và lấy phần tử đầu tiên
    //         $status_array = (!empty($status_detail[0])) ? explode(',', $status_detail[0]) : array();
    //         // check xem $req truyền vào có trong mảng ko
    //         if (array_search($req->status, $status_array) !== false) {
    //             $key = array_search($req->status, $status_array);
    //             unset($status_array[$key]);
    //         } else {
    //             array_push($status_array, $req->status);
    //         }
    //         // tạo 1 mảng mới
    //         $data = array();
    //         // truyền dữ liệu vào mảng
    //         $data['status'] = (!empty($status_array)) ? implode(',', $status_array) : null;
    //         // lấy dữ liệu item hiện tại
    //         $status_save = TableProduct::find($req->id);
    //         // đổi giá trị cột status thành giá trị mới truyền
    //         $status_save->status = $data['status'];
    //         $status_save->save();
    //     }
    // }

    public function searchProductAdmin(Request $req)
    {
        //kiểm tra xem nhập keyword chưa
        if ($req->keyword != null) {
            $limit = 10;
            $dsProduct = TableProduct::where('name', 'like', '%' . $req->keyword . '%')->latest()->paginate($limit);
            // lấy trang hiện tại
            $current = $dsProduct->currentPage();
            // lấy số thứ tự đầu tiên nhưng theo dạng mảng (là số 0)
            $perSerial = $limit * ($current - 1);
            $serial = $perSerial + 1;
        }
        return view('.admin.product.main.list', compact('dsProduct', 'serial'));
    }

    public function searchBrandAdmin(Request $req)
    {
        //kiểm tra xem nhập keyword chưa
        if ($req->keyword != null) {
            $limit = 10;
            $dslevel1 = TableBrand::where('name', 'like', '%' . $req->keyword . '%')->latest()->paginate($limit);
            // lấy trang hiện tại
            $current = $dslevel1->currentPage();
            // lấy số thứ tự đầu tiên nhưng theo dạng mảng (là số 0)
            $perSerial = $limit * ($current - 1);
            $serial = $perSerial + 1;
        }
        return view('.admin.product.brand.list', compact('dslevel1', 'serial'));
    }

    public function searchTypeAdmin(Request $req)
    {
        //kiểm tra xem nhập keyword chưa
        if ($req->keyword != null) {
            $limit = 10;
            $dslevel2 = TableProductType::where('name', 'like', '%' . $req->keyword . '%')->latest()->paginate($limit);
            // lấy trang hiện tại
            $current = $dslevel2->currentPage();
            // lấy số thứ tự đầu tiên nhưng theo dạng mảng (là số 0)
            $perSerial = $limit * ($current - 1);
            $serial = $perSerial + 1;
        }
        return view('.admin.product.type.list', compact('dslevel2', 'serial'));
    }

    public function loadOrder()
    {
        $limit =  10;
        $dsOrder = TableOrder::latest()->paginate($limit);
        // lấy trang hiện tại
        $current = $dsOrder->currentPage();
        // lấy số thứ tự đầu tiên nhưng theo dạng mảng (là số 0)
        $perSerial = $limit * ($current - 1);
        $serial = $perSerial + 1;
        return view('.admin.order.order', compact('dsOrder', 'serial'));
    }

    public function loadOrderDetail($id)
    {
        $limit =  10;
        $infoOrder = TableOrder::find($id);
        $dsOrderDetail = TableOrderDetail::where('id_order', $infoOrder->id)->latest()->paginate($limit);

        // $color = TableColor::where('id',$dsOrderDetail->id_color)->first();
        // $size = TableColor::where('id',$dsOrderDetail->id_size)->first();

        // lấy trang hiện tại
        $current = $dsOrderDetail->currentPage();
        // lấy số thứ tự đầu tiên nhưng theo dạng mảng (là số 0)
        $perSerial = $limit * ($current - 1);
        $serial = $perSerial + 1;
        return view('.admin.order.detail', ['orderDetail' => $infoOrder], compact('dsOrderDetail', 'serial'));
    }


    public function modifyorders(xlAddRequestOrder $req, $id)
    {
        //tìm xem sản phẩm có hay không
        $itemorder = TableOrder::find($id);
        if ($itemorder == null) {
            return "không tìm thấy sản phẩm nào có ID = {$id} này";
        }
        $itemorder->code = $req->code;
        $itemorder->fullname = $req->fullname;
        $itemorder->email = $req->email;
        $itemorder->address = $req->address;
        $itemorder->phone = $req->phone;
        $itemorder->content = $req->content;
        $itemorder->status = ($req->status != NULL) ? $req->status : 'moidat';

        $itemorder->save();

        // Xoá đi để thêm lại cái mới
        return redirect()->route('don-hang');
    }

    public function filterOrder(Request $req)
    {
    }

    public function loadComment()
    {
        $limit = 10;
        //latest() = orderBy('created_at','desc')
        $dsComment = TableComment::latest()->paginate($limit);
        $comment_rep = TableComment::where('content_parent_comment', '>', 0)->get();
        // lấy trang hiện tại
        $current = $dsComment->currentPage();
        // lấy số thứ tự đầu tiên nhưng theo dạng mảng (là số 0)
        $perSerial = $limit * ($current - 1);
        $serial = $perSerial + 1;
        return view('.admin.comment.list', compact('dsComment', 'serial', 'comment_rep'));
    }

    public function deletecomment(Request $req)
    {
        $comments = TableComment::find($req->id);
        if ($comments == null) {
            return "không tìm thấy bình luận nào có ID = {$req->id} này";
        }
        $comments->delete();
        return redirect()->route('binh-luan-admin');
    }
    public function allow_comment(Request $req)
    {
        $data = $req->all();
        $comment = TableComment::find($data['comment_id']);
        $comment->status = $data['comment_status'];
        $comment->save();
    }

    public function loadRating(Request $req)
    {
        $limit = 10;
        //latest() = orderBy('created_at','desc')
        $dsRating = TableRating::latest()->paginate($limit);

        // lấy trang hiện tại
        $current = $dsRating->currentPage();
        // lấy số thứ tự đầu tiên nhưng theo dạng mảng (là số 0)
        $perSerial = $limit * ($current - 1);
        $serial = $perSerial + 1;
        return view('.admin.comment.listrate', compact('dsRating', 'serial'));
    }


    // ---------------- ADMIN ---------------- //

    // ---------------- USER ---------------- //
    public function GetProductIndex(Request $req)
    {
        // lấy sản phẩm
        $dsProductNew = TableProduct::where('deleted_at', null)->limit(8)->get();
        $dsProductOutsanding = TableProduct::where('deleted_at', null)->get();

        return view('.user.home.home', compact('dsProductNew', 'dsProductOutsanding'));
    }


    public function GetProductPage(Request $req)
    {
        $limit = 12;

        $dsProduct = TableProduct::where('deleted_at', null)->latest()->paginate($limit);
        $dsBrand = TableBrand::select('id', 'name')->get();
        $min_price = TableProduct::min('price_regular');
        $max_price = TableProduct::max('price_regular');
        $min_price_range = $min_price - 500000;
        $max_price_range = $max_price + 1000000;

        if (isset($_GET['brand'])) {
            $brand_id = $_GET['brand'];
            $brand_arr = explode(",", $brand_id);
            $dsProduct = TableProduct::whereIn('id_brand', $brand_arr)->latest()->paginate($limit);
        } elseif (isset($_GET['start_price']) && $_GET['end_price']) {
            $min_price = $_GET['start_price'];
            $max_price = $_GET['end_price'];

            $dsProduct = TableProduct::whereBetween('price_regular', [$min_price, $max_price])->latest()->paginate($limit);
        } else {
            $dsProduct = TableProduct::where('deleted_at', null)->latest()->paginate($limit);
        }
        return view('.user.product.product', compact('dsProduct', 'dsBrand', 'min_price', 'max_price', 'max_price_range', 'min_price_range'));
    }


    public function SearchProduct(Request $req)
    {
        if ($req->keyword != null) {
            $limit = 12;
            $dsProduct = TableProduct::where('deleted_at', null)->where('name', 'like', '%' . $req->keyword . '%')->latest()->paginate($limit);
        }
        return view('.user.product.product', compact('dsProduct'));
    }


    public function GetDetailProduct(Request $req, $id)
    {
        $detailProduct = TableProduct::where('deleted_at', null)->where('id', $id)->first();
        $dsGallery = TableAlbum::where('id_product', $id)->get();
        $listSelectedColor = TableVariantsPCS::where('id_product', $id)->get();
        $listSelectedSize = TableVariantsPCS::where('id_product', $id)->get();
        // Lấy mảng id từ danh sách color theo sản phẩm
        $arrIdColor = [];
        foreach ($listSelectedColor as $k => $v) {
            array_push($arrIdColor, $v->id_color);
        }

        // Lấy mảng id từ danh sách size theo sản phẩm
        $arrIdSize = [];
        foreach ($listSelectedSize as $k => $v) {
            array_push($arrIdSize, $v->id_size);
        }

        $rowColor  = TableColor::whereIn('id', $arrIdColor)->get();
        $rowSize  = TableSize::whereIn('id', $arrIdSize)->get();
        $rating = TableRating::where('id_product', $id)->avg('rating');
        $rating = round($rating);

        return view('.user.product.detail', ['rowDetail' => $detailProduct], compact('rowColor', 'rowSize', 'dsGallery', 'rating'));
    }

    public function viewCart()
    {
        $colors = TableColor::all();
        $sizes = TableSize::all();
        return view('.user.order.order', compact('colors', 'sizes'));
    }

    private function productExists($code_order = '', $q = 1)
    {
        $flag = false;
        //kiểm tra session có tồn tại và mã tạm không rỗng
        if (!empty(session()->get('cart')) && $code_order != '') {
            $q = ($q > 1) ? $q : 1;
            $cart = session()->get('cart');

            foreach ($cart as $index => $value) {
                if ($code_order == $value['code']) {
                    // tăng dố lượng item hiện tại có mã tạm = mã tạm truyền vào
                    $cart[$index]['quantity'] += $q;
                    $flag = true;
                }
            }
            // thêm vào seesion
            session()->put('cart', $cart);
        }

        return $flag;
    }

    public function addToCart(Request $req)
    {
        $code_order = $req->id . $req->id_color . $req->id_size;
        // tạo session
        $Itemproduct = TableProduct::findOrFail($req->id);
        // kiểm tra session giỏ hàng có tồn tại và không rỗng
        if (!empty(session()->get('cart'))) {
            $cart = session()->get('cart');
            //lấy vị trí cuối cùng torng session cart
            $max = count($cart);
            //kiểm tra sản phẩm đó có tồn tại trong giỏ hàng chưa 
            if (!$this->productExists($code_order, $req->quantity)) {
                $cart[$max] = [
                    "name" => $Itemproduct->name,
                    "quantity" => $req->quantity,
                    "price_regular" => $Itemproduct->price_regular,
                    "price_sale" => $Itemproduct->sale_price,
                    "image" => $Itemproduct->photo,
                    "available" => $Itemproduct->quantity,
                    "id_product" => $Itemproduct->id,
                    "id_color" => $req->id_color,
                    "id_size" => $req->id_size,
                    "code" => $code_order,
                ];
                // thêm vào seesion
                session()->put('cart', $cart);
            }
        } else { // ngược lại chưa có tạo mới
            $cart = session()->get('cart');
            $cart[0] = [
                "name" => $Itemproduct->name,
                "quantity" => $req->quantity,
                "price_regular" => $Itemproduct->price_regular,
                "price_sale" => $Itemproduct->sale_price,
                "image" => $Itemproduct->photo,
                "available" => $Itemproduct->quantity,
                "id_product" => $req->id,
                "id_color" => $req->id_color,
                "id_size" => $req->id_size,
                "code" => $code_order,
            ];
            // thêm vào seesion
            session()->put('cart', $cart);
        }
        //trả về số lượng sản phẩm trong giỏ hàng không cần load lại trang
        return response()->json(array('max' => count(session()->get('cart'))));
    }

    public function removeFromCart(Request $req)
    {

        if (session()->get('cart')) {
            $cart = session()->get('cart');
            foreach ($cart as $key => $value) {
                if ($cart[$key]['code'] == $req->code) {
                    unset($cart[$key]);
                    break;
                }
            }
            session()->put('cart', $cart);
        }
        // trả về session cart sau khi xoá
        return response()->json(session()->get('cart'));
    }

    public function updateCart(Request $req)
    {
        $tempCart = session()->get('cart');
        foreach ($tempCart as $index => $value) {
            if ($value['code'] == $req->code && $req->quantity > 0) {
                $tempCart[$index]['quantity'] = $req->quantity;
                break;
            }
        }
        session()->put('cart', $tempCart);

        $total = getOrderTotal();
        $totalText = formatMoney($total);

        $product = getProductInfo($req->id);
        $regular_price = formatMoney($product->price_regular * $req->quantity);
        $sale_price = formatMoney($product->sale_price * $req->quantity);

        return response()->json(array('regularPrice' => $regular_price, 'salePrice' => $sale_price, 'totalText' => $totalText));
    }

    public function Payment(Request $req)
    {
        if (!empty(Auth::guard('user')->user()->id)) {

            $mahd = 'HD' . Str::random(3);
            $infoOrder = new TableOrder();
            $infoOrder->code = $mahd;
            $infoOrder->fullname = $req->fullname;
            $infoOrder->phone = $req->phone;
            $infoOrder->address = $req->address;
            $infoOrder->email = $req->email;
            $infoOrder->payment = $req->payments;
            $infoOrder->status = 'moidat';
            $infoOrder->total_price = getOrderTotal();
            $infoOrder->save();
            $cart = session()->get('cart');
            foreach ($cart as $key => $value) {
                $detailOrder = new TableOrderDetail();
                $detailOrder->id_order = $infoOrder->id;
                $detailOrder->id_product = $value['id_product'];
                $detailOrder->id_color    = $value['id_color'];
                $detailOrder->id_size = $value['id_size'];
                $detailOrder->name_product = $value['name'];
                $detailOrder->photo_product = $value['image'];
                if ($value['price_sale'] > 0) $detailOrder->price = $value['price_sale'];
                else $detailOrder->price = $value['price_regular'];
                $detailOrder->quantity = $value['quantity'];
                $detailOrder->save();

                // $miniusQuantity = TableProduct::find($value['id_product']);

                // $miniusQuantity->quantity = $miniusQuantity->quantity - $value['quantity'];
                // $miniusQuantity->save();
            }
            if (session()->has('cart')) {
                session()->forget('cart');
            }

            return redirect()->route('trang-chu-user');
        }
    }

    public function send_comment(Request $req)
    {
        if (Auth::guard('user')->check()) {
            $product_id = $req->id_product;
            //$id_user = $req->id_user;
            $content = $req->content;
            $comment = new TableComment();
            $comment->content = $content;
            $comment->id_product = $product_id;
            $comment->content_parent_comment = 0;
            $comment->save();
            echo 'Bình luận thành công';
        }
        else{
            echo 'Vui lòng đăng nhập để gửi bình luận !';
        }
    }
    public function load_comment(Request $req)
    {
        $output = '';
        $product_id = $req->id_product;
        $id_user = $req->id_user;
        $status = $req->status;
        $dsComment = TableComment::where('id_product', $product_id)->where('content_parent_comment', '=', 0)->where('status', 1)->get();
        $comment_rep = TableComment::where('content_parent_comment', '>', 0)->get();
        $comment = TableComment::all();
        //$user = TableUser::get('id','avatar');
        $data = $req->all();
        //$dsCommentUser=TableComment::where('id_user', $user_id)->get();
        // $id_user = TableUser::all();
        //$id_user_comment = TableUser::where('id',$id)->get();
        // $id_user_name = $id_user_comment->name;
        //$dsCommentUser=TableComment::where('id_user',$data[''])
        foreach ($dsComment as $k => $comment) {
            $output .= '<div class="row " id="style_comment">
            <div class="col-sm-1" id="img-avatar">
                <img width="100%" src="' . url('/upload/avatar/user.jpg') . '"
                    class="img-avatar" />
            </div>
            <div class="col-sm-11" id="content">
                <span style="color: green">' . $comment->$id_user . '<span></span>
                ' . $comment->created_at->format('d-m-Y h:m') . '
                </span>
                <p>
                <p></p>
                ' . $comment->content . '
                </p>
            </div>
        </div> <p></p>';
            foreach ($comment_rep as $k => $reply_comment) {
                if ($reply_comment->content_parent_comment == $comment->id) {
                    $output .= '<div class="row " id="style_comment" style="margin: 5px 40px; background-color:#FFCC99">
            <div class="col-sm-1" id="img-avatar">
                <img width="60%" src="' . url('/upload/avatar/avatar5.png') . '"
                    class="img-avatar" />
            </div>
            <div class="col-sm-11" id="content">
                <span style="color: blue">HL Shoes Store<span></span>
                ' . $reply_comment->created_at->format('d-m-Y h:m') . '
                </span>
                <p>
                <p></p>
                ' . $reply_comment->content . '
                </p>
            </div>
        </div> <p></p>
        
        ';
                }
            }
        }
        echo $output;
    }
    // public function get_comment_status(Request $req)
    // {
    //     $comment = TableComment::where('status', 0)->get();
    //     return view('.user.product.detail',compact('comment'));
    // }
    public function reply_comment(Request $req)
    {
        $data = $req->all();
        $comment = new TableComment();
        $comment->content = $data['comment'];
        $comment->id_product = $data['id_product'];
        $comment->content_parent_comment = $data['comment_id'];
        $comment->status = 1;
        $comment->comment_name = 'HL Shoes Store ';
        $comment->save();
    }
    public function insert_rating(Request $req)
    {
        if (Auth::guard('user')->check()) {
            $data = $req->all();
            $rating = new TableRating();
            $rating->id_product = $data['product_id'];
            $rating->rating = $data['index'];
            $rating->save();
            echo 'Đánh giá thành công';
        }
        else
        {
            echo 'Vui lòng đăng nhập để đánh giá sản phẩm!';
        }
    }

    // ---------------- USER ---------------- //    
}
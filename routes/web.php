<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReturnTpl;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StaticticalController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\LoginCotroller;
use App\Http\Controllers\ArticleCotroller;
use App\Http\Controllers\TypeArticleCotroller;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();


Route::get('/login-admin', [LoginCotroller::class, 'index_login'])->name('dang-nhap-admin');
Route::post('/login-admin', [LoginCotroller::class, 'xlLoginAdmin'])->name('xl-dang-nhap-admin');
Route::get('/logout-admin', [LoginCotroller::class, 'xlLogoutAdmin'])->name('xl-logout-admin');

Route::group(['middleware' => ['checkauth:admin']], function () {

    Route::get('admin', [ReturnTpl::class, 'index_admin'])->name('trang-chu-admin');
    Route::get('/update-info/{id}', [LoginCotroller::class, 'index_update'])->name('suadoi-thongtin-admin');
    Route::post('/update-info/{id}', [LoginCotroller::class, 'xl_update_info'])->name('xl-suadoi-thongtin-admin');

    Route::get('/change-password/{id}', [LoginCotroller::class, 'index_change_password_admin'])->name('doi-matkhau-admin');
    Route::post('/change-password/{id}', [LoginCotroller::class, 'xl_change_password'])->name('xl-doi-matkhau-admin');

    Route::get('/admin/product/', [ProductController::class, 'index_product'])->name('san-pham-admin');
    Route::get('/admin/product/search/{keyword}', [ProductController::class, 'searchProductAdmin'])->name('tim-kiem-product');
    Route::get('/admin/product/add-product', [ProductController::class, 'index_addpro'])->name('them-moi-san-pham-admin');
    Route::post('/admin/product/add-product', [ProductController::class, 'addproducts'])->name('xl-them-moi-san-pham-admin');
    Route::get('/admin/product/modify-product/{id}', [ProductController::class, 'index_modifypro'])->name('sua-doi-san-pham-admin');
    Route::post('/admin/product/modify-product/{id}', [ProductController::class, 'modifyproducts'])->name('xl-sua-doi-san-pham-admin');
    Route::get('/admin/product/delete-product', [ProductController::class, 'deleteproducts'])->name('xl-xoa-bo-san-pham-admin');
    Route::get('/admin/remove', [ProductController::class, 'removeFormGallery'])->name('xl-xoa-hinhcon-admin');

    Route::get('/admin/brand', [ProductController::class, 'index_brand'])->name('sanpham-lv1-admin');
    Route::get('/admin/brand/search/{keyword}', [ProductController::class, 'searchBrandAdmin'])->name('tim-kiem-brand');
    Route::get('/admin/brand/add-brand', [ProductController::class, 'index_addbrand'])->name('themmoi-sanpham-lv1-admin');
    Route::post('/admin/brand/add-brand', [ProductController::class, 'addlevel1'])->name('xl-themmoi-sanpham-lv1-admin');
    Route::get('/admin/brand/modify-brand/{id}', [ProductController::class, 'index_modifybrand'])->name('suadoi-sanpham-lv1-admin');
    Route::post('/admin/brand/modify-brand/{id}', [ProductController::class, 'modifylevel1'])->name('xl-suadoi-sanpham-lv1-admin');
    Route::get('/admin/brand/delete-brand', [ProductController::class, 'deletelevel1'])->name('xl-xoabo-sanpham-lv1-admin');

    Route::get('/admin/type', [ProductController::class, 'index_type'])->name('sanpham-lv2-admin');
    Route::get('/admin/type/search/{keyword}', [ProductController::class, 'searchTypeAdmin'])->name('tim-kiem-type');
    Route::get('/admin/type/add-type', [ProductController::class, 'index_addtype'])->name('themmoi-sanpham-lv2-admin');
    Route::post('/admin/type/add-type', [ProductController::class, 'addlevel2'])->name('xl-themmoi-sanpham-lv2-admin');
    Route::get('/admin/type/modify-type/{id}', [ProductController::class, 'index_modifytype'])->name('suadoi-sanpham-lv2-admin');
    Route::post('/admin/type/modify-type/{id}', [ProductController::class, 'modifylevel2'])->name('xl-suadoi-sanpham-lv2-admin');
    Route::get('/admin/type/delete-type', [ProductController::class, 'deletelevel2'])->name('xl-xoabo-sanpham-lv2-admin');

    Route::get('/admin/color', [ColorController::class, 'getcolors'])->name('mau-sac-admin');
    Route::get('/admin/color/search/{keyword}', [ColorController::class, 'searchColorAdmin'])->name('tim-kiem-color');
    Route::get('/admin/color/add-color', [ColorController::class, 'Return_tpladm_addcolor'])->name('them-moi-mau-sac-admin');
    Route::post('/admin/color/add-color', [ColorController::class, 'addColor'])->name('xl-them-moi-mau-sac-admin');
    Route::get('/admin/color/modify-color/{id}', [ColorController::class, 'Return_tpladm_modifycolor'])->name('sua-doi-mau-sac-admin');
    Route::post('/admin/color/modify-color/{id}', [ColorController::class, 'modifyColor'])->name('xl-sua-doi-mau-sac-admin');
    Route::get('/admin/color/delete-color', [ColorController::class, 'deleteColor'])->name('xl-xoa-bo-mau-sac-admin');

    Route::get('/admin/size', [ColorController::class, 'getsizes'])->name('kich-thuoc-admin');
    Route::get('/admin/size/search/{keyword}', [ColorController::class, 'searchSizeAdmin'])->name('tim-kiem-size');
    Route::get('/admin/size/add-size', [ColorController::class, 'Return_tpladm_addsize'])->name('them-moi-kich-thuoc-admin');
    Route::post('/admin/size/add-size', [ColorController::class, 'addSize'])->name('xl-them-moi-kich-thuoc-admin');
    Route::get('/admin/size/modify-size/{id}', [ColorController::class, 'Return_tpladm_modifysize'])->name('sua-doi-kich-thuoc-admin');
    Route::post('/admin/size/modify-size/{id}', [ColorController::class, 'modifySize'])->name('xl-sua-doi-kich-thuoc-admin');
    Route::get('/admin/size/delete-size', [ColorController::class, 'deleteSize'])->name('xl-xoa-bo-kich-thuoc-admin');

    Route::get('/admin/article/tin-tuc', [ArticleCotroller::class, 'getnews'])->name('tin-tuc-admin');
    Route::get('/admin/article/tin-tuc/search/{keyword}', [ArticleCotroller::class, 'searchNewsAdmin'])->name('tim-kiem-tin-tuc');
    Route::get('/admin/article/tin-tuc/add', [ArticleCotroller::class, 'return_tpladm_addnew'])->name('them-moi-tin-tuc-admin');
    Route::post('/admin/article/tin-tuc/add', [ArticleCotroller::class, 'addnews'])->name('xl-them-moi-tin-tuc-admin');
    Route::get('/admin/article/tin-tuc/modify/{id}', [ArticleCotroller::class, 'return_tpladm_modifynew'])->name('sua-doi-tin-tuc-admin');
    Route::post('/admin/article/tin-tuc/modify/{id}', [ArticleCotroller::class, 'modifynews'])->name('xl-sua-doi-tin-tuc-admin');
    Route::get('/admin/article/tin-tuc/delete', [ArticleCotroller::class, 'deletenews'])->name('xl-xoa-bo-tin-tuc-admin');

    Route::get('/admin/article/chinh-sach', [ArticleCotroller::class, 'getpolicies'])->name('chinh-sach-admin');
    Route::get('/admin/article/chinh-sach/search/{keyword}', [ArticleCotroller::class, 'searchPoliciesAdmin'])->name('tim-kiem-chinh-sach');
    Route::get('/admin/article/chinh-sach/add', [ArticleCotroller::class, 'return_tpladm_addpolicies'])->name('them-moi-chinh-sach-admin');
    Route::post('/admin/article/chinh-sach/add', [ArticleCotroller::class, 'addpolicies'])->name('xl-them-moi-chinh-sach-admin');
    Route::get('/admin/article/chinh-sach/modify/{id}', [ArticleCotroller::class, 'return_tpladm_modifypolicies'])->name('sua-doi-chinh-sach-admin');
    Route::post('/admin/article/chinh-sach/modify/{id}', [ArticleCotroller::class, 'modifypolicies'])->name('xl-sua-doi-chinh-sach-admin');
    Route::get('/admin/article/chinh-sach/delete', [ArticleCotroller::class, 'deletepolicies'])->name('xl-xoa-bo-chinh-sach-admin');

    Route::get('/admin/photo', [PhotoController::class, 'getsphoto'])->name('hinh-anh-admin');
    Route::get('/admin/photo/add-photo', [PhotoController::class, 'Return_tpladm_addphoto'])->name('them-moi-hinh-anh-admin');
    Route::post('/admin/photo/add-photo', [PhotoController::class, 'addphoto'])->name('xl-them-moi-hinh-anh-admin');
    Route::get('/admin/photo/modify-photo/{id}', [PhotoController::class, 'Return_tpladm_modifyphoto'])->name('sua-doi-hinh-anh-admin');
    Route::post('/admin/photo/modify-photo/{id}', [PhotoController::class, 'modifyphoto'])->name('xl-sua-doi-hinh-anh-admin');
    Route::get('/admin/photo/delete-photo', [PhotoController::class, 'deletephoto'])->name('xl-xoa-bo-hinh-anh-admin');

    Route::get('/admin/user', [UserController::class, 'getsusers'])->name('nguoi-dung-admin');
    Route::get('/admin/user/delete-user', [UserController::class, 'deleteuser'])->name('xl-xoa-bo-nguoi-dung-admin');

    // Route::get('/admin/status', [ProductController::class, 'setStatus'])->name('set-trang-thai-sp');

    Route::get('/admin/invoice', [ProductController::class, 'loadOrder'])->name('don-hang');
    Route::get('/admin/invoice/{id}', [ProductController::class, 'loadOrderDetail'])->name('chi-tiet-don-hang');
    Route::post('/admin/invoice/{id}', [ProductController::class, 'modifyorders'])->name('xl-don-hang');

    Route::get('/admin/comment', [ProductController::class, 'loadComment'])->name('binh-luan-admin');
    Route::get('/admin/rating', [ProductController::class, 'loadRating'])->name('danh-gia-admin');
    Route::get('/admin/comment/delete-comment', [ProductController::class, 'deletecomment'])->name('xl-xoa-bo-binh-luan-admin');
    Route::post('/allow-comment', [ProductController::class, 'allow_comment'])->name('duyet-binh-luan');
    Route::post('/reply-comment', [ProductController::class, 'reply_comment'])->name('tra-loi-binh-luan');

    Route::post('/insert-rating', [ProductController::class, 'insert_rating'])->name('danh-gia-sao');

    Route::get('/admin/statistical/', [StaticticalController::class, 'index'])->name('thong-ke');
    Route::get('/admin/statistical/{type}', [StaticticalController::class, 'loadStatistical'])->name('loadstatistical');
});

Route::get('/', [ProductController::class, 'GetProductIndex'])->name('trang-chu-user');
Route::get('/product', [ProductController::class, 'GetProductPage'])->name('lay-ds-product');
Route::get('/search/{keyword}', [ProductController::class, 'SearchProduct'])->name('tim-kiem');
Route::get('/detail/{id}', [ProductController::class, 'GetDetailProduct'])->name('chi-tiet-product');
Route::post('/detail/{id}', [ProductController::class, 'GetSlProduct'])->name('so-luong-product');
Route::get('/cart', [ProductController::class, 'viewCart'])->name('lay-gio-hang');
Route::get('/addcart', [ProductController::class, 'addToCart'])->name('xl-them-giohang');
Route::get('/updatecart', [ProductController::class, 'updateCart'])->name('xl-update-giohang');
Route::get('/remove', [ProductController::class, 'removeFromCart'])->name('xl-xoa-giohang');

Route::get('/login-user', [LoginCotroller::class, 'index_login_user'])->name('dang-nhap-user');
Route::post('/login-user', [LoginCotroller::class, 'xlLoginUser'])->name('xl-dang-nhap-user');
Route::get('/logout-user', [LoginCotroller::class, 'xlLogoutUser'])->name('xl-logout-user');

Route::post('/get-comment', [ProductController::class, 'get_comment_status'])->name('hien-thi-comment');
Route::post('/get-comment', [ProductController::class, 'get_comment'])->name('hien-thi-comment');
Route::post('/load-comment', [ProductController::class, 'load_comment'])->name('xl-hien-thi-comment');
Route::post('/send-comment', [ProductController::class, 'send_comment'])->name('gui-comment');

Route::group(['middleware' => ['checkauth:user']], function () {

    // Route::get('/get-password', [LoginCotroller::class, 'GetForgotPassword'])->name('trang-getpassword');
    // Route::post('/get-password', [LoginCotroller::class, 'xl_GetPassword'])->name('xl-trang-get-password');

    Route::get('/change-password/user/{id}', [LoginCotroller::class, 'index_change_password_user'])->name('doi-matkhau-user');
    Route::post('/change-password/user/{id}', [LoginCotroller::class, 'xl_change_password_user'])->name('xl-doi-matkhau-user');

    Route::get('/update-info/user/{id}', [LoginCotroller::class, 'index_update_user'])->name('suadoi-thongtin-user');
    Route::post('/update-info/user/{id}', [LoginCotroller::class, 'xl_update_info_user'])->name('xl-suadoi-thongtin-user');

    Route::post('/payment', [ProductController::class, 'Payment'])->name('thanh-toan');

    Route::get('/purchase-history/user', [LoginCotroller::class, 'GetPurchaseHistory'])->name('lichsu-muahang-user');
    Route::get('/purchase-history-detail/{id}', [LoginCotroller::class, 'GetPurchaseHistoryDetail'])->name('chitiet-lichsu-muahang-user');
    
});
Route::get('/mail', [LoginCotroller::class, 'SendMail'])->name('trang-gui-mail');
Route::post('/mail', [LoginCotroller::class, 'xl_SendMail'])->name('xl-gui-mail');
Route::get('/forgot-password/{email}', [LoginCotroller::class, 'GetForgotPasswordIndex'])->name('trang-forgot');
Route::post('/forgot-password', [LoginCotroller::class, 'xl_ForgotPassword'])->name('xl-trang-forgot');


Route::get('/register', [LoginCotroller::class, 'GetRegisterIndex'])->name('trang-dang-ky');
Route::post('/register', [LoginCotroller::class, 'addRegister'])->name('xl-dang-ky-nguoi-dung');

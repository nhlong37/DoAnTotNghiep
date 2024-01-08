<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\TableArticle;
use App\Models\TableOrder;
use App\Models\TableOrderDetail;
use App\Models\TablePhoto;
use App\Models\TableProduct;
use Carbon\Carbon;

class ReturnTpl extends Controller
{
    public function index_user(){
        return view('.user.index');
    }
    public function index_admin(){
        $nam_ht = Carbon::now('Asia/Ho_Chi_Minh')->year;
        $thang1 = TableOrder::whereBetween('created_at',[$nam_ht.'-01-01',$nam_ht.'-01-31'])->where('status', 'like', '%dathanhtoan%'
        )->get();
        $sum1 = 0;
        foreach($thang1 as $k => $v) {
            $sum1 += $v['total_price'];
        }
        
        $thang2 = TableOrder::whereBetween('created_at',[$nam_ht.'-02-01',$nam_ht.'-02-28'])->where('status', 'like', '%dathanhtoan%'
        )->get();
        $sum2 = 0;
        foreach($thang2 as $k => $v) {
            $sum2 += $v['total_price'];
        }

        $thang3 = TableOrder::whereBetween('created_at',[$nam_ht.'-03-01',$nam_ht.'-03-31'])->where('status', 'like', '%dathanhtoan%'
        )->get();
        $sum3 = 0;
        foreach($thang3 as $k => $v) {
            $sum3 += $v['total_price'];
        }

        $thang4 = TableOrder::whereBetween('created_at',[$nam_ht.'-04-01',$nam_ht.'-04-30'])->where('status', 'like', '%dathanhtoan%'
        )->get();
        $sum4 = 0;
        foreach($thang4 as $k => $v) {
            $sum4 += $v['total_price'];
        }
        $thang5 = TableOrder::whereBetween('created_at',[$nam_ht.'-05-01',$nam_ht.'-05-31'])->where('status', 'like', '%dathanhtoan%'
        )->get();
        $sum5 = 0;
        foreach($thang5 as $k => $v) {
            $sum5 += $v['total_price'];
        }
        $thang6 = TableOrder::whereBetween('created_at',[$nam_ht.'-06-01',$nam_ht.'-06-30'])->where('status', 'like', '%dathanhtoan%'
        )->get();
        $sum6 = 0;
        foreach($thang6 as $k => $v) {
            $sum6 += $v['total_price'];
        }
        $thang7 = TableOrder::whereBetween('created_at',[$nam_ht.'-07-01',$nam_ht.'-07-31'])->where('status', 'like', '%dathanhtoan%'
        )->get();
        $sum7 = 0;
        foreach($thang7 as $k => $v) {
            $sum7 += $v['total_price'];
        }
        $thang8 = TableOrder::whereBetween('created_at',[$nam_ht.'-08-01',$nam_ht.'-08-31'])->where('status', 'like', '%dathanhtoan%'
        )->get();
        $sum8 = 0;
        foreach($thang8 as $k => $v) {
            $sum8 += $v['total_price'];
        }
        $thang9 = TableOrder::whereBetween('created_at',[$nam_ht.'-09-01',$nam_ht.'-09-30'])->where('status', 'like', '%dathanhtoan%'
        )->get();
        $sum9 = 0;
        foreach($thang9 as $k => $v) {
            $sum9 += $v['total_price'];
        }
        $thang10 = TableOrder::whereBetween('created_at',[$nam_ht.'-10-01',$nam_ht.'-10-31'])->where('status', 'like', '%dathanhtoan%'
        )->get();
        $sum10 = 0;
        foreach($thang10 as $k => $v) {
            $sum10 += $v['total_price'];
        }
        $thang11 = TableOrder::whereBetween('created_at',[$nam_ht.'-11-01',$nam_ht.'-11-30'])->where('status', 'like', '%dathanhtoan%'
        )->get();
        $sum11 = 0;
        foreach($thang11 as $k => $v) {
            $sum11 += $v['total_price'];
        }
        $thang12 = TableOrder::whereBetween('created_at',[$nam_ht.'-12-01',$nam_ht.'-12-31'])->where('status', 'like', '%dathanhtoan%'
        )->get();
        $sum12 = 0;
        foreach($thang12 as $k => $v) {
            $sum12 += $v['total_price'];
        }
        $data_m_total = [$sum1,$sum2,$sum3,$sum4,$sum5,$sum6,$sum7,$sum8,$sum9,$sum10,$sum11,$sum12];
        $data_month_chart = json_encode($data_m_total);  
        return view('.admin.home.home', compact('data_month_chart'));
    }

    public function GetProductIndex(Request $req)
    {
        // lấy sản phẩm
        $dsProductNew = TableProduct::where('deleted_at', null)->limit(8)->get();
        $dsProductOutsanding = TableProduct::where('deleted_at', null)->where('view', '>=', 50)->get();
        $dsNewsOutsanding = TableArticle::where('deleted_at', null)->where('view', '>=', 20)->where('type', 'tin-tuc')->get();
        $slide = TablePhoto::where('deleted_at', null)->where('type', 'slide')->get();
        return view('.user.home.home', compact('dsProductNew', 'dsProductOutsanding', 'dsNewsOutsanding','slide'));
    }

    public function index_invoice(Request $req){
        $invoice = TableOrder::where('id', $req->id)->firstOrFail();

        $invoice_detail = TableOrderDetail::where('id_order', $invoice->id)->get();
        
        $info_product = TableProduct::whereIn('id',$invoice_detail->id_product);
        dd($info_product);
        return view('.user.order.notify_order', compact('invoice', 'invoice_detail', 'info_product'));
    }

    
}

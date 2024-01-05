<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TableOrder;
use App\Models\TableOrderDetail;
use App\Models\TableVariantsPCS;
use App\Models\TableProduct;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function VNPay_Payment (Request $req) {

        
        $name = $req->fullname;
        $email = $req->email;
        $phone = $req->phone;
        $address = $req->address;
        $requirements = (!empty($req->requirements)) ? $req->requirements : "Đã thanh toán";
        $method = $req->paymentmethod;
        $id_user = Auth::guard('user')->user()->id;
        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = "http://localhost:8000/return-vnpay/".$name."/".$phone."/".$email."/".$address."/".$requirements."/".$method."/".$id_user;
        $vnp_TmnCode = "IZ97NBEN";//Mã website tại VNPAY 
        $vnp_HashSecret = "JGUDYSDIZFBSTYQOXERJXFZURDMZFUZC"; //Chuỗi bí mật
        
        $vnp_TxnRef = $req->code; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        $vnp_OrderInfo = "Thanh toán hoá đơn" . $req->code;
        $vnp_OrderType = "Thanh toán";
        $vnp_Amount = getOrderTotal() * 100;
        $vnp_Locale = "VN";
        $vnp_BankCode = "NCB";
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
        $vnp_Inv_Phone = $phone;
        $vnp_Inv_Customer = $name;
        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
            "vnp_Inv_Phone" => $vnp_Inv_Phone,
            "vnp_Inv_Customer" => $vnp_Inv_Customer,
           
        );
        
        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
            $inputData['vnp_Bill_State'] = $vnp_Bill_State;
        }
        
        //var_dump($inputData);
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }
        
        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret);//  
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }
        $returnData = array('code' => '00'
            , 'message' => 'success'
            , 'data' => $vnp_Url);
            if (isset($_POST['redirect'])) {
                header('Location: ' . $vnp_Url);
                die();
            } else {
                echo json_encode($returnData);
            }

            // vui lòng tham khảo thêm tại code demo
       
    }

    public function returnVNPay (Request $req) {
        $infoOrder = new TableOrder();
        $infoOrder->code = $req->vnp_TxnRef;
        $infoOrder->id_user = $req->id_user;
        $infoOrder->fullname = $req->fullname;
        $infoOrder->phone = $req->phone;
        $infoOrder->address = $req->address;
        $infoOrder->email = $req->email;
        $infoOrder->content = $req->requirements;
        $infoOrder->payment = $req->paymentmethod;
        $infoOrder->status = 'dathanhtoan';
        $infoOrder->total_price = $req->vnp_Amount/100;
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

            $miniusQuantity = TableVariantsPCS::where([
                ['id_product', '=', $detailOrder->id_product],
                ['id_size', '=', $detailOrder->id_size],
                ['id_color', '=', $detailOrder->id_color],
            ])->firstOrFail();
            $miniusQuantity->quantity = $miniusQuantity->quantity - $value['quantity'];
            $miniusQuantity->save();
        }
        if (session()->has('cart')) {
            session()->forget('cart');
        }

        return redirect()->route('trang-chu-user');
    }
}

<?php

use App\Models\TableProduct;
use Illuminate\Support\Carbon;

function formatMoney($price = 0, $unit = ' VNĐ', $html = false)
{
    $str = '';
    if ($price) {
        $str .= number_format($price, 0, ',', '.');
        if ($unit != '') {
            if ($html) {
                $str .= '<span>' . $unit . '</span>';
            } else {
                $str .= $unit;
            }
        }
    }
    return $str;
}

function formatPhone($number, $dash = ' ')
{
    if (preg_match('/^(\d{4})(\d{3})(\d{3})$/', $number, $matches) || preg_match('/^(\d{3})(\d{4})(\d{4})$/', $number, $matches)) {
        return $matches[1] . $dash . $matches[2] . $dash . $matches[3];
    }
}

function getOrderTotal()
{
    $sum = 0;

    if (!empty(session()->get('cart', []))) {
        $cart = session()->get('cart', []);
        foreach ($cart as $index => $value) {
            //lấy id sản phẩm trong session
            $proid = $value['id_product'];
            //lấy số lượng trong session
            $quan = $value['quantity'];

            $proinfo = getProductInfo($proid);
            if ($proinfo->sale_price) $price = $proinfo->sale_price;
            else $price = $proinfo->price_regular;
            $sum += ($price * $quan);
        }
    }

    return $sum;
}

function getProductInfo($pid = 0)
{
    $row = null;
    if ($pid) {
        $row = TableProduct::find($pid);
    }
    return $row;
}

function humanTiming($time)
{
    $time = strtotime($time);
    $time_ago = strtotime(date('Y-m-d H:i:s')) - $time;
    $seconds = $time_ago;
    $minutes      = round($seconds / 60);           // value 60 is seconds
    $hours        = round($seconds / 3600);         // value 3600 is 60 minutes * 60 sec
    $days          = round($seconds / 86400);        // value 86400 is 24 hours * 60 minutes * 60 sec
    $weeks        = round($seconds / 604800);       // value 604800 is 7 days * 24 hours * 60 minutes * 60 sec
    $months     = round($seconds / 2629440);     // value 2629440 is ((365+365+365+365+366)/5/12) days * 24 hours * 60 minutes * 60 sec
    $years         = round($seconds / 31553280); // value 31553280 is ((365+365+365+365+366)/5) days * 24 hours * 60 minutes * 60 sec

    if ($seconds <= 60) {
        return "Vừa xong";
    } else if ($minutes <= 60) {
        if ($minutes == 1) {
            return "1 phút trước";
        } else {
            return "$minutes phút trước";
        }
    } else if ($hours <= 24) {
        if ($hours == 1) {
            return "1 giờ trước";
        } else {
            return "$hours giờ trước";
        }
    } else if ($days <= 7) {
        if ($days == 1) {
            return "hôm qua";
        } else {
            return "$days ngày trước";
        }
    } else if ($weeks <= 4.3) {  // About a month
        if ($weeks == 1) {
            return "1 tuần trước";
        } else {
            return "$weeks tuần trước";
        }
    } else if ($months <= 12) {
        if ($months == 1) {
            return "1 tháng trước";
        } else {
            return "$months tháng trước";
        }
    } else {
        if ($years == 1) {
            return "1 năm trước";
        } else {
            return "$years năm trước";
        }
    }
}

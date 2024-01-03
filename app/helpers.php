<?php

use App\Models\TableProduct;

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

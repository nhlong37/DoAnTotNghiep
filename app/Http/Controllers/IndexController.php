<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TableProduct;
use App\Models\TableArticle;
use App\Models\TableOrder;
use Carbon\Carbon;

class IndexController extends Controller
{
    public function GetIntroduce()
    {
        $introduce_new = TableArticle::all();
        return view('.user.home.introduce', compact('introduce_new'));
    }
}

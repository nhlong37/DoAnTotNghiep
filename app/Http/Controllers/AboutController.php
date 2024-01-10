<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TableArticle;
use App\Models\TablePhoto;

class AboutController extends Controller
{
    public function loadabout() {
        $logo = TablePhoto::where('deleted_at', null)->where('type', 'logo')->FirstOrFail();
        $banner = TablePhoto::where('deleted_at', null)->where('type', 'banner')->FirstOrFail();
        $dsPolicies = TableArticle::where('deleted_at', null)->where('type', 'chinh-sach')->get();
        return view('.user.order.order', compact('colors', 'sizes', 'dsPolicies') , ['logo' => $logo, 'banner' => $banner]);
    }
}

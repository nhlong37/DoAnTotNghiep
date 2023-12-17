<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
class ReturnTpl extends Controller
{
    public function index_user(){
        return view('.user.index');
    }
    public function index_admin(){
        return view('.admin.home.home');
    }
}

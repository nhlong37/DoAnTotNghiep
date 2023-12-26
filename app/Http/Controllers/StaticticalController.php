<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Exports\ExportFile;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Str;

class StaticticalController extends Controller
{
    public function index() {
        return view('admin.statistical.index');
    }

    public function loadStatistical($type) {
        if($type == 'products') {
            $filename = Str::random(5);
            return Excel::download(new ExportFile, 'products_'.$filename.'.xlsx');
        } else {
            return view('admin.statistical.index');
        }  
    }
}

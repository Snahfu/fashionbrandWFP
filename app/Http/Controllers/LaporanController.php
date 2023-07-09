<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index(){
        $datas = "";
        return view('pembeli.order.laporan', compact('datas'));
    }
}

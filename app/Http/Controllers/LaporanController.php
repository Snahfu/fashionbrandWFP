<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    public function index()
    {
        // $datas = DB::table('produks')
        //     ->select('produks.*', 'total_quantity')
        //     ->joinSub(
        //         function ($query) {
        //             $query->select('produk_id', DB::raw('SUM(kuantitas) as total_quantity'))
        //                 ->from('order_produk')
        //                 ->groupBy('produk_id');
        //         },
        //         'order_produk',
        //         function ($join) {
        //             $join->on('produks.id', '=', 'order_produk.produk_id');
        //         }
        //     )
        //     ->orderByDesc('total_quantity')
        //     ->limit(3)
        //     ->get();

        $datas = DB::select(DB::raw('
            SELECT produks.*, total_quantity
            FROM produks
            JOIN (
                SELECT produk_id, SUM(kuantitas) as total_quantity
                FROM order_produk
                GROUP BY produk_id
            ) AS order_produk
            ON produks.id = order_produk.produk_id
            ORDER BY total_quantity DESC
            LIMIT 3
        '));

        // dd($datas);
        return view('pembeli.order.laporan', compact('datas'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index()
    {
        // Logic ambil semua order detail
        return view('admin.order.index');
    }

    public function keranjang()
    {
        return view('pembeli.order.keranjang');
    }

    public function riwayatTransaksi()
    {
        $userId = Auth::user()->id;
        $riwayats = Order::where("user_id", $userId)->get();
        return view("pembeli.transaksi.index", compact('riwayats'));
    }

    public function riwayatTransaksiDetail(Request $request)
    {
        $orderId = $request['order_id'];
        // dd($orderId);
        $orders = DB::table('order_produk')
            ->join('produks', 'order_produk.produk_id', '=', 'produks.id')
            ->select('produks.url_gambar', 'produks.nama_produk', 'order_produk.kuantitas', 'order_produk.harga', 'order_produk.subtotal')
            ->where('order_produk.order_id', $orderId)
            ->get();

        return view("pembeli.transaksi.detail", compact('orders', 'orderId'));
    }

    public function riwayatSemuaOrder()
    {
        $riwayats = Order::orderBy('created_at')->get();
        return view("admin.order.index", compact('riwayats'));
    }

    public function checkout()
    {
        // Ambil user login dulu
        $user = Auth::user();
        return view("pembeli.order.checkout", ['user' => $user])->render();
    }

    public function checkoutProcess(Request $request)
    {
        $user = User::find(Auth::user()->id);

        $subTotal = 0;
        $pesan = "Berhasil mengkonversikan poin";
        $cart = session("cart");

        // Kalau cart kosong
        if (!$cart) {
            $pesan = "Silahkan memasukan barang ke keranjang terlebih dahulu!";
            return response()->json(array(
                "status" => "failure",
                "pesan" => $pesan
            ));
        }

        // Bukan Member
        if ($user->member) {
            $pesan = "Anda bukan member";
            return response()->json(array(
                "status" => "failure",
                "pesan" => $pesan
            ));
        }

        // Hitung subtotal
        foreach ($cart as $key => $product) {
            $temporaryTotal = $product["quantity"] * $product["price"];
            $subTotal += $temporaryTotal;
        }

        // Subtotal kurang dari 100rb
        if ($subTotal < 100000) {
            $pesan = "Untuk menggunakan poin silahkan melakukan belanja lebih!";
            return response()->json(array(
                "status" => "failure",
                "pesan" => $pesan
            ));
        }


        $order = new Order();
        $order->user_id = Auth::user()->id;
        $order->subtotal = 0;
        $order->pajak = 0;
        $order->potongan = 0;
        $order->total = 0;
        $order->poin_didapat = 0;
        $order->save();

        foreach ($cart as $key => $product) {
            $temporaryTotal = $product["quantity"] * $product["price"];
            $order->produks()->attach($key, [
                "kuantitas" => $product["quantity"],
                "harga" => $product["price"],
                "subtotal" => $temporaryTotal
            ]);
            $subTotal += $temporaryTotal;
        }
        // Hitung SubTotal, Total, Pajak, Pemotongan


        return response()->json(array(
            "status" => "success",
            "pesan" => $pesan
        ));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

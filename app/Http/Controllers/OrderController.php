<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use Exception;
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
        $userRole = Auth::user()->role;
        if($userRole != "pembeli"){
            abort(403);
        }
        $carts = session()->get("cart");
        return view('pembeli.order.keranjang', compact('carts'));
    }

    public function hapusBarang(Request $request)
    {
        $id = $request->get('id');
        $cart = session()->get('cart');
        unset($cart[$id]);
        session()->put("cart", $cart);

        return response()->json([
            "status" => "success",
            "msg" => "Berhasil menghapus produk dari cart",
        ]);
    }

    public function ubahJumlah(Request $request)
    {
        $id = $request->get('id');
        $quantity = $request->get('quantity');
        $cart = session()->get('cart');
        $cart[$id]['quantity'] = $quantity;
        $subtotal = (int)$cart[$id]['quantity'] * (float)$cart[$id]['price'];
        session()->put("cart", $cart);

        return response()->json([
            "status" => "success",
            "msg" => "Berhasil mengubah jumlah produk dari cart",
            "subtotal" => $subtotal,
        ]);
    }

    public function riwayatSemuaTransaksi()
    {
        $userRole = Auth::user()->role;
        if($userRole == "pembeli"){
            abort(403);
        }
        $riwayats = Order::orderBy('created_at')->get();
        return view("pembeli.transaksi.index", compact('riwayats'));
    }

    public function riwayatTransaksi()
    {
        $userRole = Auth::user()->role;
        if($userRole != "pembeli"){
            abort(403);
        }
        $userId = Auth::user()->id;
        $riwayats = Order::where("user_id", $userId)->orderBy('created_at', 'DESC')->get();
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

    public function checkout()
    {
        $user = Auth::user();
        $cart = session()->get('cart');
        return response()->json(array(
            'status' => 'oke',
            'msg' => view('pembeli.order.checkout', compact('user', 'cart'))->render(),
        ));
    }

    public function pesan(Request $request)
    {
        $user = Auth::user();
        $subtotal = intval($request->get('subtotal'));
        $pajak = intval($request->get('pajak'));
        $poin_dipakai = intval($request->get('poin_dipakai'));
        $total = intval($request->get('total'));
        $poin_didapat = intval($request->get('poin_didapat'));
        $cart = session()->get('cart');

        try {
            DB::beginTransaction();
            $order = new Order();
            $order->user_id = $user->id;
            $order->subtotal = $subtotal;
            $order->pajak = $pajak;
            $order->potongan = $poin_dipakai * 1000;
            $order->total = $total;
            $order->poin_didapat = $poin_didapat;
            $order->save();
            $order_id = $order->id;

            $user->poin -= $poin_dipakai + $poin_didapat;
            $user->save();

            $produks = [];
            foreach ($cart as $key => $value) {
                $produk = [];
                $produk['order_id'] = $order_id;
                $produk['produk_id'] = $key;
                $produk['kuantitas'] = $value['quantity'];
                $produk['harga'] = $value['price'];
                $produk['subtotal'] = $value['price'] * $value['quantity'];
                $produks[] = $produk;
            }

            $order->produks()->attach($produks);
            DB::commit();
            session()->forget('cart');

            return response()->json(array(
                "status" => "success",
                "msg" => "Berhasil memesan order"
            ));
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json(array(
                "status" => "failure",
                "msg" => $e
            ));
        }
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

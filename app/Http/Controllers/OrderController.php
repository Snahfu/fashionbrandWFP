<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        // Logic ambil semua order detail
        return view('admin.order.index');
    }

    public function keranjang()
    {
        return view('pembeli.keranjang');
    }

    public function riwayatTransaksi($userId){
        $history = Order::where("user_id", $userId)->get();
        return view("pembeli.transaksi", ['riwayats'=> $history]);
    }

    public function checkoutPage($userId){
        // Ambil user login dulu
        $userPoin = User::find($userId);
        return view("pembeli.checkout", ['poin'=> $userPoin]);
    }

    public function redemptionPoin(Request $request){
        $user = User::find($request->get('userid'));
        // Sebelum di pajak
        $subTotal = $request->get('subtotal');
        $pesan = "Berhasil mengkonversikan poin";

        // Bukan Member
        if($user->member){
            $pesan = "Anda bukan member";
            return response()->json(array(
                "status" => "failure",
                "pesan" => $pesan
            ));
        }

        // Subtotal kurang dari 100rb
        if($subTotal < 100000){
            $pesan = "Untuk menggunakan poin silahkan melakukan belanja lebih!";
            return response()->json(array(
                "status" => "failure",
                "pesan" => $pesan
            ));
        }

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

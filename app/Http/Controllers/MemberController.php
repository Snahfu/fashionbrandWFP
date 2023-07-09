<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Logic ambil semua member
        $userRole = Auth::user()->role;
        if($userRole == "pembeli"){
            abort(403);
        }
        $members = User::where('role', 'pembeli')->where('member', 1)->get();
        return view('admin.member.index', compact('members'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $userRole = Auth::user()->role;
        if($userRole != "owner"){
            abort(403);
        }
        // Logic ambil semua pembeli yang sudah beli dan belum menjadi member
        $pembelis = DB::table('users')
            ->join('orders', 'users.id', '=', 'orders.user_id')
            ->select('users.id', 'users.name', 'users.email')
            ->where('users.role', 'pembeli')
            ->where('users.member', 0)
            ->distinct('users.id')
            ->get();

        return view('admin.member.create', compact('pembelis'));
    }

    public function ambilKeranjang(Request $request)
    {
        $pesan = "Berhasil mengambil data keranjang";
        $cart = session("cart");
        if (!$cart) {
            $pesan = "Silahkan memasukan barang ke keranjang terlebih dahulu!";
            return response()->json(array(
                "status" => "failure",
                "pesan" => $pesan
            ));
        }
        return response()->json(array(
            "status" => "failure",
            "pesan" => $pesan,
            "cart" => $cart
        ));
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
    }

    public function updateMembership(Request $request)
    {
        $user = User::find($request['user_id']);
        $user->member = $request['membership_status'];
        $user->update();

        return response()->json(array(
            'status' => 'oke',
            'msg' => 'Status membership berhasil diperbaharui!'
        ), 200);
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

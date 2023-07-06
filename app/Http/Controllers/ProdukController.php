<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Http\Controllers\Controller;
use App\Models\Jenis;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
Use Alert;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jenises = Jenis::all();
        $kategoris = Kategori::all();
        $produks = Produk::all();
        confirmDelete('Yakin ingin menghapus data?');
        return view('admin.produk.index', compact('jenises', 'kategoris', 'produks'));
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
        $data = new Produk();
        // Upload Image
        $file = $request->file('gambarproduk');
        $imgFolder = 'images';
        $imgFile = time()."_".$file->getClientOriginalName();
        $file->move($imgFolder, $imgFile);
        $data->url_gambar = $imgFile;

        // save produk
        $data->nama_produk = $request->get('namaproduk');
        $data->brand_produk = $request->get('brandproduk');
        $data->harga = $request->get('hargaproduk');
        $data->dimensi = $request->get('dimensiproduk');
        $data->jenis_id = $request->get('jenisproduk');
        $data->save();

        $kategoris_id = $request->get('kategoriproduk');

        // save kategori_produk
        foreach($kategoris_id as $id) {
            DB::table('kategori_produk')->insert([
                'kategori_id' => $id,
                'produk_id' => $data->id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // return response()->json(array(
        //     'status' => 'oke',
        //     'msg' => 'Berhasil menambah data!',
        //     'id' => $data->id,
        //     'img' => $data->url_gambar,
        //     'nama' => $data->nama_produk,
        //     'harga' => $data->harga,
        // ),200);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function show(Produk $produk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function edit(Produk $produk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produk $produk)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produk $produk)
    {
        
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Http\Controllers\Controller;
use App\Models\Jenis;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Alert;
use App\Models\KategoriProduk;
use Illuminate\Support\Facades\File;

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
        $imgFile = time() . "_" . $file->getClientOriginalName();
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
        foreach ($kategoris_id as $id) {
            DB::table('kategori_produk')->insert([
                'kategori_id' => $id,
                'produk_id' => $data->id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        return redirect()->route('produk.index')->with('success', 'Berhasil menambah data!');
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
    public function update(Request $request, $id)
    {
        $data = Produk::find($id);
        $old = $data->url_gambar;

        // update image
        $file = $request->file('gambarproduk');
        $imgFolder = 'images';
        $imgFile = time() . "_" . $file->getClientOriginalName();
        $file->move($imgFolder, $imgFile);
        $data->url_gambar = $imgFile;

        // update & save
        $data->nama_produk = $request->get('namaproduk');
        $data->brand_produk = $request->get('brandproduk');
        $data->harga = $request->get('hargaproduk');
        $data->dimensi = $request->get('dimensiproduk');
        $data->jenis_id = $request->get('jenisproduk');
        $data->save();

        // delete kategori_produk
        DB::table('kategori_produk')->where('produk_id', $id)->delete();

        // save kategori_produk
        $kategoris_id = $request->get('kategoriproduk');
        foreach ($kategoris_id as $cid) {
            DB::table('kategori_produk')->insert([
                'kategori_id' => $cid,
                'produk_id' => $id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // delete old image
        $image_path = public_path('images/' . $old);
        if (File::exists($image_path)) {
            File::delete($image_path);
        }

        return redirect()->route('produk.index')->with('success', 'Berhasil mengubah data!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            KategoriProduk::where('produk_id', $id)->delete();
            $produk = Produk::find($id);
            $produk->delete();
            return redirect()->route('produk.index')->with('success', 'Berhasil menghapus data!');
        } catch (\PDOException $ex) {
            return redirect()->route('produk.index')->with('errors', 'Data Gagal dihapus. Pastikan kembali tidak ada data yang berelasi sebelum dihapus');
        }
    }

    public function getEditForm(Request $request)
    {
        $id = $request->get('id');
        $data = Produk::find($id);
        $jenises = Jenis::all();
        $kategoris = Kategori::all();
        return response()->json(array(
            'status' => 'oke',
            'msg' => view('admin.produk.edit', compact('data', 'jenises', 'kategoris'))->render(),
        ));
    }

    public function getShowModal(Request $request)
    {
        $id = $request->get('id');
        $data = Produk::find($id);
        $kategoris = DB::select(DB::raw("SELECT * FROM kategoris k INNER JOIN (SELECT kategori_id FROM kategori_produk WHERE produk_id=$id) kp ON k.id = kp.kategori_id"));

        return response()->json(array(
            'status' => 'oke',
            'msg' => view('admin.produk.show', compact('data', 'kategoris'))->render(),
        ));
    }

    public function tambahKeranjang(Request $request)
    {
        $produk = Produk::find($request->get('produk_id'));
        $quantity = $request->get('quantity');
        $cart = session()->get("cart");
        if (!$cart) {
            $cart = array();
        }
        if (!isset($cart[$produk->id])) {
            $cart[$produk->id] = [
                "name" => $produk->nama_produk,
                "quantity" => $quantity,
                "price" => $produk->harga,
                "gambar" => $produk->url_gambar
            ];
        } else {
            $cart[$produk->id]["quantity"] += $quantity;
        }
        session()->put("cart", $cart);

        return response()->json([
            "status" => "success",
            "msg" => "Berhasil menambahkan produk $produk->name ke cart",
        ]);
    }
}

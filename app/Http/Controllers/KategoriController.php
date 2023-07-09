<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userRole = Auth::user()->role;
        if($userRole == "pembeli"){
            abort(403);
        }
        $kategoris = Kategori::all();
        return view('admin.kategori.index', compact('kategoris'));
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
        $data = new Kategori();
        $data->nama = $request->get('nama');
        $data->deskripsi = $request->get('desc');
        $data->save();
        return response()->json(array(
            'status' => 'oke',
            'msg' => 'Berhasil menambah data!',
            'id' => $data->id,
        ),200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function show(Kategori $kategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function edit(Kategori $kategori)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */

    public function getEditForm(Request $request)
    {
        $id = $request->get('id');
        $data = Kategori::find($id);
        return response()->json(array(
            'status' => 'oke',
            'msg' => view('admin.kategori.edit', compact('data'))->render(),
        ));
    }

    public function saveDataField(Request $request) {
        $id = $request->get('id');
        $fname = $request->get('fname');
        $value = $request->get('value');

        $jenis = Kategori::find($id);
        $jenis->$fname = $value;
        $jenis->save();
        return response()->json(array(
            'status' => 'oke',
            'msg' => 'Berhasil mengubah data!',
        ));
    }

    public function update(Request $request, $id)
    {
        $data = Kategori::find($id);
        $data->nama = $request->get('nama');
        $data->deskripsi = $request->get('desc');
        $data->save();
        return response()->json(array(
            'status' => 'oke',
            'msg' => 'Berhasil mengubah data!'
        ),200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Kategori::find($id);
        $data->delete();
        return response()->json(array(
            'status' => 'oke',
            'msg' => 'Data berhasil dihapus!'
        ),200);
    }
}

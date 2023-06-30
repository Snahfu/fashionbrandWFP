<?php

namespace App\Http\Controllers;

use App\Models\Jenis;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class JenisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jenises = Jenis::all();
        return view('admin.jenis.index', compact('jenises'));
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
        $data = new Jenis();
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
     * @param  \App\Models\Jenis  $jenis
     * @return \Illuminate\Http\Response
     */
    public function show(Jenis $jenis)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Jenis  $jenis
     * @return \Illuminate\Http\Response
     */
    public function edit(Jenis $jenis)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Jenis  $jenis
     * @return \Illuminate\Http\Response
     */

    public function getEditForm(Request $request)
    {
        $id = $request->get('id');
        $data = Jenis::find($id);
        return response()->json(array(
            'status' => 'oke',
            'msg' => view('admin.jenis.edit', compact('data'))->render(),
        ));
    }

    public function update(Request $request, $id)
    {
        $data = Jenis::find($id);
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
     * @param  \App\Models\Jenis  $jenis
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Jenis::find($id);
        $data->delete();
        return response()->json(array(
            'status' => 'oke',
            'msg' => 'Data berhasil dihapus!'
        ),200);
    }
}

@extends('layouts.index')

@section('judul')
Laporan
@endsection

@section('style')
<style>
    .img-product {
        max-width: 120px;
        max-height: 100px;
        height: auto;
        width: auto;
        background-repeat: no-repeat;
        background-size: cover;
    }
</style>
@endsection

@section('konten')
<div class="pd-20 card-box mb-30">
    <div class="clearfix mb-20">
        <div class="pull-left">
            <h4 class="text-blue h4" style="display: inline-block">Detail Laporan</h4>
            <p>Laporan produk tertentu dapat dilihat pada tabel di bawah ini</p>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table hover multiple-select-row data-table-export nowrap">
            <thead class="text-center">
                <tr>
                    <th scope="col">Produk ID</th>
                    <th scope="col">Gambar</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Jenis</th>
                    <th scope="col">Brand</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Dimensi</th>
                    <th scope="col">Jumlah Terjual</th>
                </tr>
            </thead>
            <tbody class="text-center">
                @foreach ($datas as $data)
                <tr>
                    <td>{{ $data->id }}</td>
                    <td>

                        <img src="{{ asset('images/'.$data->url_gambar) }}" class="img-thumbnail img-product"
                            alt="{{ $data->nama_produk }}">
                    </td>
                    <td>{{ $data->nama_produk }}</td>
                    <td>{{ $data->jenis_id }}</td>
                    <td>{{ $data->brand_produk }}</td>
                    <td>{{ $data->harga }}</td>
                    <td>{{ $data->dimensi }}</td>
                    <td>{{ $data->total_quantity }}</td>
                </tr>
                @endforeach
            </tbody>

        </table>
    </div>
</div>

@endsection

@section('javascript')

@endsection
@extends('layouts.index')

@section('judul')
Detail Order
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
            <h4 class="text-blue h4" style="display: inline-block">Detail Order {{ $orderId }}</h4>
            <p>Detail order #{{ $orderId }} yang pernah anda lakukan dapat dilihat pada tabel di bawah</p>
        </div>
    </div>
    <div class="table-responsive">
        <table class="data-table table stripe hover nowrap" id="tabeljenis">
            <thead>
                <tr>
                    <th scope="col">Gambar</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Qty</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                <tr>
                    <td>
                        <img src="{{ asset('images/'.$order->url_gambar) }}" class="img-thumbnail img-product" alt="...">
                    </td>
                    <td>{{ $order->nama_produk }}</td>
                    <td>{{ $order->kuantitas }}</td>
                    <td>{{ $order->harga }}</td>
                    <td>{{ $order->subtotal }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>


@endsection

@section('javascript')

@endsection
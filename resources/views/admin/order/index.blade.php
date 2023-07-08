@extends('layouts.index')

@section('judul')
Detail Order
@endsection

@section('konten')
<div class="pd-20 card-box mb-30">
    <div class="clearfix mb-20">
        <div class="pull-left">
            <h4 class="text-blue h4" style="display: inline-block">Detail Order</h4>
            <p>Detail order dari keseluruhan pembeli dapat dilihat pada tabel di bawah</p>
        </div>
    </div>
    <div class="table-responsive">
        <table class="data-table table stripe hover nowrap" id="tabeljenis">
            <thead>
                <tr>
                    <th scope="col">Order ID</th>
                    <th scope="col">Nama Pembeli</th>
                    <th scope="col">Tanggal Transaksi</th>
                    <th scope="col" class="datatable-nosort">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($riwayats as $riwayat)    
                    <tr>
                        <th scope="row"> {{ $riwayat->id }}</th>
                        <td class="editable" id=""> {{ $riwayat->user->name }} </td>
                        <td class="editable" id=""> {{ $riwayat->created_at }}</td>
                        <td>
                            <button class="btn btn-success btn-sm" style="display: inline-block">Lihat Detail</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>


@endsection

@section('javascript')

@endsection
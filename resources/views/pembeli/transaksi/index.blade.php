@extends('layouts.index')

@section('judul')
Riwayat Transaksi
@endsection

@section('konten')
<div class="pd-20 card-box mb-30">
    <div class="clearfix mb-20">
        <div class="pull-left">
            <h4 class="text-blue h4" style="display: inline-block">Riwayat Transaksi</h4>
            <p>Riwayat transaksi yang pernah anda lakukan dapat dilihat pada tabel di bawah</p>
        </div>
    </div>
    <div class="table-responsive">
        <table class="data-table table stripe hover nowrap" id="tabeljenis">
            <thead>
                <tr>
                    <th scope="col">Order ID</th>
                    @canany(['owner-only', 'staff-only'])
                    <th scope="col">Pembeli ID</th>
                    @endcan
                    <th scope="col">Subtotal</th>
                    <th scope="col">Pajak</th>
                    <th scope="col">Potongan</th>
                    <th scope="col">Total Bayar</th>
                    <th scope="col">Poin Didapat</th>
                    <th scope="col">Tanggal Transaksi</th>
                    <th scope="col" class="datatable-nosort">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($riwayats as $riwayat)
                    <tr>
                        <td>{{ $riwayat->id }}</td>
                        @canany(['owner-only', 'staff-only'])
                        <td>{{ $riwayat->user_id }}</td>
                        @endcan
                        <td>{{ $riwayat->subtotal }}</td>
                        <td>{{ $riwayat->pajak }}</td>
                        <td>{{ $riwayat->potongan }}</td>
                        <td>{{ $riwayat->total }}</td>
                        <td>{{ $riwayat->poin_didapat }}</td>
                        <td>{{ $riwayat->created_at }}</td>
                        <td>
                            <a href="{{ route('order.transaksi.detail', ['order_id' => $riwayat->id]) }}" class="btn btn-success btn-sm" style="display: inline-block">Lihat Detail</a>
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
@extends('layouts.index')

@section('judul')
Tambah Member
@endsection

@section('konten')
<div class="pd-20 card-box mb-30">
    <div class="clearfix mb-20">
        <div class="pull-left">
            <h4 class="text-blue h4" style="display: inline-block">Tambah Membership</h4>
            <p>Membership dapat ditambahkan pada pembeli yang telah melakukan transaksi</p>
        </div>
    </div>
    <div class="table-responsive">
        <table class="data-table table stripe hover nowrap" id="tabeljenis">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Email</th>
                    <th scope="col" class="datatable-nosort">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td class="editable" id="">A</td>
                    <td class="editable" id="">A</td>
                    <td>
                        <button class="btn btn-success btn-sm" style="display: inline-block">Jadikan Member</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>


@endsection

@section('javascript')

@endsection
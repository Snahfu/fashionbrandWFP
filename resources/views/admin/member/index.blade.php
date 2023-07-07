@extends('layouts.index')

@section('judul')
Lihat Member
@endsection

@section('konten')
<div class="pd-20 card-box mb-30">
    <div class="clearfix mb-20">
        <div class="pull-left">
            <h4 class="text-blue h4" style="display: inline-block">Detail Member</h4>
            <p>Detail para member dapat dilihat pada tabel di bawah</p>
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
                        <button class="btn btn-danger btn-sm" style="display: inline-block">Hapus Membership</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('javascript')
<script>

</script>
@endsection
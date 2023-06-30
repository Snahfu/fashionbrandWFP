@extends('layouts.index')

@section('judul')
Jenis
@endsection

@section('konten')
<div class="pd-20 card-box mb-30">
    <div class="clearfix mb-20">
        <div class="pull-left">
            <h4 class="text-blue h4" style="display: inline-block">Daftar Jenis</h4>
            <a class="btn btn-success btn-sm ml-2" href="#modalCreate" data-toggle="modal" style="display: inline-block">+</a>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-striped" id="tabeljenis">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Deskripsi</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($jenises as $jenis)
                    <tr id="tr_{{ $jenis->id }}">
                        <th scope="row">{{ $jenis->id }}</th>
                        <td id="td_nama_{{ $jenis->id }}">{{ $jenis->nama }}</td>
                        <td id="td_desc_{{ $jenis->id }}">{{ $jenis->deskripsi }}</td>
                        <td>
                            <a href="#modalEdit" onclick="getEditForm({{ $jenis->id }})" data-toggle="modal" class="btn btn-primary btn-sm" style="display: inline-block">Ubah</a>
                            <button class="btn btn-danger btn-sm" style="display: inline-block" onclick="if(confirm('yakin ingin menghapus {{ $jenis->id }} - {{ $jenis->nama }}?')) deleteDataRemoveTR({{ $jenis->id }})">Hapus</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<div class="modal fade" id="modalCreate" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Jenis</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Nama</label>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control" type="text" placeholder="Nama" name="namajenis" id="namajenis" autofocus>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Deskripsi</label>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control" type="text" placeholder="Deskripsi" name="descjenis" id="descjenis">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="saveDataAddTD()">Submit</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalEdit" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Jenis</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="modalContent"></div>
        </div>
    </div>
</div>
@endsection

@section('javascript')
<script>
    $('#modalCreate').on('shown.bs.modal', function () {
        $('#namajenis').trigger('focus')
    })

    function saveDataAddTD() {
        var nama = $('#namajenis').val();
        var desc = $('#descjenis').val();
        $.ajax({
            type:'POST',
            url:'{{ route("jenis.store") }}',
            data: {
                '_token':'<?php echo csrf_token() ?>',
                'nama':nama,
                'desc':desc,
            },
            success: function(data){
                if(data.status == 'oke') {
                    $("#tabeljenis > tbody").append("<tr id='tr_" + data.id + "'><th scope='row'>" + data.id + "</th><td id='td_nama_" + data.id + "'>" + nama + "</td><td id='td_desc_" + data.id + "'>" + desc + "</td><td><a href='#modalEdit' onclick='getEditForm(" + data.id + ")' data-toggle='modal' class='btn btn-primary btn-sm' style='display: inline-block'>Ubah</a><button class='btn btn-danger btn-sm' style='display: inline-block' onclick='if(confirm(\"yakin ingin menghapus " + data.id + " - " + nama + "?\")) deleteDataRemoveTR(" + data.id + ")'>Hapus</button>" + "</td></tr>");
                    $('#modalCreate').modal('hide');
                    alert(data.msg);
                }
            }
        });
    }

    function getEditForm(id) 
    {
        $.ajax({
            type:'POST',
            url:'{{ route("jenis.getEditForm") }}',
            data:{
                '_token':'<?php echo csrf_token() ?>',
                'id':id,
            },
            success: function(data){
                $('#modalContent').html(data.msg);
            }
        });
    }

    function saveDataUpdateTD(id)
    {
        var nama = $('#enamajenis').val();
        var desc = $('#edescjenis').val();
        var url = "{{ route('jenis.update', ":id") }}";
        url = url.replace(':id', id);

        $.ajax({
            type:'PUT',
            url:url,
            data:{
                '_token':'<?php echo csrf_token() ?>',
                'nama':nama,
                'desc':desc,
            },
            success: function(data){
                if(data.status == 'oke') {
                    $('#td_nama_'+id).html(nama);
                    $('#td_desc_'+id).html(desc);
                    $('#modalEdit').modal('hide');
                    alert(data.msg);
                }
            }
        });
    }

    function deleteDataRemoveTR(id)
    {
        var url = "{{ route('jenis.destroy', ":id") }}";
        url = url.replace(':id', id);

        $.ajax({
            type:'DELETE',
            url:url,
            data:{
                '_token':'<?php echo csrf_token() ?>',
            },
            success: function(data){
                if(data.status == 'oke') {
                    $('#tr_'+id).remove();
                    alert(data.msg);
                }
            }
        });
    }
</script>
@endsection

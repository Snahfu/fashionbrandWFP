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
                @foreach ($pembelis as $pembeli)
                <tr id="tr_{{ $pembeli->id }}">
                    <th scope="row">{{ $pembeli->id }}</th>
                    <td class="editable" id=""> {{ $pembeli->name }} </td>
                    <td class="editable" id="">{{ $pembeli->email }}</td>
                    <td>
                        <a class="btn btn-success btn-sm" href="#" onclick="if(confirm('yakin ingin menambahkan {{ $pembeli->name }} sebagai member?')) addMember({{ $pembeli->id }})">
                            <i class="icon-copy fa fa-user-o " aria-hidden="true">
                            </i>
                            <span style="padding-left:5px;">Jadikan Member</span>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>


@endsection

@section('javascript')
<script>
    function addMember(id)
    {
        $.ajax({
            type:'POST',
            url: "{{ route('member.membership') }}",
            data:{
                'user_id': id,
                'membership_status': 1,
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
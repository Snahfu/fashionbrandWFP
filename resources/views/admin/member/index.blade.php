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
                    {{-- Gate supaya hanya Owner yang bisa hapus membership --}}
                    <th scope="col" class="datatable-nosort">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($members as $member)
                <tr id="tr_{{ $member->id }}">
                    <th scope="row">{{ $member->id }}</th>
                    <td class="editable" id=""> {{ $member->name }} </td>
                    <td class="editable" id="">{{ $member->email }}</td>
                    {{-- Gate supaya hanya Owner yang bisa hapus membership --}}
                    <td>
                        <a class="btn btn-danger btn-sm" href="#"
                            onclick="if(confirm('yakin ingin menghapus {{ $member->name }} sebagai member?')) deleteMember({{ $member->id }})">
                            <i class="icon-copy fa fa-user-o " aria-hidden="true">
                            </i>
                            <span style="padding-left:5px;">Hapus Membership</span>
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
    function deleteMember(id)
    {
        $.ajax({
            type:'POST',
            url: "{{ route('member.membership') }}",
            data:{
                'user_id': id,
                'membership_status': 0,
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
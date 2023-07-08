@extends('layouts.index')

@section('judul')
Produk
@endsection

@section('konten')
<div class="min-height-200px">
    <div class="page-header">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="title" style="display: inline-block">
                    <h4>Product</h4>
                </div>
                {{-- Owner, Staff --}}
                @canany(['owner-only', 'staff-only'])
                <a class="btn btn-success btn-sm ml-2" href="#modalCreate" data-toggle="modal"
                    style="display: inline-block">+</a>
                @endcan
            </div>
        </div>
    </div>
    <div class="product-wrap">
        <div class="product-list">
            <ul class="row" id="catalog">
                @foreach ($produks as $produk)
                <li class="col-lg-4 col-md-6 col-sm-12">
                    <div class="product-box">
                        <div class="producct-img"><img src="{{ asset('images/'.$produk->url_gambar) }}" alt=""></div>
                        <div class="product-caption">
                            <h4><a href="#">{{ $produk->nama_produk }}</a></h4>
                            <div class="price">
                                <ins style="margin: 0">Rp. {{ $produk->harga }}</ins>
                            </div>
                            <a href="#modalShow" data-toggle="modal" class="btn btn-outline-primary"
                                onclick="getShowModal({{ $produk->id }}) ">Selengkapnya</a>
                            {{-- <form style="display: inline-block" action="{{ route('produk.destroy', $produk->id) }}"
                                method="post">
                                @csrf
                                @method('DELETE')
                                <input id="btndelete" type="submit" value="Delete" class="btn btn-outline-danger"
                                    data-confirm-delete="true">
                            </form> --}}
                            <a class="btn btn-outline-info" href="#modalUpdate" data-toggle="modal"
                                onclick="getEditForm({{ $produk->id }})">Ubah</a>
                            <a id="btndelete" href="{{ route('produk.destroy', $produk->id) }}"
                                class="btn btn-outline-danger" data-confirm-delete="true">Hapus</a>
                        </div>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
        <div class="blog-pagination mb-30">
            <div class="btn-toolbar justify-content-center mb-15">
                <div class="btn-group">
                    <a href="#" class="btn btn-outline-primary prev"><i class="fa fa-angle-double-left"></i></a>
                    <span class="btn btn-primary current">1</span>
                    <a href="#" class="btn btn-outline-primary">2</a>
                    <a href="#" class="btn btn-outline-primary">3</a>
                    <a href="#" class="btn btn-outline-primary">4</a>
                    <a href="#" class="btn btn-outline-primary">5</a>
                    <a href="#" class="btn btn-outline-primary next"><i class="fa fa-angle-double-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalCreate" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('produk.store') }}" method="post" enctype="multipart/form-data" id="formcreate">
                @csrf
                @method('POST')
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Produk</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Nama</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" type="text" placeholder="Nama" name="namaproduk" id="namaproduk"
                                autofocus required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Brand</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" type="text" placeholder="Brand" name="brandproduk"
                                id="brandproduk" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Harga</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" type="number" placeholder="Harga" name="hargaproduk"
                                id="hargaproduk" step=".01" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Dimensi</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" type="text" placeholder="Dimensi" name="dimensiproduk"
                                id="dimensiproduk" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Gambar</label>
                        <div class="col-sm-12 col-md-10">
                            <input type="file" class="form-control-file form-control height-auto" name="gambarproduk"
                                id="gambarproduk" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Jenis</label>
                        <div class="col-sm-12 col-md-10">
                            <select class="custom-select col-12" name="jenisproduk" id="jenisproduk" required>
                                <option value="">Choose...</option>
                                @foreach ($jenises as $jenis)
                                <option value="{{ $jenis->id }}">{{ $jenis->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Kategori</label>
                        <div class="col-sm-12 col-md-10">
                            <select class="selectpicker" multiple data-live-search="true" name="kategoriproduk[]"
                                id="kategorisproduk" required>
                                @foreach ($kategoris as $kategori)
                                <option value="{{ $kategori->id }}">{{ $kategori->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="modalUpdate" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content" id="modalContent"></div>
    </div>
</div>

<div class="modal fade" id="modalShow" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content" id="contentShow">
            {{-- <div class="card">
                <img class="card-img-top" src="{{ asset('images/1688233951_sepatuu.jpg') }}">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a longer card with supporting text below as a natural lead-in to
                        additional content. This content is a little bit longer.</p>
                    <small><b><a href="#" style="pointer-events: none; cursor: default;"
                                class="card-link text-muted">aaaaa</a></b></small>
                    <small><b><a href="#" style="pointer-events: none; cursor: default;"
                                class="card-link text-muted ml-3">bbbbb, ccccc, ddddd</a></b></small>
                </div>
            </div> --}}
        </div>
    </div>
</div>
@endsection

@section('javascript')
<script>
    function getEditForm(id) 
    {
        $.ajax({
            type:'POST',
            url:'{{ route("produk.getEditForm") }}',
            data:{
                '_token':'<?php echo csrf_token() ?>',
                'id':id,
            },
            success: function(data){
                $('#modalContent').html(data.msg);
            }
        });
    }

    function getShowModal(id) 
    {
        $.ajax({
            type:'POST',
            url:'{{ route("produk.getShowModal") }}',
            data:{
                '_token':'<?php echo csrf_token() ?>',
                'id':id,
            },
            success: function(data){
                $('#contentShow').html(data.msg);
            }
        });
    }
// $('#formcreate').on('submit', function(event){
//     event.preventDefault();
//     $.ajax({
//         url:"{{ route('produk.store') }}",
//         method:"POST",
//         data:new FormData(this),
//         dataType:'JSON',
//         contentType: false,
//         cache: false,
//         processData: false,
//         success:function(data)
//         {
//             var url = "{{ asset('images/'.":img") }}";
//             url = url.replace(':img', data.img);
//             $("#catalog").append("<li class='col-lg-4 col-md-6 col-sm-12'><div class='product-box'><div class='producct-img'><img src='" + url + "' alt=''></div><div class='product-caption'><h4><a href='#'>" + data.nama + "</a></h4><div class='price'><ins style='margin: 0'>Rp. " + data.harga + "</ins></div><a href='#' class='btn btn-outline-primary'>Read More</a></div></div></li>");
//         }
//     })
// });

    

    function addToCart(produk_id) {
        var qty_produk = $('#qty_produk_cart').val()
        
        alert(produk_id)
        alert(qty_produk)

        // Tambahkan session di sini
        $('#modalShow').modal('hide');
    }

    function ajaxTambahCart(){
        $.ajax({
                type:'POST',
                url:'{{ route("produk.addCart") }}',
                data:{
                    '_token':'<?php echo csrf_token() ?>',
                    'produk_id': 1, //produk_id
                    'quantity': 1, //quantity
                },
                success: function(data){
                    alert(data.msg);
                }
            });
    }
</script>
@endsection
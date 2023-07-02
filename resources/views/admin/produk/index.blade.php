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
                <a class="btn btn-success btn-sm ml-2" href="#modalCreate" data-toggle="modal" style="display: inline-block">+</a>
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
                                <a href="#" class="btn btn-outline-primary">Read More</a>
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
                    <a href="#" class="btn btn-outline-primary">1</a>
                    <a href="#" class="btn btn-outline-primary">2</a>
                    <span class="btn btn-primary current">3</span>
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
            <form method="post" enctype="multipart/form-data" id="formcreate">
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
                            <input class="form-control" type="text" placeholder="Nama" name="namaproduk" id="namaproduk" autofocus>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Brand</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" type="text" placeholder="Brand" name="brandproduk" id="brandproduk">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Harga</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" type="number" value="0" name="hargaproduk" id="hargaproduk" step=".01">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Dimensi</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" type="text" placeholder="Dimensi" name="dimensiproduk" id="dimensiproduk">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Gambar</label>
                        <div class="col-sm-12 col-md-10">
                            <input type="file" class="form-control-file form-control height-auto" name="gambarproduk" id="gambarproduk">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Jenis</label>
                        <div class="col-sm-12 col-md-10">
                            <select class="custom-select col-12" name="jenisproduk" id="jenisproduk">
                                <option selected="">Choose...</option>
                                @foreach ($jenises as $jenis)
                                    <option value="{{ $jenis->id }}">{{ $jenis->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Kategori</label>
                        <div class="col-sm-12 col-md-10">
                            <select class="selectpicker" multiple data-live-search="true" name="kategoriproduk[]" id="kategoriproduk">
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
@endsection

@section('javascript')
<script>
$('#formcreate').on('submit', function(event){
    event.preventDefault();
    $.ajax({
        url:"{{ route('produk.store') }}",
        method:"POST",
        data:new FormData(this),
        dataType:'JSON',
        contentType: false,
        cache: false,
        processData: false,
        success:function(data)
        {
            var url = "{{ asset('images/'.":img") }}";
            url = url.replace(':img', data.img);
            $("#catalog").append("<li class='col-lg-4 col-md-6 col-sm-12'><div class='product-box'><div class='producct-img'><img src='" + url + "' alt=''></div><div class='product-caption'><h4><a href='#'>" + data.nama + "</a></h4><div class='price'><ins style='margin: 0'>Rp. " + data.harga + "</ins></div><a href='#' class='btn btn-outline-primary'>Read More</a></div></div></li>");
        }
    })
});
</script>
@endsection
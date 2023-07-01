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
            <ul class="row">
                <li class="col-lg-4 col-md-6 col-sm-12">
                    <div class="product-box">
                        <div class="producct-img"><img src="vendors/images/product-img1.jpg" alt=""></div>
                        <div class="product-caption">
                            <h4><a href="#">Gufram Bounce Black</a></h4>
                            <div class="price">
                                <del>$55.5</del><ins>$49.5</ins>
                            </div>
                            <a href="#" class="btn btn-outline-primary">Read More</a>
                        </div>
                    </div>
                </li>
                <li class="col-lg-4 col-md-6 col-sm-12">
                    <div class="product-box">
                        <div class="producct-img"><img src="vendors/images/product-img2.jpg" alt=""></div>
                        <div class="product-caption">
                            <h4><a href="#">Gufram Bounce White</a></h4>
                            <div class="price">
                                <del>$75.5</del><ins>$50</ins>
                            </div>
                            <a href="#" class="btn btn-outline-primary">Add To Cart</a>
                        </div>
                    </div>
                </li>
                <li class="col-lg-4 col-md-6 col-sm-12">
                    <div class="product-box">
                        <div class="producct-img"><img src="vendors/images/product-img3.jpg" alt=""></div>
                        <div class="product-caption">
                            <h4><a href="#">Contrast Lace-Up Sneakers</a></h4>
                            <div class="price">
                                <ins>$80</ins>
                            </div>
                            <a href="#" class="btn btn-outline-primary">Add To Cart</a>
                        </div>
                    </div>
                </li>
                <li class="col-lg-4 col-md-6 col-sm-12">
                    <div class="product-box">
                        <div class="producct-img"><img src="vendors/images/product-img4.jpg" alt=""></div>
                        <div class="product-caption">
                            <h4><a href="#">Apple Watch Series 3</a></h4>
                            <div class="price">
                                <ins>$380</ins>
                            </div>
                            <a href="#" class="btn btn-outline-primary">Read More</a>
                        </div>
                    </div>
                </li>

                <li class="col-lg-4 col-md-6 col-sm-12">
                    <div class="product-box">
                        <div class="producct-img"><img src="vendors/images/product-img2.jpg" alt=""></div>
                        <div class="product-caption">
                            <h4><a href="#">Gufram Bounce White</a></h4>
                            <div class="price">
                                <del>$75.5</del><ins>$50</ins>
                            </div>
                            <a href="#" class="btn btn-outline-primary">Add To Cart</a>
                        </div>
                    </div>
                </li>
                <li class="col-lg-4 col-md-6 col-sm-12">
                    <div class="product-box">
                        <div class="producct-img"><img src="vendors/images/product-img4.jpg" alt=""></div>
                        <div class="product-caption">
                            <h4><a href="#">Apple Watch Series 3</a></h4>
                            <div class="price">
                                <ins>$380</ins>
                            </div>
                            <a href="#" class="btn btn-outline-primary">Read More</a>
                        </div>
                    </div>
                </li>
                <li class="col-lg-4 col-md-6 col-sm-12">
                    <div class="product-box">
                        <div class="producct-img"><img src="vendors/images/product-img1.jpg" alt=""></div>
                        <div class="product-caption">
                            <h4><a href="#">Gufram Bounce Black</a></h4>
                            <div class="price">
                                <del>$55.5</del><ins>$49.5</ins>
                            </div>
                            <a href="#" class="btn btn-outline-primary">Read More</a>
                        </div>
                    </div>
                </li>
                <li class="col-lg-4 col-md-6 col-sm-12">
                    <div class="product-box">
                        <div class="producct-img"><img src="vendors/images/product-img3.jpg" alt=""></div>
                        <div class="product-caption">
                            <h4><a href="#">Contrast Lace-Up Sneakers</a></h4>
                            <div class="price">
                                <ins>$80</ins>
                            </div>
                            <a href="#" class="btn btn-outline-primary">Add To Cart</a>
                        </div>
                    </div>
                </li>

                <li class="col-lg-4 col-md-6 col-sm-12">
                    <div class="product-box">
                        <div class="producct-img"><img src="vendors/images/product-img1.jpg" alt=""></div>
                        <div class="product-caption">
                            <h4><a href="#">Gufram Bounce Black</a></h4>
                            <div class="price">
                                <del>$55.5</del><ins>$49.5</ins>
                            </div>
                            <a href="#" class="btn btn-outline-primary">Read More</a>
                        </div>
                    </div>
                </li>
                <li class="col-lg-4 col-md-6 col-sm-12">
                    <div class="product-box">
                        <div class="producct-img"><img src="vendors/images/product-img2.jpg" alt=""></div>
                        <div class="product-caption">
                            <h4><a href="#">Gufram Bounce White</a></h4>
                            <div class="price">
                                <del>$75.5</del><ins>$50</ins>
                            </div>
                            <a href="#" class="btn btn-outline-primary">Add To Cart</a>
                        </div>
                    </div>
                </li>
                <li class="col-lg-4 col-md-6 col-sm-12">
                    <div class="product-box">
                        <div class="producct-img"><img src="vendors/images/product-img3.jpg" alt=""></div>
                        <div class="product-caption">
                            <h4><a href="#">Contrast Lace-Up Sneakers</a></h4>
                            <div class="price">
                                <ins>$80</ins>
                            </div>
                            <a href="#" class="btn btn-outline-primary">Add To Cart</a>
                        </div>
                    </div>
                </li>
                <li class="col-lg-4 col-md-6 col-sm-12">
                    <div class="product-box">
                        <div class="producct-img"><img src="vendors/images/product-img4.jpg" alt=""></div>
                        <div class="product-caption">
                            <h4><a href="#">Apple Watch Series 3</a></h4>
                            <div class="price">
                                <ins>$380</ins>
                            </div>
                            <a href="#" class="btn btn-outline-primary">Read More</a>
                        </div>
                    </div>
                </li>
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
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Kategori</label>
                    <div class="col-sm-12 col-md-10">
                        <select class="selectpicker" multiple data-live-search="true" name="kategoriproduk" id="kategoriproduk">
                            <option>Mustard</option>
                            <option>Ketchup</option>
                            <option>Relish</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="saveDataAddTD()">Submit</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('javascript')
<script>

</script>
@endsection
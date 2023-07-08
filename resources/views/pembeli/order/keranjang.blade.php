@extends('layouts.index')

@section('judul')
Keranjang
@endsection

@section('style')
<style>
    .img-product {
        max-width: 120px;
        max-height: 100px;
        height: auto;
        width: auto;
        background-repeat: no-repeat;
        background-size: cover;
    }
</style>
@endsection

@section('konten')
<div class="pd-20 card-box mb-30">
    <div class="clearfix mb-20">
        <div class="pull-left">
            <h4 class="text-blue h4" style="display: inline-block">Detail Keranjang</h4>
            <p>Lakukan checkout untuk melakukan pembelian pada barang anda yang ada di dalam keranjang</p>
        </div>
    </div>
    <div class="table-responsive">
        <table class="data-table table stripe hover nowrap" id="tabeljenis">
            <thead>
                <tr>
                    <th scope="col">Produk ID</th>
                    <th scope="col">Gambar</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Harga Satuan</th>
                    <th scope="col">Qty</th>
                    <th scope="col">Harga Total</th>
                    <th scope="col" class="datatable-nosort">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @if(carts)
                @php
                $subtotal = 0;
                @endphp
                @foreach ($carts as $c)
                @php
                    $subtotal += $c["quantity"] * $c
                @endphp    
                @endforeach
                @endif

                <tr>
                    <th scope="row">1</th>
                    <td class="editable" id="">
                        <img src="https://loremflickr.com/320/240" class="img-thumbnail img-product" alt="...">
                    </td>
                    <td class="editable" id="">A</td>
                    <td class="editable" id="">A</td>
                    <td class="col-2">
                        <div class="input-group bootstrap-touchspin bootstrap-touchspin-injected pt-3">
                            <input id="demo3_22" type="text" value="33" name="demo3_22" class="form-control">
                        </div>
                    </td>
                    <td class="editable" id="">A</td>
                    <td>
                        <button class="btn btn-danger btn-sm" style="display: inline-block">Hapus dari
                            keranjang</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<button class="btn btn-primary" id="btnCheckout">Checkout</button>

<div class="modal fade" id="modalCheckout" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content" id="modalContent"></div>
    </div>
</div>

@endsection

{{-- <table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Gambar</th>
            <th>Harga</th>
            <th>Qty</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Anjing 1</td>
            <td>
                <img class="img-thumbnail img-product" src="{{ asset('images/'.$produk->url_gambar) }}" alt="">
            </td>
            <td>Anjing 1</td>
            <td>Anjing 1</td>
        </tr>
    </tbody>
</table> --}}

@section('javascript')
<script>
    function getCheckoutModal(id) 
        {
            $.ajax({
                type:'POST',
                url:'{{ route("member.halamancheckout") }}',
                data:{
                    '_token':'<?php echo csrf_token() ?>',
                },
                success: function(data){
                    //         $cart[$produk->id] = [
                    //     "name" => $produk->name,
                    //     "quantity" => $quantity,
                    //     "price" => $produk->price,
                    //     "gambar" => $produk->url_gambar
                    // ];
                    if(data.status == "success"){
                        var cart = data.cart
                        var temporaryHTML = ""

                    }
                    else{
                        $('#modalContent').html(data.msg);
                    }
                }
            });
        }
</script>
@endsection
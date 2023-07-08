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
                    <th scope="col">Subtotal</th>
                    <th scope="col" class="datatable-nosort">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @if($carts)
                @php
                $total = 0;
                @endphp
                @foreach ($carts as $key => $value)
                @php
                $subtotal = (int)$value["quantity"] * (int)$value["price"];
                $total +=$subtotal;
                @endphp
                <tr id="row_{{ $key }}">
                    <th scope="row">{{ $key }}</th>
                    <td id="">
                        <img src="{{ asset('images/'.$value['gambar']) }}" class="img-thumbnail img-product"
                            alt="{{ $value['name'] }}">
                    </td>
                    <td id="">{{ $value["name"] }}</td>
                    <td id="">{{ $value["price"] }}</td>
                    <td>
                        <input type="number" value="{{ $value['quantity'] }}" id="quantity_{{ $key }}"
                            onchange="ubah({{ $key }})" class="form-control">
                    </td>
                    <td id="subtotal_{{ $key }}">{{ $subtotal }}</td>
                    <td>
                        <button class="btn btn-danger btn-sm" onclick="hapus({{ $key }})"
                            style="display: inline-block">Hapus dari
                            keranjang</button>
                    </td>
                </tr>
                @endforeach
                @endif
            </tbody>
        </table>
    </div>
</div>

<div class="text-right"><button class="btn btn-primary" onclick="checkout()">Checkout</button></div>

<div class="modal fade" id="modalCheckout" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content" id="modalContent"></div>
    </div>
</div>

@endsection

@section('javascript')
<script>
    function hapus(id){
        $.ajax({
                type:'POST',
                url:'{{ route("order.hapusBarang") }}',
                data:{
                    '_token':'<?php echo csrf_token() ?>',
                    'id':id
                },
                success: function(data){
                    $('#row_'+id).remove()
                }
            });
    }

    function ubah(id){
        $.ajax({
                type:'POST',
                url:'{{ route("order.ubahJumlah") }}',
                data:{
                    '_token':'<?php echo csrf_token() ?>',
                    'id':id,
                    'quantity':$('#quantity_'+id).val()
                },
                success: function(data){
                    $('#subtotal_'+id).html(data.subtotal);
                }
            });
    }

    function checkout(){
        $.ajax({
                type:'POST',
                url:'{{ route("order.checkout") }}',
                data:{
                    '_token':'<?php echo csrf_token() ?>',

                },
                success: function(data){
                    $('#'+id).remove()
                }
            });
    }
</script>
@endsection
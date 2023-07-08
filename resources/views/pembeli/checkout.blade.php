@extends('layouts.index')

@section('judul')
Checkout
@endsection

@section('style')
<style>
    .img-product{
        max-width:120px;
        max-height:100px;
        height: auto;
        width:auto;
        background-repeat:no-repeat;
        background-size:cover;
    }
</style>
@endsection

@section('konten')
<div class="pd-20 card-box mb-30">
    <div class="clearfix mb-20">
        <div class="pull-left">
            <h4 class="text-blue h4" style="display: inline-block">Checkout</h4>
        </div>
    </div>
    <div class="table-responsive">
        <table class="data-table table stripe hover nowrap" id="tabeljenis">
            <thead>
                <tr>
                    <th scope="col">Produk ID</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Harga Satuan</th>
                    <th scope="col">Qty</th>
                    <th scope="col">Harga Total</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td class="" id="">
                        <img src="https://loremflickr.com/320/240" class="img-thumbnail img-product" alt="...">
                    </td>
                    <td class="" id="">A</td>
                    <td class="" id="">A</td>
                    <td class="" id="">3</td>
                    <td class="" id="">A</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>


@endsection

@section('javascript')

@endsection
<div class="pd-20 card-box mb-30">
    <div class="clearfix mb-20">
        <div class="pull-left">
            <h4 class="text-blue h4" style="display: inline-block">Checkout</h4>
        </div>
    </div>
    <div class="table-responsive">
        <table class="data-table table stripe hover nowrap">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Qty</th>
                    <th scope="col">Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @if($cart)
                @php
                $poin = $user->poin * 1000;
                $total = 0;
                $poin_didapat = 0;
                @endphp
                @foreach ($cart as $key => $value)
                @php
                $subtotal = (int)$value["quantity"] * (int)$value["price"];
                $total += $subtotal;
                $pajak = ceil($total * 0.11);
                if($poin > $total + $pajak) $poin = floor($total / 1000) * 1000;
                if($user->member == 1) $poin_didapat = floor($total / 100000);
                @endphp
                <tr id="row_{{ $key }}">
                    <th scope="row">{{ $key }}</th>
                    <td id="">{{ $value["name"] }}</td>
                    <td id="">{{ $value["price"] }}</td>
                    <td>{{ $value['quantity'] }}</td>
                    <td id="subtotal_{{ $key }}">{{ $subtotal }}</td>
                </tr>
                @endforeach
                @endif
            </tbody>
        </table>
        <div class="text-right">
            <p>Subtotal barang: Rp<b id="subtotal" nilai="{{ $total }}">{{ number_format($total,2,',','.') }}</b></p>
            <p>PPN (11%): Rp<b id="pajak" nilai="{{ $pajak }}">{{ number_format($pajak,2,',','.'); }}</b></p>
            <p @if ($user->member != 1) style="visibility: hidden;" @endif>Pakai poin: <input type="checkbox" id="check" onclick="check()" @if(!($user->member == 1 && $poin > 0 && $total >= 100000)) disabled @endif> <label for="check"><b
                        id="poin_dipakai" nilai="{{ $poin / 1000 }}">{{ $poin / 1000 }}</b> (Rp{{ number_format($poin,2,',','.'); }})</label></p>
            <hr>
            <p>Total bayar: Rp<b id="total" nilai="{{ $total+$pajak }}">{{ number_format($total+$pajak,2,',','.') }}</b></p>
            <p @if ($user->member != 1) style="visibility: hidden;" @endif>Poin yang didapat: <b id="poin_didapat" nilai="{{ $poin_didapat }}">{{ $poin_didapat }}</b> (Rp{{
                $poin_didapat*1000 }})</p>
            <button class="btn btn-primary" id="btnPesan" onclick="pesan()">Pesan</button>
        </div>
    </div>
</div>

<script>
    function check(){
        if($('#check')[0].checked){
            $('#total').attr('nilai','{{ $total+$pajak-$poin }}');
            $('#total').html('{{ number_format($total+$pajak-$poin,2,',','.') }}')
        }else{
            $('#total').attr('nilai','{{ $total+$pajak }}');
            $('#total').html('{{ number_format($total+$pajak,2,',','.') }}')
        }
    }

    function pesan(){
        let subtotal = parseInt($('#subtotal').attr('nilai'));
        let pajak = parseInt($('#pajak').attr('nilai'));
        let poin_dipakai = $('#check')[0].checked?parseInt($('#poin_dipakai').attr('nilai')):0;
        let total = parseInt($('#total').attr('nilai'));
        let poin_didapat = parseInt($('#poin_didapat').attr('nilai'));

        $.ajax({
                type:'POST',
                url:'{{ route("order.pesan") }}',
                data:{
                    '_token':'<?php echo csrf_token() ?>',
                    'subtotal':subtotal,
                    'pajak':pajak,
                    'poin_dipakai':poin_dipakai,
                    'total':total,
                    'poin_didapat':poin_didapat,
                },
                success: function(data){
                    $('#modalCheckout').modal('toggle')
                    $('tbody').html('');
                    alert(data.msg)
                }
            });
    }
</script>
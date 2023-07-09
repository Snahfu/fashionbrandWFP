<div class="card">
    <img class="card-img-top" src="{{ asset('images/'.$data->url_gambar) }}">
    <div class="card-body">
        <div class="row">
            <div class="col-6">
                <h5 class="card-title">{{ $data->brand_produk.' - '.$data->nama_produk.' ('.$data->dimensi.')' }}</h5>
                <p class="card-text">Rp. {{ $data->harga }}</p>
                <small><b><a href="#" style="pointer-events: none; cursor: default;"
                            class="card-link text-muted mr-2">{{
                            $jenis[0]->nama }}</a></b></small>
                <small><b><a href="#" style="pointer-events: none; cursor: default;" class="card-link text-muted"> |
                        </a></b></small>
                <small><b>
                        <a href="#" style="pointer-events: none; cursor: default;" class="card-link text-muted ml-2">
                            @php $kat = ''; @endphp
                            @foreach ($kategoris as $kategori)
                            @php
                            $kat .= $kategori->nama.', '
                            @endphp
                            @endforeach
                            @php echo rtrim($kat, ', '); @endphp
                        </a>
                    </b></small>
            </div>
            @can('pembeli-only')
            <div class="col-6 text-center">
                <div class="form-group">
                    <div class="input-group bootstrap-touchspin bootstrap-touchspin-injected">
                        <input id="qty_produk_cart" type="number" value="1" min="1" name="qty_produk_cart" class="form-control">
                    </div>
                </div>
                <a class="btn btn-success w-100" style="margin-top: -10px" href="#" onclick="addToCart( {{ $data->id }} )">
                    <i class="icon-copy fa fa-cart-plus" aria-hidden="true"></i>
                    <span style="padding-left:5px;">Add to cart</span>
                </a>
            </div>
            @endcan
        </div>
    </div>
</div>

<script>
    $('#add_qty_product').click(() => {
        var new_val = $('#qty_produk_cart').val()*1 + 1
        $('#qty_produk_cart').val(new_val) 
    })

    $('#min_qty_product').click(() => {
        var old_val = $('#qty_produk_cart').val() * 1;
        var new_val = 1;
        if (old_val > 2) {
            new_val = old_val - 1;
        }
        $('#qty_produk_cart').val(new_val);
    })  
</script>
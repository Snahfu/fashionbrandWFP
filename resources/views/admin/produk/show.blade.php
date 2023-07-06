<div class="card">
    <img class="card-img-top" src="{{ asset('images/'.$data->url_gambar) }}">
    <div class="card-body">
        <h5 class="card-title">{{ $data->brand_produk.' - '.$data->nama_produk.' ('.$data->dimensi.')' }}</h5>
        <p class="card-text">Rp. {{ $data->harga }}</p>
        <small><b><a href="#" style="pointer-events: none; cursor: default;" class="card-link text-muted mr-2">{{ $data->jenis->nama }}</a></b></small>
        <small><b><a href="#" style="pointer-events: none; cursor: default;" class="card-link text-muted"> | </a></b></small>
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
</div>
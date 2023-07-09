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

<form action="{{ route('produk.update', $data->id) }}" method="post" enctype="multipart/form-data" id="formupdate">
    @csrf
    @method('PUT')
    <div class="modal-header">
        <h5 class="modal-title">Edit Produk</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Nama</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" type="text" placeholder="Nama" name="namaproduk" id="namaproduk"
                    value="{{ $data->nama_produk }}" required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Brand</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" type="text" placeholder="Brand" name="brandproduk" id="brandproduk"
                    value="{{ $data->brand_produk }}" required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Harga</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" type="number" placeholder="Harga" name="hargaproduk" id="hargaproduk"
                    step=".01" value="{{ $data->harga }}" required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Dimensi</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" type="text" placeholder="Dimensi" name="dimensiproduk" id="dimensiproduk"
                    value="{{ $data->dimensi }}" required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label" id="test">Gambar</label>
            <div class="col-sm-12 col-md-10">
                <input type="file" class="form-control-file form-control height-auto" accept="image/*" name="edit_gambar"
                                    id="edit_gambar" required>
                <img class="mt-3 img-product" id="image_preview" src="#" alt="your image" />
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Jenis</label>
            <div class="col-sm-12 col-md-10">
                <select class="custom-select col-12" name="jenisproduk" id="jenisproduk" required>
                    <option value="">Choose...</option>
                    @foreach ($jenises as $jenis)
                    @if ($jenis->id == $data->jenis_id)
                    <option value="{{ $jenis->id }}" selected>{{ $jenis->nama }}</option>
                    @else
                    <option value="{{ $jenis->id }}">{{ $jenis->nama }}</option>
                    @endif
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Kategori</label>
            <div class="col-sm-12 col-md-10">
                <select multiple data-live-search="true" name="kategoriproduk[]" id="kategoriproduk" required>
                    @foreach ($kategoris as $kategori)
                    @php $selected = ''; @endphp
                    @foreach ($data->kategoriproduk as $kp)
                    @if ($kategori->id == $kp->kategori_id)
                    @php $selected = 'selected'; @endphp
                    @endif
                    @endforeach
                    <option value="{{ $kategori->id }}" {{ $selected }}>{{ $kategori->nama }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>
<script>
    $("#kategoriproduk").selectpicker();

    edit_gambar.onchange = evt => {
        const [file] = edit_gambar.files
        if (file) {
            image_preview.src = URL.createObjectURL(file)
        }
    }
</script>
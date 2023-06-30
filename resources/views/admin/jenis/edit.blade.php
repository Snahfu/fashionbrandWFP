<div class="form-group row">
    <label class="col-sm-12 col-md-2 col-form-label">Nama</label>
    <div class="col-sm-12 col-md-10">
        <input class="form-control" type="text" placeholder="Nama" name="enamajenis" id="enamajenis" value="{{ $data->nama }}" autofocus>
    </div>
</div>
<div class="form-group row">
    <label class="col-sm-12 col-md-2 col-form-label">Deskripsi</label>
    <div class="col-sm-12 col-md-10">
        <input class="form-control" type="text" placeholder="Deskripsi" name="edescjenis" id="edescjenis" value="{{ $data->deskripsi }}">
    </div>
</div>
<div class="text-right">
    <button type="button" class="btn btn-primary" onclick="saveDataUpdateTD({{ $data->id }})">Submit</button>
</div>
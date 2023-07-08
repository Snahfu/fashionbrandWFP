@extends('layouts.index')

@section('judul')
Beranda
@endsection

@section('konten')
<div class="d-flex align-items-center justify-content-center" style="height: 70vh">
    <div class="row d-flex justify-content-center align-items-center justify-content-center">
        <div class="col">
            <h3 class="text-center">
                Hai {{ Auth::user()->role }} 👋
                </br></br>
                Selamat datang di Fashion Brand!
            </h3>
        </div>
    </div>
</div>
@endsection
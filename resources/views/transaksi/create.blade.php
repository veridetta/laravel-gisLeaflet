@extends('layouts.app')
@section('title','Transaksi')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <br><br>
            <h1 class="display-5 fw-bold lh-1 mb-3">Transaksi</h1>
            <hr class="my-4">
            <form action="/transaksi" method="POST">
                @csrf
                <div class="form-group row mt-3">
                    <p class="col-sm-12 col-md-2 col-form-label h6">Kode Transaksi</p>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control" name="kode" type="text" placeholder="Masukkan kode">
                    </div>
                </div>
                <div class="form-group row mt-3">
                    <p class="col-sm-12 col-md-2 col-form-label h6">Nama Customer</p>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control" name="nama_customer" type="text" placeholder="Masukkan nama lengkap">
                    </div>
                </div>
                <div class="form-group row mt-3">
                    <p class="col-sm-12 col-md-2 col-form-label h6">Nama Tempat</p>
                    <div class="col-sm-12 col-md-10">
                        <select class="form-control" name="place_name">
                            <option selected>Pilih Tempat</option>
                            @foreach ($place as $pla)
                            <option value="{{ $pla->place_name }}">{{ $pla->place_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12 mt-3">
                        <div id="MapLocation" style="height: 350px"></div>
                    </div>                
                </div>
                <div class="form-group row mt-3">
                    <div class="col-12 row">
                        <div class="col-sm-6 col-md-6">
                            <input class="form-control" disabled name="lat" id="lat" type="text" placeholder="Masukkan lat">
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <input class="form-control" disabled name="lng" id="lang" type="text" placeholder="Masukkan lang">
                        </div>
                    </div>
                    
                </div>
                <div class="form-group row mt-3">
                    <p class="col-sm-12 col-md-2 col-form-label h6">Tanggal Transaksi</p>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control" name="tgl" type="date" placeholder="Masukkan tanggal">
                    </div>
                </div>
                <div class="form-group row mt-3">
                    <p class="col-sm-12 col-md-2 col-form-label h6">Status</p>
                    <div class="col-sm-12 col-md-10">
                        <select class="form-control" name="status">
                            <option selected="Belum Dibayar">Belum Dibayar</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row mt-3">
                    <p class="col-sm-12 col-md-2 col-form-label h6"></p>
                    <div class="col-sm-12 col-md-10">
                        <a href="/transaksi" class="btn btn-outline-dark">Batal</a>
                        <button type="submit" class="btn btn-dark">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
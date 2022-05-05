@extends('layouts.app')
@section('title','Transaksi')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <br><br>
            <h1 class="display-5 fw-bold lh-1 mb-3">Edit Transaksi</h1>
            <hr class="my-4">     
            <form action="/transaksi/update/{{ $transaksi->id }}" method="POST">
                    <!-- @method('put') -->
                    @csrf
                    <div class="form-group row mt-3">
                        <p class="col-sm-12 col-md-2 col-form-label h6">Kode</p>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" name="kode" type="text" value="{{ $transaksi->kode}}">
                        </div>
                    </div>
                    <div class="form-group row mt-3">
                        <p class="col-sm-12 col-md-2 col-form-label h6">Nama Customer</p>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" name="nama_customer" type="text" value="{{ $transaksi->nama_customer}}">
                        </div>
                    </div>
                    <div class="form-group row mt-3">
                        <p class="col-sm-12 col-md-2 col-form-label h6">Nama Tempat</p>
                        <div class="col-sm-12 col-md-10">
                            <select class="form-control" name="place_name" value="{{ $transaksi->place_name }}">
                                @foreach ($place as $pla)
                                    @if (old('nama_customer', $transaksi->place_name) == $pla->place_name)
                                        <option value="{{ $pla->place_name }}" selected>{{ $pla->place_name }}</option>
                                    @else
                                        <option value="{{ $pla->place_name }}">{{ $pla->place_name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row mt-3">
                        <p class="col-sm-12 col-md-2 col-form-label h6">Tanggal</p>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" name="tgl" type="date" value="{{ $transaksi->tgl }}">
                        </div>
                    </div>
                    <div class="form-group row mt-3">
                        <p class="col-sm-12 col-md-2 col-form-label h6">Status</p>
                        <div class="col-sm-12 col-md-10">
                            <select class="form-control" name="status" value="{{ $transaksi->status }}">
                                <option selected>--Pilih--</option>

                                @if (old('status', $transaksi->status)== "Belum Dibayar")
                                    <option value="Belum Dibayar" selected>Belum DIbayar</option>
                                    <option value="Sudah Dibayar" >Sudah DIbayar</option>
                                @else
                                    <option value="Belum Dibayar" >Belum Dibayar</option>
                                    <option value="Sudah Dibayar" selected>Sudah Dibayar</option>
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="text-center">
                        <a href="/transaksi" class="btn btn-outline-dark">Batal</a>
                        <button type="submit" class="btn btn-dark">Simpan</button>
                    </div>
            </form>
        </div>
    </div>
</div>
@endsection
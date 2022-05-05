@extends('layouts.app')
@section('title','Transaksi')
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <br><br>
      @if(session('msg'))
      <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
        {{session('msg')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      @endif
      <h1 class="display-5 fw-bold lh-1 mb-3">Data Transaksi</h1>
      <hr class="my-4">
      <a href="transaksi/create " class="btn btn-dark mb-1">Tambah Transaksi</a>
      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Kode</th>
            <th scope="col">Nama Customer</th>
            <th scope="col">Nama Tempat</th>
            <th scope="col">Tanggal</th>
            <th scope="col">Status</th>
            @can('admin')
            <th scope="col">Setting</th>
            @endcan
          </tr>
        </thead>
        <tbody>
          @foreach ($transaksis as $trans)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $trans->kode }}</td>
            <td>{{ $trans->nama_customer }}</td>
            <td>{{ $trans->place_name }}</td>
            <td>{{ $trans->tgl }}</td>
            <td>
              @if ($trans->status == "Belum dibayar")
                <span class="badge bg-info text-dark"></i>Belum Dibayar</span>
              @else
                <span class="badge bg-secondary"></i>Sudah DIbayar</span>
              @endif
            </td>
            @can('admin')
            <td>
              <a href="transaksi/edit/{{ $trans->id }}" class="badge bg-warning">Edit</a>
              <a href="transaksi/destroy/{{ $trans->id }}" class="badge bg-danger">Hapus</a>
            </td>
            @endcan
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
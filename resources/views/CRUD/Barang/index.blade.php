@extends('template.template')
@section('content')
@if (Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ Session::get('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
@endif
<div class="card">
    <div class="card-header">
      <h3 class="card-title">BARANG INVENTARIS</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table class="table table-primary table-bordered table-striped" id="table">
            <div class="card-body">
            @include('crud.barang.tambah')
            </div>
            <thead style="text-align: center">
                <th>Nama</th>
                <th>Merk</th>
                <th>Quantity</th>
                <th>Kondisi</th>
                <th>Tanggal Pengadaan</th>
                <th>AKSI</th>
            </thead>

            @foreach ($barang as $b)
            <tbody style="text-align: center">
                <td>{{$b->nama_barang}}</td>
                <td>{{$b->merk_barang}}</td>
                <td>{{$b->qty}}</td>
                <td>
                    @if ($b->kondisi == 'rusak_berat')
                        Rusak Berat
                    @elseif ($b->kondisi == 'rusak_ringan')
                        Rusak Ringan
                    @else
                        Layak Pakai
                    @endif
                </td>
                <td>{{$b->tanggal_pengadaan}}</td>
                <td>@include('crud.barang.update')|@include('crud.barang.hapus')</td>
            </tbody>
            @endforeach
        </table>

    </div>
    <!-- /.card-body -->
  </div>

  @endsection



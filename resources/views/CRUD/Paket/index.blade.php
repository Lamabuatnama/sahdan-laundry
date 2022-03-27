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
            <h3 class="card-title">DATA - DATA PAKET</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="table" class="table table-bordered table-striped">
                <div class="input-group mb-3">
                    @include('crud.paket.tambah')
                    @include('CRUD.Paket.import')
                    <a href="/paketexport" class="btn btn-success">
                        <i class="fa fa-file-excel"></i>
                        </a>
                    <br>
                    <br>
                </div>

                <thead>
                    <tr style="text-align: center">
                        <th>NAMA OUTLET</th>
                        <th>JENIS</th>
                        <th>NAMA PAKET</th>
                        <th>HARGA</th>
                        <th>AKSI</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($paket as $key => $value)
                    <tr>
                        <td>{{ $value->outlet->nama }}</td>
                        <td>{{ $value->jenis == 'bed_cover' ? 'bed cover' : $value->jenis }}</td>
                        <td>{{ $value->nama_paket }}</td>
                        <td>{{ $value->harga }}</td>
                        <td style="text-align: center">@include('crud.paket.update')|@include('crud.paket.hapus')</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
@endsection

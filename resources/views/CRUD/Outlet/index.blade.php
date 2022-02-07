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
      <h3 class="card-title">DATA - DATA OUTLET</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="table" class="table table-bordered table-striped">
            <div class="input-group mb-3">
    @include('crud.outlet.tambah')
</div>

        <thead>
        <tr style="text-align: center">
          <th>NAMA OUTLETgi</th>
          <th>ALAMAT </th>
          <th>TELEPON</th>
          <th>AKSI</td>
        </tr>
        </thead>
        @foreach ($outlet as $key=>$value )
        <tr>
          <td>{{$value->nama}}</td>
          <td>{{$value->alamat}}</td>
          <td>{{$value->tlp}}</td>
          <td style="text-align: center"> @include('crud.outlet.update')|@include('crud.outlet.hapus')</td>
        </tr>
        @endforeach
        </tbody>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
  @endsection


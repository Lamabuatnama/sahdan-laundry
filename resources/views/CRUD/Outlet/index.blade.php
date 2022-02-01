@extends('template.template')
@section('content')
@if (Session::has('success'))
        <div class="alert alert-info">{{ Session::get('success') }}</div>
     @endif
<div class="card">
    <div class="card-header">
      <h3 class="card-title">DATA - DATA OUTLET</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <div class="input-group mb-3">
    @include('crud.outlet.tambah')
</div>

        <thead>
        <tr style="text-align: center">
          <th>NAMA </th>
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
          <td style="text-align: center"> @include('crud.outlet.update')</td>
        </tr>
        @endforeach
        </tbody>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
  @endsection


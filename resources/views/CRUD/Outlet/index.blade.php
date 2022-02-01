@extends('template.template')
@section('content')

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
          <td>UPDATE</td>
        </tr>
        @endforeach
        </tbody>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
  @endsection


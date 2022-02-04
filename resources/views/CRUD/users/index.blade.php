@extends('template.template')
@section('content')
@if (Session::has('success'))
        <div class="alert alert-info">{{ Session::get('success') }}</div>
     @endif
<div class="card">
    <div class="card-header">
      <h3 class="card-title">DATA - DATA MEMBER</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <div class="input-group mb-3">
                @include('crud.users.tambah')
</div>

        <thead>
        <tr style="text-align: center">
          <th>NAMA</th>
          <th>EMAIL</th>
          <th>ROLE</th>
          <th>OUTLET</th>
          <th>AKSI</td>
        </tr>
        </thead>
        @foreach ($users as $key=>$value )
        <tr>
          <td>{{$value->nama}}</td>
          <td>{{$value->email}}</td>
          <td>{{$value->role}}</td>
          <td>{{$value->outlet->nama}}</td>
          <td style="text-align: center">@include('CRUD.users.update')</td>
        </tr>
        @endforeach
        </tbody>
      </table>
    </div>
    <!-- /.card-body -->
  </div>

  @endsection



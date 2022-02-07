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
      <h3 class="card-title">DATA - DATA USERS</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="table" class="table table-bordered table-striped">
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
          <td style="text-align: center">@include('CRUD.users.update')|@include('CRUD.users.hapus')</td>
        </tr>
        @endforeach
        </tbody>
      </table>
    </div>
    <!-- /.card-body -->
  </div>

  @endsection



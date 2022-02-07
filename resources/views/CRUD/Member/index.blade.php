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
      <h3 class="card-title">DATA - DATA MEMBER</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="table" class="table table-bordered table-striped">
            <div class="input-group mb-3">
    @include('crud.member.tambah')
</div>

        <thead>
        <tr style="text-align: center">
          <th>NAMA MEMBER</th>
          <th>ALAMAT MEMBER</th>
          <th>JENIS KELAMIN</th>
          <th>NOMER TELEPON</th>
          <th>AKSI</th>
        </tr>
        </thead>
        @foreach ($member as $key=>$value )
        <tr>
          <td>{{$value->nama}}</td>
          <td>{{$value->alamat}}</td>
          @php
              if ($value->jenis_kelamin == 'L') {
               echo("<td>Laki - laki</td>");
              } else {
                echo("<td>Perempuan</td>");
              }
          @endphp
          <td>{{$value->tlp}}</td>
          <td style="text-align: center"> @include('crud.member.update')@include('crud.member.hapus')</td>
        </tr>
        @endforeach
        </tbody>
      </table>
    </div>
    <!-- /.card-body -->
  </div>

  @endsection
  @include('crud.member.script')



@extends('template.template')
@section('content')


<div class="card">
    <div class="card-header">
      <h3 class="card-title">DATA - DATA PAKET</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <div class="input-group mb-3">
    @include('crud.paket.tambah')
</div>

        <thead>
        <tr style="text-align: center">
          <th>NAMA</th>
          <th>ALAMAT</th>
          <th>JENIS KELAMIN</th>
          <th>TELEPON</th>
          <th>AKSI</td>
        </tr>
        </thead>
        @foreach ($paket as $key=>$value )


        <tr>
          <td>{{$value->outlet->nama}}</td>
          <td>{{$value->jenis}}</td>
          <td>{{$value->nama_paket}}</td>
          <td>{{$value->harga}}</td>
          <td style="text-align: center">UPDATE</td>
        </tr>
        @endforeach
        </tbody>
      </table>
    </div>
    <!-- /.card-body -->
  </div>

  @endsection


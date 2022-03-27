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
      <h3 class="card-title">Penjemputan Laundry</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body ">
        <table class="table table-bordered table-striped form-group" id="new_table">
    @include('simulasi.penjemputan.insert')
    &nbsp;
    <a href="/penjemputanexport" class="btn btn-primary  btn-sm">Export</a>
    &nbsp;
    @include('simulasi.penjemputan.import')
    &nbsp;
    <a href="/penjemputanfaktur" class="btn btn-primary btn-sm" target="_blank">Cetak PDF</a>
    <br>
    <br>



            <thead style="text-align: center">
                <th>No</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>No Hp</th>
                <th>Penjemput</th>
                <th>Status</th>
                <th>Aksi</th>
            </thead>
            <tbody style="text-align: center">
                @foreach ($penjemput as $pj)
                <tr>
                    <td>{{$loop->iteration}} <input type="text" hidden class="id" value="{{$pj->id}}"></td>
                    <td>{{$pj->member->nama}}</td>
                    <td>{{$pj->member->alamat}}</td>
                    <td>{{$pj->member->tlp}}</td>
                    <td>{{$pj->petugas}}</td>
                    <td id="status" >
                        <select name="status" class="status form-control" id="one">
                            <option value="tercatat" {{ $pj->status == 'tercatat' ? 'selected' : '' }}>Tercatat</option>
                            <option value="penjemputan" {{ $pj->status == 'penjemputan' ? 'selected' : '' }}>Penjemputan</option>
                            <option value="selesai" {{ $pj->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                        </select>
                    </td>
                    <td>@include('simulasi.penjemputan.update')@include('simulasi.penjemputan.delete')
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
    <!-- /.card-body -->
  </div>

  @endsection

  @push('sc')
    <script>
         $('#new_table').on('change', '.status' ,function(){
        let status     = $(this).closest('tr').find('.status').val()
        let id         = $(this).closest('tr').find('.id').val()
        let data        = {
                            id:id,
                            status:status,
                            _token: "{{csrf_token()}}"};
        $.post('{{ route("status")}}',data,function(msg){

        })
            console.log(status)
            console.log(data)
    })

    </script>
  @endpush


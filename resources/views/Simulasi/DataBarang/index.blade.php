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
{{-- Set Time Menjadi Asia/Indonesia --}}
{{date_default_timezone_set('Asia/Jakarta')}}
<div class="card">
    <div class="card-header">
      <h3 class="card-title">Penjemputan Laundry</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body ">
        <table class="table table-bordered table-striped form-group" id="new_table">
            @include('databarang.insert')

    <br>
    <div class="kotak">
		<p id="detik"></p>
	</div>
    <br>
            <thead style="text-align: center">
                <th>No</th>
                <th>Nama</th>
                <th>QTY</th>
                <th>Harga</th>
                <th>Waktu Beli</th>
                <th>Supplier</th>
                <th>Status Barang</th>
                <th>Waktu Update Status</th>
                <th>Aksi</th>
            </thead>
            <tbody style="text-align: center">
                @foreach ($databarang as $db)
                <tr>
                    <td>{{$loop->iteration}}<input hidden id="id" value="{{$db->id}}"></td>
                    <td>{{$db->nama}}</td>
                    <td>{{$db->qty}}</td>
                    <td>{{$db->harga}}</td>
                    <td><span class='newDate'>{{date('Y-m-d h:i:m')}}</span></td>
                    <td>{{$db->supplier}}</td>
                    <td>
                    <select class="custom-select form-control status" name="status">
                        <option value="diajukan_beli" {{ $db->status == 'diajukan_beli' ? 'selected' : '' }}>Diajukan Beli</option>
                        <option value="habis"{{ $db->status == 'habis' ? 'selected' : '' }}>Habis</option>
                        <option value="tersedia"{{ $db->status == 'tersedia' ? 'selected' : '' }}>Tersedia</option>
                      </select>
                    </td>
                    <td><span id="wu">{{$db->wu}}</span></td>
                    <td>@include('DataBarang.update')
                        &nbsp;
                        @include('DataBarang.delete')
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
</div>

    </div>
    <!-- /.card-body -->
  </div>

  @endsection

  @push('sc')
    <script>
        window.setTimeout("waktu()", 1000);


        function waktu() {
            var waktu = new Date()
            setTimeout("waktu()", 1000);
            document.getElementById("detik").innerHTML = waktu.getSeconds();
            // console.log(waktu.getSeconds())
        }


        $('#new_table').on('change', '.status' ,function(){
        let status      = $(this).closest('tr').find('.status').val()
        let id          = $(this).closest('tr').find('#id').val()
        let newDate     = $(this).closest('tr').find('.newDate').text()
        $(this).closest('tr').find('#wu').text(newDate)
        let data        = {
                            id:id,
                            status:status,
                            wu:newDate,
                            _token: "{{csrf_token()}}"};
        $.post('{{ route("status_db")}}',data,function(msg){
        })
            console.log(data)
        })
    </script>
  @endpush


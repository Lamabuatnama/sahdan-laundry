 <!-- Modal -->
 <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#update{{$db->id}}">
    Update
  </button>
<div class="modal fade" id="update{{$db->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog lg" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Data Barang</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
        <div class="card-body">
            <p class="login-box-msg">Update Data Barang</p>
            <form action="/databarang/{{$db->id}}" method="post" id="inputDataBarang">
                @csrf
                @method('PUT')
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Nama" name="nama" value="{{$db->nama}}"  required>
                    <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-user" name="nama" type="text"></span>
                    </div>
                    </div>
                </div>
              <div class="input-group mb-3">
                <input type="number" class="form-control" placeholder="Quantity" name="qty" value="{{$db->qty}}" required>
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-lock" name="petugas" type="text">
                    </span>
                  </div>
                </div>
              </div>
              <div class="input-group mb-3">
                <input type="number" class="form-control" placeholder="Harga" name="harga" value="{{$db->harga}}"  required>
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-envelope" name="status" type="text" required>
                    </span>
                  </div>
                </div>
              </div>
              <div class="input-group mb-3">
                <input type="datetime-local" class="form-control" value="{{ date('Y-m-d') }}T{{date('h:i')}}" name="wb" required>
                <input type="datetime-local" class="form-control" value="{{ date('Y-m-d') }}T{{date('h:i')}}" name="wu" hidden >
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-envelope" name="wb" type="text" required>
                    </span>
                  </div>
                </div>
              </div>
              <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Supplier" name="supplier" value="{{$db->supplier}}"  required>
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-envelope" name="supplier" type="text" required>
                    </span>
                  </div>
                </div>
              </div>
              <div class="input-group mb-3">
                <select class="custom-select form-control" name="status" req>
                    <option value="diajukan_beli"{{ $db->status == 'diajukan_beli' ? 'selected' : '' }} >Diajukan Beli</option>
                    <option value="habis" {{ $db->status == 'habis' ? 'selected' : '' }}>Habis</option>
                    <option value="tersedia" {{ $db->status == 'tersedia' ? 'selected' : '' }}>Tersedia</option>
                  </select>
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-envelope" name="status" type="text" required>
                    </span>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Upload</button>
              </div>
              </div>
            </form>
          </div>
    </div>

  </div>
</div>
</div>

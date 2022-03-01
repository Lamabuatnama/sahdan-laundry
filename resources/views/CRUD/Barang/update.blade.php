 <!-- Modal -->
 <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#updatemodal{{$b->id}}">
    UPDATE
  </button>
<div class="modal fade" id="updatemodal{{$b->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog lg" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">BARANG INVENTARIS</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
        <div class="card-body">
            <p class="login-box-msg"></p>
            <form action="barang/{{$b->id}}" method="post">
                @method('put')
                @csrf
              <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Nama Barang" name="nama_barang" value="{{$b->nama_barang}}">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-user" name="nama_barang" type="text"></span>
                  </div>
                </div>
              </div>
              <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Merk Barang" name="merk_barang" value="{{$b->merk_barang}}">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-envelope" name="merk_barang" type="text">
                    </span>
                  </div>
                </div>
              </div>
              <div class="input-group mb-3">
                <input type="number" value="{{$b->qty}}" min="1" class="form-control" name="qty">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-envelope" name="qty" type="text">
                    </span>
                  </div>
                </div>
              </div>
              <div class="input-group mb-3">
                <select class="custom-select form-control" name="kondisi">
                    <option disabled>Kondisi</option>
                    <option value="layak_pakai" {{$b->kondisi == 'layak_pakai' ? 'selected':''}}>Layak Pakai</option>
                    <<option value="rusak_ringan" {{$b->kondisi == 'rusak_ringan' ? 'selected':''}}>Rusak Ringan</option>
                    <option value="rusak_berat" {{$b->kondisi == 'rusak_berat'?'selected':''}}>Rusak Berat</option>
                  </select>
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-lock" name="tlp" type="text">
                    </span>
                  </div>
                </div>
              </div>
              <div class="input-group mb-3">
                <input type="date" class="form-control" placeholder="Merk Barang" name="tanggal_pengadaan" value="{{$b->tanggal_pengadaan}}">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-lock" name="tlp" type="text">
                    </span>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Update</button>
              </div>
              </div>
            </form>
          </div>
    </div>

  </div>
</div>
</div>

 <!-- Modal -->
 <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#exampleModal">
    Create
  </button>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog lg" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">PENJEMPUTAN LAUNDRY</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
        <div class="card-body">
            <p class="login-box-msg">Tambah Data Penjemputan Laundry</p>
            <form action="" method="post" id="inputDataMember">
                @csrf
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Nama" name="nama" required>
                    <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-user" name="nama" type="text"></span>
                    </div>
                    </div>
                </div>
              <div class="input-group mb-3">
                <input type="number" class="form-control" placeholder="Quantity" name="qty" required>
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-lock" name="petugas" type="text">
                    </span>
                  </div>
                </div>
              </div>
              <div class="input-group mb-3">
                <input type="number" class="form-control" placeholder="Harga" name="harga" required>
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
                <input type="text" class="form-control" placeholder="Supplier" name="supplier" required>
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-envelope" name="supplier" type="text" required>
                    </span>
                  </div>
                </div>
              </div>
              <div class="input-group mb-3">
                <select class="custom-select form-control" name="status" req>
                    <option value="diajukan_beli">Diajukan Beli</option>
                    <option value="habis">Habis</option>
                    <option value="tersedia">Tersedia</option>
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


  {{-- <select class="form-control" placeholder="Nama Pelanggan" name="id_member" required>
                    <option selected disabled value="">Select Member</option>
                                 @foreach ( $member as $pj)
                                     <option value="{{ $pj->id }}">{{ $pj->nama }}</option>
                                 @endforeach
                                </select> --}}

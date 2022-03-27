 <!-- Modal -->
 <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal{{$pj->id}}">
    UPDATE
  </button>
<div class="modal fade" id="exampleModal{{$pj->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
            <p class="login-box-msg">Update Data Penjemputan Laundry</p>
            <form action="/penjemputan/{{$pj->id}}" method="post" id="inputDataMember">
                @csrf
                @method('PUT')
              <div class="input-group mb-3">
                <select class="form-control" placeholder="Nama Pelanggan" name="id_member" required>
                    <option selected disabled value="">Select Member</option>
                                 @foreach ( $member as $mj)
                                 @if ($pj->id_member == $mj->id)
                                    <option selected value="{{ $mj->id }}">{{ $mj->nama }}</option>
                                 @endif
                                     <option value="{{ $mj->id }}">{{ $mj->nama }}</option>
                                 @endforeach
                                </select>
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-user" name="nama" type="text"></span>
                  </div>
                </div>
              </div>
              <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Petugas Penjemput" name="petugas" value="{{$pj->petugas}}">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-lock" name="petugas" type="text">
                    </span>
                  </div>
                </div>
              </div>
              <div class="input-group mb-3">
                <select name="status" class="status form-control">
                    <option value="tercatat" {{ $pj->status == 'tercatat' ? 'selected' : '' }}>Tercatat</option>
                    <option value="penjemputan" {{ $pj->status == 'penjemputan' ? 'selected' : '' }}>Penjemputan</option>
                    <option value="selesai" {{ $pj->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                </select>
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-envelope" name="status" type="text">
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

 <!-- Modal -->
 <button type="button"  class="btn btn-primary btn-sm" data-toggle="modal" data-target="#update{{$value->id}}">
    UPDATE
  </button>
<div class="modal fade" id="update{{$value->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog lg" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">MENGUPDATE DATA OUTLET</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
        <div class="card-body">
            <form action="outlet/{{$value->id}}" method="post">
                @csrf
                @method('put')
              <div class="input-group mb-3">
                <input type="text" class="form-control" value="{{$value->nama}}" name="nama">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-user" name="nama" type="text"></span>
                  </div>
                </div>
              </div>
              <div class="input-group mb-3">
                <input type="text" class="form-control"value="{{$value->alamat}}" name="alamat">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-envelope" name="alamat" type="text">
                    </span>
                  </div>
                </div>
              </div>
           <div class="input-group mb-3">
                <input type="text" class="form-control" value="{{$value->tlp}}" name="tlp">
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

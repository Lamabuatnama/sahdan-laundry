 <!-- Modal -->

 <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#update{{$value->id}}">
    UPDATE
  </button>
<div class="modal fade" id="update{{$value->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog lg" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">MENGUPDATE USER</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
        <div class="card">
            <div class="card-body register-card-body">
              <form action="users/{{$value->id}}" method="post">
                @csrf
                @method('put')
                <div class="input-group mb-3">
                  <input type="text" name="nama" class="form-control" value="{{$value->nama}}">
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-user"></span>
                    </div>
                  </div>
                </div>
                <div class="input-group mb-3">
                  <input type="email" name="email" class="form-control" value="{{$value->email}}">
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-envelope"></span>
                    </div>
                  </div>
                </div>
                <div class="input-group mb-3">
                 <input type="password" name="password" class="form-control">
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-lock"></span>
                    </div>
                  </div>
                </div>
                <div class="input-group mb-3">
                    <select type="role" name="role" class="form-control" placeholder="Retype role">
                        <option value="kasir" {{$value->role == 'kasir' ? 'selected' : ''}}>Kasir</option>
                        <option value="admin" {{$value->role == 'admin' ? 'selected' : ''}}>admin</option>
                        <option value="owner" {{$value->role == 'owner' ? 'selected' : ''}}>owner</option>
                    </select>
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                      </div>
                    </div>
                  </div>
                <div class="input-group mb-3">

                    <select type="id_outlet" name="id_outlet" class="form-control" placeholder="Retype id_outlet">
                        <option value="" selected disabled>Select Outlet</option>
                        @foreach ($outlet as $key=>$val)
                        <option @if ($val->id==$value->id_outlet)
                            selected
                        @endif value="{{$val->id}}">{{$val->nama}}</option>
                        @endforeach
                    </select>
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                      </div>
                    </div>
                  </div>
                <div class="row">
                  <div class="col-8">
                  </div>
                  <!-- /.col -->
                  <div class="col-4">
                    <button type="submit" class="btn btn-primary btn-block">Register</button>
                  </div>
                  <!-- /.col -->
                </div>
              </form>
            </div>
            <!-- /.form-box -->
          </div><!-- /.card -->
      </div>

  </div>
</div>
</div>

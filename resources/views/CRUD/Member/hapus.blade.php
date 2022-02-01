 <!-- Modal -->
 <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete{{$value->id}}">
    DELETE
  </button>
<div class="modal fade" id="delete{{$value->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog lg" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">DELETE</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
        <div class="card-body">
            <p class="login-box-msg" style="font-size: 26px">ANTUM INGIN MENGHAPUS DATA ?</p>
            <form action="member/{{$value->id}}" method="post">
                @csrf
                @method('delete')
              <div class="input-group mb-8 justify-content-around">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">TIDAK</button>
                    <button type="submit" class="btn btn-primary">BETUL</button>
              </div>
              </div>
            </form>
          </div>
    </div>
  </div>
</div>
</div>

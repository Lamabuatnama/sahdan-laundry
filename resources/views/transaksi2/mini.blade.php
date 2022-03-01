 <!-- Modal -->

 <div class="modal fade" id="LihatPaket" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">PILIH PAKET</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="card-body">
                <table class="table table-bordered table-striped" id="tbl-paket">
                <thead>
                    <tr style="text-align: center">
                      <th>Nama Paket</th>
                      <th>Harga</th>
                    </tr>
                    </thead>
                    @foreach ($paket as $p)
                    <tr>

                      <td>{{$p->nama_paket}}<input type="text" hidden id="idPaket" class="idPaket" value="{{$p->id}}"></td>
                      <td>{{$p->harga}}</td>
                    </tr>
                    @endforeach
                    </tbody>
                  </table>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  </div>
                  </div>
              </div>
        </div>
      </div>
    </div>
    </div>

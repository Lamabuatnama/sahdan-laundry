 <!-- Modal -->

<div class="modal fade" id="pilihPaketModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                  <th>NAMA</th>
                  <th>JENIS</th>
                  <th>HARGA</th>
                  <th>AKSI</th>
                </tr>
                </thead>
                @foreach ($paket as $key=>$value1 )
                <tr>
                  <td>{{$value1->nama_paket}}</td>
                  <td>{{$value1->jenis}}</td>
                  <td>{{$value1->harga}}</td>
                  <td style="text-align: center" class="align-middle d-flex flex-row">
                <button class="pilih-paket" id="">PILIH</button></td>
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

 <!-- Modal -->

<div class="modal fade" id="pilihMemberModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">PILIH MEMBER</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
        <div class="card-body">
            <table class="table table-bordered table-striped" id="tbl-member">
            <thead>
                <tr style="text-align: center">
                  <th>NAMA MEMBER</th>
                  <th>ALAMAT MEMBER</th>
                  <th>JENIS KELAMIN</th>
                  <th>NOMER TELEPON</th>
                  <th>AKSI</th>
                </tr>
                </thead>
                @foreach ($member as $key=>$value )
                <tr>
                  <td>{{$value->nama}}</td>
                  <td>{{$value->alamat}}</td>
                  <td>{{$value->jenis_kelamin}}</td>
                  <td>{{$value->tlp}}</td>
                  <td style="text-align: center" class="align-middle d-flex flex-row">
                <button class="btn btn-info pilih-member" id="">PILIH</button></td>
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

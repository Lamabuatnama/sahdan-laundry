<div class="collapse" id="nav-data">
    <div class="card-body">
       <table class="table table-bordered table-striped" id="tbl-data-transaksi">
        <a href="/faktur" class="btn btn-primary" target="_blank">CETAK PDF</a>
                    <thead>
                        <tr style="text-align: center">
                        <th>KODE INVOICE</th>
                        <th>NAMA MEMBER</th>
                        <th>TANGGAL</th>
                        <th>BATAS WAKTU</th>
                        <th>TANGGAL BAYAR</th>
                        <th>KASIR</th>
                        <th>STATUS</th>
                        <th>AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transaksi as $t)
                        <tr>
                        <td>{{$t->kode_invoice}}</td>
                        <td>{{$t->member->nama}}</td>
                        <td>{{$t->tgl}}</td>
                        <td>{{$t->batas_waktu}}</td>
                        <td>
                            @if ($t ->tgl_bayar == null)
                                Belum Dibayar
                            @else
                                {{$t->tgl_bayar}}
                            @endif

                        </td>
                        <td>{{$t->users->nama}}</td>
                        <td>{{$t->id}}</td>
                        <td>
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#LihatPaket">
                                <i class="fas fa-plus"></i>
                            </button>
                        </td>
                        @endforeach
                        </tr>
                    </tbody>
                </table>
    </div>
</div>

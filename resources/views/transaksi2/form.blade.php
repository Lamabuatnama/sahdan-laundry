<div class="collapse" id="nav-form">
    <div class="card-body">

        {{-- data awal pelanggan  --}}

        <div class="card">
            <div class="card-body">
                <div class="row col-12">
                    <div class="form-group row col-6">
                        <label for="tanggal" class="col-sm-4 col-form-Label">Tanggal Transaksi</label>
                        <div class="col-sm-6">
                            <input type="date" class="form-control" name="tgl" value="{{ date('Y-m-d')}}">
                        </div>
                    </div>
                    <div Class="form-group row col-6">
                            <Label for="estimasi" class="col-4 col-form-Label">Estimasi Selesai</Label>
                        <div class="col-6 al-auto">
                            <input type="date" class="form-control ml-auto" name="batas_waktu" value="{{ date('Y-m-d', strtotime(date('Y-m-d') . '+3 day')) }}">
                        </div>
                    </div>
                </div>
                <div class="row col-12">
                    <div class="form-group row col-8">
                        <label for="" class="col-sm-4 col-form-label">
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#pilihMemberModal">
                            <i class="fas fa-plus"></i>
                        </button>
                        </label>

                    </div>
                    <div class="form-group row col-6">
                        <label for="" class="col-sm-4 col-form-label">
                        Pelanggan
                        </label>
                        <div class="col-6 ml-auto" id="nama-pelanggan">
                            -
                        </div>

                    </div>
                    <div Class="form-group row col-6">
                        <label class="col-4 col-form-label">Biodata</label>
                        <div class="col-6 ml-auto" id="biodata-pelanggan">
                            -
                        </div>
                        <input type="text" id="idMember" hidden name="id_member">
                    </div>
                </div>
            </div>
        </div>

        {{-- end of data awal pelanggan  --}}

        {{-- data paket  --}}

        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#pilihPaketModal">
                            Tambah Cucian
                        </button>
                    </div>
                </div>
                <div class="clearfix">&nbsp;</div>
                <div class="row">
                    <table class="table table-striped table-bordered bulk_action" id="tblTransaksi">
                        <thead>
                            <tr>
                                <th>Nama Paket</th>
                                <th>Harga</th>
                                <th>Qty</th>
                                <th>Total</th>
                                <th style="width: 15%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="5" style="text-align:center;font-style:italic">Belum ada data</td>
                            </tr>
                        </tbody>
                       <tfoot>
                           <tr>
                               <td width="" colspan="3" align="right">Jumlah Bayar</td>
                                <td><span id="subtotal">0</span></td>
                                <td rowspan="4">
                                    <label for="">Pembayaran</label>
                                    <input type="text" class="form-control" name="bayar" id="">
                                    <div>
                                        <button class="btn btn-primary" type="submit">Bayar</button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3" align="right">Diskon</td>
                                <td><input type="number" value="0" id="diskon" name="diskon"></td>
                            </tr>
                            <tr>
                                <td colspan="3" align="right">Pajak<input type="number" value="0" min="0" class="qty" name="pajak" id="pajak-persen" size="2" style="width: 40px"></td>
                                <td><span id="pajak-harga">0</span></td>
                            </tr>
                            <tr>
                                <td colspan="3" align="right">Biaya Tambahan</td>
                                <td><input type="number" name="biaya_tambahan" style="width:140px" value="0"></td>
                            </tr>
                            <tr style="background:black;color:white">
                                <td colspan="3" align="right">Total Bayar Akhir</td>
                                <td><span id="total">0</span></td>
                            </tr>

                       </tfoot>
                    </table>
                </div>
            </div>
        </div>

        {{-- end of data paket  --}}

        {{-- pembayaran  --}}

        <div class="card">
            <div class="card-body">

            </div>
        </div>


        {{-- end of pembayaran  --}}



    </div>
</div>

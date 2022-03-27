@extends('template.template')
@section('content')
    @if (Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ Session::get('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
<section class="content">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">TRANSAKSI JASA</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div>
                <label for="tanggal">TANGGAL</label>
                <input type="date" name="date" id="date" value="xx">


                @include('Transaksi.member')
                @include('Transaksi.paket')


                <div class="card-body">
                    <form>
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#pilihMemberModal">
                        PILIH MEMBER
                    </button>
                </div>
                    <div class="card-body">
                        <table id="tbl-member" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <td width="10%">NAMA</td>
                                    <td width="25%"><input disabled type="text" readonly id="m-nama" style="border:none">
                                    </td>
                                    <td width="10%">KELAMIN</td>
                                    <td width="25%"><input disabled type="text" readonly id="m-kelamin" style="border:none">
                                    </td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>ALAMAT</td>
                                    <td><span id="m-alamat"></span></td>
                                    <td>TELEPON</td>
                                    <td><span id="m-tlp"></span></td>
                                </tr>
                            </tbody>

                        </table>
                    </div>
                        <div class="card-body">
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                            data-target="#pilihPaketModal">
                            PILIH PAKET
                             </button>
                        </div>
                        <div class="card-body">
                            <table id="tbl-member" class="table table-bordered table-striped">

                                <thead>
                                    <tr>
                                        <td>NAMA PAKET</td>
                                        <td>HARGA</td>
                                        <td>JENIS</td>
                                        <td>JUMLAH</td>

                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><input disabled type="text" readonly id="k-nama" style="border:none"></td>
                                        <td><input disabled type="text" readonly id="k-harga" style="border:none"></td>
                                        <td><input disabled type="text" readonly id="k-jenis" style="border:none"></td>
                                        <td><input disabled type="text" readonly id="k-qty" style="border:none"></td>
                                    </tr>
                                </tbody>
                                </form>
                            </table>
                        </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.card-body -->
    </div>
</section>
    @include('transaksi.script')
@endsection

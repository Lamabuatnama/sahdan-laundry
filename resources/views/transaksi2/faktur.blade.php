<!DOCTYPE html>
<html>
<head>
	<title>Membuat Laporan PDF Dengan DOMPDF Laravel</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
	<center>
		<h5>Laporan Penjulanan Jasa Laundry</h4>
	</center>

	<table class='table table-bordered'>
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
            <td>{{$t->status}}</td>
            <td>

            </td>
            @endforeach
            </tr>
        </tbody>
	</table>

</body>
</html>

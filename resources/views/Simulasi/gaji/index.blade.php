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


    <div class="card">
        <div class="card-body">
    <h3>GAJI KARYAWAN</h3>

            <table class="datakr table">
                <form id="formGK">
                    <tr>
                        <td>Id Karyawan</td>
                        <td><input type="text" name="id" id="id" required class="form-control" ></td>
                        <td>&nbsp;</td>
                        <td>Nama Karyawan</td>
                        <td><input type="text" name="nama" id="nama" class="form-control"></td>
                    </tr>
                    <tr>
                        <td>Jenis Kelamin</td>
                        <td>
                            <input type="radio" name="jk" value="laki-laki" required>
                            <label for="jk">Laki - Laki</label>
                            <input type="radio" name="jk" value="perempuan" required>
                            <label for="jk">Perempuan</label>
                        </td>
                        <td>&nbsp;</td>
                        <td>Status Menikah</td>
                        <td>
                            <select name="status" id="status" class="status form-control" required>
                                <option value="single">Single</option>
                                <option value="menikah">Menikah</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Jumlah Anak</td>
                        <td><input type="number" id="anak" class="qty form-control" min="0" value="0" name="anak" readonly required></td>
                        <td>&nbsp;</td>
                        <td>Mulai Kerja</td>
                        <td><input type="date" class="form-control" name="date" value="{{ date('Y-m-d') }}" required></td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td><button class="btn btn-primary col-sm-5">Input</button>
                            &nbsp;
                            &nbsp;
                            &nbsp;
                            &nbsp;
                            &nbsp;
                            &nbsp;
                            <button class="btn btn-primary col-sm-5" type="reset">Reset</button>
                        </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                </form>
            </table>
        </div>
    </div>


        <div class="card" nama='data-gaji' id="data-gaji">
        <div class="card-body">

            <div class="form-group row">
                <div class=" col-sm-1"><p>Sorting By</p></div>
                <div class="col-sm-8">
                    <select class="form-control col-sm-2" id="sorting" name="sorting">
                        <option value="id">Id</option>
                        <option value="nama">Nama</option>
                        <option value="jk">Kelamin</option>
                        <option value="status">Status</option>
                        <option value="anak">Anak</option>
                        <option value="qty">Kerja</option>
                    </select>
                    <button class="btn btn-danger" id="hapus">Hapus</button>
                </div>
                    <input class="form-control col-sm-2" type="search" id="search">
                    <label for="search" class="btn btn-primary" id="btnSearch">Search</label>
            </div>
                <table class="data-gaji table table-dark">
                    <thead>
                        <th>ID</th>
                        <th>NAMA</th>
                        <th>JK</th>
                        <th>STATUS</th>
                        <th>ANAK</th>
                        <th>MULAI KERJA</th>
                        <th>GAJI AWAL</th>
                        <th>TUNJANGAN</th>
                        <th>TOTAL</th>
                    </thead>
                    <tbody>

                    </tbody>
                    <tfoot>

                    </tfoot>
                </table>
        </div>
    </div>


@endsection


@push('sc')
    <script>
// Variable Public

// AUTO LOAD
window.addEventListener('load', function() {
            dataKr = Sorting(dataKr, 'id')
            $('#tbldata tbody').html(showData(dataKr))
        })

let dataKr = JSON.parse(localStorage.getItem('dataKr')) || []

$('#data-gaji tbody').html(showData(dataKr))



    $('#hapus').on('click', function(e){
        console.log(dataKr.length)
        e.preventDefault()
        if (dataKr.length > 0 ) {
            dataKr = [];
        localStorage.removeItem('dataKr');
        Swal.fire(
        'Success!',
        'Data Berhasil DiHapus!',
        'success'
        )
        } else {
            Swal.fire(
            'Failed!',
            'Tidak Ada Data Yang Dihapus!',
            'warning')
        }

        $('#data-gaji tbody').html(showData(dataKr))
    })

    $('#formGK').on('submit' , function(e){
        e.preventDefault()
        insert()
        $('#data-gaji tbody').html(showData(dataKr))
        console.log(dataKr)
    })

    $('#sorting').on('change' , function(){
        let nama = document.getElementById("sorting").value
        dataKr = Sorting(dataKr, nama)
        $('#data-gaji tbody').html(showData(dataKr))
        console.log(dataKr)
    })

    $('#status').on('change' , function(){
        let value = $('#status').val()
        console.log(value)
        if (value == 'single') {
            $('#anak').val(0)
            $('#anak').attr('readonly', true)
        } else {
            $('#anak').attr('readonly', false)

        }
    })

    $('#btnSearch').on('click', function(e){
            let teksSearch  = $('#search').val()
            let id          = Searching(dataKr,'nama',teksSearch)
            let data        = []
            if(id >= 0)
                data.push(dataKr[id])
            console.log(teksSearch)
            console.log(data)
            $('#data-gaji tbody').html(showData(data))
    })


    function Searching(arr, key ,teks){
        for (let i=0; i < arr.length; i++){
            if(arr[i][key] == teks)
            return i
        }
        return -1

    }


    function Sorting(dataKr, key){
            let i, j, id, value;
            for (i = 1; i < dataKr.length; i++)
                {
                    value   = dataKr[i];
                    id      = dataKr[i][key]

                    j       = i - 1;
                    while (j >= 0 && dataKr[j][key]>id)
                        {
                            dataKr[j+1] = dataKr[j];
                            j        = j - 1;
                        }
                    dataKr[j + 1] = value;

                }

            return dataKr
        }


    function insert(){
        const form = $('#formGK').serializeArray()
        let newData = {}
        form.forEach(function(item,index){
            let name  = item['name']
            let value = (item['value'])
            newData[name] = value

        })


        dataKr.push(newData);
        localStorage.setItem('dataKr' , JSON.stringify(dataKr))

    }



    function showData(dataKr,x){
        const awal          = 2000000
        var totalAwal       = 0
        var totalTunjangan  = 0
        var totalTotal      = 0
        var tunjangan       = 0
        var total           = 0

    let row = ''
    if(dataKr.length === 0){
        return row = '<th><td colspan="8" align="center">DATA KOSONG</td></th>'
        }


    dataKr.forEach(function(item,index,dan){


        dan             = new Date(item['date'])
        var ageDifMs    = Date.now() - dan.getTime();
        if (ageDifMs > 0) {
            var ageDate     = new Date(ageDifMs)
            var newAge      = Math.abs(ageDate.getUTCFullYear() - 1970)
            var tahun       = newAge*150000
        } else {
            var tahun       = 0
        }

        if(item['anak'] >= 2){
           var child = 2
        } else if (item['anak'] != 1){
           var child = 0
        } else {
           var child = 1
        }

        var anak = 150000*child

        var status      = (item['status'] === 'menikah' ?250000:0)


        tunjangan   = anak + status + tahun

        total       = tunjangan + awal


        row += '<tr id="data_item">'
        row += `<td>${item['id']}</td>`
        row += `<td>${item['nama']}</td>`
        row += `<td>${item['jk']}</td>`
        row += `<td>${item['status']}</td>`
        row += `<td>${item['anak']}</td>`
        row += `<td>${item['date']}</td>`
        row += `<td>${awal}</td>`
        row += `<td>${tunjangan}</td>`
        row += `<td>${total}</td>`
        row += '</tr>'
            totalAwal       += awal
            totalTunjangan  += tunjangan
            totalTotal      += total

        })
            row += '<tr>'
            row += '<td colspan="6" align="center">TOTAL</td>'
            row += `<td>${totalAwal}</td>`
            row += `<td>${totalTunjangan}</td>`
            row += `<td>${totalTotal}</td>`
            row += '</tr>'
            console.log(totalAwal,totalTunjangan,totalTotal);

    return row

    }


    </script>
@endpush

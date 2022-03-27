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
    <h3>Transaksi Barang</h3>

            <table class="table">
                <form id="FormI">
                    <tr>
                        <td>Id Barang</td>
                        <td><input type="text" name="id" id="id" required class="form-control" ></td>
                        <td>&nbsp;</td>
                        <td>Tanggal Beli</td>
                        <td><input type="date" class="form-control" name="date" value="{{ date('Y-m-d') }}" required></td>
                    </tr>
                    <tr>
                        <td>Nama Barang</td>
                        <td>
                            <select name="nama" id="nama" class="status form-control nama" required>
                                <option value="detergent">Detergent</option>
                                <option value="pewangi">Pewangi</option>
                                <option value="detergent-sepatu">Detergent Sepatu</option>
                            </select>
                        </td>
                        <td>&nbsp;</td>
                        <td>Harga Barang</td>
                        <td><input type="text" class="form-control" name="harga" id="harga" required hidden value="15000"><span id="harga-span" name='harga-span'>Rp.15000</span></td>
                    </tr>
                    <tr>
                        <td>QTY</td>
                        <td><input type="number" class="form-control" name="qty" required min="1" value="1"></td>
                        <td>&nbsp;</td>
                        <td>Jenis Pembayaran</td>
                        <td>
                            <input type="radio" name="jp" value="cash" required>
                            <label for="jp">Cash</label>
                            <input type="radio" name="jp" value="transfer" required>
                            <label for="jp">Transfer</label>
                        </td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td><button class="btn btn-primary col-sm-5 input" type="submit">Input</button>
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


        <div class="card" nama='transaksi-barang' id="all">
            <div class="card-body">
                <button hidden id="submitme" class="me" type="button">Input</button>
            <div class="form-group row">
                <div class=" col-sm-1"><p>Sorting By</p></div>
                        <div class="col-sm-3">
                    <select class="form-control" id="sorting" name="sorting">
                        <option value="id">Id</option>
                        <option value="nama">Nama</option>
                        <option value="jk">Kelamin</option>
                        <option value="status">Status</option>
                        <option value="anak">Anak</option>
                        <option value="qty">Kerja</option>
                    </select>
                </div>
                <div class="col-sm-3">
                    <input id="checkc" type="checkbox" class="me" checked  value="cash">
                    <label for="checkbox">Chas</label>
                    <input id="checkt" type="checkbox" class="me" checked value="transfer">
                    <label for="checkbox">Transfer</label>
                </div>
                <div>
                    <button id="delete" class="btn btn-danger form-control ">DELETE</button>
                </div>
                    &nbsp;
                    <input class="form-control col-sm-2" type="search" id="search" value="search">
                    <label for="search" class="btn btn-primary form-control col-sm-1" id="btnsearch">Search</label>
            </div>
                <table id="DbR" class="table table-dark">
                    <thead>
                        <th>ID</th>
                        <th>TANGGAL BELI</th>
                        <th>NAMA BARANG</th>
                        <th>HARGA</th>
                        <th>QTY</th>
                        <th>DISKON</th>
                        <th>TOTAL HARGA</th>
                        <th>JENIS BARANG</th>

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
let DbR = JSON.parse(localStorage.getItem('DbR')) || []
window.addEventListener('load', function() {
    dataBuku = insertionSort(DbR, 'id')
            $('#DbR tbody').html(showData(dataBuku))
        })

    // Untuk Trigger Submit
    $('#FormI').on('submit', function(e){
        e.preventDefault()
        insert()
        console.log(DbR)
        document.getElementById("submitme").click();
        document.getElementById("btnsearch").click();
    })

    // Untuk Menghapus Data
    $('#delete').on('click', function(e){
        e.preventDefault()
        DbR = [];
        localStorage.removeItem('DbR');
        $('#tbldata tbody').html(showData(DbR))
    })

    // Untuk Harga Barang
    $('#nama').on('change', function(){
        let nama    = $('#nama').val()
        var harga   = 15000
        if (nama == 'detergent-sepatu') {
            harga   = 25000
        } else if (nama == 'pewangi') {
            harga   = 10000
        }
        $('#harga').val(harga)
        $('#harga-span').text('Rp.'+harga)
    })

    $('#all').on('click','.me', function(){
        $('#DbR tbody').html(showData(DbR))

        var checkc   = document.getElementById('checkc')
        var checkt   = document.getElementById('checkt')

        if (checkc.checked == true && checkt.checked == true) {
            $('#DbR tbody').html(showData(DbR))
        }
        else if (checkc.checked == true && checkt.checked == false) {
                let check  = $('#checkc').val()
                checked(check)
        }
        else if (checkc.checked == false && checkt.checked == true) {
                let check  = $('#checkt').val()
                checked(check)
            }
        else if (checkc.checked == false && checkt.checked == false){
            data = []
            $('#DbR tbody').html(showData(data))
        }
    })

    $('#btnsearch').on('click', function(){
        let check  = $('#search').val()
        let id          = search(DbR,check)
        let data        = []
        for(x=0;x<id.length;x++){
                data.push(DbR[id[x]])
                console.log(data);
        $('#DbR tbody').html(showData(data))

        }
    })

    // Untuk Sorting
    $('#sorting').on('change', function(){

    let nama = document.getElementById("sorting").value ;
    DbR = insertionSort(DbR, nama)
    $('#DbR tbody').html(showData(DbR))

    })



    function checked(check){
                let id          = search(DbR,check)
                let data        = []
                for(x=0;x<id.length;x++){
                data.push(DbR[id[x]])
                $('#DbR tbody').html(showData(data))
                // document.getElementById("btnsearch").click();
                }
    }

    // Function Untuk MenInput Data Ke Local Storage
    function insert(){
        const   form    = $('#FormI').serializeArray()
        const dc    = 0.15
        var diskon  = 0
        var jumlah  = 0
        let     newDbR  = {}
        form.forEach(function(item,index){
            let name    = item['name']
            let value   = ((name === 'id'||
                               name === 'harga'||
                               name === 'qty'
                               ?Number(item['value']):item['value']))
            newDbR[name]= value

            //
            let harga   = Number(newDbR['harga'])
            let qty     = Number(newDbR['qty'])

            // Mencari Total Jumlah Barang
            jumlah = harga*qty

            // Menentukan Diskon
            if (jumlah >= 50000 ) {
                diskon = jumlah * dc
                jumlah = jumlah - diskon
            }

            newDbR['diskon']= diskon
            newDbR['jumlah']= jumlah

        })
        DbR.push(newDbR)
        localStorage.setItem('DbR', JSON.stringify(DbR))
    }

    // Function Untuk MengNampilkan Data Dari Local Storage
    function showData(DbR){




        // var Untuk Total
        var tHarga  = 0
        var tQty    = 0
        var tDiskon = 0
        var tTotal  = 0

        let row     = ''
        if(DbR.length === 0){
            return row = '<th><td colspan="6" align="center">DATA KOSONG</td></th>'
        }

        DbR.forEach(function(item,index){



            // Mencari Total
            tHarga      += Number(item['harga'])
            tQty        += Number(item['qty'])
            tDiskon     += Number(item['diskon'])
            tTotal      += Number(item['jumlah'])

            row += '<tr>'
            row += `<td>${item['id']}</td>`
            row += `<td>${item['date']}</td>`
            row += `<td>${item['nama']}</td>`
            row += `<td>${item['harga']}</td>`
            row += `<td>${item['qty']}</td>`
            row += `<td>${item['diskon']}</td>`
            row += `<td>${item['jumlah']}</td>`
            row += `<td>${item['jp']}</td>`
            row += '</tr>'


        })

            row += '<tr>'
            row += `<td colspan="3" align="center">Total</td>`
            row += `<td>${tHarga}</td>`
            row += `<td>${tQty}</td>`
            row += `<td>${tDiskon}</td>`
            row += `<td colspan="2">${tTotal}</td>`
            row += '</tr>'

        return row
    }

    // Function Untuk Checkbox
    function cek(DbR, key, teks){
                let buffer=[]
                for(let i = 0; i < DbR.length; i++){
                    if(DbR[i][key] == teks)
                    buffer.push(i)
                }
                return buffer
            }

    // Function Untuk Checkbox
    function search(DbR,teks){
        let buffer=[]
                for(let i = 0; i < DbR.length; i++){
                    let id          = DbR[i].id.toString().toLowerCase().includes(teks)
                    let date        = DbR[i].date.toString().toLowerCase().includes(teks)
                    let nama        = DbR[i].nama.toString().toLowerCase().includes(teks)
                    let harga       = DbR[i].harga.toString().toLowerCase().includes(teks)
                    let qty         = DbR[i].qty.toString().toLowerCase().includes(teks)
                    let diskon      = DbR[i].diskon.toString().toLowerCase().includes(teks)
                    let jumlah      = DbR[i].jumlah.toString().toLowerCase().includes(teks)
                    let jp          = DbR[i].jp.toString().toLowerCase().includes(teks)

                    if( id || date || nama || harga || qty || jp || diskon || jumlah)
                    buffer.push(i)
                }
                return buffer
            }

        function insertionSort(DbR, key){
            let i, j, id, value;
            for (i = 1; i < DbR.length; i++)
                {
                    value   = DbR[i];
                    id      = DbR[i][key]
                    console.log(key)
                    j       = i - 1;
                    while (j >= 0 && DbR[j][key]>id)
                        {
                            DbR[j+1] = DbR[j];
                            j        = j - 1;
                        }
                    DbR[j + 1] = value;
                }

            return DbR
        }

    </script>
@endpush

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

    <div class="card card-primary" name='form-card' >
        <div class="card-header">
            <h3 class="card-title">Form</h3>
        </div>

        <form id="formbuku" >

        <div class="card-body col-sm-6">
                  <div class="form-group">
                    <label for="id">ID BUKU</label>
                    <input type="text" class="form-control" id="id" name="id" placeholder="ID BUKU">
                  </div>

                  <div class="form-group">
                    <label for="jb">JUDUL BUKU</label>
                    <input type="text" class="form-control" id="jb" name="jb" placeholder="JUDUL BUKU">
                  </div>

                  <div class="form-group">
                    <label for="pengarang">PENGARANG</label>
                    <input type="text" class="form-control" id="pengarang" name="pengarang" placeholder="PENGARANG">
                  </div>

                  <div class="form-group">
                    <label for="tahun_terbit">TANGGAL TERBIT</label>
                    <select class="custom-select form-control-border" id="tahun_terbit" name="tahun_terbit">
                        @for ($i=date('Y'); $i>1900; $i--)
                        <option value="{{$i}}">{{$i}}</option>
                        @endfor
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="hargabuku">HARGA BUKU</label>
                    <input type="text" class="form-control" id="hargabuku" name="hargabuku" placeholder="HARGA BUKU">
                  </div>

                  <div class="form-group">
                    <label for="qty">Quantity</label>
                    <input type="number" min="1" value="1" class="form-control" id="qty" name='qty' placeholder="Quantity">
                  </div>

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" id="submit">Submit</button>
                  <button type="button" class="btn btn-primary" id="reset">Reset</button>

                </div>
              </form>
        </div>
    </div>
    <div class="card" name='data-card'>
        <div class="card-header">
            Data
        </div>

        <div class="card-body">
            <div class=" form-group row">
                <select class="form-control col-sm-2" id="sorting" name="sorting">
                    <option value="id">ID BUKU</option>
                    <option value="jb">JUDUL BUKU</option>
                    <option value="pengarang">PENGARANG</option>
                    <option value="tahun_terbit">TAHUN TERBIT</option>
                    <option value="hargabuku">HARGA BUKU</option>
                    <option value="qty">QTY</option>
                </select>
            </div>
            <table id="tbldata" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>ID BUKU</th>
                  <th>JUDUL BUKU</th>
                  <th>PENGARANG</th>
                  <th>TAHUN TERBIT</th>
                  <th>HARGA BUKU</th>
                  <th>QTY</th>
                </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="3">
                            BELUM ADA DATA
                        </td>
                    </tr>
                </tbody>
                <tfoot>
                </tfoot>
              </table>
        </div>
    </div>

@endsection

@push('sc')
    <script>
        // initialize
        let dataBuku = JSON.parse(localStorage.getItem('dataBuku')) || []

        // AUTO LOAD
        window.addEventListener('load', function() {
            dataBuku = insertionSort(dataBuku, 'id')
            $('#tbldata tbody').html(showData(dataBuku))
        })

        $(function(){
            // events
        $('#tbldata tbody').html(showData(dataBuku))
            // Sorting
                $('#sorting').on('change', function(){

                let nama = document.getElementById("sorting").value ;
                dataBuku = insertionSort(dataBuku, nama)
                $('#tbldata tbody').html(showData(dataBuku))

                })

                // Submit
                $('#formbuku').on('submit', function(e){
                    e.preventDefault()
                    insert()
                    let nama = document.getElementById("sorting").value ;
                    dataBuku = insertionSort(dataBuku, nama)
                    $('#tbldata tbody').html(showData(dataBuku))
                    console.log(dataBuku)

                })
                $('#reset').on('click', function(e){
                    e.preventDefault()
                    dataBuku = [];
                    localStorage.removeItem('dataBuku');
                    $('#tbldata tbody').html(showData(dataBuku))
                })


        })
        // methods
        function insert(){
            const form = $('#formbuku').serializeArray()
            let newData = {}
            form.forEach(function(item, index){
                let name    = item['name']
                let value   = (name === 'id'||
                               name === 'hargabuku'||
                               name === 'qty'
                               ?Number(item['value']):item['value'])
                newData[name] = value
            })
            // console.log(newData)
            dataBuku.push(newData);
            localStorage.setItem('dataBuku' , JSON.stringify(dataBuku))
        }


        function showData(dataBuku){
        let row = ''
        if(dataBuku.length == null){
            return row = '<tr><td colspan="3">Belum ada Data</td></tr>'
        }
        dataBuku.forEach(function(item, index){
            row += `<tr>`
            row += `<td>${item['id']}</td>`
            row += `<td>${item['jb']}</td>`
            row += `<td>${item['pengarang']}</td>`
            row += `<td>${item['tahun_terbit']}</td>`
            row += `<td>${item['hargabuku']}</td>`
            row += `<td>${item['qty']}</td>`
            row += `</tr>`
        })
        return row
    }


        function insertionSort(dataBuku, key){
            let i, j, id, value;
            for (i = 1; i < dataBuku.length; i++)
                {
                    value   = dataBuku[i];
                    id      = dataBuku[i][key]
                    console.log(key)
                    j       = i - 1;
                    while (j >= 0 && dataBuku[j][key]>id)
                        {
                            dataBuku[j+1] = dataBuku[j];
                            j        = j - 1;
                        }
                    dataBuku[j + 1] = value;
                }

            return dataBuku
        }

    </script>

@endpush

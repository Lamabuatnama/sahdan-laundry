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
        <div class="card-header">
            <h3 class="card-title">FORM</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body" id="input">
            @include('simulasi.simulasi.tambah')
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">DATA</h3>
        </div>

        <div class="card-body">
            @include('simulasi.simulasi.data')
        </div>
        <!-- /.card-body -->
    </div>



    @endsection
    @push('sc')
<script>
    function insert(){
        const data = $('#formKr').serializeArray()
        let newData = {}
        data.forEach(function(item, index){
            let name    = item['name']
            let value   = (name === 'id'? Number(item['value']):item['value'])
            newData[name] = value
        })
        return newData
    }

    $(function(){

        // property
        let dataKr = []

        // sorting
        $('#sorting').on('click', function(){
            console.log(dataKr)
            dataKr = insertionSort(dataKr, 'id')

            $('#tblKr tbody').html(showData(dataKr))
            console.log(dataKr)
                })

        // events
        $('#formKr').on('submit' , function(e){
            e.preventDefault()
            dataKr.push(insert())
        $('#tblKr tbody').html(showData(dataKr))
        console.log(dataKr)
        })

        // Search btn
        $('#btnSearch').on('click', function(e){
            let teksSearch  = $('#search').val()
            let id          = searching(dataKr,'id',teksSearch)
            let data        = []
            if(id >= 0)
                data.push(dataKr[id])
            console.log(id)
            console.log(data)
            $('#tblKr tbody').html(showData(data))
        })
    })


    function showData(arr){
        let row = ''
        if(arr.leght = null){
            return row = '<tr><td colspan="3">Belum ada Data</td></tr>'
        }
        arr.forEach(function(item, index){
            row += `<tr>`
            row += `<td>${item['id']}</td>`
            row += `<td>${item['nama']}</td>`
            row += `<td>${item['jk']}</td>`
            row += `</tr>`
        })
        return row
    }

    function insertionSort(arr, key){
        let i, j, id, value;
        for (i = 1; i < arr.length; i++)
        {
            value   = arr[i];
            id      = arr[i][key]
            j       = i - 1;
            while (j >= 0 && arr[j][key]>id)
            {
                arr[j+1] = arr[j];
                j        = j - 1;
            }
            arr[j + 1] = value;
        }

        return arr
    }

    function searching(arr, key, teks){
        for(let i=0; i < arr.length; i++){
            if(arr[i][key] == teks)
            return i
        }
        return -1
    }

</script>
    @endpush


@push('sc')
    <script>

                $('#nav-data').collapse('show')
        $('#form-laundry').removeClass('active');
        $('#data-laundry').addClass('active');

        $('#nav-data').on('show.bs.collapse', function(){
            $('#nav-form').collapse('hide');
            $('#form-laundry').removeClass('active');
            $('#data-laundry').addClass('active');
        })

        $('#nav-form').on('show.bs.collapse', function(){
            $('#nav-data').collapse('hide');
            $('#data-laundry').removeClass('active');
            $('#form-laundry').addClass('active');
        })









        $(function(){

            $('#tbl-member').DataTable();
        });
        $(function(){
            $('#tbl-paket').DataTable();
        });
        $(function(){
            $('#tbl-data-transaksi').DataTable();
        });

        // Pilih Member
        $('#tbl-member').on('click','.pilih-member', function(){
            pilihMember(this)
            $('#pilihMemberModal').modal('hide')
        })
        // Pilih paket
        $('#tbl-paket').on('click','.pilih-paket', function(){
            pilihPaket(this)
            $('#pilihPaketModal').modal('hide')
        })

        // onchange qty
        $('#tblTransaksi').on('change','.qty',function(){
            hitungTotalAkhir(this)
        })



        // Mengambil Member
        function pilihMember(x){
            const tr        = $(x).closest('tr')
            const namaJK    = tr.find('td:eq(0)').text()+"/"+tr.find('td:eq(2)').text()
            const biodata    = tr.find('td:eq(1)').text()+"/"+tr.find('td:eq(3)').text()
            const idMember    = tr.find('.idMember').val()
            $('#nama-pelanggan').text(namaJK)
            $('#biodata-pelanggan').text(biodata)
            $('#idMember').val(idMember)
        }




        //
        let subtotal = total = 0;
        function  pilihPaket(x){
            const tr            = $(x).closest('tr')
            const namaPaket     = tr.find('td:eq(0)').text()
            const harga         = tr.find('td:eq(1)').text()
            const idPaket       = tr.find('.idPaket').val()
            let data    = ''
            let tbody   = $('#tblTransaksi tbody tr td').text()
            data += '<tr id="isal">'
            data += `<td>${namaPaket}</td>`
            data += `<td>${harga}`;
            data += `<input hidden class="idP" name="id_paket[]" value="${idPaket}"></td>`
            data += `<td><input type="number" name="qty[]"class="qty"  value="1" min="1"  size="2" style="widht:40px"></td>`;
            data += `<td><label name="sub_total[]" class="subTotal">${harga}</label></td>`;
            data += `<td><button class="btn btn-danger btnRemovePaket"><span class="fas fa-times-circle"></span></button></td>`;
            data += '</tr>';
            if(tbody == 'Belum ada data') $('#tblTransaksi tbody tr td').remove();
            $('#tblTransaksi tbody').append(data);

            subtotal    += Number(harga)

            total       = subtotal
            $('#subtotal').text(subtotal)
            $('#total').text(total)

        }


        // function hitung qty
        function hitungTotalAkhir(a){
            let qty             = Number($(a).closest('tr').find('.qty').val());
            let harga           = Number($(a).closest('tr').find('td:eq(1)').text());
            let subTotalAwal    = Number($(a).closest('tr').find('.subTotal').text());
            let count           = qty * harga;

            subtotal            = subtotal - subTotalAwal + count
            let pajak           = subtotal * Number($('#pajak-persen').val())/100
            total               = subtotal - Number($('#diskon').val()) + pajak
            $(a).closest('tr').find('.subTotal').text(count)
            $('#subtotal').text(subtotal)
            $('#total').text(total)
        }






        // remove paket
        $('#tblTransaksi').on('click','.btnRemovePaket', function(){
            let subTotalAwal    = parseFloat($(this).closest('tr').find('.subTotal').text());
            subtotal            -= subTotalAwal
            total               -= subTotalAwal;

            $currenRow          = $(this).closest('tr').remove();
            $('#pajak-harga').text(0)
            $('#subtotal').text(subtotal)
            $('#total').text(0)
        })








    </script>
@endpush

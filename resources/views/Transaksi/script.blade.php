@push('sc')
<script>
    $(document).ready(function() {
    $('#tbl-member').DataTable();
    });
    $('#tbl-member').on('click', '.pilih-member', function(){
        let ele     = $(this).closest('tr');
        let nama    = ele.find('td:eq(0)').text();
        let alamat    = ele.find('td:eq(1)').text();
        let tlp    = ele.find('td:eq(3)').text();
        let kelamin    = ele.find('td:eq(2)').text();
        $('#m-nama').val(nama)
        $('#m-alamat').text(alamat)
        $('#m-tlp').text(tlp)
        $('#m-kelamin').val(kelamin == 'P' ? 'Perempuan' : 'Laki-laki')
        $('#pilihMemberModal').modal('hide')
    });
    $('#tbl-paket').on('click', '.pilih-paket', function(){
        let ele     = $(this).closest('tr');
        let nama    = ele.find('td:eq(0)').text();
        let jenis    = ele.find('td:eq(1)').text();
        let harga    = ele.find('td:eq(2)').text();
        $('#k-nama').val(nama)
        $('#k-jenis').val(jenis)
        $('#k-harga').val(harga)
        $('#pilihPaketModal').modal('hide')
    });
</script>
@endpush

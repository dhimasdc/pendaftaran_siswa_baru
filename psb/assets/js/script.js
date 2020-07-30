$(function () {
    $('.tombolTambahData').on('click', function () {
        $('#judulModal').html('Tambah Data Siswa')
        $('.modal-footer button[type=submit]').html('Tambah Data');
        $('#nama_siswa').val('');
        $('#nis').val('');
        $('#asal').val('');
        $('#tempat_lahir').val('');
        $('#tgl_lahir').val('');
        $('#alamat').val('');
        $('#id').val('');
    });

    $('.tampilModalUbah').on('click', function () {
        $('#judulModal').html('Ubah Data Siswa');
        $('.modal-footer button[type=submit]').html('Ubah Data');
        $('.modal-body form').attr('action', 'http://localhost/psb/table/ubah');

        const id = $(this).data('id');

        $.ajax({
            url: 'http://localhost/psb/table/getubah',
            data: { id: id },
            method: 'post',
            dataType: 'json',
            success: function (data) {
                $('#nama_siswa').val(data.nama_siswa);
                $('#nis').val(data.nis);
                $('#asal').val(data.asal);
                $('#tempat_lahir').val(data.tempat_lahir);
                $('#tgl_lahir').val(data.tgl_lahir);
                $('#alamat').val(data.alamat);
                $('#id').val(data.id_siswa);
            }
        });

    });

})
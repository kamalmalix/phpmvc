$(function () {
    
    $('.tombolTambahData').on('click', function () {

        $('#ModalLabel').html('Tambah Data Mahasiswa');  
        $('.modal-footer button[type=submit]').html('Save Data');
        
        $('#nama').val('');
        $('#nim').val('');
        $('#email').val('');
        $('#jurusan').val('');
        $('#id').val('');
        
    });
    
    
    $('.tampilModalUbah').on('click', function(){
        
        $('#ModalLabel').html('Ubah Data Mahasiswa');
        $('.modal-footer button[type=submit]').html('Edit Data');
        $('.modal-body form').attr('action', 'http://localhost/phpmvc/public/mahasiswa/ubah')

        const id = $(this).data('id');
        

        $.ajax({
            url: 'http://localhost/phpmvc/public/mahasiswa/getubah',
            data: {id : id},
            method: 'post',
            dataType: 'json',
            success: function(data){
                $('#nama').val(data.nama);
                $('#nim').val(data.nim);
                $('#email').val(data.email);
                $('#jurusan').val(data.jurusan);
                $('#id').val(data.id);
            }
        });

    });


});
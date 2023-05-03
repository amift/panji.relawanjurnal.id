<script type="text/javascript">
    $(document).ready(function() {
    });

    function reg(){
        var url, method;
        $('#btnReg').html('<i class="fa fa-spinner fa-spin"></i> Mendaftar..'); 
        $('#btnReg').attr('disabled',true); 

        $.ajax({
            url : baseurl + '/reg',
            type: "POST",
            data: $('#form').serialize(),
            dataType: "json",
            success: function(callback){
                if(callback.status){ 
                    if(callback.user_exist){ 
                        Swal({
                            title   : 'Peringatan',
                            text    : 'Username sudah terpakai, pilih yang lain',
                            type    : 'warning'
                        });
                    }else if(callback.email_exist){ 
                        Swal({
                            title   : 'Peringatan',
                            text    : 'Email sudah terpakai, pilih yang lain',
                            type    : 'warning'
                        });
                    }else if(callback.send_mail_error){ 
                        Swal({
                            title   : 'Peringatan',
                            text    : 'Pengiriman email gagal, silahkan hubungi IT Support ',
                            type    : 'danger'
                        });                                                
                    }else{
                        Swal({
                            title   : 'Informasi',
                            text    : 'Pendaftaran berhasil, silahkan periksa email anda',
                            type    : 'success'
                        }).then((result) => {
                            window.location = mainurl+'login';
                        });
                    }
                }else{
                    $.each(callback.errors, function(key, value){
                        $('[name="'+key+'"]').addClass('is-invalid'); 
                        $('[name="'+key+'"]').next().text(value); 
                        if(value == ""){
                            $('[name="'+key+'"]').removeClass('is-invalid');
                            $('[name="'+key+'"]').addClass('is-valid');
                        }
                    });
                    $('.invalid-feedback').show().delay(2000).fadeOut('slow');
                }
                $('#btnReg').html('<i class="fa fa-save"></i> Daftar');
                $('#btnReg').attr('disabled',false);

            },
            error: function (jqXHR, textStatus, errorThrown){
                alert('Error adding / update data');
                $('#btnReg').html('<i class="fa fa-save"></i> Daftar');
                $('#btnReg').attr('disabled',false);
            }
        });

        $('#form input, #form textarea').on('keyup', function(){
            $(this).removeClass('is-valid is-invalid');
        });
        $('#form select').on('change', function(){
            $(this).removeClass('is-valid is-invalid');
        });
    }

</script>
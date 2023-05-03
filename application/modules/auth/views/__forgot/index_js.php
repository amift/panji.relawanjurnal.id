<script type="text/javascript">

    function forgot(){
        var url, method;
        $('#btnKirim').html('<i class="fa fa-spinner fa-spin"></i> Mengirim'); 
        $('#btnKirim').attr('disabled',true); 

        $.ajax({
            url : baseurl + '/forgot',
            type: "POST",
            data: $('#form').serialize(),
            dataType: "json",
            success: function(callback){
                if(callback.status){ 
                    if(callback.send_mail_error){ 
                        Swal({
                            title   : 'Peringatan',
                            text    : 'Pengiriman email gagal, silahkan hubungi IT Support ',
                            type    : 'danger'
                        });                                                
                    }else{
                        Swal({
                            title   : 'Informasi',
                            text    : 'Reset password berhasil, silahkan periksa email anda',
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
                $('#btnKirim').html('<i class="fa fa-key"></i> Kirim');
                $('#btnKirim').attr('disabled',false);
            },
            error: function (jqXHR, textStatus, errorThrown){
                console.log(textStatus+jqXHR+errorThrown);
                alert('Error adding / update data');
                $('#btnKirim').html('<i class="fa fa-key"></i> Kirim');
                $('#btnKirim').attr('disabled',false);
            }
        });

        $('#form input, #form textarea').on('keyup', function(){
            $(this).removeClass('is-valid is-invalid');
        });
        $('#form select').on('change', function(){
            $(this).removeClass('is-valid is-invalid');
        });
    }

    $('[name="input_email"]').keypress(function(event) {
        if (event.which === 13) {
            forgot();
        }
    });
</script>
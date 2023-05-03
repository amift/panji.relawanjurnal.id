<script type="text/javascript">

    function login(){
        var url, method;
        $('#btnLogin').html('<i class="fa fa-spinner fa-spin"></i> Login..'); 
        $('#btnLogin').attr('disabled',true); 

        $.ajax({
            url : baseurl + '/login',
            type: "POST",
            data: $('#form').serialize(),
            dataType: "json",
            success: function(callback){
                if(callback.status){ 
                    if(callback.login_failed){ 
                        Swal({
                            title   : 'Peringatan',
                            text    : 'Username atau Password salah',
                            type    : 'warning'
                        });
                    }else{                
                        window.location = mainurl+'user/home';
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
                $('#btnLogin').html('<i class="fa fa-key"></i> Login');
                $('#btnLogin').attr('disabled',false);
            },
            error: function (jqXHR, textStatus, errorThrown){
                alert('Error adding / update data');
                $('#btnLogin').html('<i class="fa fa-key"></i> Login');
                $('#btnLogin').attr('disabled',false);
            }
        });

        $('#form input, #form textarea').on('keyup', function(){
            $(this).removeClass('is-valid is-invalid');
        });
        $('#form select').on('change', function(){
            $(this).removeClass('is-valid is-invalid');
        });
    }

    $('[name="input_password"]').keypress(function(event) {
        if (event.which === 13) {
            login();
        }
    });
</script>
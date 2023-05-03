<script type="text/javascript">
    $(document).ready(function() {
        list();
        mode_default();
    });

    function edit(id){
        mode_edit();
        $('#label').html('Edit Data');
        save_label = 'update'; 
        retrieve_data(id);       
    }

    function add(){
        mode_edit();
        $('#label').html('Tambah Data');
        save_label = 'add';
    }

    function cancel(){
        mode_default();
    }

    function retrieve_data(id){        
        $.ajax({
            url : baseurl + '/edit/' + id,
            type: "GET",
            dataType: "JSON",
            success: function(callback){
                $('[name="input_id"]').val(callback.id);

                $('[name="input_description"]').val(callback.description);
                $('[name="input_host"]').val(callback.host);
                $('[name="input_port"]').val(callback.port);
                $('[name="input_smtp_secure"]').val(callback.smtp_secure);
                $('[name="input_smtp_debug"]').val(callback.smtp_debug);
                $('[name="input_smtp_auth"]').val(callback.smtp_auth);
                $('[name="input_username"]').val(callback.username);
                $('[name="input_password"]').val(callback.password);
                $('[name="input_sender_name"]').val(callback.sender_name);
                $('[name="input_active"]').val(callback.active);
                
            },
            error: function (jqXHR, textStatus, errorThrown){
                alert('Error get data from ajax');
            }
        });        
    }

    function set_default(id){
        $.ajax({
            url : baseurl + '/set_to_default/' + id,
            type: "POST",
            dataType: "JSON",
            success: function(callback){
                if(callback.status){ 
                    reload();
                    $("#process-message").hide(200);
                    $('#process-message').html('<p class="text-blue"><b>Default email was set succesfully</b></p>');
                    $("#process-message").fadeIn().delay(1500).fadeOut();
                }else{
                    alert('Error... ');
                }
            },
            error: function (jqXHR, textStatus, errorThrown){
                alert('Terjadi proses data ! ');
            }
        });
    }    

</script>
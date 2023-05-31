<script type="text/javascript">
    var var_img ='';
    var img_url= '<?php echo IMG_URL ?>';

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

                $('[name="input_name"]').val(callback.name);
                $('[name="input_email"]').val(callback.email);
                $('[name="input_telepon"]').val(callback.telepon);
                $('[name="input_institusi"]').val(callback.institusi);
                $('[name="input_provinsi_id"]').val(callback.provinsi_id);

            },
            error: function (jqXHR, textStatus, errorThrown){
                alert('Error get data from ajax');
            }
        });        
    }

    $("#file-upload").change(function(e){ 
        var form_data = new FormData($('#form_file')[0]);
        $.ajax({
            url : baseurl + "/savefile",
            enctype: 'multipart/form-data',
            type: "POST",
            data: form_data,
            processData: false,
            contentType: false,
            success: function(data){                
                if(data.status){ 
                    var_img=img_url+data.foto+'?v='+Date.now();
                    $("#foto").attr("src", var_img );
                    $("#foto-sidebar").attr("src", var_img );
                    $("#foto-header-top").attr("src", var_img );
                    $("#foto-header-inside").attr("src", var_img );
                    $('#file-msg').html('<b class="text-blue">Image Updated</b>');
                    $("#file-msg").fadeIn().delay(1000).fadeOut();
                }else{
                    $('#file-msg').html('<b class="text-red">'+data.error+'</b>');
                    $("#file-msg").fadeIn().delay(3000).fadeOut();
                }
            },
            error: function (jqXHR, textStatus, errorThrown){
                alert('Error adding / update data');
            }
        });
    });
    
</script>
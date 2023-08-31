<script type="text/javascript">
    $(document).ready(function() {
    });

    function cancel(){
        window.location.href = baseurl;
    }

    function update_sitasi(id){
        $('#btnSave').html('<i class="fa fa-spinner fa-spin"></i> Menyimpan'); 
        $('#btnSave').attr('disabled',true); 
        $('#btnCancel').attr('disabled',true); 
        
        $.ajax({
            url : baseurl + '/update_sitasi/' + id,
            type: "POST",
            data: { j_sitasi: $('[name="input_jumlah_sitasi"]').val() },
            dataType: "json",
            success: function(callback){
                if(callback.status){ 
                    $('span#jumlah_sitasi').html(callback.jumlah_sitasi);
                    new PNotify({
                      title:"Informasi",
                      text: ' Jumlah sitasi berhasil diubah',
                      type: "success",
                      delay:'2000',
                      stack: stack_center,
                      styling: "bootstrap3"
                    });
                    $('[name="input_jumlah_sitasi"]').val('');
                }else{
                    new PNotify({
                      title:"Peringatan",
                      text: callback.message,
                      type: "warning",
                      delay:'2000',
                      stack: stack_center,
                      styling: "bootstrap3"
                    });
                    $('.invalid-feedback').show().delay(2000).fadeOut('slow');
                }
                $('#btnSave').html('<i class="fa fa-save"></i> Simpan');
                $('#btnSave').attr('disabled',false);
                $('#btnCancel').attr('disabled',false);
            },
            error: function (jqXHR, textStatus, errorThrown){
                alert('Error adding / update data');
                $('#btnSave').html('<i class="fa fa-save"></i> Simpan');
                $('#btnSave').attr('disabled',false);
                if ( typeof error_save == 'function' ) { 
                    error_save();
                }
            }
        });
    }

    function process(){   
        $('#btnSave').html('<i class="fa fa-spinner fa-spin"></i> Menyimpan'); 
        $('#btnSave').attr('disabled',true); 
        $('#btnCancel').attr('disabled',true); 
        
        $.ajax({
            url : baseurl + '/process',
            type: "POST",
            data: $('#form').serialize(),
            dataType: "json",
            success: function(callback){
                if(callback.status){ 
                    new PNotify({
                      title:"Informasi",
                      text: ' Penilaian berhasil',
                      type: "success",
                      delay:'2000',
                      stack: stack_center,
                      styling: "bootstrap3"              
                    });
                    setTimeout(function () {
                        window.location.href = baseurl;
                    }, 3000);
                }else{
                    $('.invalid-feedback').show().delay(2000).fadeOut('slow');
                }
                $('#btnSave').html('<i class="fa fa-save"></i> Simpan');
                $('#btnSave').attr('disabled',false);
                $('#btnCancel').attr('disabled',false);
            },
            error: function (jqXHR, textStatus, errorThrown){
                alert('Error adding / update data');
                $('#btnSave').html('<i class="fa fa-save"></i> Simpan');
                $('#btnSave').attr('disabled',false);
                if ( typeof error_save == 'function' ) { 
                    error_save();
                }
            }
        });
    }
</script>
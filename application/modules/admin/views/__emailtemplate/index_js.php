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
        invoke_editor();
    }

    function add(){
        mode_edit();
        $('#label').html('Tambah Data');
        save_label = 'add';

        invoke_editor();
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
                $('[name="input_tags"]').val(callback.tags);                                
                $('[name="input_template"]').val(callback.template);
            },
            error: function (jqXHR, textStatus, errorThrown){
                alert('Error get data from ajax');
            }
        });        
    }        

    function invoke_editor(){      

        CKEDITOR.replace('template', {
            toolbar : 'Basic',
            filebrowserBrowseUrl: "<?php echo base_url()?>assets/backend/kcfinder/browse.php?type=files"
        });

    }

    function before_save(){
        $('[name="input_template"]').val(CKEDITOR.instances['template'].getData());
    }

</script>
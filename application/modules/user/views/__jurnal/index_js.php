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

                $('[name="input_name"]').val(callback.name);
                $('[name="input_description"]').val(callback.description);
            },
            error: function (jqXHR, textStatus, errorThrown){
                alert('Error get data from ajax');
            }
        });        
    }

</script>
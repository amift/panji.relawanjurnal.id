<script type="text/javascript">
    var jurnal_id = <?php echo seal_it($jurnal_id) ?>

    $(document).ready(function() {
        retrieve_data();
    });

    function retrieve_data(){
        $.ajax({
            url : baseurl + '/get_penilaian/' + jurnal_id,
            type: "GET",
            dataType: "JSON",
            success: function(callback){
                $('[name="input_id"]').val(callback.id);

                $('[name="input_relevansi"]').val(callback.relevansi);
            },
            error: function (jqXHR, textStatus, errorThrown){
                alert('Error get data from ajax');
            }
        });        
    }

</script>
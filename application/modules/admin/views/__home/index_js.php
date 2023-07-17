<script type="text/javascript">

    $('.statDetail').on('click',function(e){
        e.preventDefault();
        id=$(this).data('provinsi_id');
        nama=$(this).text();
        $('.nama_provinsi').html(nama);
        retrieve_data(id);
    })

    function retrieve_data(id){        
        $.ajax({
            url : baseurl + '/detail/' + id,
            type: "GET",
            dataType: "html",
            success: function(callback){
                $('.result').html(callback);
            },
            error: function (jqXHR, textStatus, errorThrown){
                alert('Error get data from ajax');
            }
        });        
    }

</script>
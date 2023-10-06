<script type="text/javascript">

    function get_info(){
        $.ajax({
            url : baseurl + '/get_info',
            type: "GET",
            dataType: "html",
            success: function(callback){
                $('.get_info').html(callback);

						    $('.infoDone').on('click',function(e){
						        e.preventDefault();
						        id=$(this).data('user_id');
						        retrieve_info_done(id);
						    })

						    $('.infoNotYet').on('click',function(e){
						        e.preventDefault();
						        id=$(this).data('user_id');
						        retrieve_info_notyet(id);
						    })

            },
            error: function (jqXHR, textStatus, errorThrown){
                alert('Error get data from ajax');
            }
        });        
    }

    function retrieve_info_done(id){        
        $.ajax({
            url : baseurl + '/retrieve_info_done/' + id,
            type: "GET",
            dataType: "html",
            success: function(callback){
                $('.caption_info').removeClass('text-red').addClass('text-light-blue');
                $('.caption_info').html('<i class="fa fa-check"><i> Jurnal telah dinilai');
                $('.place_info_detail').html(callback);
            },
            error: function (jqXHR, textStatus, errorThrown){
                alert('Error get data from ajax');
            }
        });        
    }

    function retrieve_info_notyet(id){        
        $.ajax({
            url : baseurl + '/retrieve_info_notyet/' + id,
            type: "GET",
            dataType: "html",
            success: function(callback){
            		$('.caption_info').removeClass('text-light-blue').addClass('text-red');
                $('.caption_info').html('<i class="fa fa-close"><i> Jurnal belum dinilai');
                $('.place_info_detail').html(callback);
            },
            error: function (jqXHR, textStatus, errorThrown){
                alert('Error get data from ajax');
            }
        });        
    }    

    $(document).ready(function() {
    	get_info();	    
    });





    // $('.statDetail').on('click',function(e){
    //     e.preventDefault();
    //     id=$(this).data('provinsi_id');
    //     nama=$(this).text();
    //     $('.nama_provinsi').html(nama);
    //     retrieve_data(id);
    // })

    //    function retrieve_data(id){        
    //     $.ajax({
    //         url : baseurl + '/detail/' + id,
    //         type: "GET",
    //         dataType: "html",
    //         success: function(callback){
    //             $('.result').html(callback);
    //         },
    //         error: function (jqXHR, textStatus, errorThrown){
    //             alert('Error get data from ajax');
    //         }
    //     });        
    // } 
</script>
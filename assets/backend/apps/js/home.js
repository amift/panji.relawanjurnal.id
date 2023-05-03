
$('#pagination').on('click','a',function(e){
    e.preventDefault(); 
    var pageno = $(this).attr('data-ci-pagination-page');
    loadPagination(pageno);
    $('html, body').animate({scrollTop:0}, 'slow');
    return false;    
});
loadPagination(0);


function loadPagination(pagno){
    $.ajax({
        url: ci_base_url+'web/home/load_record/'+pagno,
        type: 'get',
        dataType: 'json',
        success: function(response){
            $('#pagination').html(response.pagination);
            createTable(response.result,response.row);
        }
    });
}

function createTable(result,sno){
    $('#postsList').empty();
    console.log(result);
    for(index in result){
        var slug = result[index].slug;
        var tittle = result[index].tittle;
        var body = result[index].body;
            body = body.substr(0, 300) + " ...";
        var tanggal = result[index].tanggal;
        var nama = result[index].nama;
        var view = result[index].view;

        var link ='<a href="'+ci_base_url+'tampil/berita/'+slug+'"">'+tittle+'</a>';
        var pdata =  '<div class="col-sm-12 single-service">';
            pdata += '   <div class="inner">';
            pdata += '        <h4>'+link+'</h4>';
            pdata += '        <hr>';
            pdata += '        <div class="content">';
            pdata +=        body;
            pdata += '        </div>';
            pdata += '        <hr>';
            pdata += '        <span><i class="fa fa-globe"></i> Posted : '+tanggal+', <i class="fa fa-eye"></i> View : '+view+'</span>';
            pdata += '        <span class="pull-right"><i class="fa fa-pencil"></i> By : '+nama+'</span>       ';
            pdata += '   </div>';
            pdata += '</div>';
        $('#postsList').append(pdata);
    }
}
function createTable(result,sno){
    sno = Number(sno);
    $('#postsList tbody').empty();
    for(index in result){
        var id = result[index].kode;
        var title = result[index].nama;
        var content = result[index].nama_singkat;
        sno+=1;
        var tr = "<tr>";
            tr += " <td>"+ sno +"</td>";
            tr += " <td>"+ id +"</td>";
            tr += " <td>"+ title +"</td>";
            tr += " <td>"+ content +"</td>";
            tr += "</tr>";
        $('#postsList tbody').append(tr);
    }
}
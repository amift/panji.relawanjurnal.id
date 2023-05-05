    var save_label;
    var table;

    function mode_default(){
        $('#form')[0].reset();
        $('#section-data').fadeIn(200);
        $('#section-form').fadeOut(200);
        $('.form-group').removeClass('has-error');
        $('.invalid-feedback').html('');
    }

    function mode_edit(){    
        $('#section-data').fadeOut(200);
        $('#section-form').fadeIn(200);
        $('.form-group').removeClass('has-error');
        $('.invalid-feedback').html('');
    }

    function list(){
        table = $('#data_table').DataTable({
            aLengthMenu: [[5, 10, 20, 50], [5, 10, 20, 50]],
            processing: true,
            serverSide: true,
            order: [],
            ajax: {
                url: baseurl + '/list',
                type: "POST",
                error: function (xhr, error, thrown) {
                    Swal({
                        title   : 'Session Expired',
                        text    : 'Sesi anda sudah berakhir, Silahkan login kembali',
                        type    : 'warning'
                    }).then((result) => {
                        window.location.href = location.host;
                    });
                },
            },
            columnDefs: [
                            { targets: [0,1], orderable: false},
                            { targets: [0], className: 'dt-center'}
                        ],
            language: {
                paginate: {
                    first:      '<i class="fa fa-fast-backward"></i>',
                    last:       '<i class="fa fa-fast-forward"></i>',
                    next:       '<i class="fa fa-forward"></i>',
                    previous:   '<i class="fa fa-backward"></i>'
                },
                search:         "Search: <span style='margin-left:5px' class='pull-right'><button title='Refresh' class='btn btn-sm btn-success'  onclick='reload()'><i class='fa fa-refresh'></i></button></span>",
                
            },
        });

        table.on( 'draw', function () {            
            table.column(0, { page: 'current' }).nodes().each( function (cell, i) {
                cell.innerHTML = i + 1 + table.page.info().start;
            } );            
        } );        
    }

    function reload(){
        $("#data_table").DataTable().search('').draw()
    }

    function save(){
        var url, method;

        if ( typeof before_save == 'function' ) { 
            before_save();
        }

        mode_edit();
        $('#btnSave').html('<i class="fa fa-spinner fa-spin"></i> Menyimpan'); 
        $('#btnSave').attr('disabled',true); 
        $('#btnCancel').attr('disabled',true); 

        if(save_label == 'add') {
            url = baseurl + '/add';
            method = 'Tambah data';
        } else {
            url = baseurl + '/update';
            method = 'Edit data'
        }
        
        $.ajax({
            url : url,
            type: "POST",
            data: $('#form').serialize(),
            dataType: "json",
            success: function(callback){
                if(callback.status){ 
                    $('#modal_form').modal('hide');
                    reload();
                    mode_default();
                    new PNotify({
                      title:"Informasi",
                      text: method+' berhasil',
                      type: "success",
                      delay:'2000',
                      stack: stack_center,
                      styling: "bootstrap3"
                    });
                    if ( typeof success_save == 'function' ) { 
                        success_save();
                    }
                }else{
                    $.each(callback.errors, function(key, value){
                        $('[name="'+key+'"]').addClass('is-invalid'); 
                        $('[name="'+key+'"]').next().text(value); 
                        if(value == ""){
                            $('[name="'+key+'"]').removeClass('is-invalid');
                            $('[name="'+key+'"]').addClass('is-valid');
                        }
                    });
                    $('.invalid-feedback').show().delay(2000).fadeOut('slow');
                    if ( typeof failed_save == 'function' ) { 
                        failed_save();
                    }
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

        $('#form input, #form textarea').on('keyup', function(){
            $(this).removeClass('is-valid is-invalid');
        });
        $('#form select').on('change', function(){
            $(this).removeClass('is-valid is-invalid');
        });
    }

    function del(id){
        Swal({
            title: 'Anda Yakin ?',
            text: "Data akan dihapus permanen (tidak dapat dikembalikan)!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Ya, hapus data ini!',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if(result.value) {
                $.ajax({
                    url : baseurl + '/delete/' + id,
                    type: "POST",
                    dataType: "JSON",
                    success: function(callback){
                        if(callback.is_safe){ 
                            if(callback.status){ 
                                reload();
                                new PNotify({
                                  title:"Informasi",
                                  text: 'Hapus data berhasil',
                                  type: "success",
                                  delay:'2000',
                                  stack: stack_center,
                                  styling: "bootstrap3"
                                });
                            }else{
                                Swal({
                                    title   : 'Peringatan',
                                    text    : 'Terjadi kesalahan callback status',
                                    type    : 'danger'
                                });
                            }
                        }else{
                            Swal({
                                title   : 'Peringatan',
                                text    : 'Data Pendukung ini tidak dapat dihapus karena masih digunakan pada Sistem',
                                type    : 'warning'
                            });
                        }
                    },
                    error: function (jqXHR, textStatus, errorThrown){
                        alert('Terjadi kesalahan menghapus data ! ');
                    }
                });
            }
        });
    }   
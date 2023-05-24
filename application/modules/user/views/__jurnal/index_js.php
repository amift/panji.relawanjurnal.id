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

                $('[name="input_nama"]').val(callback.nama);
                $('[name="input_eissn"]').val(callback.eissn);
                $('[name="input_pissn"]').val(callback.pissn);
                $('[name="input_penerbit"]').val(callback.penerbit);
                $('[name="input_provinsi_id"]').val(callback.provinsi_id);
                $('[name="input_tahun_terbit"]').val(callback.tahun_terbit);
                $('[name="input_akre_sinta"]').val(callback.akre_sinta);
                $('[name="input_lisensi_id"]').val(callback.lisensi_id);
                $('[name="input_frek_terbitan_id"]').val(callback.frek_terbitan_id);
                $('[name="input_waktu_review_id"]').val(callback.waktu_review_id);
                $('[name="input_nama_editor"]').val(callback.nama_editor);
                $('[name="input_telepon_editor"]').val(callback.telepon_editor);
                $('[name="input_email_editor"]').val(callback.email_editor);
                $('[name="input_url"]').val(callback.url);
                $('[name="input_url_editor"]').val(callback.url_editor);
                $('[name="input_kontak"]').val(callback.kontak);
                $('[name="input_reviewer"]').val(callback.reviewer);
                $('[name="input_etika"]').val(callback.etika);
                $('[name="input_statistik"]').val(callback.statistik);
                $('[name="input_indeksasi"]').val(callback.indeksasi);
                $('[name="input_oai"]').val(callback.oai);
                $('[name="input_doi"]').val(callback.doi);
            },
            error: function (jqXHR, textStatus, errorThrown){
                alert('Error get data from ajax');
            }
        });        
    }

</script>
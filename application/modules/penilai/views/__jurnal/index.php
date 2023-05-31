<?php $this->load->view('tpl_header'); ?>


<div class="content-wrapper">
    <section class="content-header">
      <h1>
        Jurnal
        <small>List Jurnal</small>
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> Penilai</li>
        <li>Jurnal</li>
      </ol>
    </section>      
    <section class="content" id="section-data">
        <div class="panel panel-default wrap-table">
            <div class="panel-body">
                <table class="table table-striped table-bordered" id="data_table">
                    <thead>
                        <tr>               
                            <th style="width:20px">No</th>
                            <th style="width:70px">Action</th>
                            <th>Penginput</th>
                            <th>Informasi Umum</th>
                            <th>Data Jurnal</th>                            
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </section>

    <section class="content" id="section-form" style="display: none;">
        <div class="panel panel-default">
            <div class="panel-body">

                <form action="#" id="form">
                    <input type="hidden" value="" name="input_id">
                    <div class="form-body">
                        <h3><div id="label"></div></h3>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <?php
                                        echo "Nama Jurnal";
                                        echo form_input('input_nama', set_value('input_nama', '', FALSE), 'class="form-control" ');
                                    ?>
                                    <span class="invalid-feedback"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group text-center">
                                    <?php
                                        echo "E-ISSN";
                                        echo form_input('input_eissn', set_value('input_eissn', '', FALSE), 'class="form-control text-center" ');
                                    ?>
                                    <span class="invalid-feedback"></span>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group text-center">
                                    <?php
                                        echo "P-ISSN";
                                        echo form_input('input_pissn', set_value('input_pissn', '', FALSE), 'class="form-control text-center" ');
                                    ?>
                                    <span class="invalid-feedback"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <?php
                                        echo "Penerbit";
                                        echo form_input('input_penerbit', set_value('input_penerbit', '', FALSE), 'class="form-control" ');
                                    ?>
                                    <span class="invalid-feedback"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php 
                                        echo "Provinsi";
                                        echo form_dropdown('input_provinsi_id',$arr_provinsi,set_value('input_provinsi_id','',FALSE),'class="form-control" ');
                                    ?>
                                    <span class="invalid-feedback"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <?php
                                        echo "Tahun terbit pertama kali";
                                        echo form_input('input_tahun_terbit', set_value('input_tahun_terbit', '', FALSE), 'class="form-control" ');
                                    ?>
                                    <span class="invalid-feedback"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <?php 
                                        echo "Akreditasi SINTA";
                                        echo form_dropdown('input_akre_sinta',$arr_akre_sinta,set_value('input_akre_sinta','',FALSE),'class="form-control" ');
                                    ?>
                                    <span class="invalid-feedback"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <?php 
                                        echo "Jenis Lisensi";
                                        echo form_dropdown('input_lisensi_id',$arr_lisensi,set_value('input_lisensi_id','',FALSE),'class="form-control" ');
                                    ?>
                                    <span class="invalid-feedback"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <?php 
                                        echo "Frekuensi Terbitan";
                                        echo form_dropdown('input_frek_terbitan_id',$arr_frek_terbitan,set_value('input_frek_terbitan_id','',FALSE),'class="form-control" ');
                                    ?>
                                    <span class="invalid-feedback"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <?php 
                                        echo "Waktu Review";
                                        echo form_dropdown('input_waktu_review_id',$arr_waktu_review,set_value('input_waktu_review_id','',FALSE),'class="form-control" ');
                                    ?>
                                    <span class="invalid-feedback"></span>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-success">
                          <div class="panel-body">
                              <span style="font-size: 18px"><b>Data Editor</b></span>
                              <hr>
                              <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <?php
                                            echo "Nama";
                                            echo form_input('input_nama_editor', set_value('input_nama_editor', '', FALSE), 'class="form-control" ');
                                        ?>
                                        <span class="invalid-feedback"></span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <?php
                                            echo "Telepon";
                                            echo form_input('input_telepon_editor', set_value('input_telepon_editor', '', FALSE), 'class="form-control" ');
                                        ?>
                                        <span class="invalid-feedback"></span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <?php
                                            echo "Email";
                                            echo form_input('input_email_editor', set_value('input_email_editor', '', FALSE), 'class="form-control" ');
                                        ?>
                                        <span class="invalid-feedback"></span>
                                    </div>
                                </div>
                              </div>
                          </div>
                        </div>
                        <div class="panel panel-success">
                          <div class="panel-body">
                              <span style="font-size: 18px"><b>Data Jurnal</b></span>
                              <hr>
                              <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <?php
                                            echo "URL Jurnal";
                                            echo form_input('input_url', set_value('input_url', '', FALSE), 'class="form-control" ');
                                        ?>
                                        <span class="invalid-feedback"></span>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <?php
                                            echo "URL Editor";
                                            echo form_input('input_url_editor', set_value('input_url_editor', '', FALSE), 'class="form-control" ');
                                        ?>
                                        <span class="invalid-feedback"></span>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <?php
                                            echo "URL Kontak";
                                            echo form_input('input_kontak', set_value('input_kontak', '', FALSE), 'class="form-control" ');
                                        ?>
                                        <span class="invalid-feedback"></span>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <?php
                                            echo "URL Reviewer";
                                            echo form_input('input_reviewer', set_value('input_reviewer', '', FALSE), 'class="form-control" ');
                                        ?>
                                        <span class="invalid-feedback"></span>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <?php
                                            echo "URL Etika";
                                            echo form_input('input_etika', set_value('input_etika', '', FALSE), 'class="form-control" ');
                                        ?>
                                        <span class="invalid-feedback"></span>
                                    </div>
                                </div> 
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <?php
                                            echo "URL Statistik";
                                            echo form_input('input_statistik', set_value('input_statistik', '', FALSE), 'class="form-control" ');
                                        ?>
                                        <span class="invalid-feedback"></span>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <?php
                                            echo "URL oai";
                                            echo form_input('input_oai', set_value('input_oai', '', FALSE), 'class="form-control" ');
                                        ?>
                                        <span class="invalid-feedback"></span>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <?php
                                            echo "URL DOI";
                                            echo form_input('input_doi', set_value('input_doi', '', FALSE), 'class="form-control" ');
                                        ?>
                                        <span class="invalid-feedback"></span>
                                    </div>
                                </div>
                              </div>
                          </div>
                        </div>                        
                    </div>
                </form>

            </div>
            <div class="panel-footer">
                <button type="button" class="btn btn-warning" id="btnCancel" onclick="cancel()">
                    <i class="fa fa-refresh"></i> 
                    Batal
                </button>
                <button type="button" class="btn btn-primary" id="btnSave" onclick="save()">
                    <i class="fa fa-save"></i>
                    Simpan
                </button>
            </div>
        </div>
    </section>            
</div>

<?php $this->load->view('tpl_footer'); ?>

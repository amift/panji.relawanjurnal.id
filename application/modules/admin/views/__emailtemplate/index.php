<?php $this->load->view('tpl_header'); ?>
<?php $this->load->view('tpl_navbar'); ?>
<?php $this->load->view('tpl_sidebar'); ?>

<div class="content-wrapper">
    <section class="content-header">
      <h1>
        Template Email
        <small>Pengaturan Template Email</small>
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> Admin</li>
        <li>Template Email</li>
      </ol>
    </section>
    <section class="content" id="section-data">
        <div class="panel panel-default wrap-table">
            <div class="panel-body">
                <button title="New Data" class="btn btn-sm btn-primary" onclick="add()"><i class="fa fa-plus"></i> Data baru</button>
                <hr>                        
                <table class="table table-striped table-bordered" id="data_table">
                    <thead>
                        <tr>               
                            <th style="width:20px">No</th>
                            <th style="width:70px">Action</th>
                            <th>Name</th>
                            <th>Tags</th>
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
                            <div class="col-sm-3">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <?php
                                                echo "Nama";
                                                echo form_input('input_name', set_value('input_name', '', FALSE), 'class="form-control disabled" ');

                                            ?>
                                            <span class="invalid-feedback"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <?php 
                                                echo "Informasi Tags yg dapat digunakan";
                                                echo form_textarea('input_tags',set_value('input_tags','',FALSE),'class="form-control disabled" ');
                                            ?>
                                            <span class="invalid-feedback"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-9">                                        
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <?php
                                                echo "Template";                                            
                                                echo form_textarea('input_template',set_value('input_template','',FALSE),'class="form-control" id="template" ');
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

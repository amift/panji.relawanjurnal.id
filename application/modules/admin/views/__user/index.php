<?php $this->load->view('tpl_header'); ?>
<?php $this->load->view('tpl_navbar'); ?>
<?php $this->load->view('tpl_sidebar'); ?>

<div class="content-wrapper">
    <section class="content-header">
      <h1>
        User
        <small>Pengelolaan User</small>
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> Admin</li>
        <li>User</li>
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
                            <th>Username</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Telepon</th>
                            <th>Provinsi</th>
                            <th>Last Login</th>
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
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php
                                        echo "Username";
                                        echo form_input('input_username', set_value('input_username', '', FALSE), 'class="form-control" ');
                                    ?>
                                    <span class="invalid-feedback"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <?php
                                        echo "Nama";
                                        echo form_input('input_name', set_value('input_name', '', FALSE), 'class="form-control" ');
                                    ?>
                                    <span class="invalid-feedback"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php
                                        echo "Email";
                                        echo form_input('input_email', set_value('input_email', '', FALSE), 'class="form-control" ');
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
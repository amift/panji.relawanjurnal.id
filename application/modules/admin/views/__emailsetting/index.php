
<?php $this->load->view('tpl_header'); ?>
<?php $this->load->view('tpl_navbar'); ?>
<?php $this->load->view('tpl_sidebar'); ?>

<div class="content-wrapper">
    <section class="content-header">
      <h1>
        Setting Email
        <small>Pengaturan Setting Email</small>
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> Admin</li>
        <li>Setting Email</li>
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
                            <th>Description</th>
                            <th>Host:port</th>
                            <th>Smtp Secure</th>
                            <th>Smtp Debug</th>
                            <th>Smtp Auth</th>
                            <th>Username <br>Password</th>
                            <th>Sender_name</th>
                            <th>Active</th>
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
                            <div class="col-md-6">
                                <div class="form-group">
                                    <?php
                                        echo "Keterangan";
                                        echo form_input('input_description', set_value('input_description', '', FALSE), 'class="form-control" ');
                                    ?>
                                    <span class="invalid-feedback"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <?php
                                        echo "Host";
                                        echo form_input('input_host', set_value('input_host', '', FALSE), 'class="form-control" ');
                                    ?>
                                    <span class="invalid-feedback"></span>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <?php
                                        echo "PORT";
                                        echo form_input('input_port', set_value('input_port', '', FALSE), 'class="form-control" ');
                                    ?>
                                    <span class="invalid-feedback"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <?php
                                        echo "SMTP Secure";
                                        echo form_input('input_smtp_secure', set_value('input_smtp_secure', '', FALSE), 'class="form-control" ');
                                    ?>
                                    <span class="invalid-feedback"></span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <?php
                                        echo "SMTP Debug";
                                        echo form_input('input_smtp_debug', set_value('input_smtp_debug', '', FALSE), 'class="form-control" ');
                                    ?>
                                    <span class="invalid-feedback"></span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <?php
                                        echo "SMTP Auth";
                                        echo form_input('input_smtp_auth', set_value('input_smtp_auth', '', FALSE), 'class="form-control" ');
                                    ?>
                                    <span class="invalid-feedback"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <?php
                                        echo "Username";
                                        echo form_input('input_username', set_value('input_username', '', FALSE), 'class="form-control" ');
                                    ?>
                                    <span class="invalid-feedback"></span>
                                </div>
                            </div>                                
                            <div class="col-md-3">
                                <div class="form-group">
                                    <?php
                                        echo "Password";
                                        echo form_input('input_password', set_value('input_password', '', FALSE), 'class="form-control" ');
                                    ?>
                                    <span class="invalid-feedback"></span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <?php
                                        echo "Name sender";
                                        echo form_input('input_sender_name', set_value('input_sender_name', '', FALSE), 'class="form-control" ');
                                    ?>
                                    <span class="invalid-feedback"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <?php
                                        echo "Is Active";
                                        echo form_input('input_active', set_value('input_active', '', FALSE), 'class="form-control" ');
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
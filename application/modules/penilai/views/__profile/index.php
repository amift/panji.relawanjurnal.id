<?php $this->load->view('tpl_header'); ?>

<div class="content-wrapper">
    <section class="content-header">
      <h1>
        Profile
        <small>Profile Saya</small>
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> Penilai</li>
        <li>User</li>
      </ol>
    </section>
    <section class="content" id="section-data">
        <div class="panel panel-default wrap-table">
            <div class="panel-body">            
                <div class="row">
                    <div class="col-md-4">
                        <div class="card card-no-border text-center p-3">
                            <div class="card-body">
                                <form action="#" id="form_file">
                                    <input type="hidden" name="app_key" value="ed1c6380-93bb-427e-bf73-57bd6bde72c7">                                    
                                    <img id="foto" width="120" class="img-responsive center-block rounded-circle img-thumbnail shadow" src="<?php echo IMG_URL.$myprofile->foto ?>" alt=""><br>
                                    <label id="changefoto" for="file-upload" class="custom-file-upload">
                                        <i class="fa fa-camera fa-2x"></i>
                                    </label>
                                    <input id="file-upload" type="file" name="input_file"> <br>
                                    jpg, png | 200 kb Maksimal <br>
                                    Klik icon untuk mengganti foto <br>
                                    <span id="file-msg"></span>
                                </form>
                            </div>                        
                        </div>                    
                    </div>
                    <div class="col-sm-8">
                        <dl class="dl-horizontal">
                            <dt>Username</dt>       <dd><?php echo $myprofile->username?></dd>
                            <dt>Nama</dt>           <dd><?php echo $myprofile->name?></dd>
                            <dt>Email</dt>          <dd><?php echo $myprofile->email?></dd>
                            <dt>Provinsi</dt>       <dd><?php echo $myprofile->provinsi_nama?></dd>
                            <dt>Asal Institusi</dt> <dd><?php echo $myprofile->institusi?></dd>
                            <dt>telepon</dt>        <dd><?php echo $myprofile->telepon?></dd>
                        </dl>
                        <div class="col-sm-3 col-sm-offset-2">                            
                            <a class ="btn btn-sm btn-primary btn-block" href="javascript:void(0)" title="Edit" onclick="edit(<?php echo seal_it($myprofile->id) ?>)"><i class="fa fa-edit"></i> Edit</a> 
                        </div>
                    </div>
                </div>
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
                                        echo "Telepon";
                                        echo form_input('input_telepon', set_value('input_telepon', '', FALSE), 'class="form-control" ');
                                    ?>
                                    <span class="invalid-feedback"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php
                                        echo "Asal Institusi";
                                        echo form_input('input_institusi', set_value('input_institusi', '', FALSE), 'class="form-control" ');
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
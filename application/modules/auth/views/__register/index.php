<?php $this->load->view('tpl_header');?>
<?php $this->load->view('tplg_navbar');?>  <!-- globa; navbar  -->


  <header id="head" class="secondary"></header>

  <!-- container -->
  <div class="container">

    <ol class="breadcrumb">
      <li><a href="index.html">Home</a></li>
      <li class="active">Daftar</li>
    </ol>

    <div class="row">
      
      <!-- Article main content -->
      <article class="col-xs-12 maincontent">
        
        <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
          <div class="panel panel-default">
            <div class="panel-body">
              <h3 class="thin text-center">Buat akun baru</h3>
              <p class="text-center text-muted">Sudah memiliki akun, silahkan <a href="<?php echo base_url('login') ?>">Login</a>. Jika anda belum memiliki akun, lengkapi data berikut dengan benar untuk membuat akun baru. </p>
              <hr>

                <form action="#" id="form">
                    <input type="hidden" value="" name="input_id">
                    <div class="form-body">
                        <h3><div id="label"></div></h3>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <?php
                                        echo "Nama lengkap tanpa gelar";
                                        echo form_input('input_name', set_value('input_name', '', FALSE), 'class="form-control" ');
                                    ?>
                                    <span class="invalid-feedback"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <?php
                                        echo "Username";
                                        echo form_input('input_username', set_value('input_username', '', FALSE), 'class="form-control" ');
                                    ?>
                                    <span class="invalid-feedback"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <?php
                                        echo "Password";
                                        echo form_password('input_password', set_value('input_password', '', FALSE), 'class="form-control" ');
                                    ?>
                                    <span class="invalid-feedback"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <?php
                                        echo "Email aktif";
                                        echo form_input('input_email', set_value('input_email', '', FALSE), 'class="form-control" ');
                                    ?>
                                    <span class="invalid-feedback"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <?php
                                        echo "No HP";
                                        echo form_input('input_telepon', set_value('input_telepon', '', FALSE), 'class="form-control" ');
                                    ?>
                                    <span class="invalid-feedback"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <?php
                                        echo "Institusi";
                                        echo form_input('input_institusi', set_value('input_institusi', '', FALSE), 'class="form-control" ');
                                    ?>
                                    <span class="invalid-feedback"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
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
                <hr>
                <div class="text-center">
                    <a href="<?php echo base_url() ?>" class="btn btn-action">
                        <i class="fa fa-refresh"></i> 
                        Batal                        
                    </a>
                    <button type="button" class="btn btn-action" id="btnReg" onclick="reg()">
                        <i class="fa fa-book"></i>
                        Daftar
                    </button>
                </div>
            </div>
          </div>

        </div>
        
      </article>
      <!-- /Article -->

    </div>
  </div>  <!-- /container -->

<?php  $this->load->view('tplg_footer'); ?> <!-- footer global -->
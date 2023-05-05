<?php $this->load->view('tpl_header');?>
<?php $this->load->view('tplg_navbar');?>


  <header id="head" class="secondary"></header>

  <!-- container -->
  <div class="container">

    <ol class="breadcrumb">
      <li><a href="index.html">Home</a></li>
      <li class="active">Login</li>
    </ol>

    <div class="row">
      
      <!-- Article main content -->
      <article class="col-xs-12 maincontent">
        
        <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
          <div class="panel panel-default">
            <div class="panel-body">
              <h3 class="thin text-center">Login untuk masuk ke sistem</h3>
              <p class="text-center text-muted">Jika anda belum memiliki akun silahkan <a href="<?php echo base_url('register')?>">Daftar</a></p>
              <hr>
              
                <form action="#" id="form">
                    <input type="hidden" value="" name="input_id">
                    <div class="form-body">
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group text-center">
                                    <?php
                                        echo "Username / Email";
                                        echo form_input('input_username', set_value('input_username', '', FALSE), 'class="form-control text-center" ');
                                    ?>
                                    <span class="invalid-feedback"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group text-center">
                                    <?php
                                        echo "Password";
                                        echo form_password('input_password', set_value('input_password', '', FALSE), 'class="form-control text-center" ');
                                    ?>
                                    <span class="invalid-feedback"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-md-7 text-center">
              <b><a href="<?php echo base_url('forgot') ?>">Lupa Password?</a></b>
            </div>
            <div class="col-md-4 text-center">
                <button type="button" class="btn btn-action" id="btnLogin" onclick="login()">
                    <i class="fa fa-key"></i>
                    Login
                </button>                    
            </div>
          </div>

        </div>
        
      </article>
      <!-- /Article -->

    </div>
  </div>  <!-- /container -->

<?php  $this->load->view('tplg_footer'); ?>
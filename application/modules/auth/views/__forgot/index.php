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
        
        <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
          <div class="panel panel-default">
            <div class="panel-body">
              <h3 class="thin text-center">Lupa Password</h3>
              <p class="text-center text-muted">Jika anda belum memiliki akun silahkan <a href="<?php echo base_url('register')?>">Daftar</a></p>
              <hr>
              
              <form action="#" id="form">
                    <input type="hidden" value="" name="input_id">
                    <div class="form-body">
                        <hr>
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2">
                                <div class="form-group text-center">
                                    <?php
                                        echo "Email";
                                        echo form_input('input_email', set_value('input_email', '', FALSE), 'class="form-control text-center" ');
                                    ?>
                                    <span class="invalid-feedback"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

                <hr>
                <div class="row">
                  <div class="col-lg-12 text-center">
                      <button type="button" class="btn btn-action" id="btnKirim" onclick="forgot()">
                          <i class="fa fa-key"></i>
                          Kirim
                      </button>                    
                  </div>
                </div>
            </div>
          </div>

        </div>
        
      </article>
      <!-- /Article -->

    </div>
  </div>  <!-- /container -->

<?php  $this->load->view('tplg_footer'); ?>
<?php $this->load->view('tpl_header'); ?>

<div class="content-wrapper">
    <section class="content" id="section-data">
        <div class="panel panel-default wrap-table">
            <div class="panel-body">
                <div class="row">
                    <div class="col-xs-12">
                      <h3>Selamat datang <b><?php echo $this->session->userdata('ses_name') ?></b> sebagai Pengusul</h3>
                    </div>                      
                </div>
                <hr>

                <div class="row">
                    <div class="col-md-3 col-sm-6 col-xs-12">
                      <div class="info-box">
                        <span class="info-box-icon bg-aqua"><i class="fa fa-calendar-o"></i></span>
                        <div class="info-box-content">
                          <span>Jurnal yg saya</span>
                          <span class="info-box-number"><?php echo $jurnal ?></span>
                        </div>
                        <!-- /.info-box-content -->
                      </div>
                      <!-- /.info-box -->
                    </div>

                    <!-- /.col -->
                    <div class="col-md-3 col-sm-6 col-xs-12">
                      <div class="info-box">
                        <span class="info-box-icon bg-green"><i class="fa fa-check-circle"></i></span>

                        <div class="info-box-content">
                          <span>Telah dinilai</span>
                          <span class="info-box-number"><?php echo $jurnal_dinilai ?></span>
                        </div>
                        <!-- /.info-box-content -->
                      </div>
                      <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                </div>    
            </div>
        </div>
    </section>
</div>

<?php $this->load->view('tpl_footer'); ?>

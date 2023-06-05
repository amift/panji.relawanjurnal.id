<?php $this->load->view('tpl_header'); ?>

<div class="content-wrapper">
    <section class="content" id="section-data">
        <div class="panel panel-default wrap-table">
            <div class="panel-body">
                <div class="row">
                    <div class="col-xs-12">
                      <h3>Selamat datang Tim Penilai <br><b><?php echo $this->session->userdata('ses_name') ?></b></h3>
                    </div>                      
                </div>
                <hr>
                <div class="row">
                    <div class="col-lg-3 col-xs-6">
                      <div class="small-box bg-aqua">
                        <div class="inner">
                          <h3><?php echo $myjurnal; ?></h3>
                          <p>Jurnal yang diajukan</p>
                        </div>
                        <div class="icon">
                          <i class="fa fa-book"></i>
                        </div>
                        <a href="<?php echo base_url('penilai/jurnal') ?> " class="small-box-footer">Lihat <i class="fa fa-arrow-circle-right"></i></a>
                      </div>
                    </div>
                    <div class="col-lg-3 col-xs-6">
                      <div class="small-box bg-green">
                        <div class="inner">
                          <h3><?php echo $jurnal_dinilai; ?></h3>
                          <p>Jurnal yang telah dinilai</p>
                        </div>
                        <div class="icon">
                          <i class="fa fa-book"></i>
                        </div>
                        <a href="<?php echo base_url('penilai/jurnal') ?> " class="small-box-footer">Lihat <i class="fa fa-arrow-circle-right"></i></a>
                      </div>
                    </div>                 
                </div>
            </div>
        </div>
    </section>
</div>

<?php $this->load->view('tpl_footer'); ?>

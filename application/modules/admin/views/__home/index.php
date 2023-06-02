
<?php $this->load->view('tpl_header'); ?>
<?php $this->load->view('tpl_navbar'); ?>
<?php $this->load->view('tpl_sidebar'); ?>

<div class="content-wrapper">
    <section class="content" id="section-data">
        <div class="panel panel-default wrap-table">
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-3 col-xs-6">
                      <div class="small-box bg-aqua">
                        <div class="inner">
                          <h3><?php echo $jurnal; ?></h3>
                          <p>Jurnal diajukan</p>
                        </div>
                        <div class="icon">
                          <i class="fa fa-book"></i>
                        </div>
                        <a href="<?php echo base_url('admin/jurnal') ?> " class="small-box-footer">Lihat <i class="fa fa-arrow-circle-right"></i></a>
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
                        <a href="<?php echo base_url('admin/jurnal') ?> " class="small-box-footer">Lihat <i class="fa fa-arrow-circle-right"></i></a>
                      </div>
                    </div>
                    <div class="col-lg-3 col-xs-6">
                      <div class="small-box bg-yellow">
                        <div class="inner">
                          <h3><?php echo $penilai; ?></h3>
                          <p>Jumlah Penilai</p>
                        </div>
                        <div class="icon">
                          <i class="fa fa-users"></i>
                        </div>
                        <a href="<?php echo base_url('admin/user') ?> " class="small-box-footer">Lihat <i class="fa fa-arrow-circle-right"></i></a>
                      </div>
                    </div>
                    <div class="col-lg-3 col-xs-6">
                      <div class="small-box bg-red">
                        <div class="inner">
                          <h3><?php echo $pengusul; ?></h3>
                          <p>Jumlah Pengusul</p>
                        </div>
                        <div class="icon">
                          <i class="fa fa-users"></i>
                        </div>
                        <a href="<?php echo base_url('admin/user') ?> " class="small-box-footer">Lihat <i class="fa fa-arrow-circle-right"></i></a>
                      </div>
                    </div>                    
                </div>             
            </div>
        </div>
    </section>
</div>

<?php $this->load->view('tpl_footer'); ?>

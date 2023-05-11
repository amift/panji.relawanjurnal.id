<?php $this->load->view('tpl_header'); ?>

<div class="content-wrapper">
    <section class="content" id="section-data">
        <div class="panel panel-default wrap-table">
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-3 col-sm-6 col-xs-12">
                      <div class="info-box">
                        <span class="info-box-icon bg-aqua"><i class="fa fa-book"></i></span>
                        <div class="info-box-content">
                          <span class="info-box-text">Jurnal Saya</span>
                          <span class="info-box-number"><?php echo $myjurnal; ?> </span>
                        </div>
                      </div>
                    </div>

<!--                     <div class="col-md-3 col-sm-6 col-xs-12">
                      <div class="info-box">
                        <span class="info-box-icon bg-green"><i class="fa fa-pencil-square-o"></i></span>
                        <div class="info-box-content">
                          <span class="info-box-text">Pengajuan</span>
                          <span class="info-box-number">1</span>
                        </div>
                      </div>
                    </div> -->
                </div>                

            </div>
        </div>
    </section>
</div>

<?php $this->load->view('tpl_footer'); ?>

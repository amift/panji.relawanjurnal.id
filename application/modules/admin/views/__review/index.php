<?php $this->load->view('tpl_header'); ?>
<?php $this->load->view('tpl_navbar'); ?>
<?php $this->load->view('tpl_sidebar'); ?>


<div class="content-wrapper">
    <section class="content-header">
      <h1>
        Reviewer Jurnal
        <small>Pembagian Reviewer Jurnal</small>
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> Admin</li>
        <li>Reviewer Jurnal</li>
      </ol>
    </section>      
    <section class="content" id="section-data">
        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="fa fa-calendar-o"></i></span>
                <div class="info-box-content">
                  <span>Jumlah keseluruhan</span>
                  <span class="info-box-number"><?php echo $jurnal ?></span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-red"><i class="fa fa-calendar-times-o"></i></span>

                <div class="info-box-content">
                  <span>Data tidak lengkap</span>
                  <span class="info-box-number"><?php echo $jurnal_tidak_lengkap ?></span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->

            <!-- fix for small devices only -->
            <div class="clearfix visible-sm-block"></div>

            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-yellow"><i class="fa fa-calendar-check-o"></i></span>

                <div class="info-box-content">
                  <span>Data lengkap</span>
                  <span class="info-box-number"><?php echo $jurnal_lengkap ?></span>
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
        <div class="panel panel-default wrap-table">
            <div class="panel-body">
                <?php debugme($penilai) ?>
                <table class="table table-striped table-bordered" id="data_table">
                    <thead>
                        <tr>               
                            <th style="width:20px">No</th>
                            <th style="width:70px">Pilih Reviewer</th>
                            <th>Informasi Jurnal</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </section>           
</div>

<?php $this->load->view('tpl_footer'); ?>

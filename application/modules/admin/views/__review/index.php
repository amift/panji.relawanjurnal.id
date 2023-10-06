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
            <div class="col-md-5 col-sm-5 col-xs-5">
              <div class="panel panel-default wrap-table">
                  <div class="panel-body">
                    <h3>Reviewer dan Plotting Jurnal</h3>
                    <table class="table table-striped table-hover">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Reviewer</th>
                          <th class="text-center">Jurnal</th>
                          <th class="text-center">Dinilai</th>
                          <th class="text-center">Belum</th>
                        </tr>
                      </thead>
                      <tbody class="get_info">
                      </tbody>
                    </table> 
                  </div>
              </div>
            </div>            
            <div class="col-md-7 col-sm-7 col-xs-7">
              <div class="panel panel-default wrap-table">
                  <div class="panel-body">
                      <h3 class="caption_info"></h3>
                      <div class="place_info_detail">
                        <div class="alert alert-info">
                          <strong>Informasi detail jurnal akan tampil disini, <br>silahkan klik tombol jumlah angka Dinilai atau Belum disamping!</strong>
                        </div>
                      </div>
                  </div>
              </div>        
            </div>            
        </div>
    </section>           
</div>

<?php $this->load->view('tpl_footer'); ?>

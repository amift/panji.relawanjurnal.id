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
                    <table class="table table-striped table-hover">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Reviewer</th>
                          <th>Jurnal</th>
                          <th>Dinilai</th>
                          <th>Belum</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>                    
                          <?php 
                            $no=1;              
                            foreach ($reviewer as $key) {
                              echo '<tr>';
                              echo ' <td>'.$no++.'</td>';
                              echo ' <td style="width:370px">'.$key->name.'</td>';
                              echo ' <td>'.$key->all_jurnal.'</td>';
                              echo ' <td>'.$key->j_done.'</td>';
                              echo ' <td>'.$key->j_notyet.'</td>';
                              echo '</tr>';
                            }
                          ?>
                        </tr>
                      </tbody>
                    </table> 
                  </div>
              </div>        
            </div>          
        </div>
    </section>           
</div>

<?php $this->load->view('tpl_footer'); ?>

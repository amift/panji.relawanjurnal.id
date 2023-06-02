<?php $this->load->view('tpl_header'); ?>


<div class="content-wrapper">
    <section class="content-header">
      <h1>
        Jurnal
        <small>Penilaian Jurnal</small>
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> Penilai</li>
        <li>Penilaian Jurnal</li>
      </ol>
    </section>      
    <section class="content" id="section-data">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="panel panel-primary">
                            <div class="panel-body">
                                <?php  
                                    $url        = ($jurnal->url)?'<a target="_blank" href="'.$jurnal->url.'"><i class="fa fa-globe"></i> URL Jurnal</a>':'URL Jurnal [kosong]';
                                    $url_editor = ($jurnal->url_editor)?'<a target="_blank" href="'.$jurnal->url_editor.'"><i class="fa fa-globe"></i> URL Editor</a>':'URL Editor [kosong]';
                                    $kontak     = ($jurnal->kontak)?'<a target="_blank" href="'.$jurnal->kontak.'"><i class="fa fa-globe"></i> URL Kontak</a>':'URL Kontak [kosong]';
                                    $reviewer   = ($jurnal->reviewer)?'<a target="_blank" href="'.$jurnal->reviewer.'"><i class="fa fa-globe"></i> URL Reviewer</a>':'URL Reviewer [kosong]';
                                    $statistik  = ($jurnal->statistik)?'<a target="_blank" href="'.$jurnal->statistik.'"><i class="fa fa-globe"></i> URL Statistik</a>':'URL Statistik [kosong]';
                                    $etika      = ($jurnal->etika)?'<a target="_blank" href="'.$jurnal->etika.'"><i class="fa fa-globe"></i> URL Etika Publikasi</a>':'URL Etika Publikasi [kosong]';
                                    $indeksasi  = ($jurnal->indeksasi)?'<a target="_blank" href="'.$jurnal->indeksasi.'"><i class="fa fa-globe"></i> URL Indeksasi</a>':'URL Indeksasi [kosong]';
                                    $oai        = ($jurnal->oai)?'<a target="_blank" href="'.$jurnal->oai.'"><i class="fa fa-globe"></i> URL oai</a>':'URL oai [kosong]';
                                    $doi        = ($jurnal->doi)?'<a target="_blank" href="'.$jurnal->doi.'"><i class="fa fa-globe"></i> URL Doi</a>':'URL Doi [kosong]';
                                ?>
                                <div class="text-center">
                                    <img id="foto" width="120" class="img-responsive center-block rounded-circle img-thumbnail shadow" src="<?php echo IMG_URL.$jurnal->user_foto ?>" alt=""><br>
                                    <?php echo $jurnal->user_nama ?>
                                </div>
                                <hr>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Informasi Umum</h3>
                                    </div>
                                    <div class="panel-body">
                                        <b>Nama Jurnal :      </b> <?php echo $jurnal->nama ?> <br>
                                        <b>E-ISSN :           </b> <?php echo $jurnal->eissn ?> <br>
                                        <b>P-ISSN :           </b> <?php echo $jurnal->pissn ?> <br>
                                        <b>Penerbit :         </b> <?php echo $jurnal->penerbit ?> <br>
                                        <b>Provinsi :         </b> <?php echo $jurnal->provinsi_nama ?> <br>
                                        <b>Lisensi :          </b> <?php echo $jurnal->lisensi_nama ?> <br>
                                        <b>Tahun Terbit :     </b> <?php echo $jurnal->tahun_terbit ?> <br>
                                        <b>Frek. terbitan :   </b> <?php echo $jurnal->frek_terbitan_nama ?> <br>
                                        <b>Waktu review :     </b> <?php echo $jurnal->waktu_review_nama ?> <br>
                                        <b>Akreditasi SINTA : </b> <?php echo $jurnal->akre_sinta ?> <br>
                                        <b>Sitasi artikel : </b> <span id="jumlah_sitasi"><?php echo $jurnal->sitasi ?></span> <br>
                                        <hr>
                                        <div class="input-group input-group-sm">                                                
                                            <?php 
                                                echo "Update jumlah Sitasi jika diketahui";
                                                echo form_input('input_jumlah_sitasi','','class="form-control" ');
                                            ?>
                                            <span class="input-group-btn" style="padding-top: 20px">                                                            
                                                <button onclick="update_sitasi(<?php echo seal_it($jurnal_id) ?>)" type="button" class="btn btn-warning btn-flat"><i class="fa fa-save"></i> Simpan</button>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Editor in chief</h3>
                                    </div>
                                    <div class="panel-body">
                                        <b>Nama editor :    </b> <?php echo $jurnal->nama_editor ?><br>
                                        <b>Telepon editor : </b> <?php echo $jurnal->telepon_editor ?><br>
                                        <b>Email editor :   </b> <?php echo $jurnal->email_editor ?><br>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Data Jurnal</h3>
                                    </div>
                                    <div class="panel-body">
                                        <?php echo $url ?> <br>
                                        <?php echo $url_editor ?> <br>
                                        <?php echo $kontak ?>. <br>
                                        <?php echo $reviewer ?> <br>
                                        <?php echo $statistik ?> <br>
                                        <?php echo $etika ?> <br>
                                        <?php echo $indeksasi ?> <br>
                                        <?php echo $oai ?> <br>
                                        <?php echo $doi ?> <br>
                                    </div>
                                </div>
                                <div class="panel panel-primary">
                                <div class="panel-body">
                                    <span style="font-size: 24px"><b>Riwayat Penilaian</b></span>
                                    <hr>
                                    <!-- <?php debugme($penilaian_logs) ?> -->
                                    <ul>
                                        <?php  
                                            $no=1;
                                            foreach ($penilaian_logs as $key) {
                                                // print_r($key);
                                                // echo  '<dt>data_penilaian</dt> <dd>'.$key->data_penilaian.'</dd>';
                                                echo  '<span style="margin-left: -12px;">No. '.$no++.'</span>';
                                                echo  '<li>Penilai '.$key->user_nama.'</li>';
                                                echo  '<li>Tanggal /  Waktu '.$key->tanggal.' - '.$key->waktu.'</li>';
                                                echo '<br>';
                                            }
                                        ?>
                                    </ul>
                                </div>
                            </div> 
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="panel panel-primary">
                            <div class="panel-body">
                                <span style="font-size: 24px"><b><?php echo $jurnal->nama ?></b></span>
                                <hr>
                                <form action="#" id="form">
                                    <input type="hidden" value="<?php echo $jurnal_id ?>" name="input_id">
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <?php 
                                                        echo "Relevansi Jurnal";
                                                        echo form_dropdown('input_relevansi',$arr_grade,set_value('input_relevansi',(empty($penilaian->relevansi))?'':$penilaian->relevansi,FALSE),'class="form-control" ');
                                                    ?>
                                                    <span class="invalid-feedback"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <?php 
                                                        echo "Kualitas Jurnal";
                                                        echo form_dropdown('input_kualitas',$arr_grade,set_value('input_kualitas',(empty($penilaian->kualitas))?'':$penilaian->kualitas,FALSE),'class="form-control" ');
                                                    ?>
                                                    <span class="invalid-feedback"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <?php 
                                                        echo "Kualitas Editorial";
                                                        echo form_dropdown('input_editorial',$arr_grade,set_value('input_editorial',(empty($penilaian->editorial))?'':$penilaian->editorial,FALSE),'class="form-control" ');
                                                    ?>
                                                    <span class="invalid-feedback"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <?php 
                                                        echo "Kualitas Pengeditan";
                                                        echo form_dropdown('input_pengeditan',$arr_grade,set_value('input_pengeditan',(empty($penilaian->pengeditan))?'':$penilaian->pengeditan,FALSE),'class="form-control" ');
                                                    ?>
                                                    <span class="invalid-feedback"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <?php 
                                                        echo "Kualitas peer-review";
                                                        echo form_dropdown('input_peer_review',$arr_grade,set_value('input_peer_review',(empty($penilaian->peer_review))?'':$penilaian->peer_review,FALSE),'class="form-control" ');
                                                    ?>
                                                    <span class="invalid-feedback"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <?php 
                                                        echo "Kualitas tata kelola jurnal";
                                                        echo form_dropdown('input_tata_kelola_jurnal',$arr_grade,set_value('input_tata_kelola_jurnal',(empty($penilaian->tata_kelola_jurnal))?'':$penilaian->tata_kelola_jurnal,FALSE),'class="form-control" ');
                                                    ?>
                                                    <span class="invalid-feedback"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <?php 
                                                        echo "Diversitas penulis";
                                                        echo form_dropdown('input_diver_penulis',$arr_nilai,set_value('input_diver_penulis',(empty($penilaian->diver_penulis))?'':$penilaian->diver_penulis,FALSE),'class="form-control" ');
                                                    ?>
                                                    <span class="invalid-feedback"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <?php 
                                                        echo "Diversitas dewan redaksi";
                                                        echo form_dropdown('input_diver_dewan_redaksi',$arr_nilai,set_value('input_diver_dewan_redaksi',(empty($penilaian->diver_dewan_redaksi))?'':$penilaian->diver_dewan_redaksi,FALSE),'class="form-control" ');
                                                    ?>
                                                    <span class="invalid-feedback"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <?php 
                                                        echo "Sitasi artikel yang terbit";
                                                        echo form_dropdown('input_sitasi',$arr_grade,set_value('input_sitasi',(empty($penilaian->sitasi))?'':$penilaian->sitasi,FALSE),'class="form-control" ');
                                                    ?>
                                                    <span class="invalid-feedback"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-7">
                                                <div class="form-group">
                                                    <?php 
                                                        echo "Inovasi dalam pengelolaan jurnal ilmiah";
                                                        echo form_dropdown('input_inovasi',$arr_grade,set_value('input_inovasi',(empty($penilaian->inovasi))?'':$penilaian->inovasi,FALSE),'class="form-control" ');
                                                    ?>
                                                    <span class="invalid-feedback"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-10">
                                                <div class="form-group">
                                                    <?php 
                                                        echo "Catatan tambahan jika ada";
                                                        echo form_textarea('input_catatan',set_value('input_catatan',(empty($penilaian->catatan))?'':$penilaian->catatan,FALSE),'class="form-control" ');
                                                    ?>
                                                    <span class="invalid-feedback"></span>
                                                </div>
                                            </div>
                                        </div>                                 
                                    </div>
                                </form>

                            </div>
                            <div class="panel-footer">
                                <button type="button" class="btn btn-warning" id="btnCancel" onclick="cancel()">
                                    <i class="fa fa-refresh"></i> 
                                    Batal
                                </button>
                                <button type="button" class="btn btn-primary" id="btnProcess" onclick="process()">
                                    <i class="fa fa-save"></i>
                                    Simpan
                                </button>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>

<?php $this->load->view('tpl_footer'); ?>

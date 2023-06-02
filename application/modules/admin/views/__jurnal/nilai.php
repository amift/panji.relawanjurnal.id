<?php $this->load->view('tpl_header'); ?>
<?php $this->load->view('tpl_navbar'); ?>
<?php $this->load->view('tpl_sidebar'); ?>


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
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="panel panel-primary">
                            <div class="panel-body">
                                <span style="font-size: 24px"><b><?php echo $jurnal->nama ?></b></span>
                                <hr>
                                <dl class="dl-horizontal">
                                    <dt>Relevansi</dt><dd><?php echo $penilaian->relevansi ?></dd>
                                    <dt>Kualitas</dt><dd><?php echo $penilaian->kualitas ?></dd>
                                    <dt>Editorial</dt><dd><?php echo $penilaian->editorial ?></dd>
                                    <dt>Pengeditan</dt><dd><?php echo $penilaian->pengeditan ?></dd>
                                    <dt>Peer-review</dt><dd><?php echo $penilaian->peer_review ?></dd>
                                    <dt>Tata kelola jurnal</dt><dd><?php echo $penilaian->tata_kelola_jurnal ?></dd>
                                    <dt>Diver penulis</dt><dd><?php echo $penilaian->diver_penulis ?></dd>
                                    <dt>Diver dewan_redaksi</dt><dd><?php echo $penilaian->diver_dewan_redaksi ?></dd>
                                    <dt>Sitasi</dt><dd><?php echo $penilaian->sitasi ?></dd>
                                    <dt>Inovasi</dt><dd><?php echo $penilaian->inovasi ?></dd>
                                    <dt>Catatan</dt><dd><?php echo $penilaian->catatan ?></dd>
                                </dl>
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
        </div>
    </section>

</div>

<?php $this->load->view('tpl_footer'); ?>

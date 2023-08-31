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
                                    $url        = ($jurnal->url)?'<a target="_blank" href="'.$jurnal->url.'"><i class="fa fa-globe"></i> Menuju tautan (Link)</a>':'URL Jurnal [kosong]';
                                    $url_editor = ($jurnal->url_editor)?'<a target="_blank" href="'.$jurnal->url_editor.'"><i class="fa fa-globe"></i> Menuju tautan (Link)</a>':'URL Editor [kosong]';
                                    $kontak     = ($jurnal->kontak)?'<a target="_blank" href="'.$jurnal->kontak.'"><i class="fa fa-globe"></i> Menuju tautan (Link)</a>':'URL Kontak [kosong]';
                                    $reviewer   = ($jurnal->reviewer)?'<a target="_blank" href="'.$jurnal->reviewer.'"><i class="fa fa-globe"></i> Menuju tautan (Link)</a>':'URL Reviewer [kosong]';
                                    $statistik  = ($jurnal->statistik)?'<a target="_blank" href="'.$jurnal->statistik.'"><i class="fa fa-globe"></i> Menuju tautan (Link)</a>':'URL Statistik [kosong]';
                                    $etika      = ($jurnal->etika)?'<a target="_blank" href="'.$jurnal->etika.'"><i class="fa fa-globe"></i> Menuju tautan (Link)</a>':'URL Etika Publikasi [kosong]';
                                    $indeksasi  = ($jurnal->indeksasi)?'<a target="_blank" href="'.$jurnal->indeksasi.'"><i class="fa fa-globe"></i> Menuju tautan (Link)</a>':'URL Indeksasi [kosong]';
                                    $oai        = ($jurnal->oai)?'<a target="_blank" href="'.$jurnal->oai.'"><i class="fa fa-globe"></i> Menuju tautan (Link)</a>':'URL oai [kosong]';
                                    $doi        = ($jurnal->doi)?'<a target="_blank" href="'.$jurnal->doi.'"><i class="fa fa-globe"></i> Menuju tautan (Link)</a>':'URL Doi [kosong]';
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
                                        <table class="table table-striped table-hover">
                                            <tbody>
                                                <tr>
                                                    <td><b>Nama Jurnal</b></td>
                                                    <td><?php echo $jurnal->nama ?></td>
                                                </tr>
                                                <tr>
                                                    <td><b>E-ISSN</b></td>
                                                    <td><?php echo $jurnal->eissn ?></td>
                                                </tr>
                                                <tr>
                                                    <td><b>P-ISSN</b></td>
                                                    <td><?php echo $jurnal->pissn ?></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Penerbit</b></td>
                                                    <td><?php echo $jurnal->penerbit ?>
                                                </tr>
                                                <tr>
                                                    <td><b>Provinsi</b></td>
                                                    <td><?php echo $jurnal->provinsi_nama ?>
                                                </tr>
                                                <tr>
                                                    <td><b>Lisensi</b></td>
                                                    <td><?php echo $jurnal->lisensi_nama ?>
                                                </tr>
                                                <tr>
                                                    <td><b>Tahun Terbit</b></td>
                                                    <td><?php echo $jurnal->tahun_terbit ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Frek. terbitan </td>
                                                    <td><?php echo $jurnal->frek_terbitan_nama ?></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Waktu review</b></td>
                                                    <td><?php echo $jurnal->waktu_review_nama ?></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Akreditasi SINTA</b></td>
                                                    <td><?php echo $jurnal->akre_sinta ?></td>
                                                </tr>
                                                <tr><td>Sitasi artikel </td><td></b> <span id="jumlah_sitasi"><?php echo $jurnal->sitasi ?></span> <br></td></tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Editor in chief</h3>
                                    </div>
                                    <div class="panel-body">
                                        <table class="table table-striped table-hover">
                                            <tbody>
                                                <tr>
                                                    <td>Nama editor</td>
                                                    <td><?php echo $jurnal->nama_editor ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Telepon editor</td>
                                                    <td><?php echo $jurnal->telepon_editor ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Email editor</td>
                                                    <td><?php echo $jurnal->email_editor ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Data Jurnal</h3>
                                    </div>
                                    <div class="panel-body">
                                        <table class="table table-striped table-hover">
                                            <tbody>
                                                <tr><td>URL Jurnal</td><td><?php echo $url ?></td></tr>
                                                <tr><td>URL Editor</td><td><?php echo $url_editor ?></td></tr>
                                                <tr><td>URL Kontak</td><td><?php echo $kontak ?></td></tr>
                                                <tr><td>URL Reviewer</td><td><?php echo $reviewer ?></td></tr>
                                                <tr><td>URL Statistik</td><td><?php echo $statistik ?></td></tr>
                                                <tr><td>URL Etika Publikasi</td><td><?php echo $etika ?></td></tr>
                                                <tr><td>URL Indeksasi</td><td><?php echo $indeksasi ?></td></tr>
                                                <tr><td>URL oai</td><td><?php echo $oai ?></td></tr>
                                                <tr><td>URL Doi</td><td><?php echo $doi ?></td></tr>
                                            </tbody>
                                        </table>
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
                                    <hr>
                                    <dt>Kualitas Editorial</dt><dd><?php echo $penilaian->editorial ?></dd>
                                    <dt>Kualitas Pengeditan</dt><dd><?php echo $penilaian->pengeditan ?></dd>
                                    <dt>Kualitas Peer-review</dt><dd><?php echo $penilaian->peer_review ?></dd>
                                    <dt>Kualitas Tata kelola jurnal</dt><dd><?php echo $penilaian->tata_kelola_jurnal ?></dd>
                                    <hr>
                                    <dt>Diversitas penulis</dt><dd><?php echo $penilaian->diver_penulis ?></dd>
                                    <dt>Diversitas dewan redaksi</dt><dd><?php echo $penilaian->diver_dewan_redaksi ?></dd>
                                    <dt>Sitasi artikel</dt><dd><?php echo $penilaian->sitasi ?></dd>
                                    <hr>
                                    <dt>Inovasi</dt><dd><?php echo $penilaian->inovasi ?></dd>
                                    <dt>Catatan</dt><dd><?php echo nl2br($penilaian->catatan) ?></dd>
                                </dl>
                            </div>
                        </div>
                        <div class="panel panel-primary">
                            <div class="panel-body">
                                <span style="font-size: 24px"><b>Riwayat Penilaian</b></span>
                                <hr>
                                <!-- <?php debugme($penilaian_logs) ?> -->
                                <?php if (empty($penilaian_logs)) { ?>
                                    <div class="box-body">
                                      <div class="alert alert-info alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        <h4><i class="icon fa fa-info"></i> Informasi </h4>
                                        Belum ada penilaian untuk jurnal ini
                                      </div>
                                    </div>
                                <?php  }else{ ?>
                                    <table class="table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Penilai</th>
                                                <th>Tanggal/Waktu</th>
                                            </tr>
                                        </thead>
                                        <?php  
                                            $no=1;
                                            foreach ($penilaian_logs as $key) {
                                        ?>
                                                <tbody>
                                                    <tr>
                                                        <td><?php echo $no++ ?></td>
                                                        <td><?php echo $key->user_nama ?></td>
                                                        <td><?php echo $key->tanggal.' - '.$key->waktu ?> </td>
                                                    </tr>
                                                </tbody>
                                        <?php } ?>
                                    </table>
<!--                                                 // print_r($key);
                                                // echo  '<dt>data_penilaian</dt> <dd>'.$key->data_penilaian.'</dd>';
 -->                                    
                                <?php  } ?>
                            </div>
                        </div>  
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>

<?php $this->load->view('tpl_footer'); ?>

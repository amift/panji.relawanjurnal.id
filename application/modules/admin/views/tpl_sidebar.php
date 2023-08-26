    <aside class="main-sidebar">
        <section class="sidebar">
            <div class="user-panel">
                <div class="pull-left image">
                    <img id="foto-sidebar" src="<?php echo IMG_URL.$this->session->userdata('ses_foto') ?>" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">                    
                    <p><?php echo $this->session->userdata('ses_name') ?></p>
                    <a href="#"><i class="fa fa-circle text-success"></i> 
                        <?php echo $this->session->userdata('ses_username') ?>
                    </a>
                </div>
            </div>

            <ul class="sidebar-menu">                
                <li><a href="<?php echo base_url('admin')?>"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>
                <li class="header" style="color:#ffff00">Data</li>
                <li><a href="<?php echo base_url('admin/jurnal')?>"><i class="fa fa-book"></i> <span>Jurnal</span></a></li>
                <li><a href="<?php echo base_url('admin/reviewer')?>"><i class="fa fa-users"></i> <span>Reviewer</span></a></li>
                <li class="header" style="color:#ffff00">Master</li>
                <li><a href="<?php echo base_url('admin/provinsi')?>"><i class="fa fa-map-marker"></i> <span>Provinsi</span></a></li>
                <!-- <li><a href="<?php echo base_url('admin/indeksasi')?>"><i class="fa fa-tags"></i> <span>Indeksasi</span></a></li> -->
                <li><a href="<?php echo base_url('admin/lisensi')?>"><i class="fa fa-anchor"></i> <span>Lisensi</span></a></li>
                <li><a href="<?php echo base_url('admin/frekterbitan')?>"><i class="fa fa-quote-left"></i> <span>Frekuensi terbitan</span></a></li>
                <li><a href="<?php echo base_url('admin/waktureview')?>"><i class="fa fa-clock-o"></i> <span>Waktu Review</span></a></li>                
                <!-- <li><a href="<?php echo base_url('admin/groups')?>"><i class="fa fa-users"></i> <span>Groups</span></a></li> -->
                <li><a href="<?php echo base_url('admin/user')?>"><i class="fa fa-user"></i> <span>User</span></a></li>
                <li class="header" style="color:#ffff00">Sistem</li>                
                <!-- <li><a href="<?php echo base_url('admin/emailtemplate')?>"><i class="fa fa-envelope"></i> <span>Email Template</span></a></li> -->
                <li><a href="<?php echo base_url('admin/emailsetting')?>"><i class="fa fa-envelope"></i> <span>Email Config</span></a></li>                
                <li><a href="<?php echo base_url('logout')?>"><i class="fa fa-sign-out"></i> <span>Logout</span></a></li>
            </ul>
        </section>
    </aside>
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
                <li class="header">Main Navigation</li>
                <li><a href="<?php echo base_url('user')?>"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>
                <li><a href="<?php echo base_url('user/jurnal')?>"><i class="fa fa-book"></i> <span>Jurnal</span></a></li>
                <li><a href="<?php echo base_url('user/profile')?>"><i class="fa fa-user"></i> <span>Profile</span></a></li>
                <li><a href="<?php echo base_url('logout')?>"><i class="fa fa-sign-out"></i> <span>Logout</span></a></li>
            </ul>
        </section>
    </aside>
    <aside class="main-sidebar">
        <section class="sidebar">
            <div class="user-panel">
                <div class="pull-left image">
                    <img id="foto-sidebar" src="" class="img-circle" alt="User Image">
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
                <li><a href="<?php echo base_url('admin')?>"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>
                <li class="treeview">
                  <a href="#">
                    <i class="fa fa-th-list"></i> <span>Master</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                    </a>
                    <ul class="treeview-menu menu-open">
                        <li><a href="<?php echo base_url('admin/provinsi')?>"><i class="fa fa-tags"></i> <span>Provinsi</span></a></li>
                    </ul>
                </li>                
                <li class="header">System</li>
                <li><a href="<?php echo base_url('admin/user')?>"><i class="fa fa-users"></i> <span>User</span></a></li>
                <li><a href="<?php echo base_url('admin/groups')?>"><i class="fa fa-users"></i> <span>Groups</span></a></li>
                <li><a href="<?php echo base_url('admin/emailtemplate')?>"><i class="fa fa-envelope"></i> <span>Email Template</span></a></li>
                <li><a href="<?php echo base_url('admin/emailsetting')?>"><i class="fa fa-envelope"></i> <span>Email Config</span></a></li>                
                <li><a href="<?php echo base_url('logout')?>"><i class="fa fa-sign-out"></i> <span>Logout</span></a></li>
            </ul>
        </section>
    </aside>
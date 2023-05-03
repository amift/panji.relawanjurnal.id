<!-- Fixed navbar -->
<div class="navbar navbar-inverse navbar-fixed-top headroom" >
  <div class="container">
    <div class="navbar-header"> 
      <!-- Button for smallest screens -->
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
    <a class="navbar-brand" href="<?php echo base_url(); ?>"><img src="<?php echo base_url()?>assets/backend/images/logo.png" alt="rji-logo"></a> </div>
    
    <div class="navbar-collapse collapse">
      <ul class="nav navbar-nav pull-right">
        <li><a href="<?php echo base_url('home')?>">Home</a></li>
        <li><a href="<?php echo base_url('about')?>">Tentang</a></li>
        <li><a href="<?php echo base_url('register')?>">Daftar</a></li>
        <li><a href="<?php echo base_url('login')?>">Login</a></li>
      </ul>
    </div>
    <!--/.nav-collapse --> 
  </div>
</div>
<!-- /.navbar --> 
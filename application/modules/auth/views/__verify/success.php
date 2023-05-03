<?php $this->load->view('tpl_header');?>
<?php $this->load->view('tplg_navbar');?>


  <header id="head" class="secondary"></header>

  <!-- container -->
  <div class="container">

    <ol class="breadcrumb">
      <li><a href="index.html">Home</a></li>
      <li class="active">Verifikasi</li>
    </ol>

    <div class="row">
      
      <!-- Article main content -->
      <article class="col-xs-12 maincontent">
        
        <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
          <div class="panel panel-default">
            <div class="panel-body">
              <h3 class="thin text-center">Verifikasi berhasil</h3>
              <p class="text-center text-muted">Anda dapat login ke sistem <a href="<?php echo base_url('login')?>">Login</a></p>
              <hr>          
            </div>
          </div>

        </div>
        
      </article>
      <!-- /Article -->

    </div>
  </div>  <!-- /container -->

<footer id="footer" class="top-space">
  <div class="footer1">
    <div class="container">
      <div class="row">
        <div class="col-md-5 panel">
          <h3 class="panel-title">Lates News</h3>
          <div class="panel-body">
            <p>Lorem ipsum dolor amet, consectetur adipiscing elit. Aenean leo lectus sollicitudin convallis eget libero. Aliquam laoreet tellus ut libero semper, egestas velit malesuada. Sed non risus eget dolor amet vestibulum ullamcorper. Integer feugiat molestie.</p>
          </div>
        </div>
        <div class="col-md-4 panel contact">
          <h3 class="panel-title">
            Info Kontak
          </h4>
          <div class="panel-body">
            <p>Kami dapat dihubungi melalui.</p>
            <ul>
              <li><i class="fa fa-phone"></i>1-123-345-6789</li>
              <li><a href="#"><i class="fa fa-envelope-o"></i> panji@relawanjurnal.id</a></li>
              <li><i class="fa fa-flag"></i>Jalan Malioboro, Yogyakarta 55515</li>
            </ul>
          </div>
        </div>
        <div class="col-md-3 panel">
          <h3 class="panel-title">Follow Us</h3>
          <div class="panel-body">
            <p class="follow-me-icons"> 
              <a href=""><i class="fa fa-twitter fa-2"></i></a> 
              <a href=""><i class="fa fa-dribbble fa-2"></i></a> 
              <a href=""><i class="fa fa-github fa-2"></i></a> 
              <a href=""><i class="fa fa-facebook fa-2"></i></a> 
              <a href=""><i class="fa fa-youtube fa-2"></i></a> 
              <a href=""><i class="fa fa-pinterest fa-2"></i></a> </p>
          </div>
        </div>
      </div>
      <!-- /row of panels --> 
    </div>
  </div>

  <div class="footer2">
    <div class="container">
      <div class="row">
        <div class="col-md-6 panel">
          <div class="panel-body">
            <p class="simplenav"> <a href="index.html">Home</a> | <a href="about.html">About</a> | <a href="services.html">Services</a> | <a href="portfolio.html">Portfolio</a> | <a href="contact.html">Contact</a> </p>
          </div>
        </div>
        <div class="col-md-6 panel">
          <div class="panel-body">
            <p class="text-right"> Copyright &copy; 2023.<a href="http://relawanjurnal.id" rel="develop">Relawan Jurnal Indonesia</a> </p>
          </div>
        </div>
      </div>
      <!-- /row of panels --> 
    </div>
  </div>
</footer>

<?php  $this->load->view('tplg_footer'); ?>
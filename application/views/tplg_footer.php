<footer id="footer" class="top-space">
  <div class="footer1">
    <div class="container">
      <div class="row">
        <div class="col-md-5 panel">
          <h3 class="panel-title">
            <img src="assets/backend/images/logo.png" alt="rji-logo">
          </h3>
          <div class="panel-body">
            <p>Pendampingan Pengelolaan Jurnal Internasional</p>
          </div>
        </div>
        <div class="col-md-4 panel contact">
          <h3 class="panel-title">
          Kontak
          </h4>
          <div class="panel-body">
            <p>Anda dapat menghubungi kami melalui.</p>
            <ul>
              <li><i class="fa fa-phone"></i> </li>
              <li><a href="#"><i class="fa fa-envelope-o"></i> contact@relwanjurnal.id</a></li>
              <li><i class="fa fa-flag"></i> Gang Masjid Al Huda II, RT 01 RW 18, Gamping Kidul, Ambarketawang, Kec Gamping, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55294</li>
            </ul>
          </div>
        </div>
        <div class="col-md-3 panel">
          <h3 class="panel-title">Follow Us</h3>
          <div class="panel-body">
            <p class="follow-me-icons"> 
                <a target="_blank" href="https://twitter.com/Jur_Indonesia"><i class="fa fa-twitter fa-2"></i></a> 
                <a target="_blank" href="https://www.facebook.com/RELAWANJURNAL/"><i class="fa fa-facebook fa-2"></i></a> 
                <a target="_blank" href="https://www.youtube.com/channel/UCigdxKIM5YjDaGnP8amSZ-w"><i class="fa fa-youtube fa-2"></i></a>               
                <a target="_blank" href="https://twitter.com/Jur_Indonesia"><i class="fa fa-twitter fa-2"></i></a>                 
                <!-- <a target="_blank" href=""><i class="fa fa-dribbble fa-2"></i></a> 
                <a target="_blank" href=""><i class="fa fa-github fa-2"></i></a> 
                <a target="_blank" href=""><i class="fa fa-pinterest fa-2"></i></a> </p> -->
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
            <p class="text-right"> Copyright &copy; 2014. Template by <a href="http://webthemez.com/" rel="develop">WebThemez.com</a> </p>
          </div>
        </div>
      </div>
      <!-- /row of panels --> 
    </div>
  </div>
</footer>

  <!-- JavaScript libs are placed at the end of the document so the pages load faster --> 

    <script src="<?php echo base_url()?>assets/frontend/js/modernizr-latest.js"></script> 
    <script src="<?php echo base_url()?>assets/frontend/js/jquery.min.js"></script> 
    <script src="<?php echo base_url()?>assets/frontend/js/bootstrap.min.js"></script> 
    <script src="<?php echo base_url()?>assets/frontend/js/jquery.cslider.js"></script> 
    <script src="<?php echo base_url()?>assets/frontend/js/headroom.min.js"></script> 
    <script src="<?php echo base_url()?>assets/frontend/js/jQuery.headroom.min.js"></script> 
    <script src="<?php echo base_url()?>assets/frontend/js/custom.js"></script>
    <!-- sweet alert -->
    <script src="<?php echo base_url()?>assets/backend/sweetalert2/sweetalert2.all.min.js"></script> 
    <!-- PNotify -->
    <script src="<?php echo base_url()?>assets/backend/plugins/pnotify/dist/pnotify.js"></script>
    <script src="<?php echo base_url()?>assets/backend/plugins/pnotify/dist/pnotify.buttons.js"></script>
    <script src="<?php echo base_url()?>assets/backend/plugins/pnotify/dist/pnotify.nonblock.js"></script>     
    <script type="text/javascript">

      var mainurl='<?php echo base_url() ?>';
      var baseurl='<?php echo $baseurl ?>';
      var url = window.location.href;
      
      var stack_center = {"dir1": "down", "dir2": "right", "firstpos1": 15, "firstpos2": ($(window).width() / 2) - (Number(PNotify.prototype.options.width.replace(/\D/g, '')) / 2)};
      $(window).resize(function(){
          stack_center.firstpos2 = ($(window).width() / 2) - (Number(PNotify.prototype.options.width.replace(/\D/g, '')) / 2);
      });

      $(document).ready(function() {        
          <?php  if (!empty($message)) {
              $msg='';
              $msg.='new PNotify({';
              $msg.='  title:"'.$message['title'].'",';
              $msg.='  text: "'.$message['text'].'",';
              $msg.='  type: "'.$message['type'].'",';
              $msg.='  delay:'.$message['delay'].',';
              $msg.='  stack: stack_center,';
              $msg.='  styling: "bootstrap3"';
              $msg.='});';
              echo $msg;
          } ?>
          $('.error-msg').show().delay(3000).fadeOut('slow');
      });
      
      if (url == '<?php echo base_url() ?>') {
        $(".navbar-nav li:first").addClass("active");
      }else{
        $('.navbar-nav li.active').removeClass('active');
        $('a[href="'+url+'"]').closest('li').addClass('active');
      }  

    </script>

    <?php 
        if (!empty($jsfile)) {
            $this->load->view($jsfile);
        }
    ?>
  </body>
</html>

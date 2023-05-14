        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                <b>Version</b> 1.0.0
            </div>
            <strong>Copyright &copy; 2017-<?php echo date('Y') ?> <a href="https://relawanjurnal.id" target="_blank">RelawanJurnal</a>.</strong> All rights reserved.
        </footer>    

     </div>  <!-- <div class="wrapper"> -->
    <script src="<?php echo base_url()?>assets/backend/plugins/jQuery/jquery-2.2.3.min.js"></script>
    <script src="<?php echo base_url()?>assets/backend/plugins/jQueryUI/jquery-ui.min.js"></script>
    <script src="<?php echo base_url()?>assets/backend/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url()?>assets/backend/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>  
    <script src="<?php echo base_url()?>assets/backend/plugins/fastclick/fastclick.js"></script>
    <script src="<?php echo base_url()?>assets/backend/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url()?>assets/backend/sweetalert2/sweetalert2.all.min.js"></script> 
    <!-- PNotify -->
    <script src="<?php echo base_url()?>assets/backend/plugins/pnotify/dist/pnotify.js"></script>
    <script src="<?php echo base_url()?>assets/backend/plugins/pnotify/dist/pnotify.buttons.js"></script>
    <script src="<?php echo base_url()?>assets/backend/plugins/pnotify/dist/pnotify.nonblock.js"></script> 
    <!-- ckeditor -->
    <script src="<?php echo base_url()?>assets/backend/ckeditor/ckeditor.js"></script>
    <!-- montpicker -->
    <script src="<?php echo base_url()?>assets/backend/plugins/monthpicker/MonthPicker.js"></script> 
    <script src="<?php echo base_url()?>assets/backend/dist/js/app.min.js"></script>
    <script src="<?php echo base_url()?>assets/backend/dist/js/custom.js"></script>
    <script src="<?php echo base_url()?>assets/backend/app.js"></script>
    <script type="text/javascript">
        var baseurl='<?php echo $baseurl ?>';
        
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

    </script>
    <?php 
        if (!empty($jsfile)) {
            $this->load->view($jsfile);
        }
    ?>
  </body>
</html>
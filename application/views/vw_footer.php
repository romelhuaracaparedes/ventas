
        </div>

        <!-- Main Footer-->
        <div class="main-footer text-center">
            <div class="container">
                <div class="row row-sm">
                    <div class="col-md-12">
                        <span>Copyright © 2021 <a href="#">Spruha</a>. Designed by <a href="https://www.spruko.com/">Spruko</a> All rights reserved.</span>
                    </div>
                </div>
            </div>
        </div>
        <!--End Footer-->

    </div>

    <!-- Back-to-top -->
    <a href="#top" id="back-to-top"><i class="fe fe-arrow-up"></i></a>

    <!-- Jquery js-->
    <script src="<?=base_url()?>assets/plugins/jquery/jquery.min.js"></script>


    <!-- Bootstrap js-->
    <script src="<?=base_url()?>assets/plugins/bootstrap/js/popper.min.js"></script>
    <script src="<?=base_url()?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>

    <!-- Perfect-scrollbar js -->
    <script src="<?=base_url()?>assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>

    <!-- Sidemenu js -->
    <script src="<?=base_url()?>assets/plugins/sidemenu/sidemenu.js"></script>

    <!-- Sidebar js -->
    <script src="<?=base_url()?>assets/plugins/sidebar/sidebar.js"></script>

    <!-- Select2 js-->
    <script src="<?=base_url()?>assets/plugins/select2/js/select2.min.js"></script>

    <!-- Sweet Alert-->
    <script src="<?=base_url()?>assets/plugins/sweet-alert/sweetalert.min.js"></script>

    <!-- Sticky js -->
    <script src="<?=base_url()?>assets/js/sticky.js"></script>

    <!-- Custom js -->
    <script src="<?=base_url()?>assets/js/custom.js"></script>

    <!-- Switcher js -->
    <script src="<?=base_url()?>assets/switcher/js/switcher.js"></script>

   <!-- Toast js -->
   <script src="<?=base_url()?>assets/js/jquery.toast.js"></script>


    <!-- Internal Chart.Bundle js-->
    <script src="<?=base_url()?>assets/plugins/chart.js/Chart.bundle.min.js"></script>

    <!-- Peity js-->
    <script src="<?=base_url()?>assets/plugins/peity/jquery.peity.min.js"></script>

    <!-- Internal Morris js -->
    <script src="<?=base_url()?>assets/plugins/raphael/raphael.min.js"></script>
    <script src="<?=base_url()?>assets/plugins/morris.js/morris.min.js"></script>

    <script src="<?=base_url()?>assets/js/VentasJS/VentasJS.js"></script>

    <!-- Circle Progress js-->
    <!-- <script src="<?=base_url()?>assets/js/circle-progress.min.js"></script>
    <script src="<?=base_url()?>assets/js/chart-circle.js"></script> -->

    <!-- Internal Dashboard js-->

    <script src="<?=base_url()?>assets/plugins/datatable/jquery.dataTables.min.js"></script>
    <script src="<?=base_url()?>assets/plugins/datatable/dataTables.bootstrap4.min.js"></script>
    <script src="<?=base_url()?>assets/plugins/datatable/dataTables.responsive.min.js"></script>
    <script src="<?=base_url()?>assets/plugins/datatable/fileexport/dataTables.buttons.min.js"></script>
    <script src="<?=base_url()?>assets/js/table-data.js"></script>
    
	<script>
    ventasJS.init('<?php echo $this->security->get_csrf_token_name(); ?>','<?php echo $this->security->get_csrf_hash(); ?>');
    </script>
    
    <?php 
    if(isset($jslib)){
        foreach ($jslib as $kjs=>$js) {
            echo '<script src="'.base_url() . $js.'"></script>';
        }
    }
    ?>

</body>


</html>
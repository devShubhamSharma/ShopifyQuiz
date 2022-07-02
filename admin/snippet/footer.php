 <!-- content-wrapper ends -->
 <!-- partial:partials/_footer.html -->
 <footer class="footer">
     <div class="footer-inner-wraper">
         <div class="d-sm-flex justify-content-center justify-content-sm-between py-2">
             <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © <a href="https://www.bootstrapdash.com/" target="_blank">bootstrapdash.com </a>2021</span>
             <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Only the best <a href="https://www.bootstrapdash.com/" target="_blank"> Bootstrap dashboard </a> templates</span>
         </div>
     </div>
 </footer>
 <!-- partial -->
 </div>
 <!-- main-panel ends -->
 </div>
 <!-- page-body-wrapper ends -->
 </div>
 <!-- container-scroller -->
 <!-- plugins:js -->
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
 <?php
    $js_file = 'add';
    $js_file = substr($file_self[count($file_self) - 1], 0, strpos($file_self[count($file_self) - 1], "."));
    if (count($file_self) > 4) { ?>
     <script src="<?= $config->admin_assets_url . 'js/' . $file_self[3] . '/' . $js_file . '.js' ?>" type="text/javascript"></script>
 <?php  } ?>
 <script src="<?= $config->admin_assets_url . 'vendors/js/vendor.bundle.base.js' ?>"></script>
 <!-- endinject -->
 <!-- Plugin js for this page -->
 <script src="<?= $config->admin_assets_url . 'vendors/chart.js/Chart.min.js' ?>"></script>
 <script src="<?= $config->admin_assets_url . 'vendors/jquery-circle-progress/js/circle-progress.min.js' ?>"></script>
 <script src="<?= $config->admin_assets_url . 'js/jquery.cookie.js' ?>" type="text/javascript"></script>
 <!-- End plugin js for this page -->
 <!-- inject:js -->
 <script src="<?= $config->admin_assets_url . 'js/off-canvas.js' ?>"></script>
 <script src="<?= $config->admin_assets_url . 'js/hoverable-collapse.js' ?>"></script>
 <script src="<?= $config->admin_assets_url . 'js/misc.js' ?>"></script>
 <!-- endinject -->
 <!-- Custom js for this page -->
 <script src="<?= $config->admin_assets_url . 'js/dashboard.js' ?>"></script>
 <!-- End custom js for this page -->
 <script>
     var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
     var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
         return new bootstrap.Tooltip(tooltipTriggerEl)
     })
 </script>
 </body>

 </html>
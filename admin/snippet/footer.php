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
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
 <!--------------CK editor js---->
 <script src="<?= $config->admin_assets_url . 'ckeditor-plugin/ckeditor.js' ?>"></script>
 <script src="<?= $config->admin_assets_url . 'ckfinder/ckfinder.js' ?>"></script>
 <!--------------CK editor js end---->
 <?php
    if (count($file_self) > 4 && $file_self[3]==='questions') { ?>
     <script src="<?= $config->admin_assets_url . 'js/' . $file_self[3] . '/' . $js_file . '.js' ?>" type="text/javascript"></script>
 <?php  } ?>
 <script src="<?= $config->admin_assets_url . 'vendors/js/vendor.bundle.base.js' ?>"></script>
 <script src="<?= $config->admin_assets_url . 'js/hoverable-collapse.js' ?>"></script>
 <script src="<?= $config->admin_assets_url . 'js/misc.js' ?>"></script>
 <script src="<?= $config->admin_assets_url . 'js/dashboard.js' ?>"></script>
 <script>
     var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
     var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
         return new bootstrap.Tooltip(tooltipTriggerEl)
     });

     <?php $arrayToLoadEditor = ['edit', 'add'];
        if (in_array($js_file, $arrayToLoadEditor)) {
        ?>
         var questionEditor;
         ClassicEditor
             .create(document.querySelector('#question'), {
                 ckfinder: {
                     uploadUrl: window.settings.admin_assets_url + 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json',
                 }
             })
             .then(editor => {
                 questionEditor = editor;
             })
             .catch(error => {
                 console.error(error);
             });
     <?php } ?>
 </script>
 </body>

 </html>
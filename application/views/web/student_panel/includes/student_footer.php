<div class="footer_part">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="footer_iner text-center">
                    <p><?= date('Y') ?> © Think-Champ</p>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
<div id="back-top" style="display: none;">
    <a title="Go to Top" href="#">
        <i class="ti-angle-up"></i>
    </a>
</div>

<script src="assets/dashboard/js/jquery1-3.4.1.min.js"></script>

<script src="assets/dashboard/js/popper1.min.js"></script>

<script src="assets/dashboard/js/bootstrap1.min.js"></script>

<script src="assets/dashboard/js/metisMenu.js"></script>

<script src="assets/dashboard/vendors/count_up/jquery.waypoints.min.js"></script>

<script src="assets/dashboard/vendors/chartlist/Chart.min.js"></script>

<script src="assets/dashboard/vendors/count_up/jquery.counterup.min.js"></script>

<script src="assets/dashboard/vendors/niceselect/js/jquery.nice-select.min.js"></script>

<script src="assets/dashboard/vendors/owl_carousel/js/owl.carousel.min.js"></script>

<script src="assets/dashboard/vendors/datatable/js/jquery.dataTables.min.js"></script>
<script src="assets/dashboard/vendors/datatable/js/dataTables.responsive.min.js"></script>
<script src="assets/dashboard/vendors/datatable/js/dataTables.buttons.min.js"></script>
<script src="assets/dashboard/vendors/datatable/js/buttons.flash.min.js"></script>
<script src="assets/dashboard/vendors/datatable/js/jszip.min.js"></script>
<script src="assets/dashboard/vendors/datatable/js/pdfmake.min.js"></script>
<script src="assets/dashboard/vendors/datatable/js/vfs_fonts.js"></script>
<script src="assets/dashboard/vendors/datatable/js/buttons.html5.min.js"></script>
<script src="assets/dashboard/vendors/datatable/js/buttons.print.min.js"></script>

<script src="assets/dashboard/vendors/datepicker/datepicker.js"></script>
<script src="assets/dashboard/vendors/datepicker/datepicker.en.js"></script>
<script src="assets/dashboard/vendors/datepicker/datepicker.custom.js"></script>
<script src="assets/dashboard/js/chart.min.js"></script>
<script src="assets/dashboard/vendors/chartjs/roundedBar.min.js"></script>

<script src="assets/dashboard/vendors/progressbar/jquery.barfiller.js"></script>

<script src="assets/dashboard/vendors/tagsinput/tagsinput.js"></script>

<script src="assets/dashboard/vendors/text_editor/summernote-bs4.js"></script>
<script src="assets/dashboard/vendors/am_chart/amcharts.js"></script>

<script src="assets/dashboard/vendors/scroll/perfect-scrollbar.min.js"></script>
<script src="assets/dashboard/vendors/scroll/scrollable-custom.js"></script>

<script src="assets/dashboard/vendors/vectormap-home/vectormap-2.0.2.min.js"></script>
<script src="assets/dashboard/vendors/vectormap-home/vectormap-world-mill-en.js"></script>

<script src="assets/dashboard/vendors/apex_chart/apex-chart2.js"></script>
<script src="assets/dashboard/vendors/apex_chart/apex_dashboard.js"></script>
<script src="assets/dashboard/vendors/echart/echarts.min.js"></script>
<script src="assets/dashboard/vendors/chart_am/core.js"></script>
<script src="assets/dashboard/vendors/chart_am/charts.js"></script>
<script src="assets/dashboard/vendors/chart_am/animated.js"></script>
<script src="assets/dashboard/vendors/chart_am/kelly.js"></script>
<script src="assets/dashboard/vendors/chart_am/chart-custom.js"></script>

<script src="assets/dashboard/js/dashboard_init.js"></script>
<script src="assets/dashboard/js/custom.js"></script>
</body>

</html>
<script>
    function check_sess_id(){
      var session_id = "<?= $this->session->userdata('sess_id') ?>";
      fetch('Auth/check_login').then(function(response){
        return response.json();
      }).then(function(responseData){
        if(responseData.output == 'logout')
        {
          window.location.href= 'Auth/logout'
        }
      });
    }
    setInterval(function(){
      check_sess_id();
    }, 10000);
</script>
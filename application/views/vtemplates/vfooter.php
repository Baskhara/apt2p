<footer class="footer footer-static footer-light navbar-border">
    <p class="clearfix text-muted text-sm-center mb-0 px-2">
        <span class="float-md-left d-xs-block d-md-inline-block">Copyright  &copy; 2018 <a href="http://www.pln.co.id" target="_blank" class="text-bold-800 grey darken-2">PT. PLN (Persero) </a>, All rights reserved. </span><span class="float-md-right d-xs-block d-md-inline-block"><?php echo $this->agent->browser(); ?></span>
    </p>
</footer>

<!-- BEGIN VENDOR JS-->
<script src="<?php echo base_url('components/app-assets/js/core/libraries/jquery.min.js');?>" type="text/javascript"></script>
<script src="<?php echo base_url('components/app-assets/vendors/js/ui/tether.min.js');?>" type="text/javascript"></script>
<script src="<?php echo base_url('components/app-assets/js/core/libraries/bootstrap.min.js');?>" type="text/javascript"></script>
<script src="<?php echo base_url('components/app-assets/vendors/js/ui/perfect-scrollbar.jquery.min.js');?>" type="text/javascript"></script>
<script src="<?php echo base_url('components/app-assets/vendors/js/ui/unison.min.js');?>" type="text/javascript"></script>
<script src="<?php echo base_url('components/app-assets/vendors/js/ui/blockUI.min.js');?>" type="text/javascript"></script>
<script src="<?php echo base_url('components/app-assets/vendors/js/ui/jquery.matchHeight-min.js');?>" type="text/javascript"></script>
<script src="<?php echo base_url('components/app-assets/vendors/js/ui/screenfull.min.js');?>" type="text/javascript"></script>
<script src="<?php echo base_url('components/app-assets/vendors/js/extensions/pace.min.js');?>" type="text/javascript"></script>
<!-- DataTables -->
<script src="<?php echo base_url('components/app-assets/vendors/js/datatables.net/js/jquery.dataTables.min.js');?>"></script>
<script src="<?php echo base_url('components/app-assets/vendors/js/datatables.net/js/dataTables.select.min.js');?>"></script>
<script src="<?php echo base_url('components/app-assets/vendors/js/datatables.net/js/dataTables.button.min.js');?>"></script>
<script src="<?php echo base_url('components/app-assets/vendors/js/datatables.net-bs/js/dataTables.bootstrap.min.js');?>"></script>
<!-- PrintJS -->
<script src="<?php echo base_url('components/app-assets/vendors/js/printjs/print.min.js');?>"></script>
<!-- BEGIN VENDOR JS-->
<!-- BEGIN PAGE VENDOR JS-->
<script src="<?php echo base_url('components/app-assets/vendors/js/charts/chart.min.js');?>" type="text/javascript"></script>
<!-- END PAGE VENDOR JS-->
<!-- BEGIN ROBUST JS-->
<script type="text/javascript">var base_url = '<?php echo base_url(); ?>';</script>
<script src="<?php echo base_url('components/app-assets/js/core/app-menu.js');?>" type="text/javascript"></script>
<script src="<?php echo base_url('components/app-assets/js/core/app.js');?>" type="text/javascript"></script>
<script src="<?php echo base_url('components/assets/js/select2/select2.full.js');?>" type="text/javascript"></script>
<script src="<?php echo base_url('components/assets/js/toastr/toastr.js');?>" type="text/javascript"></script>
<script src="<?php echo base_url('components/assets/js/bootstrap/bootstrap-modal.js');?>" type="text/javascript"></script>
<script src="<?php echo base_url('components/assets/js/bootstrap/bootstrap-modalmanager.js');?>" type="text/javascript"></script>
<?php if ($this->uri->segment(3) == 'vtunggakan' || $this->uri->segment(3) == 'vpelanggan') { ?><script src="https://maps.googleapis.com/maps/api/js?key=<?php echo $dt_keys; ?>&callback=initialize" async defer></script><?php } ?>
<script src="<?php echo base_url('components/assets/js/scripts.js');?>" type="text/javascript"></script>
<script src="<?php echo base_url('components/assets/js/scriptc.js');?>" type="text/javascript"></script>
<script src="<?php echo base_url('components/assets/js/scriptt.js');?>" type="text/javascript"></script>
<!-- END ROBUST JS-->
<!-- BEGIN PAGE LEVEL JS-->
<script src="<?php echo base_url('components/app-assets/js/scripts/pages/dashboard-lite.js');?>" type="text/javascript"></script>
<script src="<?php echo base_url('components/app-assets/js/scripts/charts/chartjs/line/line.min.js');?>" type="text/javascript"></script>
<!-- END PAGE LEVEL JS-->

<!-- page script -->
<?php if ($this->uri->segment(3) == 'vtunggakan' || $this->uri->segment(3) == 'vpelanggan') { ?>
<script>
function initialize() {
    var ids = document.getElementById('nav-plg');

    if (ids) {
        if (document.getElementById('tabletgk')) {
            var koordy = $('#tabletgk .modalNavPLG').data('navx');
            var koordx = $('#tabletgk .modalNavPLG').data('navy');
        } else {
            var koordy = $('#tableplg .modalNavPLG').data('navx');
            var koordx = $('#tableplg .modalNavPLG').data('navy');
        }
        var zm = 10;
    } else {
        var koordy = -4.9601258;
        var koordx = 106.7387328;
        var zm = 4;
    }
    
    var nav = {lat: koordy, lng: koordx};
    var map = new google.maps.Map(
        document.getElementById('map'),
        {zoom: zm, center: nav}
    );
    var marker = new google.maps.Marker({position: nav, map: map});
}

$(document).ready(function () {

});
</script>
<?php } ?>

    </body>
</html>

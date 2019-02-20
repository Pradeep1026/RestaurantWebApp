<!--<script src="js/jquery-1.11.0.min.js"></script>-->
<script type="text/javascript" src="js/scripts.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="js/dataTables.bootstrap.min.js"></script>
 <!-- Pagination -->
<script type="text/javascript">
$(document).ready(function() { 
   $('#pages').DataTable();
} );
</script>
<!-- End Pagination -->

<script type="text/javascript" src="plugins/wow.min.js"></script>
<script>
wow = new WOW(
				  {
				  boxClass:     'wow',      // default
				  animateClass: 'animated', // default
				  offset:       0,          // default
				  mobile:       true,       // default
				  live:         true        // default
				}
				)
				wow.init();
</script>
<!-- Success Message Alert -->
<script type="text/javascript">
	window.setTimeout(function() {
	$(".alert").fadeTo(500, 0).slideUp(500, function(){
		$(this).remove(); 
	});
}, 3000);
</script>
<!-- Success Message Alert -->
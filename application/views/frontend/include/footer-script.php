<!-- jQuery -->
<script src="<?php echo base_url();?>public/js/jquery.min.js"></script>
<!-- jQuery Easing -->
<script src="<?php echo base_url();?>public/js/jquery.easing.1.3.js"></script>
<!-- Bootstrap -->
<script src="<?php echo base_url();?>public/js/bootstrap.min.js"></script>
<!-- Waypoints -->
<script src="<?php echo base_url();?>public/js/jquery.waypoints.min.js"></script>
<!-- Owl Carousel -->
<script src="<?php echo base_url();?>public/js/owl.carousel.min.js"></script>
<script src="<?php echo base_url();?>public/js/main.js"></script>
<script src="<?php echo base_url();?>public/js/custom.js"></script>

<script src="http://code.jquery.com/ui/1.9.1/jquery-ui.js"></script>

<script>
$(document).ready(function(){
	// Example 1.3: Sortable and connectable lists with visual helper
	$('#sortable-div .sortable-list').sortable({
		axis: 'y',
		update: function (event, ui) {
			var data = $( "#sortable" ).sortable( "serialize", { key: "sort" });
			console.log(data);
			$.post( "<?php echo base_url()?>admin/menusorting",{ 'choices[]': data});
			// $.ajax({
				// data: { 'choices[]': data},
				// type: 'POST',
				// dataType: 'json',
				// url: '<?php echo base_url()?>admin/menusorting',
				// processData: false, // important
				// contentType: false, // important
				// success: function(data)
				// {}
			// });
		}
	});
	
	
});
</script>
	<script type="text/javascript" src="/<?php echo BASE_URL.$static->js('jQuery-2.1.1/jQuery-2.1.1.min', 'vendor'); ?>"></script>
    <script type="text/javascript" src="/<?php echo BASE_URL.$static->js('jQuery-ui/js/jquery-ui-1.10.4.custom.min', 'vendor'); ?>"></script>
    <script type="text/javascript" src="/<?php echo BASE_URL.$static->js('bootstrap-3.3.6/js/bootstrap.min', 'vendor'); ?>"></script>
	<script type="text/javascript" src="/<?php echo BASE_URL.$static->js('menu', 'js'); ?>"></script>
	<script>
		var pictures_js = <?php echo json_encode($pictures); ?>;
     	var i = 0;
		var imageObj = new Array();

		// Préchargement images
		$.each(pictures_js, function(_, src){
			new_image = new Image();
			new_image.src = src;
			imageObj.push(new_image);
		})
	</script>
	<script type="text/javascript" src="/<?php echo BASE_URL.$static->js('banner', 'js'); ?>"></script>
    <?php echo $extra_js; ?>
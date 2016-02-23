	<script type="text/javascript" src="/<?php echo BASE_URL.$static->js('jQuery-2.1.1/jQuery-2.1.1.min', 'vendor'); ?>"></script>
    <script type="text/javascript" src="/<?php echo BASE_URL.$static->js('jQuery-ui/js/jquery-ui-1.10.4.custom.min', 'vendor'); ?>"></script>
    <script type="text/javascript" src="/<?php echo BASE_URL.$static->js('bootstrap-3.3.6/js/bootstrap.min', 'vendor'); ?>"></script>
	<script type="text/javascript" src="/<?php echo BASE_URL.$static->js('menu', 'js'); ?>"></script>
	<script>
		var pictures_js = <?php echo json_encode($pictures); ?>;
     	var i = 0;
		var imageObj = new Array();

		// Préchargement images
		for(i=0; i<=pictures_js.length; i++) 
		{
			imageObj[i] = new Image();
			imageObj[i].src=pictures_js[i];
		}
	</script>
	<script type="text/javascript" src="/<?php echo BASE_URL.$static->js('banner', 'js'); ?>"></script>
    <?php echo $extra_js; ?>
jQuery(document).ready(function($){	

	$(".ss-bt").hide();

	$("#display_phone").hide();
	$("#phone_picture_hide").hide();

	$("#phone_picture_show").click(function ()
	{
		$("#display_phone").show();
		$("#phone_picture_show").hide();
		$("#phone_picture_hide").show();
	})

	$("#phone_picture_hide").click(function ()
	{
		$("#display_phone").hide();
		$("#phone_picture_hide").hide();
		$("#phone_picture_show").show();
	})


	$(".1-1").click(function ()
	{
		$(".ss-bt").hide();
		$(".1-2").show(); 
	})
	
	$(".2-1").click(function ()
	{
		$(".ss-bt").hide(); 
		$(".2-2").show(); 
	})
	
	$(".3-1").click(function ()
	{
		$(".ss-bt").hide(); 
		$(".3-2").show(); 
	})
	
	$(".4-1").click(function ()
	{
		$(".ss-bt").hide(); 
		$(".4-2").show(); 
	})
	
	$(".5-1").click(function ()
	{
		$(".ss-bt").hide(); 
		$(".5-2").show(); 
	})
	
	$(".6-1").click(function ()
	{
		$(".ss-bt").hide(); 
		$(".6-2").show(); 
	})
	
	$(".7-1").click(function ()
	{
		$(".ss-bt").hide(); 
		$(".7-2").show(); 
	})
});
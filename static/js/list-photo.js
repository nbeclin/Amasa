jQuery(document).ready(function($){

	$('table td.actions').on('click', '.delete-photo', function(e){
		e.preventDefault();
		var photo_id = $(this).data('photo-id');
		$('table tr.photo-line[data-photo-id="'+photo_id+'"]').addClass('danger');
		if(confirm('Confirmer la supression ?')){
			location.href = $(this).attr('href');
		}
		$('table tr.photo-line').removeClass('danger');

	});

});
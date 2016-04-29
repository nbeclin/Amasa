jQuery(document).ready(function($){

	$('table td.actions').on('click', '.delete-animal', function(e){
		e.preventDefault();
		var animal_id = $(this).data('animal-id');
		$('table tr.animal-line[data-animal-id="'+animal_id+'"]').addClass('danger');
		if(confirm('Confirmer la supression ?')){
			location.href = $(this).attr('href');
		}
		$('table tr.animal-line').removeClass('danger');

	});

});
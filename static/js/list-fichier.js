jQuery(document).ready(function($){

	$('table td.actions').on('click', '.delete-fichier', function(e){
		e.preventDefault();
		var fichier_id = $(this).data('fichier-id');
		$('table tr.fichier-line[data-fichier-id="'+fichier_id+'"]').addClass('danger');
		if(confirm('Confirmer la supression ?')){
			location.href = $(this).attr('href');
		}
		$('table tr.fichier-line').removeClass('danger');

	});

});
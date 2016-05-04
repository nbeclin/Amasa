<a href="/<?php echo BASE_URL ?>admin/photos/add" class="btn btn-success">Ajouter une photo</a>
<h2>Gestion des photos</h2>
<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th class="text-center">Photos</th>
            <th class="text-center">lien</th>
            <th class="text-center"></th>
            <th class="text-center"></th>
        </tr>
    </thead>
    <tbody>
		<?php foreach ($photos as $photo) : ?>	
			<tr class="photo-line" data-photo-id="<?php echo $photo->id ?>">
				<td class="text-center">
					<img src="/<?php echo BASE_URL ?>img/animaux/00-<?php echo $photo->lien ?>" alt="Amasa" height="30" />
				</td>
				<td class="text-center">
					<?php echo $photo->lien ?>
				</td>
				<td class="text-center">
					<a href="/<?php echo BASE_URL ?>admin/photos/modify/<?php echo $photo->id ?>"><span class="glyphicon glyphicon-pencil" style="color:#AEB404;"></span></a>
				</td>
				<td class="text-center actions">
                    <a href="/<?php echo BASE_URL ?>admin/photos/delete/<?php echo $photo->id ?>" class="delete-photo" data-photo-id="<?php echo $photo->id ?>">
                        <span class="glyphicon glyphicon-floppy-remove" style="color:#FE2E2E;"></span>
                    </a>
                </td>
			</tr>
		<?php endforeach; ?>
    </tbody>
</table>
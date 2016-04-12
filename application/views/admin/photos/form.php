<?php if(isset($success)): ?>
    <div class="alert alert-success">
        Bravo ! <a href="/<?php echo BASE_URL; ?>admin/photos">Retour vers la liste des photos</a>
    </div>
<?php else : ?>
	<?php if(isset($errors)): ?>
		<div class="alert alert-danger">
	        <ul class="list-unstyled">
	            <?php foreach ($errors as $error):?>
	                <li><?php echo $error ?></li>
	            <?php endforeach ?>
	        </ul>
	    </div>
	<?php endif; ?>
	
	
	<?php if ($info_photo->lien != '') : ?>
		<h2>Modification d'une photo</h2>
		<img src="/<?php echo BASE_URL ?>img/animaux/00-<?php echo $info_photo->lien ?>" alt="Amasa" />
	<?php else : ?>
		<h2>Enregistrement d'une photo</h2>
	<?php endif; ?>

	<form action="" method="post" enctype="multipart/form-data">
		<div class="row">
			<div class="col-md-4">
				<div class="form-group <?php echo isset($errors['file']) ? 'has-error' : '' ?>">
					<label class="control-label"><?php echo ($info_photo->lien != '') ? 'Nouveau fichier' : 'Fichier' ?></label>
					<input type="file" class="form-control" name="file" value="" />
				</div>
				<div class="form-group <?php echo (isset($errors['link']) || isset($errors['link_name'])) ? 'has-error' : '' ?>">
					<label class="control-label">Lien</label>
					<input type="text" name="link" class="form-control" value="<?php echo isset($errors) ? $post['link'] : ''.str_replace(array ('.png','.jpg'), '', $info_photo->lien).'' ?>" />
				</div>
			</div>
		</div>
		
		<input type="hidden" name="old_link" value="<?php echo $info_photo->lien ?>" />
		<input type="hidden" name="id" value="<?php echo $info_photo->id?>" />
		<input type="submit" name="form_photo" class="btn btn-primary pull-right" value="Enregistrer" />
	</form>
<?php endif; ?>
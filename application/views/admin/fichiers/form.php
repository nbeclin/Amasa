<?php if(isset($success)): ?>
    <div class="alert alert-success">
        Bravo ! <a href="/<?php echo BASE_URL; ?>admin/fichiers">Retour vers la liste des fichiers</a>
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
	
	<h2>Enregistrement d'un fichier</h2>

	<form action="" method="post" enctype="multipart/form-data">
		<div class="row">
			<div class="col-md-4">
				<div class="form-group <?php echo isset($errors['file']) ? 'has-error' : '' ?>">
					<label class="control-label"><?php echo ($info_fichier->lien != '') ? 'Nouveau fichier' : 'Fichier' ?></label>
					<input type="file" class="form-control" name="file" value="" />
				</div>
				<div class="form-group <?php echo (isset($errors['link']) || isset($errors['link_name'])) ? 'has-error' : '' ?>">
					<label class="control-label">Lien</label>
					<input type="text" name="link" class="form-control" value="<?php echo isset($errors) ? $post['link'] : ''.str_replace(array ('.png','.jpg'), '', $info_fichier->lien).'' ?>" />
				</div>
			</div>
		</div>

		<input type="submit" name="form_fichier" class="btn btn-primary pull-right" value="Enregistrer" />
	</form>
<?php endif; ?>
<h2>Modification d'une page</h2>
<?php if(isset($success)): ?>
    <div class="alert alert-success">
        Bravo ! <a href="/<?php echo BASE_URL; ?>admin/pages">Retour vers la liste des pages</a>
    </div>
<?php else : ?>
<form action="" class="form" method="post">
	<div class="row">
		<div class="col-md-4">
			<div class="form-group">
				<label class="control-label">Libellé</label>
				<?php if ($info_page->id == null) : ?>
					<input type="text" class="form-control" name="libelle" value="<?php echo $info_page->libelle ?>" />
				<?php else : ?>
					<input type="text" class="form-control" value="<?php echo $info_page->libelle ?>" disabled="disabled" />
					<input type="hidden" name="libelle" value="<?php echo $info_page->libelle ?>" />
				<?php endif; ?>
			</div>
			<div class="form-group">
				<label class="control-label">Titre</label>
				<input type="text" name="titre" class="form-control" value="<?php echo $info_page->titre ?>" />
			</div>
		</div>
		<div class="col-md-8">
			<div class="form-group">                    
				<label class="control-label">Texte (code html)</label>
				<a href="#"><span class="text-right glyphicon glyphicon-alert"></span></a>
				<textarea name="texte" class="form-control" rows="20"><?php echo htmlentities($info_page->texte) ?></textarea>
			</div>
		</div>
	</div>
	<input type="submit" name="modif_page" class="btn btn-primary pull-right" value="Enregistrer" />
</form>
<?php endif; ?>
<?php if ($info_animal->nom == '') : ?>
	<h2>Ajout d'un animal</h2>
<?php else : ?>
	<h2>Modification de <?php echo $info_animal->nom ?></h2>
<?php endif; ?>

<?php if(isset($success)): ?>
    <div class="alert alert-success">
        Bravo ! <a href="/<?php echo BASE_URL; ?>admin/animaux">Retour vers la liste des animaux</a>
    </div>
<?php else: ?>
<form action="" class="form" method="post" enctype="multipart/form-data">
	<input type="hidden" name="id" class="form-control" value="<?php echo $info_animal->id ?>" />
	<div class="row">
		<div class="col-md-4">
			<div class="form-group">
				<label class="control-label">Nom</label>
				<input type="text" name="nom" class="form-control" value="<?php echo $info_animal->nom ?>" />
			</div>
		   <div class="form-group">
				<label class="control-label">Catégorie</label>
				<select name="categorie" class="form-control">
					<option value="">-- Choisir --</option>
					<option value="adoptionChaton" <?php echo $info_animal->categorie == 'adoptionChaton' ? 'selected' : ''; ?>>Adoption Chaton</option>
					<option value="adoptionChat" <?php echo $info_animal->categorie == 'adoptionChat' ? 'selected' : ''; ?>>Adoption Chat</option>
					<option value="adoptionChien" <?php echo $info_animal->categorie == 'adoptionChien' ? 'selected' : ''; ?>>Adoption Chien</option>
					<option value="adopte" <?php echo $info_animal->categorie == 'adopte' ? 'selected' : ''; ?>>Adopté</option>
					<option value="paradis" <?php echo $info_animal->categorie == 'paradis' ? 'selected' : ''; ?>>Paradis</option>
				</select>
			</div>
			<div class="form-group">
				<label class="control-label">Sexe</label>
				<div class="radio">
					<label>
						<input type="radio" name="sexe" value="1" <?php echo $info_animal->sexe == '1' ? 'checked' : ''; ?>>
						Male
					</label>
				</div>
				<div class="radio">
					<label>
						<input type="radio" name="sexe" value="2" <?php echo $info_animal->sexe == '2' ? 'checked' : ''; ?>>
						Femelle
					</label>
				</div>
			</div>
			<?php for($cpt=0;$cpt<5;$cpt++) : ?>
				<div class="form-group">
					<label class="control-label">Image <?php echo $cpt+1 ?>
					<?php echo $cpt==0 ? ' (Principale)' : '' ?>
					</label>
					<select name="liens[<?php echo $cpt+1 ?>]" class="form-control">
						<option value="">-- Choisir --</option>
						<?php foreach ($photos as $photo) : ?>
							<option <?php echo ($photo->idAnimal != 0) ? 'style="background-color:red;"' : ''; ?> value="<?php echo $photo->id ?>" <?php echo (($cpt < sizeof($info_animal->photos)) && ($info_animal->photos[$cpt]->id == $photo->id)) ? 'selected' : ''; ?>>
								<?php echo $photo->lien ?>				
							</option>
						<?php endforeach; ?>
					</select>
				</div>
			<?php endfor; ?>
		</div>
		<div class="col-md-4">
			<div class="form-group">
				<label class="control-label">Date de naissance</label>
				<div class="input-group date datetimepicker">
                    <input type='text' name="age" class="form-control datetimepicker" value="<?php echo $info_animal->age ?>" />
                    <span class="input-group-addon">
                    	<span class="glyphicon glyphicon-calendar"></span>
                    </span>
            	</div>
			</div>
			<div class="form-group">
				<label class="control-label">Date d'adoption</label>
				<div class="input-group date datetimepicker">
                    <input type='text' name="anneeAdoption" class="form-control datetimepicker" value="<?php echo $info_animal->anneeAdoption ?>" />
                    <span class="input-group-addon">
                    	<span class="glyphicon glyphicon-calendar"></span>
                    </span>
            	</div>
			</div>
			<div class="form-group">
				<label class="control-label">Soins</label>
				<input type="text" name="soin" class="form-control" value="<?php echo $info_animal->soin ?>" />
			</div>
			<div class="row">
				<div class="col-md-4">
					<div class="form-group">
						<label class="control-label">OK Chat</label>
						<div class="radio">
							<label>
								<input type="radio" name="okChat" value="1" <?php echo $info_animal->okChat == '1' ? 'checked' : ''; ?>>
								Oui
							</label>
						</div>
						<div class="radio">
							<label>
								<input type="radio" name="okChat" value="0" <?php echo $info_animal->okChat == '0' ? 'checked' : ''; ?>>
								Non
							</label>
						</div>
						<div class="radio">
							<label>
								<input type="radio" name="okChat" value="2" <?php echo $info_animal->okChat == '2' ? 'checked' : ''; ?>>
								?
							</label>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label class="control-label">OK Chien</label>
						<div class="radio">
							<label>
								<input type="radio" name="okChien" value="1" <?php echo $info_animal->okChien == '1' ? 'checked' : ''; ?>>
								Oui
							</label>
						</div>
						<div class="radio">
							<label>
								<input type="radio" name="okChien" value="0" <?php echo $info_animal->okChien == '0' ? 'checked' : ''; ?>>
								Non
							</label>
						</div>
						<div class="radio">
							<label>
								<input type="radio" name="okChien" value="2" <?php echo $info_animal->okChien == '2' ? 'checked' : ''; ?>>
								?							
							</label>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label class="control-label">OK Enfant</label>
						<div class="radio">
							<label>
								<input type="radio" name="okEnfant" value="1" <?php echo $info_animal->okEnfant == '1' ? 'checked' : ''; ?>>
								Oui
							</label>
						</div>
						<div class="radio">
							<label>
								<input type="radio" name="okEnfant" value="0" <?php echo $info_animal->okEnfant == '0' ? 'checked' : ''; ?>>
								Non
							</label>
						</div>
						<div class="radio">
							<label>
								<input type="radio" name="okEnfant" value="2" <?php echo $info_animal->okEnfant == '2' ? 'checked' : ''; ?>>
								?
							</label>
						</div>
					</div>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label">Petit plus</label>
				<textarea name="plus" class="form-control" rows="5"><?php echo $info_animal->plus ?></textarea>
			</div>
			<div class="form-group">
				<label class="control-label">Petit moins</label>
				<textarea name="moins" class="form-control" rows="5"><?php echo $info_animal->moins ?></textarea>
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">                    
				<label class="control-label">Commentaire</label>
				<textarea name="commentaire" class="form-control" rows="25"><?php echo $info_animal->commentaire ?></textarea>
			</div>
			<div class="form-group">
				<label class="control-label">Star du mois</label>
				<div class="radio">
					<label>
						<input type="radio" name="chatMois" value="1" <?php echo $info_animal->chatMois == '1' ? 'checked' : ''; ?>>
						Oui
					</label>
				</div>
				<div class="radio">
					<label>
						<input type="radio" name="chatMois" value="0" <?php echo $info_animal->chatMois != '1' ? 'checked' : ''; ?>>
						Non
					</label>
				</div>
			</div>
		</div>
	</div>
	<input type="submit" name="form_animal" class="btn btn-primary pull-right" value="Enregistrer" />
</form>
<?php endif; ?>
<a href="/<?php echo BASE_URL ?>admin/animaux/add" class="btn btn-success">Ajouter un animal</a>
<h2>Gestion des animaux</h2>

<form action="" class="form" method="post" enctype="multipart/form-data" style="margin-bottom:10px">
	<div class="row">
		<div class="col-md-7">
		</div>
		<div class="col-md-2">
			<select name="categorie" class="form-control">
				<option value="">-- Choisir --</option>
				<option value="adoptionChaton" <?php echo ($post['categorie'] == 'adoptionChaton') ? 'selected' : ''; ?>>Adoption Chaton</option>
				<option value="adoptionChat" <?php echo ($post['categorie'] == 'adoptionChat') ? 'selected' : ''; ?>>Adoption Chat</option>
				<option value="adoptionChien" <?php echo ($post['categorie'] == 'adoptionChien') ? 'selected' : ''; ?>>Adoption Chien</option>
				<option value="adopte" <?php echo ($post['categorie'] == 'adopte') ? 'selected' : ''; ?>>Adopté</option>
				<option value="paradis" <?php echo ($post['categorie'] == 'paradis') ? 'selected' : ''; ?>>Paradis</option>
			</select>
		</div>
		<div class="col-md-2">
			<select name="sexe" class="form-control">
				<option value="">-- Choisir --</option>
				<option value="1" <?php echo ($post['sexe'] == '1') ? 'selected' : ''; ?>>Male</option>
				<option value="2" <?php echo ($post['sexe'] == '2') ? 'selected' : ''; ?>>Femelle</option>
			</select>
		</div>
		<div class="col-md-1">
			<button type="submit" name="tri" class="btn btn-primary pull-left"><span class="glyphicon glyphicon-search"></span></button>
		</div>
	</div>
</form>

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th class="text-center"></th>
            <th class="text-center">Animaux</th>
            <th class="text-center">Catégories</th>
            <th class="text-center">Edit</th>
        </tr>
    </thead>
    <tbody>
		<?php foreach($animaux as $animal): ?>
			
			<?php foreach($animal->photos as $photo): ?>
				<?php if ($photo->premiere == 1) : ?>
					<?php $link = $photo->lien; ?>
        		<?php endif; ?>
        	<?php endforeach; ?>

			<tr>
				<td class="text-center">
					<?php if (isset($link)) : ?>
						<img src="/<?php echo BASE_URL ?>img/animaux/00-<?php echo $link ?>" alt="Amasa" height="40" />
					<?php else : ?>
						Pas de photo
					<?php endif; ?>
				</td>
				<td class="text-center">
					<a href="<?php echo $animal->id ?>"><?php echo $animal->nom ?></a>
				</td>
				<td class="text-center">
					<?php echo $animal->categorie ?>
				</td>
				<td class="text-center">
					<a href="/<?php echo BASE_URL ?>admin/animaux/modify/<?php echo $animal->id ?>"><span class="glyphicon glyphicon-pencil"></span></a>
				</td>
			</tr>

			<?php unset($link); ?>

        <?php endforeach; ?>
    </tbody>
</table>
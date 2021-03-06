<a href="/<?php echo BASE_URL ?>admin/animaux/add" class="btn btn-success">Ajouter un animal</a>
<h2>Gestion des animaux</h2>

<?php if(isset($delete_success)): ?>
    <div class="alert alert-warning">
        Animal supprimé !
    </div>
<?php endif; ?>

<form action="" class="form" method="post" enctype="multipart/form-data" style="margin-bottom:10px">
	<div class="row">
		<div class="col-md-5">
		</div>
		<div class="col-md-2">
			<select name="categorie" class="form-control">
				<option value="">-- Catégorie --</option>
				<option value="adoption" <?php echo ($post['categorie'] == 'adoption') ? 'selected' : ''; ?>>Adoption</option>
				<option value="adopte" <?php echo ($post['categorie'] == 'adopte') ? 'selected' : ''; ?>>Adopté</option>
				<option value="paradis" <?php echo ($post['categorie'] == 'paradis') ? 'selected' : ''; ?>>Paradis</option>
			</select>
		</div>
		<div class="col-md-2">
			<select name="type" class="form-control">
				<option value="">-- Type --</option>
				<option value="chat" <?php echo ($post['type'] == 'chat') ? 'selected' : ''; ?>>Chat</option>
				<option value="chien" <?php echo ($post['type'] == 'chien') ? 'selected' : ''; ?>>Chien</option>
			</select>
		</div>
		<div class="col-md-2">
			<select name="sexe" class="form-control">
				<option value="">-- Sexe --</option>
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
            <th class="text-center">Type</th>
            <th class="text-center">Catégories</th>
            <th class="text-center"></th>
            <th class="text-center"></th>
        </tr>
    </thead>
    <tbody>
		<?php foreach($animaux as $animal): ?>
			
			<?php foreach($animal->photos as $photo): ?>
				<?php if ($photo->premiere == 1) : ?>
					<?php $link = $photo->lien; ?>
        		<?php endif; ?>
        	<?php endforeach; ?>

			<tr class="animal-line" data-animal-id="<?php echo $animal->id ?>">
				<td class="text-center">
					<?php if (isset($link)) : ?>
						<img src="/<?php echo BASE_URL ?>img/animaux/00-<?php echo $link ?>" alt="Amasa" height="40" />
					<?php else : ?>
						<img src="/<?php echo BASE_URL ?>img/animaux/00-error.png" alt="Amasa" height="40" />
					<?php endif; ?>
				</td>
				<td class="text-center">
					<a href="<?php echo $animal->id ?>"><?php echo $animal->nom ?></a>
				</td>
				<td class="text-center">
					<?php echo $animal->type ?>
				</td>
				<td class="text-center">
					<?php echo $animal->categorie ?>
				</td>
				<td class="text-center">
					<a href="/<?php echo BASE_URL ?>admin/animaux/modify/<?php echo $animal->id ?>"><span class="glyphicon glyphicon-pencil" style="color:#AEB404;"></span></a>
				</td>
				<td class="text-center actions">
                    <a href="/<?php echo BASE_URL ?>admin/animaux/delete/<?php echo $animal->id ?>" class="delete-animal" data-animal-id="<?php echo $animal->id ?>">
                        <span class="glyphicon glyphicon-floppy-remove" style="color:#FE2E2E;"></span>
                    </a>
                </td>
			</tr>

			<?php unset($link); ?>

        <?php endforeach; ?>
    </tbody>
</table>
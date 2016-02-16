<div id="contenu">
	<h1><?php echo $title ?></h1>
	
	<?php foreach ($animaux as $animal) : ?>
		<?php if ($cpt % 3 == 0) : ?>
			<div class="row">
		<?php endif; ?>
			

		<?php if ($cpt % 3 == 2) : ?>
			</div>
		<?php endif; ?>	
		<?php $cpt++; ?>	
	<?php endforeach; ?>


<?php while($data = mysql_fetch_assoc($req)) : ?>
		<?php if ($cpt % 3 == 0) : ?>
		<div class="row">
		<?php endif; ?>
			<?php 
				if ($data['sexe'] == 2) {
					$couleur = '<h3><span class=rose>'.$data['nom'].'</span></h3>';
				}
				else {
					$couleur = '<h3><span class=bleu>'.$data['nom'].'</span></h3>';
				}
			?>
			<div class="col-md-4 img-portfolio">
				<!--<a href="portfolioAdopte.php?page=adopte&amp;annee=<?php //echo $annee ?>&amp;num_page=<?php //echo $num_page ?>&amp;idAnimal=<?php //echo $data['id'] ?>">-->
				<a href="administration/application/img/animaux/<?php echo $data['lien'] ?>" data-toggle="lightbox" data-gallery="multiimages" data-title="<?php echo $couleur; ?>">	
					<img class="img-responsive img-hover" src="administration/application/img/animaux/00-<?php echo $data['lien'] ?>" alt="amasa">
				</a>
				<h3>
					<span class ="<?php echo ($data['sexe'] == 1) ? 'bleu' : 'rose' ?> gras"><?php echo $data['nom'] ?></span>
				</h3>	
			</div>
		<?php if ($cpt % 3 == 2) : ?>
		</div>
		<?php endif; ?>
		
		<?php $cpt++; ?>
<?php endwhile; ?>
<?php 
	switch (($cpt) % 3) {
		case 0 :
			echo '';
			break;
			
		case 1 :
			echo '
					<div class="col-md-4 img-portfolio"></div>
				</div>
			';
			break;
			
		case 2 :
			echo '
					<div class="col-md-4 img-portfolio"></div>
					<div class="col-md-4 img-portfolio"></div>
				</div>
			';
			break;
	}
<?php var_dump($animaux) ?>
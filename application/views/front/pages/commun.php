<?php include_once("analyticstracking.php") ?>

<div id="contenu">
	<h1><?php echo $info_page->titre ?></h1>
	<?php if ($info_page->titre == 'Accueil') :?>
		<div class="pres_accueil">
			<?php echo $info_page->texte ?>
		</div>		
	<?php else : ?>
		<?php echo $info_page->texte ?>
	<?php endif; ?>		
</div>
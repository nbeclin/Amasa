<div id="contenu">
	<h1><?php echo $title ?></h1>
	
	<?php foreach ($animals as $animal) : ?>
		<?php if ($cpt % 3 == 0) : ?>
			<div class="row" style="margin-bottom: 10px;">
		<?php endif; ?>
			<div class="col-md-4 img-portfolio">
				<a href="/<?php echo BASE_URL ?>img/animaux/<?php echo $animal->photos[0]->lien ?>" data-toggle="lightbox" data-gallery="multiimages" data-title="<h3><span class=<?php echo ($animal->sexe == 2) ? 'rose' : 'bleu' ?>><?php echo $animal->nom ?></span></h3>">	
					<img class="img-responsive img-hover" src="/<?php echo BASE_URL ?>img/animaux/00-<?php echo $animal->photos[0]->lien ?>" alt="amasa">
				</a>
				<h3>
					<span class ="<?php echo ($animal->sexe == 1) ? 'bleu' : 'rose' ?> gras"><?php echo $animal->nom ?></span>
				</h3>	
			</div>

		<?php if ($cpt % 3 == 2) : ?>
			</div>
		<?php endif; ?>	
		<?php $cpt++; ?>	
	<?php endforeach; ?>



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
?>

<!-- Pagination -->
<div class="row text-center">
    <div class="col-lg-12">
        <ul class="pagination">
            <li>
                <a href="#">&laquo;</a>
            </li>
            <?php for($cpt=1;$cpt<=ceil($selected/9);$cpt++) : ?>
				<?php if ($page==$cpt) : ?>
					<li class="active">
						<a href="#"><?php echo $cpt ?></a>
					</li>
				<?php else : ?>
					<li>
						<a href="/<?php echo BASE_URL ?>pages/adopte/<?php echo $year ?>/<?php echo $cpt ?>"><?php echo $cpt ?></a>
					</li>
				<?php endif; ?>
            <?php endfor; ?>
            <li>
                <a href="#">&raquo;</a>
            </li>
        </ul>
    </div>
</div>
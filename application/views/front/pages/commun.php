<div id="contenu">
	<h1><?php echo $info_page->titre ?></h1>
	<?php if ($info_page->titre == 'Accueil') :?>
		<div class="pres_accueil">
			<?php echo $info_page->texte ?>
		</div>		
	<?php else : ?>
		<?php echo $info_page->texte ?>
	<?php endif; ?>
	

	<?php if (isset($parrainer)) : ?>
		<div id="parrainer">
		<h6>Nos animaux à parrainer</h6>
		<br />
		<?php foreach($animals as $animal) : ?>
		<!-- Display modal of animal -->
		<div class="modal fade" id="myModal<?php echo $animal->id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog" role="document" style="width: auto; max-width: 98%;">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h3 class="modal-title centre" id="myModalLabel"><span class="<?php echo ($animal->sexe == 1) ? 'bleu' : 'rose' ?> gras">~~~~ <?php echo strtoupper($animal->nom) ?> ~~~~</span></h3>
					</div>
					<div class="modal-body">
						<div class="row">
							<div class="col-md-7">
								<div class="ekko-lightbox-container">
									<div id="carousel-example-generic<?php echo $animal->id ?>" class="carousel slide" data-ride="carousel">
										<ol class="carousel-indicators">
											<?php if (sizeof($animal->photos) == 0) : ?>
												<li data-target="#carousel-example-generic<?php echo $animal->id ?>" data-slide-to="0" class="active"></li>
											<?php else : ?>
												<?php for($i=0;$i<sizeof($animal->photos);$i++) : ?>
													<?php if($i == 0) : ?>
														<li data-target="#carousel-example-generic<?php echo $animal->id ?>" data-slide-to="<?php echo $i ?>" class="active"></li>
													<?php else : ?>
														<li data-target="#carousel-example-generic<?php echo $animal->id ?>" data-slide-to="<?php echo $i ?>"></li>
													<?php endif; ?>
												<?php endfor; ?>
											<?php endif; ?>
										</ol>
										<div class="carousel-inner">
											<?php if (sizeof($animal->photos) == 0) : ?>
												<div class="item active">
													<img class="img-responsive img-modal" src="/<?php echo BASE_URL ?>img/animaux/error.png" alt="Amasa">
												</div>
											<?php else : ?>
												<?php for($i=0;$i<sizeof($animal->photos);$i++) : ?>
													<?php if($i == 0) : ?>
														<div class="item active">
															<img class="img-responsive img-modal" src="/<?php echo BASE_URL ?>img/animaux/<?php echo $animal->photos[$i]->lien ?>" alt="Amasa">
														</div>
													<?php else : ?>
														<div class="item">
															<img class="img-responsive img-modal" src="/<?php echo BASE_URL ?>img/animaux/<?php echo $animal->photos[$i]->lien ?>" alt="Amasa">
														</div>
													<?php endif; ?>
												<?php endfor; ?>
											<?php endif; ?>
										</div>

										<!-- Controls -->
										<a class="left carousel-control" href="#carousel-example-generic<?php echo $animal->id ?>" data-slide="prev">
											<span class="glyphicon glyphicon-chevron-left"></span>
										</a>
										<a class="right carousel-control" href="#carousel-example-generic<?php echo $animal->id ?>" data-slide="next">
											<span class="glyphicon glyphicon-chevron-right"></span>
										</a>
									</div>
								</div>
							</div>
							<div class="col-md-5">
								<div class="row">
									<div class="col-md-1"></div>
									<div class="col-md-3 panel panel-default">
										<h4><p class="text-center">
											<span class="<?php echo ($animal->sexe == 1) ? 'bleu' : 'rose' ?> gras">
												<?php echo ($animal->sexe) == 2 ? "Femelle" : "Male" ?>
											</span>
										</p></h4>
									</div>
									<div class="col-md-2"></div>
									<div class="col-md-5 panel panel-default">
										<h4><p class="text-center"><?php echo $animal->age_text ?></p></h4>
									</div>
									<div class="col-md-1"></div>
								</div>
								<h5><p><span class="gras">Soins : </span><?php echo $animal->soin ?></p></h5>
								<div class="row">
									<div class="col-md-4">
										<h5 ><p class="text-center"><span class="gras">Chat : </span>									
										<?php if($animal->okChat == '0') : ?>
										<span class="glyphicon glyphicon-thumbs-down rouge"></span>
										<?php endif; ?>
										<?php if($animal->okChat == '1') : ?>
										<span class="glyphicon glyphicon-thumbs-up vert"></span>
										<?php endif; ?>
										<?php if($animal->okChat == '2') : ?>
										<span class="glyphicon glyphicon-question-sign"></span>
										<?php endif; ?>
										</p></h5>
									</div>
									<div class="col-md-4">
										<h5><p class="text-center"><span class="gras">
										Chien : </span>									
										<?php if($animal->okChien == '0') : ?>
										<span class="glyphicon glyphicon-thumbs-down rouge"></span>
										<?php endif; ?>
										<?php if($animal->okChien == '1') : ?>
										<span class="glyphicon glyphicon-thumbs-up vert"></span>
										<?php endif; ?>
										<?php if($animal->okChien == '2') : ?>
										<span class="glyphicon glyphicon-question-sign"></span>
										<?php endif; ?>
										</p></h5>
									</div>
									<div class="col-md-4">
										<h5><p class="text-center"><span class="gras">
										Enfant : </span>								
										<?php if($animal->okEnfant == '0') : ?>
										<span class="glyphicon glyphicon-thumbs-down rouge"></span>
										<?php endif; ?>
										<?php if($animal->okEnfant == '1') : ?>
										<span class="glyphicon glyphicon-thumbs-up vert"></span>
										<?php endif; ?>
										<?php if($animal->okEnfant == '2') : ?>
										<span class="glyphicon glyphicon-question-sign"></span>
										<?php endif; ?>
										</p></h5>
									</div>
								</div>
								<h5><p><span class="gras">Son petit + : </span><?php echo $animal->plus ?></p></h5>
								<h5><p><span class="gras">Son petit - : </span><?php echo $animal->moins ?></p></h5>
								<h5><p><?php echo $animal->commentaire ?></p></h5>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

			<!-- Display animal -->
		<?php if ($cpt % 3 == 0) : ?>
			<div class="row">
		<?php endif; ?>
			<div class="col-md-4 img-portfolio">
                <a href="#" data-toggle="modal" data-target="#myModal<?php echo $animal->id ?>">
                    <img class="img-responsive img-hover" src="/<?php echo BASE_URL ?>img/animaux/00-<?php echo isset($animal->photos[0]) ? $animal->photos[0]->lien : 'error.png' ?>" alt="amasa" />
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
	<?php endif; ?>	
	</div>
</div>
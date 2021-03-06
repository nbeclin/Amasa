<ul class="nav nav-pills nav-stacked">
	<li class="active"><a href="/<?php echo BASE_URL ?>" class=""><span class="gras">Accueil</span></a></li>
	<li class="active 1-1"><a href="#" class=""><span class="gras">AMASA</span></a></li>
		<li class="ss-bt 1-2"><a href="/<?php echo BASE_URL ?>pages/association">L'association</a></li>
		<li class="ss-bt 1-2"><a href="/<?php echo BASE_URL ?>pages/bureau">Le bureau</a></li>
	<li class="active 2-1"><a href="#"><span class="gras">A l'adoption</span></a></li>
		<li class="ss-bt 2-2"><a href="/<?php echo BASE_URL ?>pages/adoption/chat">Chats adultes</a></li>
		<li class="ss-bt 2-2"><a href="/<?php echo BASE_URL ?>pages/adoption/chaton">Chatons</a></li>
		<li class="ss-bt 2-2"><a href="/<?php echo BASE_URL ?>pages/adoption/chien">Chiens</a></li>
	<li class="active 3-1"><a href="#"><span class="gras">Les adoptés</span></a></li>
		<?php
			for ($i=date("Y"); $i >= 2013 ; $i--) 
			{
				echo '<li class="ss-bt 3-2"><a href="/' . BASE_URL . 'pages/adopte/' . $i . '">' . $i . '</a></li>';
			}
		?>
	<li class="active 8-1"><a href="/<?php echo BASE_URL ?>pages/paradis"><span class="gras">Les Anges d'Amasa</span></a></li>
	<li class="active 4-1"><a href="#"><span class="gras">Adopter un animal</span></a></li>
		<li class="ss-bt 4-2"><a href="/<?php echo BASE_URL ?>pages/condAdoption">Conditions</a></li>
	 	<li class="ss-bt 4-2"><a href="/<?php echo BASE_URL ?>pages/tarifAdoption">Tarifs</a></li>
				  
	<li class="active 5-1"><a href="#"><span class="gras">Nous aider</span></a></li>
		<li class="ss-bt 5-2"><a href="/<?php echo BASE_URL ?>pages/devFamille">Devenir Famille d'accueil</a></li>
		<li class="ss-bt 5-2"><a href="/<?php echo BASE_URL ?>pages/adherer">Adhérer à l'association</a></li>
		<li class="ss-bt 5-2"><a href="/<?php echo BASE_URL ?>pages/don">Faire un don</a></li>
		<li class="ss-bt 5-2"><a href="/<?php echo BASE_URL ?>pages/parrainer">Parrainer un animal</a></li>
	<li class="active 6-1"><a href="/<?php echo BASE_URL ?>pages/lien"><span class="gras">Liens utiles</span></a></li>
	<li class="active 7-1"><a href="/<?php echo BASE_URL ?>pages/presse"><span class="gras">Revue de presse</span></a></li>
</ul>

<br />			

<div class="row">
	<!-- Loading contact -->
	<div class="col-md-4">
		<a href="#" data-toggle="modal" data-target="#form_contact">
			<p class="text-center"><img src="/<?php echo BASE_URL ?>img/mail.png" alt="Responsive image"></p>
		</a>
	</div>
	<div class="col-md-4">
		<a href="https://www.facebook.com/31pattesdamour/?fref=ts" target="_blank" >
			<p class="text-center"><img src="/<?php echo BASE_URL ?>img/fb.png" alt="Responsive image"></p>
		</a>
	</div>
	<div class="col-md-4" id="phone_picture_show" >
		<a href="#:">
			<p class="text-center"><img src="/<?php echo BASE_URL ?>img/phone.png" alt="Responsive image"></p>
		</a>
	</div>
	<div class="col-md-4" id="phone_picture_hide">
		<a href="#:">
			<p class="text-center"><img src="/<?php echo BASE_URL ?>img/phone.png" alt="Responsive image"></p>
		</a>
	</div>
</div>


<div class="row" >
	<!-- Loading contact -->
	<div class="col-md-12">
		<div class="alert alert-info" role="alert" id="display_phone">
	  		<p class="text-center"><span class="glyphicon glyphicon-phone-alt"></span> : 06 74 53 76 52</p>
		</div>
	</div>
</div>

<a href="https://www.teaming.net/31pattesd-amour-amasa-grupo" target="_blank">
	<div class="row teaming" >
		<div class="col-md-5">
			<img src="/<?php echo BASE_URL ?>img/logo80.png"
					alt="" title="" class="img-responsive" />	
		</div>
		<div class="col-md-7">
			<p class="text-center">Donne 1 euro par mois &agrave; notre Groupe Teaming</p>
		</div>
		<div class="col-md-12">
			<img	src="https://djg5cfn4h6wcu.cloudfront.net/resources/images/logo_p.png"
					alt="Logo Teaming" title="Logo Teaming" class="img-responsive">
		</div>
		<div class="col-md-12">.
			<a href="https://www.teaming.net/31pattesd-amour-amasa-grupo" class="btn btn-primary btn-block active" role="button" onclick="prevent_propagation_widget(event,'https://www.teaming.net/31pattesd-amour-amasa-grupo')">Rejoins notre Groupe</a>
		</div>
	</div>
</a>
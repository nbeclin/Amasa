<!-- Loading contact modal -->
<div class="modal fade" id="form_contact" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: auto; max-width: 50%;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4>Formulaire de contact</h4>
            </div>
            <div class="modal-body">
                <form class="form" method="post">
                    <div class="row">
                    	<div class="col-md-12">
                            <div class="form-group">
								<label class="control-label">Votre E-mail</label>
								<input type="text" name="mail" class="form-control" value="" />
							</div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
								<label class="control-label">Sujet</label>
								<input type="text" name="subject" class="form-control" value="" />
							</div>
                        </div>
                        <div class="col-md-12">
                           <div class="form-group">
								<label class="control-label">Message</label>
								<textarea name="note" class="form-control" rows="15" value=""></textarea>
							</div>
                        </div>
                    </div>
                    <div class="row" >
                        <div class="col-md-12">
                            <input type="submit" name="submit_form_contact" class="btn btn-primary pull-right" value="Enregistrer" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="container bandeau">
	<!-- Loading header -->
	<div class="row">
		<div class="col-md-2">
			<p class="text-center"><br /><img src="/<?php echo BASE_URL ?>img/logo.png" alt="amasa" /></p>
		</div>
		<div class="col-md-8" style="padding-left: 30px;">
			<p class="text-center titre1">31 Pattes d'amour - AMASA</p>
			<p class="text-center titre2">Association Muretaine pour les Animaux Sans-Abris</p>
			<div class="container-bd-photo">
				<div class="bd-photo">
					<?php for ($i=1;$i<31;$i++) : ?><img src="/<?php echo BASE_URL ?>img/bandeau/img<?php echo $i ?>.jpg" id="img<?php echo $i ?>" class="img-bd-photo" /><?php endfor; ?>
				</div>
				<input type="hidden" id="cpt" value="1" />
			</div>
			<p class="text-center titre3">Aidons-les !<br />Ils ont besoin de nous, Nous avons besoin de vous !</p>
		</div>
		<div class="col-md-2">
			<p class="text-center titre4"><br />Zoom sur la star du mois...</p>
			<p class="text-center"><img class="img-chat-mois img-circle" src="/<?php echo BASE_URL ?>img/animaux/yellow.jpg" alt="amasa" /></p>
			<p class="text-center titre5"><?php echo 'Yellow' ?></p>
		</div>
	</div>
</div>
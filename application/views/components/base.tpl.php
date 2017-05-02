<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php if (isset($animal)) : ?>
        <meta property="fb:app_id"        content="655080841366922" />
        <meta property="og:url"           content="http://31pattesdamour.fr/pages/social/<?php echo $animal->id ?>" />
        <meta property="og:type"          content="website" />
        <meta property="og:title"         content="31 Pattes d'Amour" />
        <meta property="og:description"   content="<?php echo $animal->commentaire ?>" />
    <?php endif ?> 
    <title><?php echo $title; ?></title>
    <?php include 'css.tpl.php'; ?>
</head>

<!-- Display modal of pet_of_the_month -->
<div class="modal fade" id="pet_of_the_month_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: auto; max-width: 98%;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title centre" id="myModalLabel"><span class="<?php echo ($pet_of_the_month->sexe == 1) ? 'bleu' : 'rose' ?> gras">~~~~ <?php echo strtoupper($pet_of_the_month->nom) ?> ~~~~</span></h3>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-7">
                        <div class="ekko-lightbox-container">
                            <div id="carousel-example-generic<?php echo $pet_of_the_month->id ?>" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    <?php for($i=0;$i<sizeof($pet_of_the_month->photos);$i++) : ?>
                                        <?php if($i == 0) : ?>
                                            <li data-target="#carousel-example-generic<?php echo $pet_of_the_month->id ?>" data-slide-to="<?php echo $i ?>" class="active"></li>
                                        <?php else : ?>
                                            <li data-target="#carousel-example-generic<?php echo $pet_of_the_month->id ?>" data-slide-to="<?php echo $i ?>"></li>
                                        <?php endif; ?>
                                    <?php endfor; ?>
                                </ol>
                                <div class="carousel-inner">
                                    <?php for($i=0;$i<sizeof($pet_of_the_month->photos);$i++) : ?>
                                        <?php if($i == 0) : ?>
                                            <div class="item active">
                                                <img class="img-responsive img-modal" src="/<?php echo BASE_URL ?>img/animaux/<?php echo $pet_of_the_month->photos[$i]->lien ?>" alt="Amasa">
                                            </div>
                                        <?php else : ?>
                                            <div class="item">
                                                <img class="img-responsive img-modal" src="/<?php echo BASE_URL ?>img/animaux/<?php echo $pet_of_the_month->photos[$i]->lien ?>" alt="Amasa">
                                            </div>
                                        <?php endif; ?>
                                    <?php endfor; ?>
                                </div>

                                <!-- Controls -->
                                <a class="left carousel-control" href="#carousel-example-generic<?php echo $pet_of_the_month->id ?>" data-slide="prev">
                                    <span class="glyphicon glyphicon-chevron-left"></span>
                                </a>
                                <a class="right carousel-control" href="#carousel-example-generic<?php echo $pet_of_the_month->id ?>" data-slide="next">
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
                                    <span class="<?php echo ($pet_of_the_month->sexe == 1) ? 'bleu' : 'rose' ?> gras">
                                        <?php echo ($pet_of_the_month->sexe) == 2 ? "Femelle" : "Male" ?>
                                    </span>
                                </p></h4>
                            </div>
                            <div class="col-md-2"></div>
                            <div class="col-md-5 panel panel-default">
                                <h4><p class="text-center"><?php echo $pet_of_the_month->age_text ?></p></h4>
                            </div>
                            <div class="col-md-1"></div>
                        </div>
                        <h5><p><span class="gras">Soins : </span><?php echo $pet_of_the_month->soin ?></p></h5>
                        <div class="row">
                            <div class="col-md-4">
                                <h5 ><p class="text-center"><span class="gras">Chat : </span>                                   
                                <?php if($pet_of_the_month->okChat == '0') : ?>
                                <span class="glyphicon glyphicon-thumbs-down rouge"></span>
                                <?php endif; ?>
                                <?php if($pet_of_the_month->okChat == '1') : ?>
                                <span class="glyphicon glyphicon-thumbs-up vert"></span>
                                <?php endif; ?>
                                <?php if($pet_of_the_month->okChat == '2') : ?>
                                <span class="glyphicon glyphicon-question-sign"></span>
                                <?php endif; ?>
                                </p></h5>
                            </div>
                            <div class="col-md-4">
                                <h5><p class="text-center"><span class="gras">
                                Chien : </span>                                 
                                <?php if($pet_of_the_month->okChien == '0') : ?>
                                <span class="glyphicon glyphicon-thumbs-down rouge"></span>
                                <?php endif; ?>
                                <?php if($pet_of_the_month->okChien == '1') : ?>
                                <span class="glyphicon glyphicon-thumbs-up vert"></span>
                                <?php endif; ?>
                                <?php if($pet_of_the_month->okChien == '2') : ?>
                                <span class="glyphicon glyphicon-question-sign"></span>
                                <?php endif; ?>
                                </p></h5>
                            </div>
                            <div class="col-md-4">
                                <h5><p class="text-center"><span class="gras">
                                Enfant : </span>                                
                                <?php if($pet_of_the_month->okEnfant == '0') : ?>
                                <span class="glyphicon glyphicon-thumbs-down rouge"></span>
                                <?php endif; ?>
                                <?php if($pet_of_the_month->okEnfant == '1') : ?>
                                <span class="glyphicon glyphicon-thumbs-up vert"></span>
                                <?php endif; ?>
                                <?php if($pet_of_the_month->okEnfant == '2') : ?>
                                <span class="glyphicon glyphicon-question-sign"></span>
                                <?php endif; ?>
                                </p></h5>
                            </div>
                        </div>
                        <h5><p><span class="gras">Son petit + : </span><?php echo $pet_of_the_month->plus ?></p></h5>
                        <h5><p><span class="gras">Son petit - : </span><?php echo $pet_of_the_month->moins ?></p></h5>
                        <h5><p><?php echo $pet_of_the_month->commentaire ?></p></h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<body onload="javascript:setInterval(function(){slide(document.getElementById('cpt').value);},900);" <?php echo !DEV ? 'class="prod"' : ''; ?>>    
    
    <?php include 'header_start.tpl.php' ?>
   
    <p class="text-center">
        <a href="#" data-toggle="modal" data-target="#pet_of_the_month_modal">
            <img class="img-chat-mois" style="border-radius: 200px 200px 200px 200px; -moz-border-radius: 200px 200px 200px 200px; -webkit-border-radius: 200px 200px 200px 200px; border: 3px solid #F46320; background-color: #F46320; max-height: 100px; width: auto;" src="/<?php echo BASE_URL ?>img/animaux/00-<?php echo (isset($pet_of_the_month->photos[0])) ? $pet_of_the_month->photos[0]->lien : 'error.png' ?>" style="max-height: 100px; width: auto;" alt="amasa" />
        </a>
    </p>
    <p class="text-center titre5">
        <span style="color : #F46320;"><?php echo $pet_of_the_month->nom ?></span>
    </p>
    
    <?php include 'header_end.tpl.php' ?>

    <?php if (isset($result_form_contact['error'])): ?>
        <div class="container">
            <div class="row">
                <div class="alert alert-danger">
                    <?php echo $result_form_contact['error'] ?>
                </div>
            </div>
        </div>
    <?php endif; ?>
        
    <?php if (isset($result_form_contact['success'])) : ?>
        <div class="container">
            <div class="row">
                <div class="alert alert-success">
                    <?php echo $result_form_contact['success'] ?>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <div class="container">
        <div class="row">
            <!-- Loading menu -->
            <div class="col-md-3 reduire">
                <?php include 'navbar.tpl.php' ?>
            </div>
            <!-- Loading content -->
            <div class="col-md-9 reduire">
                <?php echo $this->content(); ?>
            </div>
        </div>
    </div>

    <?php include 'footer.tpl.php' ?>

    <?php include 'scripts.tpl.php'; ?>

    <script type="text/javascript">
        var BASE_URL = '/<?php echo BASE_URL; ?>';
    </script>
</body>
</html>
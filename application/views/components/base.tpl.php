<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $title; ?></title>
    <?php include 'css.tpl.php'; ?>
</head>

<body onload="javascript:setInterval(function(){slide(document.getElementById('cpt').value);},900);" <?php echo !DEV ? 'class="prod"' : ''; ?>>    
    
    <?php include 'header_start.tpl.php' ?>
   
    <p class="text-center">
        <img class="img-chat-mois img-circle" src="/<?php echo BASE_URL ?>img/animaux/00-<?php echo $pet_of_the_month['lien'] ?>" alt="amasa" />
    </p>
    <p class="text-center titre5">
        <?php echo $pet_of_the_month['nom'] ?>
    </p>
    
    <?php include 'header_end.tpl.php' ?>

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
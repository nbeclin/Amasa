    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand logo" href="/<?php echo BASE_URL; ?>admin/">Administration</a>
            </div>

            <div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <?php if ((isset($user) && ($user->id == null)) || !isset($user)) : ?>
                    <li class="<?php echo $nav == 'login' ? 'active' : ''; ?>">
                        <a href="/<?php echo BASE_URL; ?>admin/login"><span class="glyphicon glyphicon-user" style="color:#8A0808;"></span> <span class="glyphicon glyphicon-log-in"></span></a>
                    </li>
                    <?php else : ?>
                    <li class="<?php echo $nav == 'pages' ? 'active' : ''; ?>">
                        <a href="/<?php echo BASE_URL; ?>" target="_blank"><span class="glyphicon glyphicon-eye-open" style="color:#81DAF5;"></span></a>
                    </li>
                    <li class="<?php echo $nav == 'pages' ? 'active' : ''; ?> li-separation">
                        <a href="/<?php echo BASE_URL; ?>admin/pages">Pages</a>
                    </li>
                    <li class="<?php echo $nav == 'animaux' ? 'active' : ''; ?>">
                        <a href="/<?php echo BASE_URL; ?>admin/animaux">Animaux</a>
                    </li>
                    <li class="<?php echo $nav == 'logout' ? 'active' : ''; ?> li-separation">
                        <a href="/<?php echo BASE_URL; ?>admin/logout"><span class="glyphicon glyphicon-user" style="color:#088A29;"></span> <span style="color:#088A29;"><?php echo $user->login ?></span> <span class="glyphicon glyphicon-log-out"></span></a>
                    </li>
                <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>
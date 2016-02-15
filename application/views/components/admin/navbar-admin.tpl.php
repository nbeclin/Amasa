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
                    <li class="<?php echo $nav == 'pages' ? 'active' : ''; ?>">
                        <a href="/<?php echo BASE_URL; ?>admin/pages">Pages</a>
                    </li>
                    <li class="<?php echo $nav == 'animaux' ? 'active' : ''; ?>">
                        <a href="/<?php echo BASE_URL; ?>admin/animaux">Animaux</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
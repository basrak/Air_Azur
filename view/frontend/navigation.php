
<?php ob_start(); ?>

<div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#"><img src="http://localhost/Eval_PHP_FPS/img/logo.png" data-active-url="http://localhost/Eval_PHP_FPS/img/logo-active.png" alt=""></a>
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav navbar-right main-nav">
            <li><a href="agence.php?action=accueil"> Accueil</a></li>
            <li><a href="agence.php?action=vol"> Liste des Vols</a></li>
            <li><a href="agence.php?action=reservation"> Réservations</a></li>
            <li><a href="agence.php?action=client"> Liste des Clients</a></li>
            <li><a href="./view/logout.php" class="btn btn-blue">Se déconnecter</a></li>
        </ul>
    </div>
    <!-- /.navbar-collapse -->
</div>
<!-- /.container-fluid -->

<?php $nav = ob_get_clean(); ?>
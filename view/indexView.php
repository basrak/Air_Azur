
<?php $title = 'Home - Air Azur'; ?>
<?php $msgConnexion = ""; ?>

<?php ob_start();?>

<div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#"><img src="./img/logo.png" data-active-url="./img/logo-active.png" alt=""></a>
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav navbar-right main-nav">
            <li><a href="#connexionForm" class="btn btn-blue">Se Connecter</a></li>
        </ul>
    </div>
    <!-- /.navbar-collapse -->
</div>
<!-- /.container-fluid -->

<?php $nav = ob_get_clean(); ?>

<?php ob_start(); ?>

<div class="container">
    <div class="table">
        <div class="header-text">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h3 class="light white">Bienvenue sur l'intranet d'Air Azur</h3>
                    <h1 class="white typed">Un réseau d'agences à votre service</h1>
                    <span class="typed-cursor">|</span>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $header = ob_get_clean(); ?>

<?php ob_start(); ?>

<div id='connexionForm'>
    <h3 class="white">Connexion</h3>
    <form action="" method='post' class="popup-form">
        <input required type="text" id='login' name='login' class="form-control form-blue" placeholder="login">
        <input required type="text" id='mdp' name='mdp' class="form-control form-blue" placeholder="mot de passe">
        <span class="errorMsg" id="validation"><?php echo $msgConnexion;?></span>  
        <button type="submit" id="Connexion" name="Connexion" class="btn btn-submit">Soumettre</button>
    </form>
</div>

<?php $content1 = ob_get_clean(); ?>

<?php $content2 = ''; ?>

<?php
require('/view/_layout.php');


<?php ob_start(); ?>

<div class="container">
    <div class="table">
        <div class="header-text">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h1 class="light white">Bienvenue Agence <?= htmlspecialchars($_SESSION['login']);?></h1>
                    <h1 class="white typed">Vous resterez connectés au serveur jusqu'à sa fermeture ce soir</h1>
                    <span class="typed-cursor">|</span>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $header = ob_get_clean(); ?>


<?php $content1 = ""; ?>


<?php $content2 = ""; ?>


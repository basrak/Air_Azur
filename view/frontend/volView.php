
<?php $header = ""; ?>

<?php ob_start(); 

?>

<div class="container">
    <div class="table search-vol-table">
        <div class="col-md-12">
            <div class="col-md-12">
                <div class="col-md-2"><label for="sVilleDepart"><h6 class="white">Ville de départ</label></h6></div>
                <div class="col-md-2">
                    <input type="hidden" id="hVilleDepart" name="hVilleDepart" value="" />
                    <select id="sVilleDepart" name="sVilleDepart" class="selectpicker">
                        <?php
                        echo '<option value="0">Toutes les villes</option>';
                        foreach ($arpts as $arpt) :
                            echo '<option value="' . $arpt->getIdArpt() . '">' . $arpt->getVilleArpt() . '</option>';
                        endforeach;
                        ?>
                    </select></div>
            </div>
            <div class="col-md-12">
                <div class="col-md-2"><label for="sVilleArrivee"><h6 class="white">Ville d'Arrivée</label></h6></div>
                <div class="col-md-2">
                    <input type="hidden" id="hVilleArrivee" name="hVilleArrivee" value=""/>
                    <select id="sVilleArrivee" name="sVilleArrivee" class="selectpicker">
                        <?php
                        echo '<option value="0">Toutes les villes</option>';
                        foreach ($arpts as $arpt) :
                            echo '<option value="' . $arpt->getIdArpt() . '">' . $arpt->getVilleArpt() . '</option>';
                        endforeach;
                        ?>
                    </select></div> 
                <div class="col-md-4"><a href="#" class="btn btn-white-fill expand">Sélectionner tous les vols </a></div>
            </div>
        </div>
    </div>
</div>

<?php $content1 = ob_get_clean(); ?>

        <?php ob_start(); ?>

<div class="container">
    <div class="table intro-tables">
<?php
foreach ($vols as $vol):
    ?>
            <div class="container">
                <div class="row intro-tables">			
                    <div class="col-md-12">
                        <div class="vol">
                            <div class="row">
                                <div class="col-md-4"><h4 class="black">Vol : <?php echo $vol->getVolgen()->getCodeVol(); ?></h4></div>
                                <div class="col-md-6"><h4 class="black">Depart : <?php echo "" . findArpt($vol->getVolgen()->getIdArpt(), "id")->getNomArpt() . " " . $vol->getDateDepart() . ""; ?></h4></div>
                            </div>
                            <div class="row">
                                <div class="col-md-4"><h4 class="black"></h4></div>
                                <div class="col-md-6"><h4 class="black">Arrivee : <?php echo "" . findArpt($vol->getVolgen()->getIdArptArrivee(), "id")->getNomArpt() . " " . $vol->getDateArrivee() . ""; ?></h4></div>
                                <div class="col-md-2" data-target=".modal-link"><a data-toggle="modal" data-id="<?php $idVol = $vol->getVolGen()->getIdVol() ?>" href="#" class="btn btn-blue-fill expand">Réserver</a></div>
                            </div>
                            <div class="row">
                                <div class="col-md-4"><h4 class="black"></h4></div>
                                <div class="col-md-3"><h4 class="black">Prix : <?php echo $vol->getVolGen()->getPrixVol(); ?></h4></div>
                                <div class="col-md-3"><h4 class="black">Places : <?php echo $vol->getVolGen()->getPlacesVol(); ?></h4></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<?php endforeach; ?>

    </div>
</div>
<?php $content2 = ob_get_clean(); ?>

<?php ob_start(); ?>

<script src="http://localhost/Eval_PHP_FPS/js/searchVol.js" type="text/javascript"></script>

<?php $script = ob_get_clean(); ?>
        



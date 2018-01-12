
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
                                <div class="col-md-2"><a data-toggle="modal" data-target="modalReserver" data-id="<?php echo $vol->getVolGen()->getIdVol(); ?>" href="#" class="reserver btn btn-blue-fill expand">Réserver</a></div>
                                <!-- <div class="col-md-2"><a data-toggle="modal" data-target="modalReserver" onclick="loadReserver(1)" href="#" class="reserver btn btn-blue-fill expand">Réserver</a></div> -->
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

<div class="modal fade" id="modalReserver" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content modal-popup">
            <a href="#" class="close-link"><i class="icon_close_alt2"></i></a>
            <input type="hidden" name="hiddenIdVol" id="hiddenIdVol" value="" />
            <h3 class="white">Reserver pour le vol </h3>
            <form action="" class="popup-form">
                <div class="container">
                    <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
                        <div class="row">
                            <div class="form-group col-md-6 col-sm-6 col-xs-6 col-lg-6">
                                <label class="control-label">Client</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <span class="glyphicon glyphicon-user"></span>
                                    </div>
                                    <div class="select-group">
                                        <div class="select-group-addon">
                                        </div>
                                        <select id="selClient" name="selClient" class="form-control"></select>
                                    </div>        
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6 col-sm-6 col-xs-6 col-lg-6">
                                    <label for="nomC" class="control-label">Nom</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <span class="glyphicon glyphicon-user"></span>
                                        </div>
                                        <input type="text" id="nomC" name="nomC" class="form-control" placeholder="nom">
                                    </div>
                                </div>
                                <div class="form-group col-md-6 col-sm-6 col-xs-6 col-lg-6">
                                    <label for="prenomC" class="control-label">Prenom</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <span class="glyphicon glyphicon-check"></span>
                                        </div>
                                        <input type="text" id="prenomC" name="prenomC" class="form-control" placeholder="prénom">
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="form-group col-md-6 col-sm-6 col-xs-6 col-lg-6">
                                    <label for="adresseC" class="control-label">Adresse</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <span class="glyphicon glyphicon-envelope"></span>
                                        </div>
                                        <input type="text" id="adresseC" name="adresseC" class="form-control" placeholder="adresse">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6 col-sm-6 col-xs-6 col-lg-6">
                                    <label for="CPC" class="control-label">Code Postal</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <span class="glyphicon glyphicon-envelope"></span>
                                        </div>
                                        <input type="text" id="CPC" name="CPC" class="form-control" placeholder="code postal">
                                    </div>
                                </div>

                                <div class="form-group col-md-6 col-sm-6 col-xs-6 col-lg-6">
                                    <label for="villeC" class="control-label">Ville</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <span class="glyphicon glyphicon-envelope"></span>
                                        </div>
                                        <input type="text" id="villeC" name="villeC" class="form-control" placeholder="ville">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6 col-sm-6 col-xs-6 col-lg-6">
                                    <label for="telC" class="control-label">Téléphone</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <span class="glyphicon glyphicon-envelope"></span>
                                        </div>
                                        <input type="text" id="telC" name="telC" class="form-control" placeholder="téléphone">
                                    </div>
                                </div>

                                <div class="form-group col-md-6 col-sm-6 col-xs-6 col-lg-6">
                                    <label for="mailC" class="control-label">Email</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <span class="glyphicon glyphicon-envelope"></span>
                                        </div>
                                        <input type="text" id="mailC" name="mailC" class="form-control" placeholder=".........@.......">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6 col-sm-6 col-xs-6 col-lg-6">
                                    <label class="control-label">Nombre de places</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <span class="glyphicon glyphicon-user"></span>
                                        </div>
                                        <select id="placesC" name="placesC" class="form-control">
                                            <?php
                                            $i = 1;
                                            while ($i <= 100) {
                                                ?>
                                                <option value="<?php echo $i ?>"><?php echo $i ?></option> <?php $i++;
                                        }
                                            ?>
                                        </select>
                                    </div>        
                                </div>

                                <div class="form-group col-md-6 col-sm-6 col-xs-6 col-lg-6">
                                    <label for="prixT" class="control-label">Prix total</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <span class="glyphicon glyphicon-envelope"></span>
                                        </div>
                                        <input type="text" id="prixT" name="prixT" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-action">
                                    <button type="submit" class="btn btn-blue-fill expand">Envoyer</button>
                                    <button type="submit" class="btn btn-blue-fill expand">Annuler</button>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>



<script src="http://localhost/Eval_PHP_FPS/js/reserver.js" type="text/javascript"></script>

<?php $script = ob_get_clean(); ?>
        



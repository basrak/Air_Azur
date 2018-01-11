<?php $header = ""; ?>

<?php $nav = ""; ?>

<?php $content1 = ""; ?>

<?php ob_start(); ?>

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
                            <?php $i = 1;
                            while ($i <= 100) {
                                ?>
                                <option value="<?php echo $i ?>"><?php echo $i ?></option> <?php $i++;
                        } ?>
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


<?php $content2 = ob_get_clean(); ?>

    test

    <?php $script = ""; ?>

    <?php
    require '../view/_layout.php';


    
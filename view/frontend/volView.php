
<?php $header = ""; ?>

<?php
ob_start();

    foreach($vols as $vol): 
        ?>
        <div class="cut cut-top"></div>
        <div class="container">
            <div class="row intro-tables">			
                <div class="col-md-12">
                    <div class="vol">
                        <div class="row">
                            <div class="col-md-4"><h4 class="black">Vol : <?php echo $vol->getVolgen()->getCodeVol(); ?></h4></div>
                            <div class="col-md-6"><h4 class="black">Depart : <?php echo $vol->getDateDepart(); ?></h4></div>
                        </div>
                        <div class="row">
                            <div class="col-md-4"><h4 class="black"></h4></div>
                            <div class="col-md-6"><h4 class="black">Arrivee : <?php echo $vol->getDateArrivee(); ?></h4></div>
                            <div class="col-md-2"><a href="#" class="btn btn-blue-fill expand">Réserver</a></div>
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
<?php endforeach; $content1 = ob_get_clean(); ?>
        
<?php $content2 = ""; 


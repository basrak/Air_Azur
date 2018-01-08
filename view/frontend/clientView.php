list des clients
<?php $header = ""; ?>



<?php $content1 = ob_get_clean(); ?>

        <?php ob_start(); ?>

<div class="container">
    <div class="table intro-tables">
<?php
foreach ($client as $client):
   
    
    
    
    ?>
            <div class="container">
                <div class="row intro-tables">			
                    <div class="col-md-12">
                        <div class="client">
                            <div class="row">
                                <div class="col-md-4"><h8 class="black"> : IdClient<?php echo $client->getIdClient(); ?></h8></div>
                                 <div class="col-md-4"><h8 class="black"> : NomClient<?php echo $client->getNomClient(); ?></h8></div>
                                  <div class="col-md-4"><h8 class="black"> : PrenomClient<?php echo $client->getPrenomClient(); ?></h8></div>
                                   <div class="col-md-4"><h8 class="black"> : AdrClient<?php echo $client->getAdrClient(); ?></h8></div>
                                    <div class="col-md-4"><h8 class="black"> : CpClient<?php echo $client->getCpClient(); ?></h8></div>
                                     <div class="col-md-4"><h8 class="black"> : VilleClient<?php echo $client->getVilleClient(); ?></h8></div>
                                      <div class="col-md-4"><h8 class="black"> : TelClient<?php echo $client->getTelClient(); ?></h8></div>
                                      <div class="col-md-4"><h8 class="black"> : MailClient<?php echo $client->getMailClient(); ?></h8></div>
                                
                                
                        </div>
                    </div>
                </div>
            </div>
<?php endforeach; ?>

    </div>
</div>
<?php $content2 = ob_get_clean(); ?>

<?php ob_start(); ?>

<script src="http://localhost/Eval_PHP_FPS/js/searchClient.js" type="text/javascript"></script>

<?php $script = ob_get_clean(); ?>
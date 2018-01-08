
<?php $header = ""; ?>


<?php $content1 = ""; ?>

<?php ob_start(); ?>

<div class="container">
    <table class="salahCss"> 
        <thead>
            <tr>
                <th>Num</th> 
                <th>Nom</th>
                <th>Prenom</th>
                <th>Numéro de vol</th>
                <th>Date Départ</th>
                <th>Places</th>
                <th>Prix</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($reservations as $reservation):
                ?>
                <tr>
                    <td><?php echo $reservation->getIdReserv(); ?></td>
                    <td><?php echo findClient($reservation->getIdClient())->getNomClient(); ?></td>
                    <td><?php echo findClient($reservation->getIdClient())->getPrenomClient(); ?></td>
                    <td><?php echo findVolGen($reservation->getIdVol(), "id")->getCodeVol(); ?></td>
                    <td><?php echo $reservation->getDateDepart(); ?></td>
                    <td><?php echo $reservation->getNbrReserv(); ?></td>
                    <td><?php echo findVolGen($reservation->getIdVol(), "id")->getPrixVol() * $reservation->getNbrReserv(); ?></td>
                    <td><a href="reservation.php?id=<?php echo $reservation->getIdReserv(); ?>"><img src="../img/pdf_mini.png"/></a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table> 
</div>


<?php $content2 = ob_get_clean(); ?>

<?php ob_start(); ?>

<script src="http://localhost/Eval_PHP_FPS/js/searchVol.js" type="text/javascript"></script>

<?php $script = ob_get_clean(); ?>
        



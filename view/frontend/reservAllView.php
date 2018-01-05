
<?php $header = ""; ?>


<?php $content1 = ""; ?>

<?php ob_start(); ?>

<div class="container">
    <table> 
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
                    <td><?php echo getClient($reservation->getIdClient())->getNomClient(); ?></td>
                    <td><?php echo getClient($reservation->getIdClient())->getPrenomClient(); ?></td>
                    <td><?php echo getVolGen($reservation->getIdVol())->getCodeVol(); ?></td>
                    <td><?php echo $reservation->getDateDepart(); ?></td>
                    <td><?php echo $reservation->getNbrReserv(); ?></td>
                    <td><?php echo getVolGen($reservation->getIdVol())->getPrixVol() * $reservation->getNbrReserv(); ?></td>
                    <td><a href="#"</td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table> 
</div>


<?php $content2 = ob_get_clean(); ?>

<?php ob_start(); ?>

<script src="http://localhost/Eval_PHP_FPS/js/searchVol.js" type="text/javascript"></script>

<?php $script = ob_get_clean(); ?>
        



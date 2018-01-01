
<?php ob_start(); ?>

<div class="container">
    <div class="table">
        <div class="header-text">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h3 class="light white">C'est les vols></h3>
                    <h1 class="white typed">Vous êtes connectés au serveur jusqu'à sa fermeture </h1>
                    <span class="typed-cursor">|</span>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $header = ob_get_clean(); ?>


<?php ob_start; if (count($vols) > 0): ?>
<table>
  <thead>
    <tr>
      <th><?php echo implode('</th><th>', array_keys(current($vols))); ?></th>
    </tr>
  </thead>
  <tbody>
<?php foreach ($vols as $row): array_map('htmlentities', $row); ?>
    <tr>
      <td><?php echo implode('</td><td>', $row); ?></td>
    </tr>
<?php endforeach; ?>
  </tbody>
</table>
<?php endif; ?>


<?php $content1 = ob_get_clean(); ?>


<?php $content2 = ""; ?>


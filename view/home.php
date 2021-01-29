<?php $title = 'Acceuil'; ?>


<?php ob_start(); ?>

    <h1>Ceci est l'acceuil</h1>


<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
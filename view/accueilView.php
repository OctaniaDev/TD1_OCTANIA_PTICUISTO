<?php ob_start(); ?>

<h1>Edito</h1>

<?php
$content = ob_get_clean();
$titre = 'Accueil';
require $GLOBALS['root'] . 'view/template.php';
?>
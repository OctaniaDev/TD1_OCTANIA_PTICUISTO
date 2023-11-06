<?php ob_start(); ?>

<h1>Gestion de comptes</h1>

<?php
$content = ob_get_clean();
$titre = 'Gestion de comptes';
require $GLOBALS['root'] . 'view/template.php';
?>
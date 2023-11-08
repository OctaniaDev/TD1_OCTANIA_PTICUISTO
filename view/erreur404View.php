<?php ob_start(); ?>
<h1>ERREUR 404</h1>

<?php
$content = ob_get_clean();
$titre = '404';
require $GLOBALS['root'] . 'view/template.php';
?>
<?php ob_start(); ?>

<div>
	<h2>Les dernière recettes</h2>

	<?php $accueil = true; require $GLOBALS['root'] . 'view/recetteView.php'; ?>
</div>
<p><?= $edito[0]['EDI_CONTENU'] ?><p>

<?php
$content = ob_get_clean();
$titre = 'Accueil';
require $GLOBALS['root'] . 'view/template.php';
?>
<?php

require_once('./controller/connexionController.php');
require_once('./controller/recetteController.php');

$routes = [
	'/' => $ROOT . 'view/accueilView.php',
	'/index.php' => $ROOT . 'view/accueilView.php',
	'/index.php?action=connexion' => new ConnexionController($connection),
	'/index.php?action=voir_recettes' => new RecetteController($connection),
];

?>
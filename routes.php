<?php

require_once('./controller/connexionController.php');
require_once('./controller/recetteController.php');
require_once('./controller/inscriptionController.php');
require_once('./controller/compteController.php');

$routes = [
	'/' => $ROOT . 'view/accueilView.php',
	'/index.php' => $ROOT . 'view/accueilView.php',
	'/index.php?action=deconnexion' => $ROOT . 'model/deconnexion.php',
	'/index.php?action=connexion' => new ConnexionController($connection),
	'/index.php?action=voir_recettes' => new RecetteController($connection),
	'/index.php?action=inscription' => new InscriptionController($connection),
	'/index.php?action=compte' => new compteController($connection),
];

?>
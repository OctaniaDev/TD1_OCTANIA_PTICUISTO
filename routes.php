<?php

require_once('./controller/connexionController.php');
require_once('./controller/recetteController.php');
require_once('./controller/ajoutRecetteController.php');
require_once('./controller/inscriptionController.php');
require_once('./controller/compteController.php');
require_once('./controller/adminController.php');
require_once('./controller/filtreRecetteController.php');

$routes = [
	'/' => $ROOT . 'view/accueilView.php',
	'/index.php' => $ROOT . 'view/accueilView.php',
	'/index.php?action=deconnexion' => $ROOT . 'model/deconnexion.php',
	'/index.php?action=connexion' => new ConnexionController($connection),
	'/index.php?action=voir_recettes' => new RecetteController($connection),
	'/index.php?action=inscription' => new InscriptionController($connection),
	'/index.php?action=compte' => new compteController($connection),
	'/index.php?action=supprimer_compte' => new compteController($connection),
	'/index.php?action=modifier_mot_de_passe' => new compteController($connection),
	'/index.php?action=ajout_recette' => new AjoutRecetteController($connection),
	'/index.php?action=admin' => new adminController($connection),
	'/index.php?action=gestion_de_compte' => new adminController($connection),
	'/index.php?action=voir_recettes_par_entrer' => new filtreRecetteController($connection),
	'/index.php?action=voir_recettes_par_titre' => new filtreRecetteController($connection),
	'/index.php?action=voir_recettes_par_ingredients' => new filtreRecetteController($connection)
];

?>	
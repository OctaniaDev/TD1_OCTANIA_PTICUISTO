<?php
require_once('./model/param_connexion_etu.php');
require_once('./model/pdo_agile.php');
require_once('./model/utilisateurModel.php');
require_once('./model/recetteModel.php');
require_once('./controller/connexionController.php');
require_once('./controller/recetteController.php'); 
require_once('./controller/inscriptionController.php');
require_once('./controller/compteController.php');

$connection = OuvrirConnexionPDO($db, $db_username, $db_password);

if (isset($_GET['action'])) {
    if ($_GET['action'] == 'connexion') {
        $connexionController = new ConnexionController($connection);
        $connexionController->choix();
    } elseif ($_GET['action'] == 'voir_recettes') {
        $recetteController = new RecetteController($connection);
        $recetteController->choix();
    } elseif ($_GET['action'] == 'inscription') {
        $inscriptionController = new InscriptionController($connection);
        $inscriptionController->choix();
    } elseif ($_GET['action'] == 'supprimer_compte') {
        $compteController = new CompteController($connection);
        $compteController->traiterSuppression();
    } elseif ($_GET['action'] == 'modifier_mot_de_passe') {
        $compteController = new CompteController($connection);
        $compteController->traiterModificationMotDePasse();
    }
} else {
    // $action = 'connexion';
    echo 'à faire';
}

$connection = null;
?>

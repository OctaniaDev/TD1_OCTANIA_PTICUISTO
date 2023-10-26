<?php
require_once('./model/param_connexion_etu.php');
require_once('./model/pdo_agile.php');
require_once('./model/utilisateurModel.php');
require_once('./model/recetteModel.php');
require_once('./controller/connexionController.php');
require_once('./controller/recetteController.php'); 

$connection = OuvrirConnexionPDO($db, $db_username, $db_password);

if (isset($_GET['action'])) {
    if ($_GET['action'] == 'connexion') {
        $connexionController = new ConnexionController($connection);
        $connexionController->choix();
    }
    if ($_GET['action'] == 'voir_recettes') {
        $recetteController = new RecetteController($connection);
        $recetteController->choix();
    }

} else {
    // $action = 'connexion';
    echo 'à faire';
}

$connction = null;
?>

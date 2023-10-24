<?php
require_once('./model/param_connexion_etu.php');
require_once('./model/pdo_agile.php');
require_once('./model/utilisateurs.php');
require_once('./controller/connexionController.php');


// $pdo = OuvrirConnexionPDO($db, $db_username, $db_password);

$connection = OuvrirConnexionPDO($db, $db_username, $db_password);


if (isset($_GET['action'])) {
    if($_GET['action'] == 'connexion'){
        require_once './controller/connexionController.php';
        $connexionController = new ConnexionController($connection);
        $connexionController->choice();
    }
} else {
    // $action = 'connexion';
    echo 'non';
}

?>
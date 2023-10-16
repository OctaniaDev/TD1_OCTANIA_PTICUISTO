<?php
    

    include_once 'php/param_connexion_etu.php';
    include_once 'php/pdo_agile.php';

    $conn = OuvrirConnexionPDO($dbMySql,$db_username,$db_password);

    echo 'Vosu êtes connecté en tant que : '.$db_username.'<br>';


?>
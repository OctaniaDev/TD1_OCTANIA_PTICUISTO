<?php
require_once('./model/param_connexion_etu.php');
require_once('./model/pdo_agile.php');
require_once('./model/utilisateurs.php');
require_once('./controller/connexionController.php');


$pdo = OuvrirConnexionPDO($db, $db_username, $db_password);

require_once('./view/navbar.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PtiCuisto</title>

    <link rel="stylesheet" href="./dist/output.css">
</head>
<body>
    
</body>
</html>
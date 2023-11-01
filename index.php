<?php
session_start();
if(!isset($_SESSION['connecter']))
    $_SESSION['connecter'] = 'non';

require_once('./model/param_connexion_etu.php');
require_once('./model/pdo_agile.php');;

set_include_path('./');
$GLOBALS['root'] = get_include_path();
$ROOT = $GLOBALS['root'];
$connection = OuvrirConnexionPDO($db, $db_username, $db_password);

$path = explode("&", $_SERVER['REQUEST_URI']);
$currentPath = $path[0];

require_once('./routes.php');

if(array_key_exists($currentPath, $routes)) {
    if(!isset($_GET['action']))
        require $routes[$currentPath];
    else if($_GET['action'] == "deconnexion")
        require $routes[$currentPath];
    else
        $routes[$currentPath]->choix();
} else
    require $ROOT . 'view/erreur404View.php';

$connction = null;
 
?>

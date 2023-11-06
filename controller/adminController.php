<?php


include_once 'controller.php';
require_once $GLOBALS['root'] . 'model/adminModel.php';

class AdminController extends Controller {

    private $adminModel;

    public function __construct($connection) {
        parent::__construct($connection);
    }

    public function choix() {
        if ($_SESSION['connecter'] === 'oui' && isset($_SESSION['type_utilisateur']) == 'admin'){
            if($_GET['action'] == 'admin'){
                require $GLOBALS['root'] . 'view/adminView.php';
            } else if(_GET['action'] == 'gestion_de_compte') {
                $this->recupererTousComptes();
                require $GLOBALS['root'] . 'view/gestionCompteView.php';
            }
        } else {
            echo '<script>location.replace("/index.php");</script>';
        }
    }
}
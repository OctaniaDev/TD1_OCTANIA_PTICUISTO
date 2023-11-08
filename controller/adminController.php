<?php


include_once 'controller.php';
require_once $GLOBALS['root'] . 'model/adminModel.php';

class AdminController extends Controller {


    public function __construct($connection) {
        parent::__construct($connection);
    }

    public function choix() {
        if ($_SESSION['connecter'] === 'oui' && isset($_SESSION['type_utilisateur']) == 'admin'){
            if($_GET['action'] == 'admin'){
                require $GLOBALS['root'] . 'view/adminView.php';
            } else if($_GET['action'] == 'gestion_de_compte') {
                $this->afficherTousComptes();
            } else if($_GET['action'] == 'voir_utilisateur'){
                $this->afficherCompte($_GET['user_id']);
            } else if($_GET['action'] == 'rendre_inactif') {
                $this->rendreInactif($_GET['user_id']);
            } else if($_GET['action'] == 'supprimer_compte_utilisateur') {
                $this->supprimerCompte($_GET['user_id']);
            } else if ($_GET['action'] == 'rendre_actif') {
                $this->rendreActif($_GET['user_id']);
            }
        } else {
            echo '<script>location.replace("/index.php");</script>';
        }
    }


    public function afficherTousComptes(){
        $adminModel = new Admin($this->connection);
        $utilisateurs = $adminModel->recupererTousComptes();
        require $GLOBALS['root'] . 'view/gestionCompteView.php';
    }

    public function afficherCompte($userId) {
        $adminModel = new Admin($this->connection);
        $utilisateur = $adminModel->recupererCompteParId($userId);
        require $GLOBALS['root'] . 'view/adminDetailView.php';
    }

    public function rendreInactif($userId) {
        $adminModel = new Admin($this->connection);
        $adminModel->rendreInactif($userId);
        echo '<script>location.replace("/index.php?action=gestion_de_compte");</script>';
    }

    public function rendreActif($userId) {
        $adminModel = new Admin($this->connection);
        $adminModel->rendreActif($userId);
        echo '<script>location.replace("/index.php?action=gestion_de_compte");</script>';
    }

    public function supprimerCompte($userId) {
        $adminModel = new Admin($this->connection);
        $adminModel->supprimerCompte($userId);
        echo '<script>location.replace("/index.php?action=gestion_de_compte");</script>';
    }



}

?>
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
                $this->UserendreInactif($_GET['user_id']);
            } else if($_GET['action'] == 'supprimer_compte_utilisateur') {
                $this->UsesupprimerCompte($_GET['user_id']);
            } else if ($_GET['action'] == 'rendre_actif') {
                $this->UserendreActif($_GET['user_id']);
            } else if ($_GET['action'] == 'gestion_de_recette'){
                $this->afficherToutesRecettes();
            } else if ($_GET['action'] == 'refuser_recette'){
                $this->UserefuserRecette($_GET['rec_id']);
            } else if ($_GET['action'] == 'accepter_recette'){
                $this->UseaccepterRecette($_GET['rec_id']);
            } else if ($_GET['action'] == 'voir_recette_details'){
                $this->afficherRecetteDetails($_GET['rec_id']);
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

    public function UserendreInactif($userId) {
        $adminModel = new Admin($this->connection);
        $adminModel->rendreInactif($userId);
        echo '<script>location.replace("/index.php?action=gestion_de_compte");</script>';
    }

    public function UserendreActif($userId) {
        $adminModel = new Admin($this->connection);
        $adminModel->rendreActif($userId);
        echo '<script>location.replace("/index.php?action=gestion_de_compte");</script>';
    }

    public function UsesupprimerCompte($userId) {
        $adminModel = new Admin($this->connection);
        $adminModel->supprimerCompte($userId);
        echo '<script>location.replace("/index.php?action=gestion_de_compte");</script>';
    }

    public function afficherToutesRecettes(){
        $adminModel = new Admin($this->connection);
        $recettes = $adminModel->recupererToutesRecettes();
        require $GLOBALS['root'] . 'view/gestionRecetteView.php';
    }

    public function afficherRecetteDetails($recId){
        $adminModel = new Admin($this->connection);
        $recette = $adminModel->recupererRecetteDetails($recId);
        require $GLOBALS['root'] . 'view/gestionRecetteDetailsView.php';
    }

    public function UserefuserRecette($recId){
        $adminModel = new Admin($this->connection);
        $adminModel->refuserRecette($recId);
        echo '<script>location.replace("/index.php?action=gestion_de_recette");</script>';
    }

    public function UseaccepterRecette($recId){
        $adminModel = new Admin($this->connection);
        $adminModel->accepterRecette($recId);
        echo '<script>location.replace("/index.php?action=gestion_de_recette");</script>';
    }

    

}

?>
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
            } else if($_GET['action'] == 'gestion_de_commentaire'){
                $this->afficherTousCommentaires();
            } else if($_GET['action'] == 'valider_commentaire'){
                $this->validerCommentaire($_GET['com_id']);
            } else if($_GET['action'] == 'supprimer_commentaire'){
                $this->supprimerCommentaire($_GET['com_id']);
            } else if($_GET['action'] == 'modifier_edito'){
                $this->modiferEdito();
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
        require $GLOBALS['root'] . 'view/gestionCompteDetailsView.php';
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
        $recetteModel = new RecetteModel($this->connection);
        $recetteDetail = $recetteModel->recupererRecetteSimpleAdmin($recId);
        $ingredients = $recetteModel->recupererIngredientsRecette($recId);
        $commentaires = $recetteModel->recupererCommentairesRecette($recId);
        $tags = $recetteModel->recupererTagsRecette($recId);
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


    public function afficherTousCommentaires(){
        $adminModel = new Admin($this->connection);
        $commentaires = $adminModel->recupererTousCommentaires();
        require $GLOBALS['root'] . 'view/gestionCommentaireView.php';
    }    

    public function validerCommentaire($comId){
        $adminModel = new Admin($this->connection);
        $adminModel->validerCommentaire($comId);
        echo '<script>location.replace("/index.php?action=gestion_de_commentaire");</script>';
    }

    public function supprimerCommentaire($comId){
        $adminModel = new Admin($this->connection);
        $adminModel->supprimerCommentaire($comId);
        echo '<script>location.replace("/index.php?action=gestion_de_commentaire");</script>';
    }

    public function modiferEdito() {
        $accueilModel = new AccueilModel($this->connection);
        if(!isset($_POST['edito'])) {
            $edito = $accueilModel->recupererEdito();
            require $GLOBALS['root'] . 'view/editoView.php';
        } else {
            $accueilModel->modiferEdito(nl2br($_POST['edito']));
            echo '<script>location.replace("/index.php");</script>';
        }
    }

}

?>

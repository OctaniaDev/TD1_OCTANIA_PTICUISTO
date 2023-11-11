<?php

require_once 'controller.php';
require_once($GLOBALS['root'] . 'model/recetteModel.php');

class RecetteController extends Controller {

    public function __construct($connection) {
        parent::__construct($connection);
    }

    public function choix() {
        if($_GET['action'] == 'voir_recettes_compte') {
            if($_SESSION['connecter'] == 'oui' && isset($_SESSION['id_utilisateur'])) {
                if(isset($_GET['rec_id']))
                    $this->afficherRecetteCompte($_GET['rec_id'], $_SESSION['id_utilisateur']);
                else
                    $this->afficherListeRecettesCompte($_SESSION['id_utilisateur']);
            }
        }
        if($_GET['action'] == 'voir_recettes') {
            if(isset($_GET['rec_id']))
                $this->afficherRecette($_GET['rec_id']);
            else
                $this->afficherToutesRecettes();
        }
        $this->connection = null;
    }

    public function afficherToutesRecettes() {
        $recetteModel = new RecetteModel($this->connection);
        $recettes = $recetteModel->recupererTousRecettesValide();
        require $GLOBALS['root'] . 'view/recetteView.php';
    }

    public function afficherRecette($recId) {
        $recetteModel = new RecetteModel($this->connection);
        if(isset($_POST['texte_commentaire']) && $_SESSION['connecter'] == 'oui' && !empty($_POST['texte_commentaire']))
            $recetteModel->insererCommentaire($recId, trim($_POST['texte_commentaire']), $_SESSION['id_utilisateur']);
        $recetteDetail = $recetteModel->recupererRecetteSimpleValide($recId);
        $ingredients = $recetteModel->recupererIngredientsRecette($recId);
        $commentaires = $recetteModel->recupererCommentairesRecette($recId);
        require $GLOBALS['root'] . 'view/recetteDetailView.php';
    }

    public function afficherRecetteCompte($recId, $utiId) {
        $recetteModel = new RecetteModel($this->connection);
        $recetteDetail = $recetteModel->recupererRecetteSimple($recId, $utiId);
        $ingredients = $recetteModel->recupererIngredientsRecette($recId);
        $commentaires = $recetteModel->recupererCommentairesRecette($recId);
        require $GLOBALS['root'] . 'view/recetteDetailView.php';
    }

    public function afficherListeRecettesCompte($utiId) {
        $recetteModel = new RecetteModel($this->connection);
        $recettes = $recetteModel->recupererRecettesUtilisateur($utiId);
        require $GLOBALS['root'] . 'view/recetteUtilisateurView.php';
    }

}
?>
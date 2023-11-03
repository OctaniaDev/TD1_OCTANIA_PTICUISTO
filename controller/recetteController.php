<?php

require_once 'controller.php';
require_once($GLOBALS['root'] . 'model/recetteModel.php');

class RecetteController extends Controller {

    public function __construct($connection) {
        parent::__construct($connection);
    }

    public function choix() {
        if(isset($_GET['rec_id']))
            $this->afficherRecette($_GET['rec_id']);
        else
            $this->afficherToutesRecettes();
        $this->connection = null;
    }

    public function afficherToutesRecettes() {
        $recetteModel = new RecetteModel($this->connection);
        $recettes = $recetteModel->recupererToutesRecettes();
        require $GLOBALS['root'] . 'view/recetteView.php';
    }

    public function afficherRecette($recId) {
        $recetteModel = new RecetteModel($this->connection);
        if(isset($_POST['texte_commentaire']) && $_SESSION['connecter'] == 'oui' && !empty($_POST['texte_commentaire']))
            $recetteModel->insererCommentaire($recId, trim($_POST['texte_commentaire']), $_SESSION['id_utilisateur']);
        $recetteDetail = $recetteModel->recupererRecetteSimple($recId);
        $ingredients = $recetteModel->recupererIngredientsRecette($recId);
        $commentaires = $recetteModel->recupererCommentairesRecette($recId);
        require $GLOBALS['root'] . 'view/recetteDetailView.php';
    }

}
?>
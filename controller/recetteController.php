<?php

include_once 'controller.php';

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
        include './view/recetteView.php';
    }

    public function afficherRecette($recId) {
        $recetteModel = new RecetteModel($this->connection);
        $recetteDetail = $recetteModel->recupererRecetteSimple($recId);
        $ingredients = $recetteModel->recupererIngredientsRecette($recId);
        include './view/recetteDetailView.php';
    }

}
?>
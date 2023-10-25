<?php

include_once 'controller.php';

class RecetteController extends Controller {

    public function __construct($connection) {
        parent::__construct($connection);
    }

    public function choice() {
        $this->afficherRecette();
    }

    public function afficherRecette() {
        $recetteModel = new RecetteModel($this->connection);
        $recettes = $recetteModel->getAllRecettes();
        include './view/recetteView.php';
    }
}
?>
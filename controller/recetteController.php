<?php 
    class RecetteController extends Controller {
        public function __construct($connection) {
            parent::__construct($connection);
        }

        public function afficherRecette() {
            $recetteModel = new RecetteModel($this->connection);
            $recetteModel = $recetteModel->getRecettes();
            include('./view/recetteView.php');
        }
    }
?>
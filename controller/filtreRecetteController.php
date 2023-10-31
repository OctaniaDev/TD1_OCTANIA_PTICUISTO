<?php

include_once 'controller.php';
class filtreRecetteController extends Controller {
    public function __construct($connection) {
        parent::__construct($connection);
    }
    
    public function choixFiltre() {
        if(isset($_GET['catId'])) {
            $this->afficherToutesRecettesParCategorie($_GET['catId']);
        }
        if(isset($_GET['motChercher'])){
            $this->afficherToutesRecettesParMot($_GET['motChercher']);
        }
        else
            $this->connection = null;
        $this->connection = null;
    }

    public function afficherToutesRecettesParCategorie($catId) {
        $filtreRecetteModel = new filtreRecetteModel($this->connection);
        $recettes = $filtreRecetteModel->filtrerRecetteParCategorie($catId);
        include './view/recetteView.php';
    }

    public function afficherToutesRecettesParMot($motChercher) {
        $filtreRecetteModel = new filtreRecetteModel($this->connection);
        $recettes = $filtreRecetteModel->filtrerRecetteParTitre($motChercher);
        include './view/recetteView.php';
    }
}
?>
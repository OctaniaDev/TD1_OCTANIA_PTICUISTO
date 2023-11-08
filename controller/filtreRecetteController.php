<?php

require_once 'controller.php';
require_once($GLOBALS['root'] . 'model/filtreRecetteModel.php');
class filtreRecetteController extends Controller {
    public function __construct($connection) {
        parent::__construct($connection);
    }
    
    public function choix() {
        echo "test";
        if(isset($_GET['type_categorie'])) {
            $this->afficherToutesRecettesParCategorie($_GET['type_categorie']);
        }
        if(isset($_POST['motCherche'])){
            $this->afficherToutesRecettesParMot($_POST['motCherche']);
        }
        if(isset($_POST['ingredients_recette'])){
            echo "test2";
            $this->afficherToutesRecettesParIngredient($_POST['ingredients_recette']);
        }
        $this->connection = null;
    }

    public function afficherToutesRecettesParCategorie($catId) {
        $filtreRecetteModel = new filtreRecetteModel($this->connection);
        $recettes = $filtreRecetteModel->filtrerRecetteParCategorie($catId);
        require $GLOBALS['root'] . 'view/recetteView.php';
    }

    public function afficherToutesRecettesParMot($motChercher) {
        $filtreRecetteModel = new filtreRecetteModel($this->connection);
        $recettes = $filtreRecetteModel->filtrerRecetteParTitre($motChercher);
        require $GLOBALS['root'] . 'view/recetteView.php';
    }

    public function afficherToutesRecettesParIngredient($ingredient) {
        $filtreRecetteModel = new filtreRecetteModel($this->connection);
        $recettes = $filtreRecetteModel->filtrerRecetteParIngredient($ingredient);
        require $GLOBALS['root'] . 'view/recetteView.php';
    }
}
?>
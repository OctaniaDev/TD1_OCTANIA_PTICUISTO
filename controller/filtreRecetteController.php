<?php

require_once 'controller.php';
require_once($GLOBALS['root'] . 'model/filtreRecetteModel.php');
require_once($GLOBALS['root'] . 'model/recetteModel.php');
class filtreRecetteController extends Controller {
    public function __construct($connection) {
        parent::__construct($connection);
    }
    
    public function choix() {
        if(isset($_GET['type_categorie'])) {
            $this->afficherToutesRecettesParCategorie($_GET['type_categorie']);
        }
        if(isset($_POST['motCherche'])){
            $this->afficherToutesRecettesParMot($_POST['motCherche']);
        }
        if(isset($_POST['ingredients_recette'])){
            $this->afficherToutesRecettesParIngredient($_POST['ingredients_recette']);
        }
        if(isset($_POST['tags'])){
            $this->afficherToutesRecettesParTag($_POST['tags']);
        }
        if(isset($_POST['tag'])){
            $this->afficherToutesRecettesParTagUnique($_POST['tag']);
        } else {
            echo '<script>location.replace("/index.php");</script>';
        }
        $this->connection = null;
    }

    public function afficherToutesRecettesParCategorie($catId) {
        $filtreRecetteModel = new filtreRecetteModel($this->connection);
        $recetteModel = new RecetteModel($this->connection);
        $recettes = $filtreRecetteModel->filtrerRecetteParCategorie($catId);
        $tags = $recetteModel->recupererTagsListRecette($recettes);
        require $GLOBALS['root'] . 'view/recetteView.php';
    }

    public function afficherToutesRecettesParMot($motChercher) {
        $filtreRecetteModel = new filtreRecetteModel($this->connection);
        $recetteModel = new RecetteModel($this->connection);
        $recettes = $filtreRecetteModel->filtrerRecetteParTitre($motChercher);
        $tags = $recetteModel->recupererTagsListRecette($recettes);
        require $GLOBALS['root'] . 'view/recetteView.php';
    }

    public function afficherToutesRecettesParIngredient($ingredient) {
        $filtreRecetteModel = new filtreRecetteModel($this->connection);
        $recetteModel = new RecetteModel($this->connection);
        $recettes = $filtreRecetteModel->filtrerRecetteParIngredient($ingredient);
        $tags = $recetteModel->recupererTagsListRecette($recettes);
        require $GLOBALS['root'] . 'view/recetteView.php';
    }

    public function afficherToutesRecettesParTag($tag) {
        $filtreRecetteModel = new filtreRecetteModel($this->connection);
        $recetteModel = new RecetteModel($this->connection);
        $recettes = $filtreRecetteModel->filtrerRecetteParTag($tag);
        $tags = $recetteModel->recupererTagsListRecette($recettes);
        require $GLOBALS['root'] . 'view/recetteView.php';
    }
    
    public function afficherToutesRecettesParTagUnique($tag) {
        $filtreRecetteModel = new filtreRecetteModel($this->connection);
        $recetteModel = new RecetteModel($this->connection);
        $recettes = $filtreRecetteModel->filtrerRecetteParTagUnique($tag);
        $tags = $recetteModel->recupererTagsListRecette($recettes);
        require $GLOBALS['root'] . 'view/recetteView.php';
    }
}
?>
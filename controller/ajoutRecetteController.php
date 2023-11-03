<?php

require_once 'controller.php';
require_once($GLOBALS['root'] . 'model/recetteModel.php');

class AjoutRecetteController extends Controller {

    public function __construct($connection) {
        parent::__construct($connection);
    }

    public function choix() {
		if(!isset($_POST['titre_recette']) && $_SESSION['connecter'] == 'oui') {
			require $GLOBALS['root'] . 'view/ajoutRecetteView.php';
		} else {
			if($this->ajouterRecette())
            	echo '<script>location.replace("/index.php");</script>';
			else {
				echo "<p>Une erreur c'est produite</p>";
				require $GLOBALS['root'] . 'view/ajoutRecetteView.php';
			}
		}
		$this->connection = null;
	}

	public function ajouterRecette() {
		if(!isset($_POST['titre_recette'])) return false;
		if(!isset($_POST['contenu_recette'])) return false;
		if(!isset($_POST['resume_recette'])) return false;
		if(!isset($_POST['categorie_recette'])) return false;
		//if(!isset($_POST['image_recette'])) return false;
		//if(!isset($_POST['ingredients_recette'])) return false;
		//if(!isset($_POST['tags_recette'])) return false;
		$recetteModel = new RecetteModel($this->connection);
		$res = $recetteModel->insererRecette($_POST['titre_recette'], $_POST['contenu_recette'], $_POST['resume_recette'], $_POST['categorie_recette']);
		return $res;
	}
}
?>
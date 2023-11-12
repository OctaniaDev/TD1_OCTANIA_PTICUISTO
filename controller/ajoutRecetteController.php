<?php

require_once 'controller.php';
require_once($GLOBALS['root'] . 'model/recetteModel.php');

class AjoutRecetteController extends Controller {

    public function __construct($connection) {
        parent::__construct($connection);
    }

    public function choix() {
		$ingredients = $this->recuperIngredient();
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
		if(!isset($_POST['ingredients_recette'])) return false;
		if(!isset($_FILES['image_recette'])) return false;
		//if(!isset($_POST['tags_recette'])) return false;
		$recetteModel = new RecetteModel($this->connection);
		$dossier = $GLOBALS['root'] . 'img/';
		$fichier = basename($_FILES['image_recette']['name']);
		$fichier = strtr($fichier,
		'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ',
		'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
		$fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);
		move_uploaded_file($_FILES['image_recette']['tmp_name'], $dossier . $fichier);
		$resRecette = $recetteModel->insererRecette($_POST['titre_recette'], $_POST['contenu_recette'], $_POST['resume_recette'], $_POST['categorie_recette'], $fichier);
		$recettesUtilisateur = $recetteModel->recupererRecettesUtilisateur($_SESSION['id_utilisateur']);
		if(!isset($recettesUtilisateur[0]['REC_ID'])) return false;
		foreach($_POST['ingredients_recette'] as $ingredient)
			$resIngredients = $recetteModel->insererIngredient($recettesUtilisateur[0]['REC_ID'], $ingredient);
		return $resRecette && $resIngredients;
	}

	public function recuperIngredient() {
		$recetteModel = new RecetteModel($this->connection);
		return $recetteModel->recupererTousIngredients();
	}

}
?>
<?php

require_once 'controller.php';
require_once($GLOBALS['root'] . 'model/recetteModel.php');

class ModifierRecetteController extends Controller {

    public function __construct($connection) {
        parent::__construct($connection);
    }

    public function choix() {
		if($_GET['action'] == 'modifier_recette') {
			
            if($_SESSION['connecter'] == 'oui' && isset($_GET['rec_id'])) {
				if(isset($_POST['titre_recette'])) {
					$resultat = $this->modifierRecetteUtilisateur($_GET['rec_id'], $_SESSION['id_utilisateur']);
					if($resultat) {
						echo '<script>location.replace("/index.php");</script>';
					} else
						$this->afficherRecetteUtilisateur($_GET['rec_id'], $_SESSION['id_utilisateur'], true);
                } else {
					$this->afficherRecetteUtilisateur($_GET['rec_id'], $_SESSION['id_utilisateur']);
				}
            }
        }
	}

	public function afficherRecetteUtilisateur($recId, $utiId, $erreur = null) {
		$recetteModel = new RecetteModel($this->connection);
		$recettesDetail = $recetteModel->recupererRecetteSimple($recId, $utiId);
		if(count($recettesDetail) == 0)
			return false;
		$ingredients = $recetteModel->recupererTousIngredients();
		$ingredientsRecette = $recetteModel->recupererIngredientsRecette($recId);

		if(!$recettesDetail)
			echo '<script>location.replace("/index.php");</script>';
		else
			require $GLOBALS['root'] . 'view/modifierRecetteView.php';
	}

	public function modifierRecetteUtilisateur($recId, $utiId) {
		$recetteModel = new RecetteModel($this->connection);
		if(!isset($_POST['titre_recette'])) return false;
		if(!isset($_POST['contenu_recette'])) return false;
		if(!isset($_POST['resume_recette'])) return false;
		if(!isset($_POST['categorie_recette'])) return false;
		if(!isset($_POST['ingredients_recette'])) return false;
		if(!isset($_FILES['image_recette'])) return false;
		//if(!isset($_POST['tags_recette'])) return false;
		$dossier = $GLOBALS['root'] . 'img/';
		$fichier = basename($_FILES['image_recette']['name']);
		$fichier = strtr($fichier,
		'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ',
		'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
		$fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);
		echo $fichier;
		move_uploaded_file($_FILES['image_recette']['tmp_name'], $dossier . $fichier);
		$resRecette = $recetteModel->updateRecette($recId, $utiId, $_POST['titre_recette'], $_POST['contenu_recette'], $_POST['resume_recette'], $_POST['categorie_recette'], $fichier);
		$recetteModel->supprimerIngredients($recId, $utiId);
		foreach($_POST['ingredients_recette'] as $ingredient)
			$resIngredients = $recetteModel->insererIngredient($recId, $ingredient);
		return $resRecette && $resIngredients;
	}
}

?>
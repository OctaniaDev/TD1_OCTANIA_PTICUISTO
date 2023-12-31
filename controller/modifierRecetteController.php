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
						$this->afficherRecetteUtilisateur($_GET['rec_id'], $_SESSION['id_utilisateur'], '<p class=" text-red-500">Une erreur s\'est produite</p>');
                } else {
					$this->afficherRecetteUtilisateur($_GET['rec_id'], $_SESSION['id_utilisateur']);
				}
            } else 
				echo '<script>location.replace("/index.php");</script>';
        }
	}

	public function afficherRecetteUtilisateur($recId, $utiId, $erreur = null) {
		$recetteModel = new RecetteModel($this->connection);
		$recettesDetail = $recetteModel->recupererRecetteSimple($recId, $utiId);
		if(count($recettesDetail) == 0)
			return false;
		$ingredients = $recetteModel->recupererTousIngredients();
		$ingredientsRecette = $recetteModel->recupererIngredientsRecette($recId);
		$tags = $recetteModel->recupererTousTAGS();
		$tagsRecette = $recetteModel->recupererTagsRecette($recId);

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
		if(!isset($_POST['tags_recette'])) return false;
		if(!empty($_FILES['image_recette']['name'])) {
			$dossier = $GLOBALS['root'] . 'img/';
			$fichier = basename($_FILES['image_recette']['name']);
			$fichier = strtr($fichier,
			'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ',
			'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
			$fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);
			move_uploaded_file($_FILES['image_recette']['tmp_name'], $dossier . $fichier);
			$resRecette = $recetteModel->updateRecette($recId, $utiId, $_POST['titre_recette'], nl2br($_POST['contenu_recette']), $_POST['resume_recette'], $_POST['categorie_recette'], $fichier);
			echo 'chiasse';
		} else {
			echo 'merde ou nutella';
			$resRecette = $recetteModel->updateRecetteSansImage($recId, $utiId, $_POST['titre_recette'], $_POST['contenu_recette'], $_POST['resume_recette'], $_POST['categorie_recette']);
		}

		$recetteModel->supprimerIngredients($recId, $utiId);
		foreach($_POST['ingredients_recette'] as $ingredient)
			$resIngredients = $recetteModel->insererIngredient($recId, $ingredient);

		$recetteModel->supprimerTags($recId, $utiId);
		foreach($_POST['tags_recette'] as $tag)
			$resTags = $recetteModel->insererTag($recId, $tag);

		return $resRecette && $resIngredients && $resTags;
	}
}

?>
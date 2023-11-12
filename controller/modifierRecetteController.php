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
				if(!isset($_POST['titre_recette'])) {
					$this->afficherRecetteUtilisateur($_GET['rec_id'], $_SESSION['id_utilisateur']);
                } else {
					$this->modifierRecetteUtilisateur($_GET['rec_id'], $_SESSION['id_utilisateur']);
				}
            }
        }
	}

	public function afficherRecetteUtilisateur($recId, $utiId) {
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

	}
}

?>
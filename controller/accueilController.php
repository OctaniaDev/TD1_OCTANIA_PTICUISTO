<?php


include_once 'controller.php';
require_once $GLOBALS['root'] . 'model/accueilModel.php';
require_once $GLOBALS['root'] . 'model/recetteModel.php';

class AccueilController extends Controller {


    public function __construct($connection) {
        parent::__construct($connection);
    }

    public function choix() {
		$this->afficherEdito();
	}

	public function afficherEdito() {
		$accueilModel = new AccueilModel($this->connection);
		$recetteModel = new RecetteModel($this->connection);
		$recettes = $accueilModel->recupererRecettesRecentes();
		$tags = $recetteModel->recupererTagsListRecette($recettes);
		$edito = $accueilModel->recupererEdito();
        require $GLOBALS['root'] . 'view/accueilView.php';
	}

}

?>

<?php

require_once 'controller.php';
require_once($GLOBALS['root'] . 'model/recetteModel.php');

class AjoutRecetteController extends Controller {

    public function __construct($connection) {
        parent::__construct($connection);
    }

    public function choix() {
		if(!isset($_POST['titre_recette'])) {
			require $GLOBALS['root'] . 'view/ajoutRecetteView.php';
		}
	}

}
?>
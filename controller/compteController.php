<?php

include_once 'controller.php';
require_once $GLOBALS['root'] . 'model/compteModel.php';

class CompteController extends Controller {

    private $compteModel;
    public function __construct($connection){
        parent::__construct($connection);
    }
    

    public function choix() {
        if ($_SESSION['connecter'] === 'oui' && isset($_SESSION['id_utilisateur'])) {
            $this->traiterInformationsCompte($_SESSION['id_utilisateur']);
            if (isset($_GET['action']) && $_GET['action'] == 'supprimer_compte') {
                $result = $this->traiterSuppression($_SESSION['id_utilisateur']);
            } else if (isset($_GET['action']) && $_GET['action'] == 'modifier_mot_de_passe') {
                $result = $this->traiterModificationMotDePasse($_SESSION['id_utilisateur']);
            }
        } else {
            require $GLOBALS['root'] . 'view/connexionView.php';
        }
    }
    
    
        
    public function traiterInformationsCompte($userId) {
        $compteModel = new Compte($this->connection);
        $accountInfo = $compteModel->getAccountInfo($userId);
        require $GLOBALS['root'] . 'view/compteView.php';
        return $accountInfo;
    }

    
    public function traiterSuppression($userId){
        $userId = $_SESSION['id_utilisateur'];
        $compteModel = new Compte($this->connection);
        $result = $compteModel->deleteUser($userId);
        echo '<script>location.replace("./index.php?action=deconnexion");</script>';  
        return $result;
    }

    public function traiterModificationMotDePasse($userId) {
        $nouveauMotDePasse = $_POST['nouveau_mot_de_passe'];
        $compteModel = new Compte($this->connection);
        $result = $compteModel->modifierMotDePasse($_SESSION['id_utilisateur'], $nouveauMotDePasse);
        echo '<script>location.replace("./index.php?action=deconnexion");</script>';
        return $result;
    }
}

<?php

include_once 'controller.php';
require_once $GLOBALS['root'] . 'model/compteModel.php';

class CompteController extends controller {

    private $compteModel;
    public function __construct($connection){
        parent::__construct($connection);
    }
    

    public function choix() {        
        if ($_SESSION['connecter'] === 'oui' && isset($_SESSION['id_utilisateur'])) {
            $accountInfo = $this->traiterInformationsCompte($_SESSION['id_utilisateur']);
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

    
    public function traiterSuppression() {
        if (isset($_SESSION['user_id'])) {
            $userId = $_SESSION['user_id']; 

            $result = $this->compteModel->deleteUser($userId);

            if ($result) {
                require $GLOBALS['root'] . 'view/accueilView.php';
            } else {
                echo 'erreur';
            }
        } else {
            require $GLOBALS['root'] . 'view/accueilView.php';
        }
    }

    /*
    public function traiterModificationMotDePasse() {
        if (isset($_SESSION['user_id'])) {
            $userId = $_SESSION['user_id'];
            
            if (isset($_POST['nouveau_mot_de_passe']) && !empty($_POST['nouveau_mot_de_passe'])) {
                $nouveauMotDePasse = $_POST['nouveau_mot_de_passe'];
                $result = $this->compteModel->modifierMotDePasse($userId, $nouveauMotDePasse);
                if ($result) {
                    require $GLOBALS['root'] . 'view/accueilView.php';
                } else {
                    echo 'Erreur lors de la modification du mot de passe.';
                }
            } else {
                echo 'Le champ du nouveau mot de passe est vide.';
            }
        } else {
            require $GLOBALS['root'] . 'view/accueilView.php';
        }
    }*/
}

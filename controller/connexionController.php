<?php

include_once 'controller.php';
require_once $GLOBALS['root'] . 'model/utilisateurModel.php';

class ConnexionController extends controller {

    public function __construct($connection) {
        parent::__construct($connection);
    }

    public function choix() {
        if(isset($_POST['username']) && isset($_POST['password'])) {
            $this->traiterConnexion($_POST['username'], $_POST['password']);
        } else {
            $this->getform();
        }
    }

    public function traiterConnexion($username, $password) {
        $utilisateur = new Utilisateur($this->connection);
        $tab = $utilisateur->connexion($username, $password);
        if(isset($tab[0]["UTI_PSEUDO"]) && isset($tab[0]["UTI_MDP"])) {
            $_SESSION['type_utilisateur'] = $tab[0]['TYPE_LIBELLE'];
            $_SESSION['connecter'] = 'oui';
            require $GLOBALS['root'] . 'view/accueilView.php';
            exit();
        } else {
            echo "Nom d'utilisateur ou mot de passe incorrect.";
            $this->getform();
        }
    }

    public function getform() {
        require $GLOBALS['root'] . 'view/connexionView.php';
    }
}

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
        $estConnecte = $utilisateur->connexion($username, $password);

        if ($estConnecte) {
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

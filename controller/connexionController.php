<?php

include_once 'controller.php';
require_once $GLOBALS['root'] . 'model/utilisateurModel.php';

class ConnexionController extends controller {

    public function __construct($connection) {
        parent::__construct($connection);
    }

    public function choix() {
        if($_SESSION['connecter'] != 'oui') {
            if(isset($_POST['username']) && isset($_POST['password'])) {
                $this->traiterConnexion($_POST['username'], $_POST['password']);
            } else {
                $this->getform();
            }
        } else
            echo '<script>location.replace("/index.php");</script>';
        $this->connection = null;
    }

    public function traiterConnexion($username, $password) {
        $utilisateur = new Utilisateur($this->connection);
        $tab = $utilisateur->connexion($username, $password);
        if(isset($tab[0]["UTI_PSEUDO"]) && isset($tab[0]["UTI_MDP"])) {
            $_SESSION['id_utilisateur'] = $tab[0]['UTI_ID'];
            $_SESSION['type_utilisateur'] = $tab[0]['TYPE_LIBELLE'];
            $_SESSION['connecter'] = 'oui';
            echo '<script>location.replace("/index.php");</script>';
            exit();
        } else {
            $erreur = '<p class="text-red-500"> Nom d\'utilisateur ou mot de passe incorrect.</p>';
            $this->getform($erreur);
            
        }
    }

    public function getform($erreur = null) {
        require $GLOBALS['root'] . 'view/connexionView.php';
    }
}

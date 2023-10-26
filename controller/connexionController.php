<?php

include_once 'controller.php';

class ConnexionController extends controller {

    public function __construct($connection) {
        parent::__construct($connection);
    }

    public function choice() {
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
            //session_start();
            //$_SESSION['username'] = $estConnecte;

            include './view/accueilView.php';
            //header("Location: ../view/accueil.php");
            //exit();
        } else {
            $erreur = "Nom d'utilisateur ou mot de passe incorrect.";
            $this->getform();
        }
    }

    public function getform() {
        include './view/connexionView.php';
    }
}

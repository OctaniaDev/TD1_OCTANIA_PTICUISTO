<?php

    class ConnexionController {
        private $pdo;

        public function __construct($pdo) {
            $this->pdo = $pdo;
        }

        public function traiterConnexion($username, $password) {
            $utilisateur = new Utilisateur();
            $estConnecte = $utilisateur->Connexion($username, $password);

            if ($estConnecte) {
                // header("Location: accueil.php");
                exit();
            } else {
                $erreur = "Nom d'utilisateur ou mot de passe incorrect.";
                include('./views/connexion.php');
            }
        }
    }
?>

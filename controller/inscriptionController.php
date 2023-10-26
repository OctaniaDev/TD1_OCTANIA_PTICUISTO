<?php

include_once 'controller.php';

class InscriptionController extends controller {

    public function __construct($connection) {
        parent::__construct($connection);
    }

    
    public function choix() {
        if(isset($_POST['nom']) && isset($_POST['prenom']) && isset($POST['email']) && isset($_POST['pseudo']) && isset($_POST['password'])) {
            $this->traiterInscription($_POST['nom'], $_POST['prenom'], $_POST['email'], $_POST['pseudo'], $_POST['password']);
        } else {
            $this->getform();
        }
    }

    public function traiterInscription($nom, $prenom, $email, $pseudo, $password) {
        $utilisateur = new Utilisateur($this->connection);
        $pasinscrit = $utilisateur->inscription($nom, $prenom, $email, $pseudo, $password);
        if($pasinscrit) {
            include './view/connexionView.php';
        } else {
            echo "Client déjà inscrit !";
            $this->getform();
        }
    }

    public function getform() {
        include './view/inscriptionView.php';
    }
}

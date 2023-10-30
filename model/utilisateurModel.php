<?php

include_once 'param_connexion_etu.php';
include_once 'pdo_agile.php';

class Utilisateur {
    private $connection;

    public function __construct($connection) {
        $this->connection = $connection;
    }

    public function connexion($username, $password) {
        $sql = "SELECT UTI_PSEUDO, UTI_MDP FROM CUI_UTILISATEUR WHERE UTI_PSEUDO ='".$username."' AND UTI_MDP ='".$password."'";
        LireDonneesPDO1($this->connection,$sql,$tab);
        /*$hashedPassword = $stmt->fetchColumn();
    
        if ($hashedPassword && password_verify($password, $hashedPassword)) {
            return true;    
        } else {
            return false; // Identifiants incorrects
        }*/

        $this->connection = null;
        return isset($tab[0]["UTI_PSEUDO"]) && isset($tab[0]["UTI_MDP"]);
    }


    public function inscription($nom, $prenom, $email, $pseudo, $password) {
        $sql = "INSERT INTO CUI_UTILISATEUR VALUES (null,2,1,'".$password."', '".$pseudo."', '".$email."', '".$prenom."','".$nom."',sysdate())";
        $req = majDonneesPDO($this->connection,$sql);
        $this->connection = null;
        return $req;
    }
}
?>
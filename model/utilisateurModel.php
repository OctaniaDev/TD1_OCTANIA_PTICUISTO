<?php

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
}
?>
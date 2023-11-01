<?php

class Utilisateur {
    private $connection;

    public function __construct($connection) {
        $this->connection = $connection;
    }

    public function connexion($username, $password) {
        $sql = "SELECT UTI_PSEUDO, UTI_MDP, TYPE_LIBELLE FROM CUI_UTILISATEUR JOIN CUI_TYPE_UTILISATEUR USING(TYPE_iD) WHERE UTI_PSEUDO ='".$username."' AND UTI_MDP ='".$password."'";
        LireDonneesPDO1($this->connection,$sql,$tab);
        /*$hashedPassword = $stmt->fetchColumn();
    
        if ($hashedPassword && password_verify($password, $hashedPassword)) {
            return true;    
        } else {
            return false; // Identifiants incorrects
        }*/

        $this->connection = null;
        return $tab;
    }


    public function inscription($nom, $prenom, $email, $pseudo, $password) {
        $sql = "INSERT INTO CUI_UTILISATEUR VALUES (null,2,1,'".$password."', '".$pseudo."', '".$email."', '".$prenom."','".$nom."',sysdate())";
        $req = majDonneesPDO($this->connection,$sql);
        $this->connection = null;
        return $req;
    }
}
?>
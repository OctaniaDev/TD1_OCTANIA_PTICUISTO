<?php

class Utilisateur {
    private $connection;

    public function __construct($connection) {
        $this->connection = $connection;
    }

    public function connexion($username, $password) {
        $sql = "SELECT UTI_PSEUDO, UTI_MDP, TYPE_LIBELLE FROM CUI_UTILISATEUR JOIN CUI_TYPE_UTILISATEUR USING(TYPE_iD) WHERE UTI_PSEUDO ='".$username."' AND UTI_MDP = '". md5($password) ."'";
        LireDonneesPDO1($this->connection,$sql,$tab);
        $this->connection = null;
        return $tab;
    }


    public function inscription($nom, $prenom, $email, $pseudo, $password) {
        $sql = "SELECT * FROM CUI_UTILISATEUR WHERE UTI_PSEUDO = '" . $pseudo . "'";
        LireDonneesPDO1($this->connection,$sql,$tab);
        if(isset($tab[0]["UTI_PSEUDO"]))
            return false;
        $sql = "INSERT INTO CUI_UTILISATEUR VALUES (null,3,1,'". md5($password) ."', '".$pseudo."', '".$email."', '".$prenom."','".$nom."',sysdate())";
        $req = majDonneesPDO($this->connection,$sql);
        $this->connection = null;
        return $req;
    }
}
?>
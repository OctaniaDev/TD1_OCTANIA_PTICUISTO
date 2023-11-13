<?php

class Utilisateur {
    private $connection;

    public function __construct($connection) {
        $this->connection = $connection;
    }

    public function connexion($username, $password) {
        $password = md5($password);
        $sql = "SELECT UTI_PSEUDO, UTI_MDP, TYPE_LIBELLE, UTI_ID,STA_ID FROM CUI_UTILISATEUR JOIN CUI_TYPE_UTILISATEUR USING(TYPE_iD) WHERE UTI_PSEUDO = :username AND UTI_MDP = :password AND STA_ID=1";
        $cur = preparerRequetePDO($this->connection, $sql);
        ajouterParamPDO($cur, ':username', $username);
        ajouterParamPDO($cur, ':password', $password);
        LireDonneesPDOPreparee($cur, $tab);
        return $tab;
    }


    public function inscription($nom, $prenom, $email, $pseudo, $password) {
        $sql = "SELECT * FROM CUI_UTILISATEUR WHERE UTI_PSEUDO = :pseudo";
        $cur = preparerRequetePDO($this->connection, $sql);
        ajouterParamPDO($cur, ':pseudo', $pseudo);
        LireDonneesPDOPreparee($cur, $tab);
        if(isset($tab[0]["UTI_PSEUDO"]))
            return false;
        $password = md5($password);
        $sql = "INSERT INTO CUI_UTILISATEUR VALUES (null, 3, 1, :password, :pseudo, :email, :prenom, :nom, sysdate())";
        $cur = preparerRequetePDO($this->connection, $sql);
        ajouterParamPDO($cur, ':password', $password);
        ajouterParamPDO($cur, ':pseudo', $pseudo);
        ajouterParamPDO($cur, ':email', $email);
        ajouterParamPDO($cur, ':prenom', $prenom);
        ajouterParamPDO($cur, ':nom', $nom);
        return majDonneesPrepareesPDO($cur);
    }
}
?>
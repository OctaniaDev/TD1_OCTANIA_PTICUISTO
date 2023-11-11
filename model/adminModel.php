<?php 

class Admin {

    private $connection;

    public function __construct ($connection){
        $this->connection = $connection;
    }

    public function recupererTousComptes(){
        $sql = "SELECT * from CUI_UTILISATEUR WHERE UTI_ID != 1";
        $cur = preparerRequetePDO($this->connection, $sql);
        LireDonneesPDOPreparee($cur,$tab);
        return $tab;
    }

    public function recupererCompteParId($userId) {
        $sql = "SELECT * FROM CUI_UTILISATEUR JOIN CUI_STATUT_UTILISATEUR USING(STA_ID) WHERE UTI_ID = :userId";
        $cur = preparerRequetePDO($this->connection, $sql);
        ajouterParamPDO($cur, ':userId', $userId);
        LireDonneesPDOPreparee($cur, $tab);
        return $tab[0];
    }

    public function rendreInactif($userId) {
        $sql = "UPDATE CUI_UTILISATEUR SET STA_ID = 2 WHERE UTI_ID = :userId";
        $cur = preparerRequetePDO($this->connection, $sql);
        ajouterParamPDO($cur, ':userId', $userId);
        majDonneesPrepareesPDO($cur);
    }

    public function rendreActif($userId){
        $sql = "UPDATE CUI_UTILISATEUR SET STA_ID = 1 WHERE UTI_ID = :userId";
        $cur = preparerRequetePDO($this->connection, $sql);
        ajouterParamPDO($cur, ':userId', $userId);
        majDonneesPrepareesPDO($cur);
    }

    public function supprimerCompte($userId) {
        $sql = "DELETE FROM CUI_UTILISATEUR WHERE UTI_ID = :userId";
        $cur = preparerRequetePDO($this->connection, $sql);
        ajouterParamPDO($cur, ':userId', $userId);
        majDonneesPrepareesPDO($cur);
    }

    

    public function recupererToutesRecettes(){
        $sql = "SELECT * from CUI_RECETTE WHERE rec_status = 0";
        $cur = preparerRequetePDO($this->connection, $sql);
        LireDonneesPDOPreparee($cur,$tab);
        return $tab;
    }


    public function recupererRecetteDetails($recId) {
        $sql = "SELECT * FROM CUI_RECETTE WHERE REC_ID = :recId";
        $cur = preparerRequetePDO($this->connection, $sql);
        ajouterParamPDO($cur, ':recId', $recId);
        LireDonneesPDOPreparee($cur, $tab);
        return $tab[0];
    }

    public function refuserRecette($recId){
        $sql = "DELETE FROM CUI_RECETTE WHERE REC_ID = :recId";
        $cur = preparerRequetePDO($this->connection, $sql);
        ajouterParamPDO($cur, ':recId', $recId);
        echo $sql;
        return majDonneesPrepareesPDO($cur);
    }

    public function accepterRecette($recId){
        $sql = "UPDATE CUI_RECETTE SET REC_STATUS = 1 WHERE REC_ID = :recId";
        $cur = preparerRequetePDO($this->connection, $sql);
        ajouterParamPDO($cur, ':recId', $recId);
        return majDonneesPrepareesPDO($cur);
    }


    public function recupererTousCommentaires(){
        $sql = "SELECT * from CUI_COMMENTAIRE JOIN CUI_UTILISATEUR USING(UTI_ID) WHERE COM_STATUS = 1";
        $cur = preparerRequetePDO($this->connection, $sql);
        LireDonneesPDOPreparee($cur,$tab);
        return $tab;
    }

    public function validerCommentaire($comId){
        $sql = "UPDATE CUI_COMMENTAIRE SET COM_STATUS = 2 WHERE COM_ID = :comId";
        $cur = preparerRequetePDO($this->connection, $sql);
        ajouterParamPDO($cur, ':comId', $comId);
        return majDonneesPrepareesPDO($cur);
    }

    public function supprimerCommentaire($comId){
        $sql = "DELETE FROM CUI_COMMENTAIRE WHERE COM_ID = :comId";
        $cur = preparerRequetePDO($this->connection, $sql);
        ajouterParamPDO($cur, ':comId', $comId);
        return majDonneesPrepareesPDO($cur);
    }
}
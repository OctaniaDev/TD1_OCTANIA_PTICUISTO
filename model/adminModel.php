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


}
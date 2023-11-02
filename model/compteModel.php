<?php 

class Compte {

    private $connection;

    public function __construct ($connection){
        $this->connection = $connection;
    }
    
    public function getAccountInfo($userId) {
        $sql = "SELECT UTI_PSEUDO, UTI_EMAIL, UTI_PRENOM, UTI_NOM, UTI_DATE_INSCRIPTION FROM CUI_UTILISATEUR WHERE UTI_ID = :userId";
        $cur = preparerRequetePDO($this->connection, $sql);
        ajouterParamPDO($cur, ':userId', $userId, 'nombre');
        LireDonneesPDOPreparee($cur, $tab);
        return $tab[0]; 
    }
    
    
    public function deleteUser($userId) {
        $sql = "DELETE FROM CUI_UTILISATEUR WHERE UTI_ID = :userId";
        $req = majDonneesPDO($this->connection,$sql);
        $this->connection = null;
        return $req;
    }
    public function modifierMotDePasse($userId, $nouveauMotDePasse) {
        $motDePasseHache = md5($nouveauMotDePasse);
        $sql = "UPDATE CUI_UTILISATEUR SET UTI_MDP = :motDePasse WHERE UTI_ID = :userId";
        $cur = preparerRequetePDO($this->connection, $sql);
        ajouterParamPDO($cur, ':motDePasse', $motDePasseHache);
        ajouterParamPDO($cur, ':userId', $userId, 'nombre');
        $req = majDonneesPrepareesPDO($cur);
        return $req;
    }
    
    
    
}
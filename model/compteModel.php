<?php 

class Compte {

    private $connection;

    public function __construct ($connection){
        $this->connection = $connection;
    }

    public function deleteUser($userId) {
        $sql = "DELETE FROM CUI_UTILISATEUR WHERE uti_ID = :userId";
        $req = majDonneesPDO($this->connection,$sql);
        $this->connection = null;
        return $req;
    }

    public function modifierMotDePasse($userId, $nouveauMotDePasse) {
        $sql = "UPDATE CUI_UTILISATEUR SET UTI_ID = :nouveauMotDePasse WHERE UTI_ID = :userId";
        $cur = preparerRequetePDO($this->connection, $sql);
        ajouterParamPDO($cur, ':nouveauMotDePasse', $nouveauMotDePasse);
        ajouterParamPDO($cur, ':UTI_ID', $userId, 'nombre');
        $req = majDonneesPrepareesPDO($cur);
        return $req;
    }
    
    
}
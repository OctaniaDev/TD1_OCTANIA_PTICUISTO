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
        $res1 = $this->deleteUserCommentaire($userId);
        $res2 = $this->deleteUserRecettes($userId);
        $sql = "DELETE FROM CUI_UTILISATEUR WHERE UTI_ID = :userId";
        $cur = preparerRequetePDO($this->connection, $sql);
        ajouterParamPDO($cur, ':userId', $userId);
        return $res1 && $res2 && majDonneesPrepareesPDO($cur);
    }

    public function deleteUserCommentaire($userId) {
        $sql = "DELETE FROM CUI_COMMENTAIRE WHERE UTI_ID = :userId";
        $cur = preparerRequetePDO($this->connection, $sql);
        ajouterParamPDO($cur, ':userId', $userId);
        return majDonneesPrepareesPDO($cur);
    }

    public function deleteUserRecettesIngredients($userId) {
        $sql = "DELETE FROM CUI_CONTENIR where REC_ID IN (select REC_ID from CUI_RECETTE where UTI_ID = :userId)";
        $cur = preparerRequetePDO($this->connection, $sql);
        ajouterParamPDO($cur, ':userId', $userId);
        return majDonneesPrepareesPDO($cur);
    }

    public function deleteUserRecettesTags($userId) {
        $sql = "DELETE FROM CUI_POSSEDER where REC_ID IN (select REC_ID from CUI_RECETTE where UTI_ID = :userId)";
        $cur = preparerRequetePDO($this->connection, $sql);
        ajouterParamPDO($cur, ':userId', $userId);
        return majDonneesPrepareesPDO($cur);
    }

    public function deleteUserRecettes($userId) {
        $res1 = $this->deleteUserRecettesIngredients($userId);
        $res2 = $this->deleteUserRecettesTags($userId);
        $sql = "DELETE FROM CUI_RECETTE WHERE UTI_ID = :userId";
        $cur = preparerRequetePDO($this->connection, $sql);
        ajouterParamPDO($cur, ':userId', $userId);
        return $res1 && $res2 && majDonneesPrepareesPDO($cur);
    }

    public function modifierMotDePasse($userId, $nouveauMotDePasse) {
        $motDePasseHache = md5($nouveauMotDePasse);
        $sql = "UPDATE CUI_UTILISATEUR SET UTI_MDP = :motDePasse WHERE UTI_ID = :userId";
        $cur = preparerRequetePDO($this->connection, $sql);
        ajouterParamPDO($cur, ':motDePasse', $motDePasseHache);
        ajouterParamPDO($cur, ':userId', $userId, 'nombre');
        return majDonneesPrepareesPDO($cur);
    }
    
    
    
    
}
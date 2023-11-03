<?php 

class RecetteModel {
    private $connection;

    public function __construct($connection) {
        $this->connection = $connection;
    }


    public function recupererToutesRecettes() {
        $req = "SELECT * FROM CUI_RECETTE JOIN CUI_CATEGORIE USING(CAT_ID)";
        $cur = preparerRequetePDO($this->connection, $req);
        LireDonneesPDOPreparee($cur, $tab);
        return $tab;
    }

    public function recupererRecetteSimple($recId) {
        $req = 'SELECT * FROM CUI_RECETTE JOIN CUI_CATEGORIE USING(CAT_ID) WHERE rec_id = :recId';
        $cur = preparerRequetePDO($this->connection, $req);
        ajouterParamPDO($cur, ':recId', $recId);
        LireDonneesPDOPreparee($cur, $tab);
        return $tab;
    }

    public function recupererIngredientsRecette($recId) {
        $req = 'SELECT * FROM CUI_INGREDIENT JOIN CUI_CONTENIR USING (ING_ID) WHERE REC_ID = :recId';
        $cur = preparerRequetePDO($this->connection, $req);
        ajouterParamPDO($cur, ':recId', $recId);
        LireDonneesPDOPreparee($cur, $tab);
        return $tab;
    }

    public function recupererCommentairesRecette($recId) {
        if($_SESSION['connecter'] == 'oui') {
            $req = 'SELECT * FROM CUI_COMMENTAIRE JOIN CUI_UTILISATEUR USING(UTI_ID) WHERE REC_ID = :recId AND ( COM_STATUS = 1 || UTI_ID = :utiId) order by COM_DATE DESC';
            $cur = preparerRequetePDO($this->connection, $req);
            ajouterParamPDO($cur, ':utiId', $_SESSION['id_utilisateur']);
        } else {
            $req = 'SELECT * FROM CUI_COMMENTAIRE JOIN CUI_UTILISATEUR USING(UTI_ID) WHERE REC_ID = :recId AND COM_STATUS = 1 order by COM_DATE DESC';
            $cur = preparerRequetePDO($this->connection, $req);
        }
        ajouterParamPDO($cur, ':recId', $recId);
        LireDonneesPDOPreparee($cur, $tab);
        return $tab;
    }

    public function insererCommentaire($recId, $commentaire, $utiID) {
        $req = "INSERT into  CUI_COMMENTAIRE values (null, :recId, :utiId, :commentaire, 2, sysdate())";
        $cur = preparerRequetePDO($this->connection, $req);
        ajouterParamPDO($cur, ':recId', $recId);
        ajouterParamPDO($cur, ':utiId', $utiID);
        ajouterParamPDO($cur, ':commentaire', $commentaire);
        return majDonneesPrepareesPDO($cur);
    }
}

?>
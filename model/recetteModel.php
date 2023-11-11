<?php 

class RecetteModel {
    private $connection;

    public function __construct($connection) {
        $this->connection = $connection;
    }


    public function recupererTousRecettes() {
        $req = "SELECT * FROM CUI_RECETTE JOIN CUI_CATEGORIE USING(CAT_ID)";
        $cur = preparerRequetePDO($this->connection, $req);
        LireDonneesPDOPreparee($cur, $tab);
        return $tab;
    }

    public function recupererTousRecettesValide() {
        $req = "SELECT * FROM CUI_RECETTE JOIN CUI_CATEGORIE USING(CAT_ID) where REC_STATUS = 1";
        $cur = preparerRequetePDO($this->connection, $req);
        LireDonneesPDOPreparee($cur, $tab);
        return $tab;
    }

    public function recupererRecetteSimpleValide($recId) {
        $req = 'SELECT * FROM CUI_RECETTE JOIN CUI_CATEGORIE USING(CAT_ID) WHERE rec_id = :recId and REC_STATUS = 1';
        $cur = preparerRequetePDO($this->connection, $req);
        ajouterParamPDO($cur, ':recId', $recId);
        LireDonneesPDOPreparee($cur, $tab);
        return $tab;
    }

    public function recupererRecetteSimple($recId, $utiId) {
        $req = 'SELECT * FROM CUI_RECETTE JOIN CUI_CATEGORIE USING(CAT_ID) WHERE rec_id = :recId and uti_id = :utiId';
        $cur = preparerRequetePDO($this->connection, $req);
        ajouterParamPDO($cur, ':recId', $recId);
        ajouterParamPDO($cur, ':utiId', $utiId);
        LireDonneesPDOPreparee($cur, $tab);
        return $tab;
    }

    public function recupererTousIngredients() {
        $req = 'SELECT * FROM CUI_INGREDIENT';
        $cur = preparerRequetePDO($this->connection, $req);
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

    public function recupererRecettesUtilisateur($utiId) {
        $req = 'SELECT * from CUI_RECETTE JOIN CUI_CATEGORIE USING(CAT_ID) where UTI_ID = :utiId order by REC_ID desc';
        $cur = preparerRequetePDO($this->connection, $req);
        ajouterParamPDO($cur, ':utiId', $utiId);
        LireDonneesPDOPreparee($cur, $tab);
        return $tab;
    }

    public function insererIngredient($recId, $ingId) {
        $req = "INSERT into  CUI_CONTENIR values (:recId, :ingId)";
        $cur = preparerRequetePDO($this->connection, $req);
        ajouterParamPDO($cur, ':recId', $recId);
        ajouterParamPDO($cur, ':ingId', $ingId);
        return majDonneesPrepareesPDO($cur);
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

    public function insererRecette($titre, $contenu, $resume, $categorie) {
        $req = "INSERT into CUI_RECETTE values(null, :categorie, :utiId, :titre, :contenu, :resume, sysdate(), sysdate(), 'lien_de_limage', 2)";
        $cur = preparerRequetePDO($this->connection, $req);
        ajouterParamPDO($cur, ':categorie', $categorie);
        ajouterParamPDO($cur, ':utiId', $_SESSION['id_utilisateur']);
        ajouterParamPDO($cur, ':titre', $titre);
        ajouterParamPDO($cur, ':contenu', $contenu);
        ajouterParamPDO($cur, ':resume', $resume);
        return majDonneesPrepareesPDO($cur);
    }
}

?>
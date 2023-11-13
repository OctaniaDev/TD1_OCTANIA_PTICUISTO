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

    public function recupererTousTAGS() {
        $req = 'SELECT * FROM CUI_TAG';
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
        $req = "INSERT into CUI_CONTENIR values (:recId, :ingId)";
        $cur = preparerRequetePDO($this->connection, $req);
        ajouterParamPDO($cur, ':recId', $recId);
        ajouterParamPDO($cur, ':ingId', $ingId);
        return majDonneesPrepareesPDO($cur);
    }

    public function insererTag($recId, $tagId) {
        $req = "INSERT into CUI_POSSEDER values (:recId, :tagId)";
        $cur = preparerRequetePDO($this->connection, $req);
        ajouterParamPDO($cur, ':recId', $recId);
        ajouterParamPDO($cur, ':tagId', $tagId);
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

    public function recupererTagsRecette($recId) {
        $req = 'SELECT * FROM CUI_TAG JOIN CUI_POSSEDER USING (TAG_ID) WHERE REC_ID = :recId';
        $cur = preparerRequetePDO($this->connection, $req);
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

    public function insererRecette($titre, $contenu, $resume, $categorie, $image) {
        $req = "INSERT into CUI_RECETTE values(null, :categorie, :utiId, :titre, :contenu, :resume, sysdate(), sysdate(), :image, 2)";
        $cur = preparerRequetePDO($this->connection, $req);
        ajouterParamPDO($cur, ':categorie', $categorie);
        ajouterParamPDO($cur, ':utiId', $_SESSION['id_utilisateur']);
        ajouterParamPDO($cur, ':titre', $titre);
        ajouterParamPDO($cur, ':contenu', $contenu);
        ajouterParamPDO($cur, ':resume', $resume);
        ajouterParamPDO($cur, ':image', $image);
        return majDonneesPrepareesPDO($cur);
    }

    
    public function supprimerRecetteUtilisateur($recId, $utiId) {
        $res1 = $this->supprimerIngredients($recId, $utiId);
        $res2 = $this->supprimerTags($recId, $utiId);
        $res3 = $this->supprimerCommentaire($recId, $utiId);

        $sql = "DELETE FROM CUI_RECETTE WHERE REC_ID = :recId and uti_id = :utiId";
        $cur = preparerRequetePDO($this->connection, $sql);
        ajouterParamPDO($cur, ':recId', $recId);
        ajouterParamPDO($cur, ':utiId', $utiId);
        return $res1 && $res2 && $res3 && majDonneesPrepareesPDO($cur);
    }

    public function supprimerIngredients($recId, $utiId) {
        $sql = "delete from CUI_CONTENIR WHERE REC_ID = :recId";
        $cur = preparerRequetePDO($this->connection, $sql);
        ajouterParamPDO($cur, ':recId', $recId);
        return majDonneesPrepareesPDO($cur);
    }

    public function supprimerTags($recId, $utiId) {
        $sql = "delete from CUI_POSSEDER WHERE REC_ID = :recId";
        $cur = preparerRequetePDO($this->connection, $sql);
        ajouterParamPDO($cur, ':recId', $recId);
        return majDonneesPrepareesPDO($cur);
    }

    public function supprimerCommentaire($recId, $utiId) {
        $sql = "DELETE FROM CUI_COMMENTAIRE WHERE recId = :recId";
        $cur = preparerRequetePDO($this->connection, $sql);
        ajouterParamPDO($cur, ':recId', $recId);
        return majDonneesPrepareesPDO($cur);
    }

    public function updateRecette($recId, $utiId, $titre, $contenu, $resume, $categorie, $image) {
        $req = "UPDATE CUI_RECETTE set CAT_ID = :categorie, REC_TITRE = :titre, REC_CONTENU = :contenu, REC_RESUME = :resume, REC_MODIFICATION = sysdate(), REC_STATUS = 2, REC_IMAGE = :image where REC_ID = :recId and UTI_ID = :utiId";
        $cur = preparerRequetePDO($this->connection, $req);
        ajouterParamPDO($cur, ':categorie', $categorie);
        ajouterParamPDO($cur, ':titre', $titre);
        ajouterParamPDO($cur, ':contenu', $contenu);
        ajouterParamPDO($cur, ':resume', $resume);
        ajouterParamPDO($cur, ':recId', $recId);
        ajouterParamPDO($cur, ':utiId', $utiId);
        ajouterParamPDO($cur, ':image', $image);
        return majDonneesPrepareesPDO($cur);
    }

    public function updateRecetteSansImage($recId, $utiId, $titre, $contenu, $resume, $categorie) {
        $req = "UPDATE CUI_RECETTE set CAT_ID = :categorie, REC_TITRE = :titre, REC_CONTENU = :contenu, REC_RESUME = :resume, REC_MODIFICATION = sysdate(), REC_STATUS = 2 where REC_ID = :recId and UTI_ID = :utiId";
        $cur = preparerRequetePDO($this->connection, $req);
        ajouterParamPDO($cur, ':categorie', $categorie);
        ajouterParamPDO($cur, ':titre', $titre);
        ajouterParamPDO($cur, ':contenu', $contenu);
        ajouterParamPDO($cur, ':resume', $resume);
        ajouterParamPDO($cur, ':recId', $recId);
        ajouterParamPDO($cur, ':utiId', $utiId);
        return majDonneesPrepareesPDO($cur);
    }

    public function recupererTagsListRecette($recettes) {
        if(empty($recettes)) return null;
        $req = "select * from CUI_TAG join CUI_POSSEDER using(TAG_ID)
        where REC_ID = :recId0";
        for($i = 1; $i < count($recettes); $i++) {
            $req .= " union ";
            $req .= "select * from CUI_TAG join CUI_POSSEDER using(TAG_ID)
            where REC_ID = :recId".$i;
        }
        $cur = preparerRequetePDO($this->connection, $req);
        for($i = 0; $i < count($recettes); $i++) {
            ajouterParamPDO($cur, ':recId'.$i, $recettes[$i]['REC_ID']);
        }
        LireDonneesPDOPreparee($cur, $tab);
        return $tab;
    }
}

?>
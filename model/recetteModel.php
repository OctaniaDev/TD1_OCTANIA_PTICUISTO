<?php 

class RecetteModel {
    private $connection;

    public function __construct($connection) {
        $this->connection = $connection;
    }


    public function recupererToutesRecettes() {
        $sql = "SELECT * FROM CUI_RECETTE JOIN CUI_CATEGORIE USING(CAT_ID)";
        LireDonneesPDO1($this->connection, $sql, $tab);
        return $tab;
    }

    public function recupererRecetteSimple($recId) {
        $sql = 'SELECT * FROM CUI_RECETTE JOIN CUI_CATEGORIE USING(CAT_ID) WHERE rec_id ='.$recId;
        LireDonneesPDO1($this->connection, $sql, $tab);
        return $tab;
    }

    public function recupererIngredientsRecette($recId) {
        $sql = 'SELECT * FROM CUI_INGREDIENT JOIN CUI_CONTENIR USING (ING_ID) WHERE REC_ID ='.$recId;
        LireDonneesPDO1($this->connection, $sql, $tab);
        return $tab;
    }

    public function recupererCommentairesRecette($recId) {
        if($_SESSION['connecter'] == 'oui')
            $sql = 'SELECT * FROM CUI_COMMENTAIRE JOIN CUI_UTILISATEUR USING(UTI_ID) WHERE REC_ID = '.$recId.' AND ( COM_STATUS = 1 || UTI_ID = '. $_SESSION['id_utilisateur'].') order by COM_DATE DESC';
        else
            $sql = 'SELECT * FROM CUI_COMMENTAIRE JOIN CUI_UTILISATEUR USING(UTI_ID) WHERE REC_ID = '.$recId.' AND COM_STATUS = 1 order by COM_DATE DESC';
        LireDonneesPDO1($this->connection, $sql, $tab);
        return $tab;
    }

    public function insererCommentaire($recId, $commentaire, $utiID) {
        $sql = "INSERT into  CUI_COMMENTAIRE values (null,".$recId.",".$utiID.",'".$commentaire."', 2, sysdate())";
        return majDonneesPDO($this->connection, $sql);
    }
}

?>
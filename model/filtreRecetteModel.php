<?php 

class filtreRecetteModel {
    private $connection;

    public function __construct($connection) {
        $this->connection = $connection;
    }

    public function filtrerRecetteParCategorie($typeCategorie) {
        $req = "SELECT * FROM CUI_RECETTE join CUI_CATEGORIE using(CAT_ID) WHERE CAT_ID = :typeCategorie and REC_STATUS = 1";
        $cur = preparerRequetePDO($this->connection, $req);
        ajouterParamPDO($cur, ":typeCategorie", $typeCategorie);
        LireDonneesPDOPreparee($cur, $tab);
        return $tab;
    }

    public function filtrerRecetteParTitre($motCherche) {
        $motCherche = "%" . $motCherche . "%";
        $req = "SELECT * FROM CUI_RECETTE join CUI_CATEGORIE using(CAT_ID) WHERE upper(trim(REC_TITRE)) LIKE upper(trim(:motCherche)) and REC_STATUS = 1";
        $cur = preparerRequetePDO($this->connection, $req);
        ajouterParamPDO($cur, ":motCherche", $motCherche);
        LireDonneesPDOPreparee($cur, $tab);
        return $tab;
    }

    /*public function filtrerRecetteParIngredients($ingId) {
        $sql = "Select * from CUI_RECETTE  join CUI_CONTENIR using (REC_ID) where REC_ID";
        LireDonneesPDO1($this->connection, $sql, $tab);
        return $tab;
    }*/
}
    ?>
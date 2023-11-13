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

    public function filtrerRecetteParIngredient($ingredients) {
        $req = "SELECT * from CUI_RECETTE join CUI_CATEGORIE using(CAT_ID) where rec_id IN ( select rec_id from CUI_CONTENIR where ing_id = :ingredient0 and REC_STATUS = 1) ";
        for($i = 1; $i<count($ingredients); $i++){
            $req .= "and rec_id IN ( select rec_id from CUI_CONTENIR where ing_id = :ingredient".intval($i)." and REC_STATUS = 1) ";
        }
        $cur = preparerRequetePDO($this->connection, $req);
        for($i = 0; $i<count($ingredients); $i++){
            $ingId = ":ingredient".$i;
            ajouterParamPDO($cur, $ingId, $ingredients[$i], 'nombre');
        }
        LireDonneesPDOPreparee($cur, $tab);
        return $tab;
    }

    public function filtrerRecetteParTag($tags) {
        $req = "SELECT * from CUI_RECETTE join CUI_CATEGORIE using(CAT_ID) where rec_id IN ( select rec_id from CUI_POSSEDER where tag_id = :tag0 and REC_STATUS = 1) ";
        for($i = 1; $i<count($tags); $i++){
            $req .= "and rec_id IN ( select rec_id from CUI_POSSEDER where tag_id = :tag".intval($i)." and REC_STATUS = 1) ";
        }
        $cur = preparerRequetePDO($this->connection, $req);
        for($i = 0; $i<count($tags); $i++){
            $tagId = ":tag".$i;
            ajouterParamPDO($cur, $tagId, $tags[$i], 'nombre');
        }
        LireDonneesPDOPreparee($cur, $tab);
        return $tab;
    }
    
    public function recupererTousTags() {
        $req = 'SELECT * FROM CUI_TAG';
        $cur = preparerRequetePDO($this->connection, $req);
        LireDonneesPDOPreparee($cur, $tab);
        return $tab;
    }

    public function filtrerRecetteParTagUnique($tag) {
        $req = "SELECT * from CUI_RECETTE join CUI_CATEGORIE using(CAT_ID) where rec_id IN ( select rec_id from CUI_POSSEDER where tag_id = :tag and REC_STATUS = 1) ";
        $cur = preparerRequetePDO($this->connection, $req);
        ajouterParamPDO($cur, ':tag', $tag);
        LireDonneesPDOPreparee($cur, $tab);
        return $tab;
    }

    public function recupererNomRecettes() {
        $req= "select REC_TITRE from CUI_RECETTE join CUI_CATEGORIE using(CAT_ID) where REC_STATUS = 1";
        $cur = preparerRequetePDO($this->connection, $req);
        LireDonneesPDOPreparee($cur, $tab);
        return $tab;
    }
    
    public function recupererNomRecettesGlobal() {
        $req= "select REC_TITRE from CUI_RECETTE";
        $cur = preparerRequetePDO($this->connection, $req);
        LireDonneesPDOPreparee($cur, $tab);
        return $tab;
    }

}
    ?>
<?php 

class filtreRecetteModel {
    private $connection;

    public function __construct($connection) {
        $this->connection = $connection;
    }

    public function filtrerRecetteParCategorie($TypeCategorie) {
        $sql = "SELECT * FROM CUI_RECETTE WHERE CAT_ID =".$TypeCategorie;
        LireDonneesPDO1($this->connection, $sql, $tab);
        return $tab;
    }

    public function filtrerRecetteParTitre($motCherche) {
        $sql = "SELECT * FROM CUI_RECETTE WHERE upper(trim(REC_TITRE)) LIKE upper(trim('%".$motCherche."%'))";
        LireDonneesPDO1($this->connection, $sql, $tab);
        return $tab;
    }

    /*public function filtrerRecetteParIngredients($ingId) {
        $sql = "Select * from CUI_RECETTE  join CUI_CONTENIR using (REC_ID) where REC_ID";
        LireDonneesPDO1($this->connection, $sql, $tab);
        return $tab;
    }*/
}
    ?>
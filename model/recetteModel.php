<?php 

class RecetteModel {
    private $connection;

    public function __construct($connection) {
        $this->connection = $connection;
    }


    public function recupererToutesRecettes() {
        $sql = "SELECT * FROM CUI_RECETTE";
        LireDonneesPDO1($this->connection, $sql, $tab);
        return $tab;
    }

    public function recupererRecetteSimple($recId) {
        $sql = 'SELECT * FROM CUI_RECETTE WHERE rec_id ='.$recId;
        LireDonneesPDO1($this->connection, $sql, $tab);
        return $tab;
    }

    public function recupererIngredientsRecette($recId) {
        $sql = 'SELECT * FROM CUI_INGREDIENT JOIN CUI_CONTENIR USING (ING_ID) where REC_ID ='.$recId;
        LireDonneesPDO1($this->connection, $sql, $tab);
        return $tab;
    }
}

?>
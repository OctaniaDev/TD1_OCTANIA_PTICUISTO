<?php 

include_once 'param_connexion_etu.php';
include_once 'pdo_agile.php';

class filtreRecetteModel {
    private $connection;

    public function __construct($connection) {
        $this->connection = $connection;
    }

    public function filtrerRecetteParCategorie($catId) {
        $sql = 'Select * from CUI_RECETTE where cat_id ='.$catId;
        LireDonneesPDO1($this->connection, $sql, $tab);
        return $tab;
    }

    public function filtrerRecetteParTitre($motChercher) {
        $sql = "Select * from CUI_RECETTE where REC_TITRE LIKE'%".$motChercher."%'";
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
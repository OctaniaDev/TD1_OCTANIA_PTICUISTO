<?php 

include_once 'param_connexion_etu.php';
include_once 'pdo_agile.php';

class RecetteModel {
    private $connection;

    public function __construct($connection) {
        $this->connection = $connection;
    }


    public function getAllRecettes() {
        $sql = "SELECT * FROM CUI_RECETTE";
        LireDonneesPDO1($this->connection, $sql, $tab);
        $this->connection = null;
        return $tab;
    }   
}

?>
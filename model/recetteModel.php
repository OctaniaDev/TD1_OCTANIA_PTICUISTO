<?php 
include_once 'param_connexion_etu.php';
include_once 'pdo_agile.php';
    class RecetteModel extends controller {
        private $connection;

        public function __construct($connection) {
            parent::__construct($connection);
        }


        public function getRecettes() {
            $sql = "SELECT * FROM CUI_RECETTE";
            LireDonneesPDO1($this->connection, $sql, $tab);
        }
        
        
    }
?>
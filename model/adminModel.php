<?php 

class Admin {

    private $connection;

    public function __construct ($connection){
        $this->connection = $connection;
    }

    public function recupererTousComptes(){
        $sql = "SELECT * from CUI_UTILISATEUR";
        $cur = preparerRequetePDO($this->connection,$sql);
        LireDonneesPDOPreparee($cur,$tab);
        return $tab;
    }

}
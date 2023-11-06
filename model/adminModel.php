<?php 

class Admin {

    private $connection;

    public function __construct ($connection){
        $this->connection = $connection;
    }

    public function recupererTousComptes(){
        $sql = "SELECT * from CUI_UTILISATEUR";
        $cur = prepareRequetePDO($this->connection,$tab);
        LireDonneesPDOPreparee($cur,$tab);
        return $tab;
    }

}
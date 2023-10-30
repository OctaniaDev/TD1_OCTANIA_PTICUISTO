<?php 

include_once 'param_connexion_etu.php';
include_once 'pdo_agile.php';


class Compte {

    private $connection;

    public function __construct ($connection){
        $this->connection = $connection;
    }

    public function deleteUser($userId) {
        $sql = "DELETE FROM CUI_UTILISATEUR WHERE id = :UTI_ID";
        $req = majDonneesPDO($this->connection,$sql);
        $this->connection = null;
        return $req;
    }
}
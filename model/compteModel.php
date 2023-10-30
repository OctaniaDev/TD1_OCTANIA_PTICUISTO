<?php 

include_once 'param_connexion_etu.php';
include_once 'pdo_agile.php';


class Compte {

    private $connection;

    public function __construct ($connection){
        $this->connection = $connection;
    }
}
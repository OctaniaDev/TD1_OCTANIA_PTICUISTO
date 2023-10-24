<?php 
class Controller {
    public $connection;

    public function __construct($connection) {
        $this->connection = $connection;
    }
}

?>
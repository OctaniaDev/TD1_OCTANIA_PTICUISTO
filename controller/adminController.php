<?php


include_once 'controller.php';
require_once $GLOBALS['root'] . 'model/adminModel.php';

class AdminController extends Controller {

    private $adminModel;

    public function __construct($connection) {
        parent::__construct($connection);
    }

    public function choix() {}


    


}
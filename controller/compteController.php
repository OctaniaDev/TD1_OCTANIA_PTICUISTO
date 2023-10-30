<?php

include_once 'controller.php';

class CompteController extends controller {

    private $compteModel;

    public function __construct($connection){
        parent::__construct($connection);
    }

    public function traiterSuppression() {
        if (isset($_SESSION['user_id'])) {
            $userId = $_SESSION['user_id']; 

            $result = $this->compteModel->deleteUser($userId);

            if ($result) {
                header("Location: ./view/accueilView.php");
            } else {
                echo 'erreur';
            }
        } else {
            header("Location: ./view/accueilView.php");
        }
    }
}

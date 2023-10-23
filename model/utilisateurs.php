<?php
include_once 'param_connexion_etu.php';
include_once 'pdo_agile.php';

class Utilisateur {
    private $pdo;

    public function __construct() {
        global $db, $db_username, $db_password;
        $this->pdo = OuvrirConnexionPDO($db, $db_username, $db_password);
    }

    public function Connexion($username, $password) {
        $stmt = $this->pdo->prepare("SELECT UTI_MDP FROM CUI_UTILISATEUR WHERE UTI_PSEUDO = :username");
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->execute();

        $hashedPassword = $stmt->fetchColumn();

        if ($hashedPassword && password_verify($password, $hashedPassword)) {
            return true;    
        }

        return false;
    }
}
?>

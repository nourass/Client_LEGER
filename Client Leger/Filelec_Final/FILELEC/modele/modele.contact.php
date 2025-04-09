<?php
class ModeleContact {
    private $pdo;

    public function __construct() {
        try {
            $this->pdo = new PDO("mysql:host=localhost;dbname=filelec;charset=utf8", "root", "");
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die(" Erreur de connexion à la base de données : " . $e->getMessage());
        }
    }

    public function enregistrerMessage($nom, $prenom, $email, $telephone, $message) {
        $sql = "INSERT INTO contact (nom, prenom, email, telephone, message, date_envoi) 
                VALUES (:nom, :prenom, :email, :telephone, :message, NOW())";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            ':nom' => $nom,
            ':prenom' => $prenom,
            ':email' => $email,
            ':telephone' => $telephone,
            ':message' => $message
        ]);
    }
}
?>
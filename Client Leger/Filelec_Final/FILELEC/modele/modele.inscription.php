<?php
/* Cette classe Modele permet l'interface avec la base de données.
   L'ensemble des requêtes sont exécutées ici.
   Le controleur demande l'exécution d'une requête au Modele.
   Celui-ci lui répond en extrayant ou injectant des données dans les tables.
*/
class Modele {
    private $unPdo; // PDO : PHP Data Object pour une connexion sécurisée à la base de données.

    public function __construct() {
        try {
            $serveur = "localhost";
            $bdd = "filelec";
            $user = "root";
            $mdp = "";
            // Instanciation de la classe PDO
            $this->unPdo = new PDO("mysql:host=" . $serveur . ";dbname=" . $bdd, $user, $mdp);
        } catch (PDOException $exp) {
            echo "Erreur de connexion à la base de données : ";
            echo $exp->getMessage(); // Affiche le message officiel de l'erreur
        }
    }


}
?>

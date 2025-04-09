<?php
class ModelePanier
{
    private $unPdo; //PDO : PHP DATA Object c'est une classe PHP librairie qui permet la connexion sécurisée à la base de données.

    public function __construct()
    {
        try {
            $serveur = "localhost";
            $bdd = "filelec";
            $user = "root";
            $mdp = "";
            //instanciation de la classe PDO
            $this->unPdo = new PDO("mysql:host=" . $serveur . ";dbname=" . $bdd, $user, $mdp);
        } catch (PDOException $exp) {
            echo "Erreur de connexion à la base de données.";
            echo $exp->getMessage(); //message officiel de l'erreur

        }

    }
    public function getPanierClient($id_client)
    {
        $requete = "SELECT  * from vuePanier where id_client = :id_client;";
        $donnees = array(
            ":id_client" => $id_client
        );
        $exec = $this->unPdo->prepare($requete);
        $exec->execute($donnees);
        return $exec->fetchAll();
    }

    public function deletePanierClient($id_article)
    {
        $requete = "delete from ligne where id_article = :id_article;";
        $donnees = array(
            ":id_article" => $id_article
        );
        $exec = $this->unPdo->prepare($requete);
        $exec->execute($donnees);
    }
}



?>
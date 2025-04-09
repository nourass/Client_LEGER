<?php
class CatalogueModele
{
    private $unPdo; // Connexion PDO à la base de données

    public function __construct()
    {
        try {
            $serveur = "localhost";
            $bdd = "filelec_T";
            $user = "root";
            $mdp = "";
            // Connexion à la base de données
            $this->unPdo = new PDO("mysql:host=" . $serveur . ";dbname=" . $bdd . ";charset=utf8", $user, $mdp);
            $this->unPdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $exp) {
            echo "Erreur de connexion à la base de données.";
            echo $exp->getMessage();
        }
    }


    public function selectAllArticles($id_cat)
    {
        $requete = "SELECT a.id_article, a.nom_article, a.description_article, a.prix_article, 
                           i.url_image, c.nom_cat 
                    FROM article a
                    left JOIN image i ON a.id_article = i.id_article
                    JOIN categorie c ON a.id_cat = c.id_cat ";

        if ($id_cat != '') {
            $requete .= " where c.id_cat = " . $id_cat;
        }


        $exec = $this->unPdo->prepare($requete);
        $exec->execute();
        return $exec->fetchAll(PDO::FETCH_ASSOC);
    }

    public function selectArticleById($id_article)
    {
        $sql = "SELECT * FROM article WHERE id_article = :id_article";
        $stmt = $this->unPdo->prepare($sql);
        $stmt->bindParam(':id_article', $id_article, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>
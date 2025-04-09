<?php
class ModeleArticle
{
    private $unPdo;

    public function __construct()
    {
        try {
            $this->unPdo = new PDO("mysql:host=localhost;dbname=filelec_T;charset=utf8", "root", "");
            $this->unPdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Erreur de connexion à la base de données : " . $e->getMessage());
        }
    }

    public function getArticleById($id_article = 1)
    {
        $requete = "SELECT a.id_article, a.nom_article, a.description_article, a.prix_article, 
                       i.url_image, c.nom_cat 
                FROM article a
                JOIN image i ON a.id_article = i.id_article
                JOIN categorie c ON a.id_cat = c.id_cat
                WHERE a.id_article = :id_article";

        $exec = $this->unPdo->prepare($requete);
        $donnees = array(":id_article" => $id_article);
        $exec->execute($donnees);
        return $exec->fetch();
    }

    public function selectAllCategories()
    {
        $requete = "SELECT c.id_cat, c.nom_cat, c.url,  count(*) as nb 
        from categorie c, article a where c.id_cat= a.id_cat group by c.id_cat;";
        $exec = $this->unPdo->prepare($requete);
        $exec->execute();
        return $exec->fetchAll();
    }

    public function ajouterAuPanier($id_client, $id_article = 1, $quantite = 1)
    {
        $donnees = array(
            ":id_client" => $id_client
        );
        $requete = "select * from panier where id_client = :id_client ;";
        $exec = $this->unPdo->prepare($requete);
        $exec->execute($donnees);
        $unPanier = $exec->fetch();
        if ($unPanier == null) {
            $requete = "INSERT INTO panier (date_ajout, id_client) VALUES (curdate(), :id_client);";

            $exec = $this->unPdo->prepare($requete);
            $exec->execute($donnees);

            $requete = "select * from panier where id_client = :id_client ;";
            $exec = $this->unPdo->prepare($requete);
            $exec->execute($donnees);
            $unPanier = $exec->fetch();
        }

        $id_panier = $unPanier['id_panier'];

        $requete = "select * from ligne where id_panier = :id_panier and id_article = :id_article ;";
        $donnees = array(
            ":id_article" => $id_article,
            ":id_panier" => $id_panier
        );
        $exec = $this->unPdo->prepare($requete);
        $exec->execute($donnees);
        $uneLigne = $exec->fetch();
        if ($uneLigne == null) {
            $requete = "insert into ligne (id_article, quantite, id_panier) values (:id_article, :quantite,:id_panier);";
        } else {
            $requete = "update ligne set quantite = quantite +  :quantite  where id_panier = :id_panier and id_article = :id_article ;";
        }
        $donnees = array(
            ":id_article" => $id_article,
            ":quantite" => $quantite,
            ":id_panier" => $id_panier
        );
        $exec = $this->unPdo->prepare($requete);
        $exec->execute($donnees);
    }
}
?>
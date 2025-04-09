<?php
require_once __DIR__ . '/../modele/modele.catalogue.php'; // ✅ Vérifie que ce chemin est correct

class ControleurCatalogue
{
    private $unModele; // ✅ Déclare explicitement la propriété

    public function __construct()
    {



        $this->unModele = new CatalogueModele(); // ✅ Instanciation correcte


    }

    public function selectAllArticles($id_cat)
    {
        return $this->unModele->selectAllArticles($id_cat);
    }

    public function selectArticleById($id_article)
    {
        return $this->unModele->selectArticleById($id_article);
    }
}
?>
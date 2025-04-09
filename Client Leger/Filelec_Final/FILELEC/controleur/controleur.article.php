<?php
require_once 'modele/modele.article.php';

class ControleurArticle
{
    private $modele;

    public function __construct()
    {
        $this->modele = new ModeleArticle();
    }

    public function getArticle($id_article)
    {
        return $this->modele->getArticleById($id_article);
    }

    public function ajouterAuPanier($id_client, $id_article, $quantite)
    {

        $this->modele->ajouterAuPanier($id_client, $id_article, $quantite);
    }

    public function selectAllCategories()
    {
        return $this->modele->selectAllCategories();
    }
}
?>
<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'controleur/controleur.article.php';


// Instanciation du contrôleur
$controleur = new ControleurArticle();
if (isset($_GET['id'])) {

    $id_article = $_GET['id'];
    $article = $controleur->getArticle($id_article);

    /*$id_client = $_SESSION['id_client'];*/


    // Charger la vue
    require_once 'vue/vue_article_unique.php';

    if (isset($_POST['AjouterA'])) {
        $quantite = $_POST['quantite'];
        $controleur->ajouterAuPanier($id_client, $id_article, $quantite);

        echo '<script type="text/javascript">
                alter("AJout au panier réussi");

            </script>';
        header("Location: index.php?page=9");

    }
}
?>
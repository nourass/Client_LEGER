<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once './controleur/controleur.catalogue.php';


$controleurCatalogue = new ControleurCatalogue();



$id_cat = '';
if (isset($_GET['categorie'])) {
    $id_cat = $_GET['categorie'];
}
$articles = $controleurCatalogue->selectAllArticles($id_cat);

// ✅ Chargement de la vue
require_once './vue/vue_catalogue.php';
?>
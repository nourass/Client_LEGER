<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="assets/css/home.css">
    <link rel="stylesheet" href="assets\css\recherche_barre_index.css">
</head>

<body>
    <div class="image-container">
        <img src="img\autre_image\DALL┬ÀE 2025-01-15.jpg" alt="Image principale">
        <div class="search-bar">
            <input type="text" placeholder="Rechercher...">
            <button type="submit">Rechercher</button>
        </div>
    </div>
    <br>
    <br>
    <br>
    <center>
        <div class="link-container">
            <div class="navbar">
                <?php
                require_once("controleur/controleur.article.php");
                $controleur = new ControleurArticle();
                $lesCategories = $controleur->selectAllCategories();
                foreach ($lesCategories as $uneCategorie) { ?>

                    <a href="index.php?page=9&categorie=<?= $uneCategorie['id_cat'] ?>">
                        <img src="<?= 'img/image_filtre/' . $uneCategorie['url'] ?>" alt="Rien">
                        <?= $uneCategorie['nom_cat'] ?> (<?= $uneCategorie['nb'] ?> )
                    </a>
                    <?php
                }
                ?>

            </div>
        </div>
    </center>


</body>

</html>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= ($article['nom_article']) ?></title>

</head>

<body>

    <div class="article-page">
        <?php

        $chemin = $article['url_image'];

        ?>
        <h1><?= ($article['nom_article']) ?></h1>
        <p>Catégorie : <?= ($article['nom_cat']) ?></p>
        <img src='<?= $chemin ?>' alt="Image de l'article">
        <p class="price">Prix : <strong><?= $article['prix_article'], 2, ',', ' ' ?> €</strong></p>
        <br>

        <br>
        <p>
        <h1>Description article: </h1>
        </p>
        <p><?= $article['description_article'] ?></p>
        <br>
        <a href="index.php?page=9" class="back-btn">Retour au catalogue</a>

        <form method="post">

            <div>
                <label for="quantite">Quantité :</label>
                <select name="quantite" id="quantite">
                    <?php for ($i = 1; $i <= 10; $i++): ?>
                        <option value="<?= $i ?>"><?= $i ?></option>
                    <?php endfor; ?>
                </select>
            </div>
            <button type="submit" name="AjouterA" class="back-btn">Ajouter au panier</button>
        </form>
    </div>




    <script src="assets/js/article.js"></script>
</body>

</html>
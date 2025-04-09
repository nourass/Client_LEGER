
 
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon panier</title>
    <link rel="stylesheet" href="../assets/css/panier.css">
</head>
<body>
    <h1>Mon Panier</h1>
 
    <?php if (empty($panier)): ?>
        <p>Votre panier est vide.</p>
    <?php else: ?>
        <tbody>
                <?php $total = 0; ?>
                <?php foreach ($panier as $item): ?>
                    <?php $sous_total = $item['prix_article'] * $item['quantite']; ?>
                    <?php $total += $sous_total; ?>
                <?php endforeach; ?>
            </tbody>
       
        <div class="panier">
            <?php foreach ($panier as $item): ?>
                <?php $sous_total = $item['prix_article'] * $item['quantite']; ?>
                <div class="panier-item">
                    <div class="panier-item-info">
                        <h2><?= htmlspecialchars($item['nom_article']) ?></h2>
                        <p>Quantité : <?= htmlspecialchars($item['quantite']) ?></p>
                        <p>Prix Unitaire : <?= number_format($item['prix_article'], 2, ',', ' ') ?> €</p>
                    </div>
                    <div class="panier-item-total">
                        <p>Total : <?= number_format($sous_total, 2, ',', ' ') ?> €</p>
                        <form action="supprimer_panier.php" method="POST">
                            <input type="hidden" name="id_panier" value="<?= $item['id_panier'] ?>">
                            <div class="action-buttons">
                                <a href="index.php?page=10&action=supPanier&id_article=<?= $item['id_article'] ?>" class="delete-button" action="supPanier">Supprimer l'article</a>
                            </div>
                        </form>
                    </div>
                </div>
            <?php endforeach; ?>
 
            <div class="panier-total">
                <h3>Total du Panier : <?= number_format($total, 2, ',', ' ') ?> €</h3>
               
                <form action="index.php?page=10" method="post">
                    <button type="submit" name="acheter" value="acheter">Acheter</button>
                </form>
 
                <!-- Fin du bouton ajouté -->
            </div>
        </div>
 
    <?php endif; ?>
 
    <a href="index.php?page=9">Retour au catalogue</a>
</body>
</html>
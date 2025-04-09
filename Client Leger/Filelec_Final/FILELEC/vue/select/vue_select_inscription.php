<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact - Pièces Mécaniques</title>
    <link rel="stylesheet" href="assets/css/inscriptions.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>

<div class="contact-container">
    <h2>Contactez-nous</h2>
    
    <?php if (!empty($messageRetour)): ?>
        <script>
            Swal.fire({
                title: "Information",
                text: "<?= $messageRetour ?>",
                icon: "<?= strpos($messageRetour, '✅') !== false ? 'success' : 'error' ?>"
            });
        </script>
    <?php endif; ?>

    <form id="contact-form" action="contact.php" method="POST">
        <div class="form-group">
            <label for="nom">Nom</label>
            <input type="text" id="nom" name="nom" required>
        </div>
        <div class="form-group">
            <label for="prenom">Prénom</label>
            <input type="text" id="prenom" name="prenom" required>
        </div>
        <div class="form-group">
            <label for="email">Adresse e-mail</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="telephone">Numéro de téléphone</label>
            <input type="tel" id="telephone" name="telephone" required>
        </div>
        <div class="form-group">
            <label for="message">Message</label>
            <textarea id="message" name="message" rows="4" required></textarea>
        </div>
        <button type="submit">Envoyer</button>
    </form>
</div>

</body>
</html>
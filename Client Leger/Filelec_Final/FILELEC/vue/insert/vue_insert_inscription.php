<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Fonction pour valider un champ
                function validateField($field) {
                    return preg_match('/^[a-zA-Z0-9\s-]*$/', $field);
                }
            
                // Liste des champs à valider
                $fields = [
                    'prenom' => 'Prénom',
                    'nom' => 'Nom',
                    'pays' => 'Pays',
                    'ville' => 'Ville',
                    'numero' => 'Numéro de rue',
                    'rue' => 'Nom de la rue'
                ];
            
                // Tableau pour stocker les erreurs
                $errors = [];
            
                // Validation de chaque champ
                foreach ($fields as $fieldName => $fieldLabel) {
                    if (!isset($_POST[$fieldName])) {
                        $errors[] = "Le champ $fieldLabel est manquant.";
                    } elseif (!validateField($_POST[$fieldName])) {
                        $errors[] = "Le champ $fieldLabel contient des caractères spéciaux non autorisés.";
                    }
                }
            
                // Si des erreurs sont détectées
                if (!empty($errors)) {
                    foreach ($errors as $error) {
                        echo "<p style='color: red;'>$error</p>";
                    }
                } else {
                    // Tous les champs sont valides, procéder à l'insertion en base de données
                    echo "Tous les champs sont valides !";
                    // Ici, vous pouvez insérer les données dans la base de données
                }
            }
        ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Inscription à Fillelec</title>
    <link rel="stylesheet" href="assets/css/inscription.css">
</head>
<body>
    <center>
        <div class="signup-container">
            <h2>Inscription à Fillelec</h2>
            <form method="POST">
                <input type="text" name="prenom" placeholder="Prénom" required>
                <input type="text" name="nom" placeholder="Nom" required>
                <input type="email" name="email" placeholder="Adresse e-mail" required>
                <input type="tel" name="telephone" placeholder="Numéro de téléphone" required>
                <select name="type" required>
                    <option value="particulier">Particulier</option>
                    <option value="professionnel">Professionnel</option>
                </select>
                <input type="text" name="pays" placeholder="Pays" required>
                <input type="text" name="ville" placeholder="Ville" required>
                <input type="text" name="numero" placeholder="Numero de rue" required>
                <input type="text" name="rue" placeholder="Nom de la rue" required>
                <input type="password" name="mdp" placeholder="Mot de passe" required>
                <button type="submit" name="Valider">S'inscrire</button>
                <a href="index.php?page=5">Déjà inscrit ? Connectez-vous</a>
            </form>
        </div>
    </center>
</body>
</html>
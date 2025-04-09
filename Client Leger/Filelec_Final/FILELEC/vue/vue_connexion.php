<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fillelec - Page de connexion</title>
    <link rel="stylesheet" href="assets/css/connexion.css">
</head>
<body>
    <br>
    <br>
    <br>
    <br>
    <center>
    <div class="login-container">
        <img src="img\image_logo\Fillelec.jpeg" alt="Logo Fillelec" class="logo">
        <h2>Se connecter à Fillelec</h2>
        <form action="index.php?page=5" method="post">
            <input type="email" class="input-field" name="email" placeholder="Adresse e-mail" required>
            <br>
            <input type="password" class="input-field" name="mdp" placeholder="Mot de passe" required>
            <br>
            <button type="submit" class="login-button">Se connecter</button>
        </form>
        <a href="#" class="forgot-password">Mot de passe oublié ?</a>
    </div>
    </center>
</body>
</html>


<?php



require_once './controleur/controleur.contact.php';

$messageRetour = "";

// Si le formulaire est soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $controleurContact = new ControleurContact();
    $messageRetour = $controleurContact->traiterFormulaire(
        $_POST["nom"],
        $_POST["prenom"],
        $_POST["email"],
        $_POST["telephone"],
        $_POST["message"]
    );
}

// Charger la vue
require_once './vue/select/vue_select_contact.php';
?>
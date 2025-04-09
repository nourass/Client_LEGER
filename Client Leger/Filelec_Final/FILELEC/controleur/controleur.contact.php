<?php
require_once './modele/modele.contact.php';

class ControleurContact {
    private $modele;

    public function __construct() {
        $this->modele = new ModeleContact();
    }

    public function traiterFormulaire($nom, $prenom, $email, $telephone, $message) {
        if (empty($nom) || empty($prenom) || empty($email) || empty($telephone) || empty($message)) {
            return "❌ Tous les champs doivent être remplis.";
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return "Adresse e-mail invalide.";
        }

        if (!preg_match('/^[0-9]{10}$/', $telephone)) {
            return " Numéro de téléphone invalide.";
        }

        // Enregistrer le message dans la base de données
        $insertion = $this->modele->enregistrerMessage($nom, $prenom, $email, $telephone, $message);

        if ($insertion) {
            // Envoi d'e-mail
            $destinataire = "adresse@outlook.com"; // Remplace par ton adresse
            $sujet = "Nouveau message de contact de $nom $prenom";
            $contenu = "Nom: $nom\nPrénom: $prenom\nEmail: $email\nTéléphone: $telephone\nMessage:\n$message";
            $headers = "From: $email\r\nReply-To: $email\r\nContent-Type: text/plain; charset=UTF-8\r\n";

            if (mail($destinataire, $sujet, $contenu, $headers)) {
                header("Location: index.php?page=1");
            } else {
                return "⚠️ Message enregistré, mais e-mail non envoyé.";
            }
        } else {
            return "❌ Erreur lors de l'enregistrement du message.";
        }
    }
}
?>
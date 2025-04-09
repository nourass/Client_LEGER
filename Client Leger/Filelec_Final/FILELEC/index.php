<?php
ob_start();
session_start();
require_once("controleur/controleur.class.php");
$unControleur = new Controleur();

?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="assets/css/Nav_bar_index.css">
    <link rel="stylesheet" href="assets/css/footer.css">
    <title>Fillelec</title>
</head>

<body>
    <center>
        <?php
        // Gestion de la connexion
        if (isset($_POST['email']) && isset($_POST['mdp'])) {
            $email = htmlspecialchars($_POST['email']);
            $mdp = htmlspecialchars($_POST['mdp']);

            $unUser = $unControleur->verifConnexion($email, $mdp);

            if ($unUser) {
                // Stockage des informations utilisateur dans la session
                $_SESSION['email'] = $unUser['email_client'];
                $_SESSION['nom'] = $unUser['nom_client'];
                $_SESSION['prenom'] = $unUser['prenom_client'];
                $_SESSION['id_client'] = $unUser['id_client'];
                $_SESSION['tel'] = $unUser['tel_client'];
                $_SESSION['pays'] = $unUser['pays_client'];
                $_SESSION['ville'] = $unUser['ville_client'];
                $_SESSION['numero'] = $unUser['num_rue_client'];
                $_SESSION['rue'] = $unUser['nom_rue_client'];

                header("Location: index.php"); // Redirige vers le tableau de bord
                exit();
            } else {
                $error = "Identifiants incorrects. Veuillez réessayer.";
            }
        }

        // Gestion de la déconnexion
        if (isset($_GET['page']) && $_GET['page'] == 6) {
            session_destroy();
            unset($_SESSION['email']);
            header("Location: index.php?page=1");
            exit();
        }
        ?>

        <nav>
            <div class="link-container">

                <a href="index.php?page=1" class="nav-link"> <img src="img/autre_image/apropos.webp" alt="" width="60px"
                        height="60px">
                    <h3 class="filelec_nav">Fillelec</h3>
                </a>
            </div>
            <div class="link-container">


            </div>

            <div class="link-container">
                <a href="index.php?page=1">Accueil</a>
            </div>

            <div class="link-container">
                <a href="index.php?page=9">Catalogue</a>
            </div>

            <div class="link-container">
                <a href="index.php?page=2">À propos</a>
            </div>

            <div class="link-container">
                <a href="index.php?page=3">Contact</a>
            </div>

            <div class="right-container">
                <?php if (isset($_SESSION['email'])): ?>
                    <div class="profile-container-nav">
                        <img src="img\image_navbar\profil_logo.png" alt="Profil" class="profile-logo">
                        <div class="dropdown">
                            <a href="index.php?page=8">Profil</a>
                            <a href="index.php?page=6">Déconnexion</a>
                        </div>
                    </div>
                    <div class="panier-container-nav">
                        <a href="index.php?page=10">
                            <img src="img\image_logo\Panier.png.png" alt="Panier" class="panier-logo">
                        </a>
                    </div>
                <?php else: ?>
                    <div class="link-container">
                        <a href="index.php?page=5">Connexion</a>
                    </div>
                    <div class="link-container">
                        <a href="index.php?page=7">Inscription</a>
                    </div>
                <?php endif; ?>
            </div>
    </center>
    </nav>


    <?php

    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    } else {
        $page = 1;
    }
    switch ($page) {
        case 1:
            require_once("principal/home.php");
            break;
        case 2:
            require_once("principal/Apropos.php");
            break;
        case 3:
            require_once("principal/contact.php");
            break;
        case 4:
            if (isset($_SESSION['email'])) {
                require_once("principal/home.php");
            } else {
                echo "<p>Veuillez vous connecter pour accéder au tableau de bord.</p>";
            }
            break;
        case 5:

            if (!isset($_SESSION['email'])) {
                if (isset($error)) {
                    echo "<p style='color:red;'>$error</p>";
                }
                require_once("vue/vue_connexion.php");
            } else {
                echo "<p>Vous êtes déjà connecté.</p>";
            }
            break;
        case 7:
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $tab = [
                    'prenom' => htmlspecialchars($_POST['prenom']),
                    'nom' => htmlspecialchars($_POST['nom']),
                    'email' => htmlspecialchars($_POST['email']),
                    'telephone' => htmlspecialchars($_POST['telephone']),
                    'pays' => htmlspecialchars($_POST['pays']),
                    'ville' => htmlspecialchars($_POST['ville']),
                    'numero' => htmlspecialchars($_POST['numero']),
                    'rue' => htmlspecialchars($_POST['rue']),
                    'type' => htmlspecialchars($_POST['type']),
                    'mdp' => htmlspecialchars($_POST['mdp'])
                ];

                $unControleur->insertClient($tab);
            }
            require_once("vue/insert/vue_insert_inscription.php");
            break;

        case 8:
            require_once("vue/vue_profil.php");

            if (isset($_GET['action'])) {
                $action = $_GET['action'];
                $id_client = $_SESSION['id_client'];
                if ($action == "supProfil") {

                    $unControleur->deleteClient($id_client);
                    session_destroy();
                    unset($_SESSION['email']);
                    header("Location: index.php");
                } else if ($action == "updateProfil") {
                    $id_client = $_SESSION['id_client'];
                    // On récupère les données du formulaire envoyées via POST
    
                    $tab = [
                        'nom' => $_POST['nom'],
                        'prenom' => $_POST['prenom'],
                        'pays' => $_POST['pays'],
                        'ville' => $_POST['ville'],
                        'numero' => $_POST['numero'],
                        'rue' => $_POST['rue'],
                        'email' => $_POST['email'],
                        'telephone' => $_POST['telephone'],
                        'id_client' => $id_client, // L'ID du client est récupéré depuis la session
                    ];

                    // Appel au contrôleur pour mettre à jour les informations du client
                    $unControleur->updateClient($tab);
                    header("Location: index.php"); // Redirection après mise à jour
                    exit(); // Assurez-vous que le script s'arrête après la redirection
    
                }
            }
            break;

        case 9:
            require_once("principal/catalogue.php");
            break;

        case 10:
            require_once("principal/panier.php");
            break;
        case "art":
            require_once("principal/article.php");
            break;

        default:
            echo "<p>Page introuvable.</p>";
    }
    ?>
    <br><br><br><br>
    <footer>
        <div class="footer-content">
            <p>2025 Filelec. Tous droits réservés.</p>
            <p>Contactez-nous à <a href="mailto:contact@filelec.com">contact@filelec.com</a></p>
            <div class="social-links">
                <a href="https://www.facebook.com/Filelec" target="_blank">Facebook</a>
                <a href="https://twitter.com/Filelec" target="_blank">Twitter</a>
                <a href="https://www.instagram.com/Filelec" target="_blank">Instagram</a>
            </div>
        </div>
    </footer>

</html>

<?php ob_end_flush(); ?>
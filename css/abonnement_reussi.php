<?php
session_start();
if (!isset($_SESSION["abonnement"]) || $_SESSION["abonnement"] != "1") {
    header("Location: page_principale.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Abonnement Réussi - Rencontres.com</title>
    <link rel="stylesheet" href="abonnement_reussi.css">
</head>
<body>
    <header>
        <div class="container">
            <h1>Rencontres.com</h1>
            <nav>
                <ul>
                    <li><a href="profil.php">Profil</a></li>
                    <li><a href="recherche.php">Recherche</a></li>
                    <li><a href="deconnexion.php">Déconnexion</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <main>
        <section id="abonnement-reussi">
            <div class="container">
                <h2>Abonnement Réussi</h2>
                <p>Merci pour votre abonnement. Vous êtes maintenant un membre Premium!</p>
                <p><a href="page_principale.php">Retour à la page principale</a></p>
            </div>
        </section>
    </main>
    <footer>
        <div class="container">
            <p>&copy; 2024 Rencontres.com. Tous droits réservés.</p>
        </div>
    </footer>
</body>
</html>

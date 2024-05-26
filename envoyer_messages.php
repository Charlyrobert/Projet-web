<?php
session_start();

if (!isset($_SESSION['pseudo'])) {
    header('Location: connexion.html');
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $expediteur = $_SESSION['pseudo'];
    $destinataire = $_POST['destinataire'];
    $message = $_POST['message'];

    // Stocker le message dans un fichier texte
    $file = fopen("messages.txt", "a");
    fwrite($file, "$expediteur | $destinataire | $message\n");
    fclose($file);

    header("Location: profil_utilisateur.php?pseudo=$destinataire");
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Envoyer un Message - Rencontres.com</title>
    <link rel="stylesheet" href="envoyer_message.css">
</head>
<body>
    <header>
        <div class="container">
            <h1>Rencontres.com</h1>
            <nav>
                <ul>
                    <li><a href="profil.php">Profil</a></li>
                    <li><a href="page_principale.php">Recherche</a></li>
                    <li><a href="deconnexion.php">Déconnexion</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <main>
        <section id="envoyer-message">
            <div class="container">
                <h2>Envoyer un Message</h2>
                <form method="post" action="envoyer_message.php">
                    <input type="hidden" name="destinataire" value="<?php echo htmlspecialchars($_GET['destinataire']); ?>">
                    <div class="form-group">
                        <label for="message">Message:</label>
                        <textarea id="message" name="message" required></textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Envoyer" class="btn">
                    </div>
                </form>
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

<?php
session_start();

if (!isset($_SESSION["pseudo"])) {
    header("Location: connexion.html");
    exit();
}

$pseudo = $_SESSION["pseudo"];
$lines = file("utilisateurs.txt");
$is_abonne = false;

foreach ($lines as $line) {
    $infos = explode(" | ", $line);
    if ($infos[0] == $pseudo && trim($infos[8]) == "1") {
        $is_abonne = true;
        break;
    }
}

if (!$is_abonne) {
    echo "Vous devez être abonné pour envoyer des messages.";
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = $_POST["to"];
    $message = $_POST["message"];

    $file = fopen("messages.txt", "a");
    fwrite($file, "$pseudo | $to | $message\n");
    fclose($file);

    echo "Message envoyé avec succès!";
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Envoyer un Message - Rencontres.com</title>
    <link rel="stylesheet" href="css/messages.css">
</head>
<body>
    <header>
        <div class="container">
            <h1>Rencontres.com</h1>
            <nav>
                <ul>
                    <li><a href="profil.php">Profil</a></li>
                    <li><a href="recherche.php">Recherche</a></li>
                    <li><a href="messages.php">Messages</a></li>
                    <li><a href="deconnexion.php">Déconnexion</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <main>
        <section id="envoyer-message">
            <div class="container">
                <h2>Envoyer un Message</h2>
                <form action="envoyer_message.php" method="post">
                    <div class="form-group">
                        <label for="to">À:</label>
                        <input type="text" id="to" name="to" required>
                    </div>
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

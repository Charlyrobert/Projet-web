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
    echo "Vous devez être abonné pour consulter les messages.";
    exit();
}

$messages = file("messages.txt");

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messages - Rencontres.com</title>
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
        <section id="messages">
            <div class="container">
                <h2>Vos Messages</h2>
                <div id="messages-list">
                    <?php
                    foreach ($messages as $message) {
                        list($from, $to, $content) = explode(" | ", $message);
                        if (trim($to) == $pseudo) {
                            echo "<div class='message'>";
                            echo "<p><strong>De:</strong> $from</p>";
                            echo "<p><strong>Message:</strong> $content</p>";
                            echo "</div>";
                        }
                    }
                    ?>
                </div>
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

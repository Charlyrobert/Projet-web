<?php
session_start();

if (!isset($_SESSION['pseudo'])) {
    header('Location: connexion.html');
    exit();
}

$pseudo = $_SESSION['pseudo'];
$messages = file("messages.txt");

$received_messages = [];
foreach ($messages as $message) {
    list($expediteur, $destinataire, $msg) = explode(" | ", $message);
    if ($destinataire == $pseudo) {
        $received_messages[] = [
            'expediteur' => $expediteur,
            'message' => $msg
        ];
    }
}
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
                    <li><a href="page_principale.php">Recherche</a></li>
                    <li><a href="deconnexion.php">Déconnexion</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <main>
        <section id="messages">
            <div class="container">
                <h2>Messages Reçus</h2>
                <ul>
                    <?php
                    foreach ($received_messages as $msg) {
                        echo "<li><strong>{$msg['expediteur']}:</strong> {$msg['message']}</li>";
                    }
                    ?>
                </ul>
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

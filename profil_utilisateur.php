<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Utilisateur - Rencontres.com</title>
    <link rel="stylesheet" href="css/profil_utilisateur.css">
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
        <section id="user-profile">
            <div class="container">
                <h2>Profil Utilisateur</h2>
                <div id="profile-details">
                    <?php
                    if (isset($_GET['pseudo'])) {
                        $pseudo = $_GET['pseudo'];
                        $lines = file("utilisateurs.txt");
                        $user_info = [];

                        foreach ($lines as $line) {
                            $infos = explode(" | ", $line);
                            if ($infos[0] == $pseudo) {
                                $user_info = $infos;
                                break;
                            }
                        }

                        if (!empty($user_info)) {
                            echo "<p><strong>Pseudo:</strong> {$user_info[0]}</p>";
                            echo "<p><strong>Sexe:</strong> {$user_info[2]}</p>";
                            echo "<p><strong>Date de naissance:</strong> {$user_info[3]}</p>";
                            echo "<p><strong>Profession:</strong> {$user_info[4]}</p>";
                            echo "<p><strong>Lieu de résidence:</strong> {$user_info[5]}, {$user_info[6]}</p>";
                            echo "<p><strong>Biographie:</strong> {$user_info[7]}</p>";
                            
                            echo "<h3>Envoyer un message</h3>";
                            echo "<form method='post' action='envoyer_message.php'>";
                            echo "<input type='hidden' name='destinataire' value='{$user_info[0]}'>";
                            echo "<div class='form-group'>";
                            echo "<label for='message'>Message:</label>";
                            echo "<textarea id='message' name='message' required></textarea>";
                            echo "</div>";
                            echo "<div class='form-group'>";
                            echo "<input type='submit' value='Envoyer' class='btn'>";
                            echo "</form>";
                        } else {
                            echo "<p>Aucune information utilisateur trouvée.</p>";
                        }
                    } else {
                        echo "<p>Aucune information utilisateur trouvée.</p>";
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

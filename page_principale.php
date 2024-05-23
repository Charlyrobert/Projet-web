<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Principale - Rencontres.com</title>
    <link rel="stylesheet" href="css/page_principale.css">
</head>
<body>
    <header>
        <div class="container">
            <h1>Rencontres.com</h1>
            <nav>
                <ul>
                <?php
                    session_start(); //Première ligne de ton code
                    //print_r($_SESSION);
                    $pseudo = $_SESSION["pseudo"];
                    echo "<li><a href='profil.php?pseudo=".$pseudo."'>Profil</a></li>";
                ?>
                    <li><a href="recherche.php">Recherche</a></li>
                    <li><a href="messages.php">Messages</a></li>
                    <li><a href="deconnexion.php">Déconnexion</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <main>
        <section id="recent-profiles">
            <div class="container">
                <h2>20 Derniers Profils Inscrits</h2>
                <div id="profiles-list">
                    <?php
 
                    $lines = file("utilisateurs.txt");
                    $lines = array_reverse($lines); // Inverser l'ordre pour avoir les derniers profils en premier
                    $recent_profiles = array_slice($lines, 0, 20); // Prendre les 20 premiers

                    if (count($recent_profiles) > 0) {
                        foreach ($recent_profiles as $line) {
                            $infos = explode(" | ", $line);
                            echo "<div class='profile'>";
                            echo "<p><strong>Pseudo:</strong> {$infos[0]}</p>";
                            echo "<p><strong>Sexe:</strong> {$infos[2]}</p>";
                            echo "<p><strong>Date de naissance:</strong> {$infos[3]}</p>";
                            echo "<p><strong>Profession:</strong> {$infos[4]}</p>";
                            echo "<p><strong>Lieu de résidence:</strong> {$infos[5]}, {$infos[6]}</p>";
                            echo "<p><strong>Biographie:</strong> {$infos[7]}</p>";
                            echo "</div>";
                        }
                    } else {
                        echo "<p>Aucun profil trouvé.</p>";
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

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil - Rencontres.com</title>
    <link rel="stylesheet" href="css/profil.css">
</head>
<body>
    <header>
        <div class="container">
            <h1>Rencontres.com</h1>
            <nav>
                <ul>
                    <li><a href="page_principale.php">Page principale</a></li>
                    <li><a href="modifier_profil.html">Modifier Profil</a></li>
                    <li><a href="deconnexion.php">Déconnexion</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <main>
        <section id="profil">
            <div class="container">
                <h2>Profil</h2>
                <div id="user-profile">
                <?php
                session_start(); //Première ligne de ton code
                //print_r($_SESSION);

                    if (isset($_SESSION['pseudo'])) {
                        $pseudo = $_SESSION['pseudo'];
                        $lines = file("utilisateurs.txt");
                        $user_info = [];

                        // Lire la dernière occurrence du pseudo dans le fichier
                        foreach ($lines as $line) {
                            $infos = explode(" | ", $line);
                            if ($infos[0] == $pseudo) {
                                $user_info = $infos;
                            }
                        }

                        // Afficher les informations de l'utilisateur si trouvées
                        if (!empty($user_info)) {
                            echo "<p><strong>Pseudo:</strong> {$user_info[0]}</p>";
                            echo "<p><strong>Sexe:</strong> {$user_info[2]}</p>";
                            echo "<p><strong>Date de naissance:</strong> {$user_info[3]}</p>";
                            echo "<p><strong>Profession:</strong> {$user_info[4]}</p>";
                            echo "<p><strong>Lieu de résidence:</strong> {$user_info[5]}, {$user_info[6]}</p>";                                
                            echo "<p><strong>Biographie:</strong> {$user_info[7]}</p>";                             
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

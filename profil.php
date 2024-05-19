<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil - Rencontres.com</title>
    <link rel="stylesheet" href="profil.css">
</head>
<body>
    <header>
        <div class="container">
            <h1>Rencontres.com</h1>
            <nav>
                <ul>
                    <li><a href="accueil.html">Accueil</a></li>
                    <li><a href="inscription.html">Inscription</a></li>
                    <li><a href="connexion.html">Connexion</a></li>
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
                    if (isset($_GET['pseudo'])) {
                        $pseudo = $_GET['pseudo'];
//                        echo "<p><strong>Pseudo:</strong> $pseudo</p>";
                        $lines = file("utilisateurs.txt");

                        foreach ($lines as $line) {
                            $infos = explode(" | ", $line);
                            if ($infos[0] == $pseudo) {
                                echo "<p><strong>Pseudo:</strong> $infos[0]</p>";
                                echo "<p><strong>Sexe:</strong> $infos[2]</p>";
                                echo "<p><strong>Date de naissance:</strong> $infos[3]</p>";
                                echo "<p><strong>Profession:</strong> $infos[4]</p>";
                                echo "<p><strong>Lieu de résidence:</strong> $infos[5], $infos[6]</p>";                                
                                echo "<p><strong>Biographie:</strong> $infos[7]</p>";

/*
                                echo "<p><strong>Lieu de résidence:</strong> $infos[5], $infos[6], $infos[7]</p>";
                                echo "<p><strong>Situation amoureuse:</strong> $infos[8]</p>";
                                echo "<p><strong>Taille:</strong> $infos[9]</p>";
                                echo "<p><strong>Poids:</strong> $infos[10]</p>";
                                echo "<p><strong>Biographie:</strong> $infos[11]</p>";
                                echo "<p><strong>Centres d'intérêts:</strong> $infos[12]</p>";
*/                                
                                break;
                            }
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
            <p>&copy; 2024 MonSiteDeRencontre. Tous droits réservés.</p>
        </div>
    </footer>
</body>
</html>

